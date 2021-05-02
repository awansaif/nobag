<?php

namespace App\Http\Controllers;

use App\Mail\SellerVerified;
use App\Models\Article;
use App\Models\Buyer;
use App\Models\Editior;
use App\Models\Seller;
use App\Models\SellerBlog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class EditiorController extends Controller
{
    public function login_form()
    {
        return view('editor.auth.login');
    }


    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required|exists:editiors,username',
            'password' => 'required|min:6'
        ]);

        if (Auth::guard('editor')->attempt(['username' => $request->username, 'password' => $request->password, 'is_active' => 1])) {
            return redirect()->route('editor.dashboard');
        } else {
            $request->session()->flash('error', 'Password Incorrect: Please Try Again.');
            return back();
        }
    }

    // dahboard
    public function dashboard()
    {
        return view('editor.dashboard', [
            'blogs' => Article::where('author', auth()->guard('editor')->user()->id)->count(),
            'seller' => Seller::where('is_verified', 1)->count(),
            'buyer'  => Buyer::where('email_verified_at', '!=', null)->count(),
        ]);
    }

    // guides list
    public function guides()
    {
        return view('editor.pages.seller.index', [
            'sellers' => Seller::orderBy('id', 'DESC')->get()
        ]);
    }

    // verification
    public function verification($id)
    {
        $seller = Seller::findorFail($id);
        $password = $seller->surname[0] . uniqid();
        $seller->user_name = $seller->first_name[0] .  uniqid();
        $seller->password =  Hash::make($password);
        $seller->visible_password = $password;
        $seller->is_verified = 1;
        $seller->save();
        Mail::to($seller->email)->send(new SellerVerified($seller));
        return back();
    }


    public function tourists()
    {
        return view('editor.pages.buyer.index', [
            'tourists' => Buyer::where('email_verified_at', '!=', null)
                ->orderBy('id', 'DESC')
                ->get()
        ]);
    }


    // logout
    public function logout()
    {
        Auth::guard('editor')->logout();
        return redirect()->route('welcome');
    }
}
