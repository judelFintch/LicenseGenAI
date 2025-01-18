<?php

namespace App\Services;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use Illuminate\Support\Facades\Log;

class HuggingFaceService
{
    protected $client;
    protected $apiKey;

    public function __construct()
    {
        $this->apiKey = env('HUGGING_FACE_API_KEY');

        if (!$this->apiKey) {
            throw new \InvalidArgumentException('API key for Hugging Face is not set in the environment variables.');
        }

        $this->client = new Client([
            'base_uri' => 'https://api-inference.huggingface.co/models/',
            'headers' => [
                'Authorization' => 'Bearer ' . $this->apiKey,
                'Accept' => 'application/json',
            ],
        ]);
    }

    /**
     * Fetch model output from Hugging Face API.
     *
     * @param string $model The name of the model to query.
     * @param mixed $input The input data for the model.
     * @return array The model's response as an associative array.
     * @throws \Exception If the request fails or the response is invalid.
     */
    public function getModelOutput(string $model, $input): array
    {
        // Basic validation
        if (empty($model)) {
            throw new \InvalidArgumentException('Model name cannot be empty.');
        }

        if (empty($input)) {
            throw new \InvalidArgumentException('Input data cannot be empty.');
        }

        try {
            $response = $this->client->request('POST', $model, [
                'json' => ['inputs' => $input],
            ]);

            $data = json_decode($response->getBody(), true);

            if (json_last_error() !== JSON_ERROR_NONE) {
                throw new \RuntimeException('Invalid JSON response from Hugging Face API.');
            }

            return $data;

        } catch (RequestException $e) {
            // Log the error and rethrow with a user-friendly message
            Log::error('Hugging Face API error: ' . $e->getMessage());
            throw new \Exception('Failed to fetch model output from Hugging Face API. Please try again later.');
        }
    }
}
