<?php

namespace App\Service;

use App\Constant\UtilsConstant;

class AuthUtilsService
{
    private string $clientId;
    private string $clientSecret;
    public function __construct(string $clientId, string $clientSecret) {
        $this->clientId= $clientId;
        $this->clientSecret= $clientSecret;
    }

    /**
     * Récupère le token
     * @return mixed
     */
    public function getAuthToken(): mixed
    {
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, UtilsConstant::API . 'login');
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode(['client_id' => $this->clientId, 'client_secret' => $this->clientSecret]));
        $response = json_decode(curl_exec($curl));
        curl_close($curl);

        return $response->token;
    }
}
