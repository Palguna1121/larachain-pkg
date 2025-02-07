<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Default LLM Provider
    |--------------------------------------------------------------------------
    |
    | Here you may specify which of the LLM providers below you wish to use as
    | your default provider for all LLM work.
    |
    */
    'default' => $_ENV['LARACHAIN_LLM_PROVIDER'] ?? 'gemini',

    /*
    |--------------------------------------------------------------------------
    | LLM Providers Configuration
    |--------------------------------------------------------------------------
    |
    | Here you may configure all the LLM providers that will be used by your
    | application.
    |
    */
    'providers' => [
        'gemini' => [
            'api_key' => $_ENV['GEMINI_API_KEY'] ?? '', // API key for Gemini
            'model' => $_ENV['GEMINI_MODEL'] ?? 'gemini-2.0-flash-thinking-exp', // Default model
            'temperature' => $_ENV['GEMINI_TEMPERATURE'] ?? 0.7, // Default temperature
            'topP' => $_ENV['GEMINI_TOP_P'] ?? 0.9, // Default topP
            'topK' => $_ENV['GEMINI_TOP_K'] ?? 40, // Default topK
            'maxOutputTokens' => $_ENV['GEMINI_MAX_OUTPUT_TOKENS'] ?? 8192, // Default max output tokens
        ],

        'ollama' => [
            'base_url' => $_ENV['OLLAMA_BASE_URL'] ?? 'http://localhost:11434', // Base URL for Ollama
            'model' => $_ENV['OLLAMA_MODEL'] ?? 'gemma2:2b', // Default model for Ollama
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Embedding Configuration
    |--------------------------------------------------------------------------
    |
    | Configure the default embedding provider and its settings.
    |
    */
    'embedding' => [
        'default' => $_ENV['LARACHAIN_EMBEDDING_PROVIDER'] ?? 'gemini', // Default embedding provider
        'dimension' => $_ENV['LARACHAIN_EMBEDDING_DIMENSION'] ?? 768, // Default embedding dimension
    ],
];
