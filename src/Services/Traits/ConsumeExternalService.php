<?php

namespace SammuelOliveira\MicroservicesCommon\Services\Traits;

use Illuminate\Support\Facades\Http;

class ConsumeExternalService
{
    public function teste()
    {
        return 'Sucesso!';
    }

    public function headers(array $headers = [])
    {
        array_push($headers, [
            'Accept' => 'application/json',
            'Authorizatiom' => $this->token
        ]);

        return Http::withHeaders($headers);
    }

    public function request(
        string $method,
        string $endPoint,
        array $formParams = [],
        array $headers = []
    ) {
        return $this->headers($headers)
                    ->$method($this->url . $endPoint, $formParams);
    }
}