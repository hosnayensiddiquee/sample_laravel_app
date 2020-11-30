<?php

namespace App\Api;

use GuzzleHttp\Client;
use Illuminate\Http\Request;

class Payment
{
    private $uri;
    private $guzzleClient;

    public function __construct(Client $guzzleClient)
    {
        $this->guzzleClient = $guzzleClient;
        $this->uri = config('payment.url');
    }

    public function send(int $userId, string $iban, string $owner): array
    {
        $responseResult = [];
        $response = $this->guzzleClient->request(
            Request::METHOD_POST,
            $this->uri,
            [
                'json' => [
                    'customerId' => $userId,
                    'iban' => $iban,
                    'owner' => $owner
                ]
            ]
        );

        $responseResult['content'] = $response->getBody()->getContents();
        $responseResult['status_code'] = $response->getStatusCode();

        return $responseResult;
    }

}
