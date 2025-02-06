<?php

namespace Palgu\Larachain\Config;

class LLMConfig
{
    protected $config;

    public function __construct(array $config = [])
    {
        $this->config = array_merge([
            'api_key' => '', // Default API key
            'model' => 'gemini-2.0-flash-thinking-exp', // Default model
            'temperature' => 0.7, // Default temperature
            'topP' => 0.9, // Default topP
            'topK' => 40, // Default topK
            'maxOutputTokens' => 8192, // Default max output tokens
        ], $config);
    }

    /**
     * Get the API key
     */
    public function getApiKey(): string
    {
        return $this->config['api_key'];
    }

    /**
     * Get the model name
     */
    public function getModel(): string
    {
        return $this->config['model'];
    }

    /**
     * Set the model name
     */
    public function setModel(string $model): void
    {
        $this->config['model'] = $model;
    }

    /**
     * Get the temperature setting
     */
    public function getTemperature(): float
    {
        return $this->config['temperature'];
    }

    /**
     * Get the topP setting
     */
    public function getTopP(): float
    {
        return $this->config['topP'];
    }

    /**
     * Get the topK setting
     */
    public function getTopK(): int
    {
        return $this->config['topK'];
    }

    /**
     * Get the max output tokens setting
     */
    public function getMaxOutputTokens(): int
    {
        return $this->config['maxOutputTokens'];
    }

    /**
     * Get the entire configuration as an array
     */
    public function toArray(): array
    {
        return $this->config;
    }
}
