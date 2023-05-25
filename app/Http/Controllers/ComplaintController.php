<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ComplaintSuggestion;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;
use App\Http\Requests\ComplaintSuggestionRequest;
use App\Models\EmailVerification;
use Illuminate\Support\Facades\Mail as mailer;

class ComplaintController extends Controller
{
    /**
     * To Complaints
     *
     * @return void
     */

    public function complaint()
    {
        return view('forms.complaint');
    }

    /**
     * To store Complaints and suggestion
     *
     * @param \App\Http\Requests\ComplaintSuggestionRequest $request
     * @return void
     */

    public function postComplaints(ComplaintSuggestionRequest $request)
    {
        // dump($request->otp);
        $complaints_suggestions = EmailVerification::where('email', $request->email)->first();
        // dd($complaints_suggestions);
        if ($complaints_suggestions->otp == $request->otp) {
            if ($request->hasFile('file')) {
                $image = $request->file('file');
                $filename = time() . '.' . $image->getClientOriginalExtension();
                $image->storeAs('public/images', $filename);
            }
            $complaints_suggestions = ComplaintSuggestion::count();
            $complaints_suggestions = new ComplaintSuggestion();
            $complaints_suggestions->name = $request->name;
            $complaints_suggestions->email = $request->email;
            $complaints_suggestions->phone = $request->phone;
            $complaints_suggestions->is_verified = 1;
            $complaints_suggestions->message = $request->message;
            $complaints_suggestions->type = $request->type;
            $complaints_suggestions->file = $filename;
            $complaints_suggestions->save();
            return redirect()->back()->with('succes', 'Application has been send successfully.');
        }else{
            return redirect()->back()->with('error', 'something wnet wrong?');
        }

    }



    /**
     * To View All The Complaints And Suggestions
     */

    public function view(Request $request)
    {
        if ($request->ajax()) {
            $data = ComplaintSuggestion::select('*');
            return DataTables::of($data)
                ->addIndexColumn()
                ->editColumn('file', function ($row) {
                    return '<img src="' . Storage::url('images/' . $row->file) . '"  width="50" height="50"></img>';
                })

                ->addColumn('delete', function ($row) {
                    return    "<button class='btn btn-sm btn-danger delete-application' data-id='" . $row->id . "'>Delete</button>";
                })

                ->addColumn('edit', function ($row) {
                    return    '<a href="' . route('edit', ['id' => $row->id]) . '" class="btn btn-success btn-sm">Edit</a>';
                })
                ->rawColumns(['delete', 'edit', 'file'])
                ->make(true);
        }
        return view('forms.mail.view');
    }

    /**
     * To Edit The Application
     */
    public function edit($id)
    {
        $application = ComplaintSuggestion::find($id);
        return view('forms.mail.edit', compact('application'));
    }


    /**
     * To Update The Application
     */
    public function update(Request $request, $id)
    {
        if ($request->hasFile('file')) {
            $image = $request->file('file');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('public/images', $filename);
        }
        $complaints_suggestions = ComplaintSuggestion::count();
        $complaints_suggestions = ComplaintSuggestion::find($id);
        $complaints_suggestions->name = $request->name;
        $complaints_suggestions->email = $request->email;
        $complaints_suggestions->phone = $request->phone;
        $complaints_suggestions->message = $request->message;
        $complaints_suggestions->type = $request->type;
        $complaints_suggestions->Office = $request->Office;

        if ($request->hasFile('file')) {
            $complaints_suggestions->file = $filename;
        }
        $res = $complaints_suggestions->save();
        if ($res) {
            return redirect()->route('view')->with('success', 'post has been updated.');
        } else {
            return redirect()->back()->with('error', 'Something Went Wrong?');
        }
    }


    /**
     * To destroy the Application
     */
    public function delete($id)
    {
        $ComplaintSuggestion = ComplaintSuggestion::find($id);
        if (!is_null($ComplaintSuggestion)) {
            $ComplaintSuggestion->delete();
        }

        return response()->json([
            'success' => true,
            'message' => 'Successfully Deleted.'
        ]);
    }
}

