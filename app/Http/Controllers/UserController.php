<?php

namespace App\Http\Controllers;

use App\Http\Requests\ComplaintSuggestionRequest;
use App\Models\User;
use App\Models\ComplaintSuggestion;
use Illuminate\Http\Request;
use App\Models\EmailVerification;
use Illuminate\Support\Facades\Mail as mailer;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;


class UserController extends Controller
{
    public function profile()
    {
        return view("Profile.index");
    }
}
