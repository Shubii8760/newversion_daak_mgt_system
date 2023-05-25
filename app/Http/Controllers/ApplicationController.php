<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ComplaintSuggestion;
use App\Models\EmailVerification;
use Illuminate\Support\Facades\Mail as mailer;

class ApplicationController extends Controller
{
    /**
     * To check user is verified and send otp is not
     *
     * @param [type] $id
     * @return void
     */

    public function verification($id)
    {
        $complaints_suggestions = ComplaintSuggestion::where('id', $id)->first();
        if (!$complaints_suggestions || $complaints_suggestions->is_verified == 1) {
            // dd($id);
            return redirect('home');
        }
        $email = $complaints_suggestions->email;

        $this->sendOtp($complaints_suggestions); //OTP SEND

        // return redirect(route('verifiedOtp', ['id' => $complaints_suggestions->id]));
        return view('complaint');
    }

    /**
     *To Send Otp
     *
     * @param [type] $complaints_suggestions
     * @return void
     */

    public function sendOtp(Request $request)
    {
        $otp = rand(100000, 999999);
        $time = time();

        // updateOrCreate
        EmailVerification::updateOrCreate(
            ['email' => $request->email],
            [
                'email' => $request->email,
                'otp' => $otp,
                'created_at' => $time
            ]
        );
        $data['email'] = $request->email;
        $data['title'] = 'Mail Verification';
        $data['body'] = 'Your OTP is:- ' . $otp;

        mailer::send('mailVerification', ['data' => $data], function ($message) use ($data) {
            $message->to($data['email'])->subject($data['title']);
        });
    }

    /**
     * To Verifiy Otp
     */

    public function verifiedOtp(Request $request)
    {
        $complaints_suggestions = ComplaintSuggestion::where('email', $request->email)->first();
        $otpData = EmailVerification::where('otp', $request->otp)->first();

        if (!$otpData) {
            return response()->json(['success' => false, 'msg' => 'You entered wrong OTP']);
        } else {
            // $currentTime = time();
            $time = $otpData->created_at;
            $time = $otpData->otp;

            // dd($currentTime);
            if ($time >= $time && $time >= $time - (90 + 5)) { //90 seconds
                ComplaintSuggestion::where('id', $complaints_suggestions->id)->update([
                    'is_verified' => 1
                ]);


                return redirect()->route('home')->with('success', 'Email has been Verified and Application is submitted');

                // dd($complaints_suggestions);
            } else {
                return redirect()->back()->with('error', 'Otp has been expired.');
            }
        }
    }
}





    // public function resendOtp(Request $request)
    // {
    //     $complaints_suggestions = ComplaintSuggestion::where('email', $request->email)->first();
    //     $otpData = EmailVerification::where('email', $request->email)->first();

    //     $currentTime = time();
    //     $time = $otpData->created_at;

    //     if ($currentTime >= $time && $time >= $currentTime - (90 + 5)) { //90 seconds
    //         return response()->json(['success' => false, 'msg' => 'Please try after some time']);
    //     } else {

    //         $this->sendOtp($complaints_suggestions); //OTP SEND
    //         return response()->json(['success' => true, 'msg' => 'OTP has been sent']);
    //     }
    // }
