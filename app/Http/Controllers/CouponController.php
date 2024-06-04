<?php

namespace App\Http\Controllers;

use App\Models\CouponCode;
use Illuminate\Http\Request;

class CouponController extends Controller
{
    public function validateCoupon(Request $request)
    {
        $coupon = CouponCode::where('code', $request->code)->first();

        if ($coupon) {
            return response()->json(['valid' => true, 'percentage' => $coupon->percentage]);
        } else {
            return response()->json(['valid' => false]);
        }
    }
}
