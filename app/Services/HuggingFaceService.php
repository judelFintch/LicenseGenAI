<?php


namespace App\Services;

use GuzzleHttp\Client;

class HuggingFaceService
{
    protected $client;
    protected $apiKey;

    public function __construct()
    {
        $this->apiKey = env('HUGGING_FACE_API_KEY');
        $this->client = new Client([
            'base_uri' => 'https://api-inference.huggingface.co/models/',
            'headers' => [
                'Authorization' => 'Bearer ' . $this->apiKey,
                'Accept' => 'application/json',
            ],
        ]);
    }

    public function getModelOutput($model, $input)
    {
        $response = $this->client->request('POST', $model, [
            'json' => ['inputs' => $input],
        ]);
        return json_decode($response->getBody(), true);
    }
}