<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\SellerVerified;
use App\Models\Seller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class SellerVerificationController extends Controller
{

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
}
