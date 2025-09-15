<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class TripayService
{
    protected string $baseUrl;
    protected string $apiKey;

    public function __construct()
    {
        $this->baseUrl = config('tripay.url');
        $this->apiKey  = config('tripay.api_key');
    }

    protected function request(string $method, string $endpoint, array $params = [])
    {
        $http = Http::withHeaders([
            'Authorization' => 'Bearer ' . $this->apiKey,
        ]);

        $url = rtrim($this->baseUrl, '/') . '/' . ltrim($endpoint, '/');

        return $http->$method($url, $params)->json();
    }

    public function payments()
    {
        $res = $this->request('get', '/merchant/payment-channel');
        return $res['data'] ?? [];
    }

    private function signature($amount, $merchantRef)
    {
        $privateKey = config('tripay.private_key');
        $merchantCode = config('tripay.merchant_code');
        $signature = hash_hmac('sha256', $merchantCode . $merchantRef . $amount, $privateKey);
        return $signature;
    }

    public function checkout($data)
    {
        $data['signature'] = $this->signature($data['amount'], $data['merchant_ref']);
        $data['expired_time'] = config('tripay.expired_time');

        $res = $this->request('post', '/transaction/create', $data);
        return $res['data'] ?? [];
    }
}
