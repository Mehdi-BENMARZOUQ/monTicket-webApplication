<?php
namespace App\Http\Controllers;

use App\Models\Checkout;
use Illuminate\Http\Request;

class QrCodeController extends Controller
{
    public function verify(Request $request)
    {
        $qrCodeContent = $request->input('qr_code');


        $checkoutId = basename(parse_url($qrCodeContent, PHP_URL_PATH));

        $checkout = Checkout::find($checkoutId);

        if ($checkout) {
            return response()->json([
                'status' => 'success',
                'message' => 'QR code is valid',
                'event' => $checkout->event->title,
                'ticket_type' => $checkout->ticket->type,
                'total_amount' => $checkout->total_amount,
                'is_valid' => true
            ]);
        } else {
            return response()->json([
                'status' => 'error',
                'message' => 'QR code is invalid',
                'is_valid' => false
            ]);
        }


    }


}
