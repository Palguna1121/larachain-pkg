<?php

namespace Palgu\Larachain\LLM;

use Palgu\Larachain\Contracts\LLMInterface;
use Palgu\Larachain\Config\LLMConfig;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;

class Gemini implements LLMInterface
{
    protected $config;
    protected $client;

    public function __construct(LLMConfig $config)
    {
        $this->config = $config;
        $this->client = new Client([
            'base_uri' => 'https://generativelanguage.googleapis.com/v1beta/', // Base URI untuk API Gemini
            'headers' => [
                'Content-Type' => 'application/json',
            ],
        ]);
    }

    /**
     * Generate a summary from a given text
     */
    public function summarize(string $text, array $options = []): string
    {
        $prompt = "Summarize the following text in a concise manner:\n\n$text";
        return $this->makeRequest($prompt, $options);
    }

    /**
     * Extract key points from a given text
     */
    public function extractKeyPoints(string $text, array $options = []): array
    {
        $prompt = "Extract the key points from the following text:\n\n$text";
        $response = $this->makeRequest($prompt, $options);

        // Split the response into an array of key points
        return explode("\n", $response);
    }

    /**
     * Answer a question based on the given context
     */
    public function answerFromContext(string $question, string $context, array $options = []): string
    {
        $prompt = "Answer the following question based on the provided context:\n\nQuestion: $question\n\nContext: $context";
        return $this->makeRequest($prompt, $options);
    }

    /**
     * Make a request to the Gemini API
     */
    protected function makeRequest(string $prompt, array $options = []): string
    {
        $url = "models/{$this->config->getModel()}:generateContent"; // Path untuk generateContent
        $query = [
            'key' => $this->config->getApiKey(), // API key sebagai query parameter
        ];

        $body = [
            'contents' => [
                [
                    'role' => 'user',
                    'parts' => [
                        ['text' => $prompt]
                    ]
                ]
            ],
            'generationConfig' => [
                'temperature' => $options['temperature'] ?? $this->config->getTemperature(),
                'topP' => $options['topP'] ?? $this->config->getTopP(),
                'topK' => $options['topK'] ?? $this->config->getTopK(),
                'maxOutputTokens' => $options['maxOutputTokens'] ?? $this->config->getMaxOutputTokens(),
            ]
        ];

        try {
            $response = $this->client->post($url, [
                'query' => $query, // Query parameters (API key)
                'json' => $body,   // Request body
            ]);

            $responseData = json_decode($response->getBody(), true);

            // Extract the generated text from the response
            if (isset($responseData['candidates'][0]['content']['parts'][0]['text'])) {
                return $responseData['candidates'][0]['content']['parts'][0]['text'];
            }

            throw new \Exception("Invalid response format from Gemini API.");
        } catch (RequestException $e) {
            throw new \Exception("Gemini API request failed: " . $e->getMessage());
        }
    }

    /**
     * Get the current model being used
     */
    public function getModel(): string
    {
        return $this->config->getModel();
    }

    /**
     * Set a different model
     */
    public function setModel(string $model): self
    {
        $this->config->setModel($model);
        return $this;
    }
}
