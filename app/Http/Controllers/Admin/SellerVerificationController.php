<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Seller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class SellerVerificationController extends Controller
{
    public function sellers()
    {
        return view('admin.pages.seller.index', [
            'sellers' => Seller::orderBy('id', 'DESC')->get()
        ]);
    }

    public function verification($id)
    {
        $seller = Seller::findorFail($id);
        $password = $seller->surname . uniqid();
        $seller->user_name = $seller->first_name .  uniqid();
        $seller->password =  Hash::make($password);
        $seller->visible_password = $password;
        $seller->is_verified = 1;
        $seller->save();

        return back();
    }
}
