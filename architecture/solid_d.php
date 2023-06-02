<?php

interface XMLHTTPRequestService
{
    public function request(string $url, string $method, array $options = []);
}

class XMLHttpService implements XMLHTTPRequestService {
    public function request(string $url, string $method, array $options = [])
    {
        echo $url;
        echo $method;
        print_r($options);
    }
}

class Http {
    private XMLHttpService $service;

    public function __construct(XMLHttpService $xmlHttpService) {
        $this->service = $xmlHttpService;
    }

    public function get(string $url, array $options) {
        $this->service->request($url, 'GET', $options);
    }

    public function post(string $url) {
        $this->service->request($url, 'POST');
    }
}

$http = new Http(new XMLHttpService());

$http->get('localhost', ['Set-Cookie'=> 'cookie-name=success']);
$http->post('localhost');
