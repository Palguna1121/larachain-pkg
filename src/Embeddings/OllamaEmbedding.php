<?php

namespace Palgu\Larachain\Embeddings;

use Palgu\Larachain\Contracts\EmbeddingInterface;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;

class OllamaEmbedding extends BaseEmbedding implements EmbeddingInterface
{
    protected $client;

    public function __construct(array $config)
    {
        parent::__construct($config);
        $this->client = new Client([
            'base_uri' => $this->config['base_url'],
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
        $url = "api/embeddings";
        $body = [
            'model' => $this->config['model'],
            'prompt' => $text,
        ];
        // var_dump($body);

        try {
            $response = $this->client->post($url, [
                'json' => $body,
            ]);

            $responseData = json_decode($response->getBody(), true);

            // Extract embeddings from the response
            if (isset($responseData['embedding'])) {
                return $responseData['embedding'];
            }

            throw new \Exception("Invalid response format from Ollama Embedding API.");
        } catch (RequestException $e) {
            throw new \Exception("Ollama Embedding API request failed: " . $e->getMessage());
        }
    }
}
