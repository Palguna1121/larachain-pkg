<?php

namespace Palgu\Larachain\Tests\Unit;

use Palgu\Larachain\Tests\TestCase;
use Palgu\Larachain\Embeddings\GeminiEmbedding;
use Palgu\Larachain\Embeddings\OllamaEmbedding;
use Exception;

class EmbeddingTest extends TestCase
{
    protected $geminiEmbedding;
    protected $ollamaEmbedding;

    protected function setUp(): void
    {
        parent::setUp();

        // Setup Gemini Embedding
        $this->geminiEmbedding = new GeminiEmbedding([
            'api_key' => defined('LARAVEL_START') ? env('GEMINI_API_KEY') : GEMINI_API_KEY,
            'model' => GEMINI_EMBEDDING_MODEL,
        ]);

        // Setup Ollama Embedding
        $this->ollamaEmbedding = new OllamaEmbedding([
            'base_url' => OLLAMA_BASE_URL,
            'model' => OLLAMA_EMBEDDING_MODEL,
        ]);
    }

    /**
     * Test Gemini Embedding
     */
    public function testGeminiEmbedding(): void
    {
        $text = "This is a test text for embedding.";
        $embedding = $this->geminiEmbedding->embed($text);

        $this->assertIsArray($embedding);
        $this->assertNotEmpty($embedding);
    }

    /**
     * Test Ollama Embedding
     */
    public function testOllamaEmbedding(): void
    {
        $text = "This is a test text for embedding.";
        $embedding = $this->ollamaEmbedding->embed($text);

        $this->assertIsArray($embedding);
        $this->assertNotEmpty($embedding);
    }

    /**
     * Test error handling for invalid API key (Gemini)
     */
    public function testGeminiEmbeddingInvalidApiKey(): void
    {
        $this->expectException(Exception::class);
        $this->expectExceptionMessageMatches('/Gemini Embedding API request failed/');

        $invalidGeminiEmbedding = new GeminiEmbedding([
            'api_key' => 'invalid-api-key',
            'model' => GEMINI_EMBEDDING_MODEL,
        ]);
        $invalidGeminiEmbedding->embed("This should fail.");
    }

    /**
     * Test error handling for invalid model (Ollama)
     */
    public function testOllamaEmbeddingInvalidModel(): void
    {
        $this->expectException(Exception::class);
        $this->expectExceptionMessageMatches('/Ollama Embedding API request failed/');

        $invalidOllamaEmbedding = new OllamaEmbedding([
            'base_url' => OLLAMA_BASE_URL,
            'model' => 'invalid-model',
        ]);
        $invalidOllamaEmbedding->embed("This should fail.");
    }
}
