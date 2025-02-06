<?php

namespace Palgu\Larachain\Tests;

use PHPUnit\Framework\TestCase as BaseTestCase;
use Palgu\Larachain\LLM\Gemini;
use Palgu\Larachain\Config\LLMConfig;

class TestCase extends BaseTestCase
{
    protected function createGeminiClient(): Gemini
    {
        $config = new LLMConfig([
            'api_key' => getenv('GEMINI_API_KEY'), // Ambil API key dari environment variable
            'model' => 'gemini-2.0-flash-thinking-exp',
        ]);

        return new Gemini($config);
    }
}
