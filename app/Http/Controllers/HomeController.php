<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class HomeController extends Controller
{
    public function redirect()
    {
        if (Auth::check()) {
            $usertype = Auth::user()->user_type;
            if ($usertype == '1') {
                return view('admin.home.index');
                return redirect('/admin_home');
            } else {
                return view('front.home');
            }
        } else {
            //return redirect()->route('login');
            return view('front.home');
        }
    }
    public function index()
    {
        return view('front.home');
    }
}

