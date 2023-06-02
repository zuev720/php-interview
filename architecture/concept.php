<?php
class Concept {
    private \GuzzleHttp\Client $client;
    private $storage;

    public function __construct() {
        $this->client = new \GuzzleHttp\Client();
        $this->storage = getenv('STORAGE_TYPE');
    }

    public function getUserData() {
        print_r($this->getSecretKey());
        $params = [
            'auth' => ['user', 'pass'],
            'token' => $this->getSecretKey()
        ];

        $request = new \Request('GET', 'https://api.method', $params);
        $promise = $this->client->sendAsync($request)->then(function ($response) {
            $result = $response->getBody();
        });

        $promise->wait();
    }

    private function getSecretKey(): string
    {
        if ($this->storage === 'File') $secret = 'file';
        if ($this->storage === 'DB') $secret = 'db';
        if ($this->storage === 'Redis') $secret = 'redis';
        if ($this->storage === 'Cloud') $secret = 'cloud';

        $headers_encoded = base64_encode('headers');
        $payload_encoded = base64_encode(json_encode('$payload'));
        $signature = hash_hmac('SHA256', "$headers_encoded.$payload_encoded", $secret, true);
        $signature_encoded = base64_encode($signature);
        $jwt = "$headers_encoded.$payload_encoded.$signature_encoded";

        return $jwt;
    }
}

$concept = new Concept();
$concept->getUserData();