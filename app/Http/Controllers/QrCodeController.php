<?php
namespace App\Http\Controllers;

use App\Models\Checkout;
use Illuminate\Http\Request;

class QrCodeController extends Controller
{
    public function verify(Request $request)
    {
        $qrCodeContent = $request->input('qr_code');

        // Extract the checkout ID from the QR code content
        // Assuming the QR code content is the URL that contains the checkout ID
        $checkoutId = basename(parse_url($qrCodeContent, PHP_URL_PATH));

        $checkout = Checkout::find($checkoutId);

        if ($checkout) {
            return response()->json([
                'status' => 'success',
                'message' => 'QR code is valid',
                'event' => $checkout->event->name,
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
