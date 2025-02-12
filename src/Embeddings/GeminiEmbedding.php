<?php

namespace Palgu\Larachain\Embeddings;

use Palgu\Larachain\Contracts\EmbeddingInterface;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;

class GeminiEmbedding extends BaseEmbedding implements EmbeddingInterface
{
    protected $client;

    public function __construct(array $config)
    {
        parent::__construct($config);
        $this->client = new Client([
            'base_uri' => 'https://generativelanguage.googleapis.com/v1beta/',
            'headers' => [
                'Content-Type' => 'application/json',
            ],
        ]);
    }

    /**
     * Generate embeddings for the given text
     */
    public function embed(string $text): array
    {
        $url = "models/{$this->config['model']}:embedContent";
        $query = [
            'key' => $this->config['api_key'],
        ];

        $body = [
            'content' => [
                'parts' => [
                    ['text' => $text]
                ]
            ]
        ];

        try {
            $response = $this->client->post($url, [
                'query' => $query,
                'json' => $body,
            ]);

            $responseData = json_decode($response->getBody(), true);

            // Extract embeddings from the response
            if (isset($responseData['embedding']['values'])) {
                return $responseData['embedding']['values'];
            }

            throw new \Exception("Invalid response format from Gemini Embedding API.");
        } catch (RequestException $e) {
            throw new \Exception("Gemini Embedding API request failed: " . $e->getMessage());
        }
    }
}
