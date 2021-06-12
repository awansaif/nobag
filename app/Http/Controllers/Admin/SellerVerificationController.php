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
        $seller->is_verified = 1;
        $seller->save();
        Mail::to($seller->email)->send(new SellerVerified($seller));
        return back();
    }
}
