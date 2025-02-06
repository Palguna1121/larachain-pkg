<?php

namespace Palgu\Larachain\Tests\Unit;

use Palgu\Larachain\Tests\TestCase;
use Palgu\Larachain\LLM\Gemini;
use Palgu\Larachain\Config\LLMConfig;
use Exception;

class LLMTest extends TestCase
{
    protected $gemini;

    protected function setUp(): void
    {
        parent::setUp();
        $this->gemini = $this->createGeminiClient();
    }

    /**
     * Test summarization functionality
     */
    public function testSummarize(): void
    {
        $text = "Large Language Models (LLMs) are advanced AI systems designed to understand and generate human-like text. They are used in various applications such as chatbots, content generation, and language translation.";
        $summary = $this->gemini->summarize($text);

        $this->assertIsString($summary);
        $this->assertNotEmpty($summary);
        $this->assertLessThan(strlen($text), strlen($summary)); // Ringkasan harus lebih pendek dari teks asli
    }

    /**
     * Test key points extraction functionality
     */
    public function testExtractKeyPoints(): void
    {
        $text = "Large Language Models (LLMs) are advanced AI systems designed to understand and generate human-like text. They are used in various applications such as chatbots, content generation, and language translation.";
        $keyPoints = $this->gemini->extractKeyPoints($text);

        $this->assertIsArray($keyPoints);
        $this->assertNotEmpty($keyPoints);
        $this->assertGreaterThanOrEqual(1, count($keyPoints)); // Minimal ada 1 key point
    }

    /**
     * Test answering questions based on context
     */
    public function testAnswerFromContext(): void
    {
        $context = "Large Language Models (LLMs) are advanced AI systems designed to understand and generate human-like text. They are used in various applications such as chatbots, content generation, and language translation.";
        $question = "What are LLMs used for?";
        $answer = $this->gemini->answerFromContext($question, $context);

        $this->assertIsString($answer);
        $this->assertNotEmpty($answer);
        $this->assertStringContainsStringIgnoringCase('chatbots', $answer); // Jawaban harus mengandung kata "chatbots"
    }

    /**
     * Test error handling for invalid API key
     */
    public function testInvalidApiKey(): void
    {
        $this->expectException(Exception::class);
        $this->expectExceptionMessageMatches('/Gemini API request failed/');

        $invalidConfig = new LLMConfig(['api_key' => 'invalid-api-key']);
        $invalidGemini = new Gemini($invalidConfig);
        $invalidGemini->summarize("This should fail.");
    }
}
