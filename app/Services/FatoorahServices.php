<?php
namespace App\Services;

use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;

class FatoorahServices
{
    private $base_url;
    private $headers;
    private $request_client;

    public function __construct(Client $request_client)
    {
        $this->request_client = $request_client;
        $this->base_url = env('fatoora_base_url', 'https://api.myfatoorah.com/');

        $this->headers = [
            "Content-Type" => 'application/json',
            "authorization" => 'Bearer S1rlYUlVdknlOmAeaJDWKwYWd0CzvYDNnVyTd_Zw3oBdD1KUiyrHlY_l9t00blRlcir3zoStVTbqeOYbz_bKpYYNRuUq2aSsBEl0G-e94mRr7mPi7udq1mbpL7ZQ0n4UFM-yITm_9a3vyJ-E2-fLOFeCvUlRjjqpUOdmSjoblx1CxUqtQjqJPuXsjEn07k4CQLYa8jCi0LXWkxasy8yXNQTsTZervKr_HM4KxQAuuk8CQp3HVleBJpOiA-fptzSBTzvXQL3x3QfTJXCWI43olPYOtLfW7BkctBoZ2g2vgN1_4lumYczlE2ZIlzVQvKnyj1HSnDa3SqrN25691nNj59ufoNiZEHPlJmFMm2sIeg1I17bbNtA1vYiSHLnZMs6jpGUaVCpMWKMzMDOAx8ZmIZL1yjrmNjvBODU4LMAOrIqoEBv84F8bI_oOZT6JYRk3raEej8T7PInLeAmOGW1nhu10eYikgg2VZBgxoSmvVpYYLPzJkCdtMA3ZOdDtplrwgNMoqhSoRJn9Ey1s4JBOsxwDA0MCHmEk89GNtFjOZ5-5t87vvSVG9BPG8DFd9ao_AZUtyU-OeEectWFZiWfnroY3Inae7yOYiil1lnQNh35wjTQJUL9ZzoMYNofjNTGn2gPC49na7-jtV8Fhk7Er4R5KAh9nF3Gxrp5wzmhU6o__nDQJ_9iWTFpbzUZ3raz3ssAXyQ',
        ];
        
        
    }

    public function buildRequest($url, $method, $data = [])
    {
        $request = new Request($method, $this->base_url . $url, $this->headers);
        if (!$data) {
            return false;
        }

        try {
            $response = $this->request_client->send($request, ['json' => $data]);

            \Log::info('Fatoorah API Full Response: ' . $response->getBody());
        //    dd($response->getStatusCode());
            if ($response->getStatusCode() != 200) {
                return false;
            }

            $response = json_decode($response->getBody(), true);
            return $response;
        } catch (\Exception $e) {
            \Log::error('Fatoorah API Error: ' . $e->getMessage());
            return false;
        }
    }

    public function sendPayment($data)
    {
        $response  = $this->buildRequest('v2/SendPayment', 'POST', $data);
        return $response;
    }

    public function getPaymentStatus($data)
    {
        $response  = $this->buildRequest('v2/getPaymentStatus', 'POST', $data);
        return $response;
    }

    public function callAPI($endpointURL, $apiKey, $postFields = [])
    {
        $response = $this->request_client->request('POST', $endpointURL, [
            'headers' => [
                'Authorization' => 'Bearer ' . $apiKey,
                'Content-Type' => 'application/json',
            ],
            'json' => $postFields,
        ]);

        return $response->getBody()->getContents();
    }
}
