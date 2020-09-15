<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{

    public function __construct()
    {
        if (!Auth::check()) {
            return redirect()->route('admin.show_login_form');
        }
    }

    public function index()
    {
        if (Auth::check()) {
            return view('backend.index');
        }
        return redirect()->route('admin.show_login_form');
    }

}
