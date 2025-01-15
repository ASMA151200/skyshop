<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class PaymentController extends Controller
{
    public function initiatePayment(Request $request)
{
    $url = 'https://paytech.sn/api/payment/request-payment';

    // Préparer les données pour le paiement
    $postFields = [
        "item_name"    => 'phone connect',
        "item_price"   => 200,
        "currency"     => "xof", // Devrait être en minuscules
        "ref_command"  => uniqid('ORDER-'),
        "command_name" => 'phone_connect',
        "env"          => env('PAYTECH_ENV', 'test'), 
        "success_url"  => env('PAYTECH_SUCCESS_URL'),
        "ipn_url"      => env('PAYTECH_IPN_URL'),
        "cancel_url"   => env('PAYTECH_CANCEL_URL'),
    ];

    try {
        // Effectuer la requête POST avec Guzzle
        $client = new Client();
        $response = $client->post($url, [
            'headers' => [
                'API_KEY'    => env('PAYTECH_API_KEY'),
                'API_SECRET' => env('PAYTECH_SECRET_KEY'),
                'Content-Type' => 'application/x-www-form-urlencoded;charset=utf-8',
            ],
            'form_params' => $postFields,
        ]);

        // Décoder la réponse
        $responseBody = json_decode($response->getBody(), true);

        if (isset($responseBody['success']) && $responseBody['success'] == 1) {
            return redirect($responseBody['redirect_url']);
        }

        return response()->json([
            'error' => $responseBody['message'] ?? 'Une erreur est survenue.',
            'details' => $responseBody,
        ], 400);

    } catch (\GuzzleHttp\Exception\RequestException $e) {
        $errorResponse = $e->getResponse() ? $e->getResponse()->getBody()->getContents() : $e->getMessage();
        
        // Enregistrer l'erreur dans les logs
        \Log::error('Erreur lors de la requête vers Paytech : ' . $errorResponse);
        
        return response()->json([
            'error' => 'Erreur lors de la requête vers Paytech.',
            'details' => $errorResponse,
        ], 500);
    }
    
}

    public function success(Request $request)
    {
        return response()->json(['message' => 'Paiement réussi', 'data' => $request->all()]);
    }

    public function cancel(Request $request)
    {
        return response()->json(['message' => 'Paiement annulé', 'data' => $request->all()]);
    }

}