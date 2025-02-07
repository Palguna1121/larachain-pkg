<?php

namespace Palgu\Larachain\Tests;

use PHPUnit\Framework\TestCase as BaseTestCase;
use Palgu\Larachain\LLM\Gemini;
use Palgu\Larachain\Config\LLMConfig;

if (!defined('LARAVEL_START')) {
    require_once __DIR__ . '/../config/config.php';
}

class TestCase extends BaseTestCase
{
    protected function createGeminiClient(): Gemini
    {
        $apiKey = defined('LARAVEL_START') ? env('GEMINI_API_KEY') : GEMINI_API_KEY;
        $config = new LLMConfig([
            'api_key' => $apiKey,
            'model' => 'gemini-2.0-flash-thinking-exp',
        ]);

        return new Gemini($config);
    }
}
