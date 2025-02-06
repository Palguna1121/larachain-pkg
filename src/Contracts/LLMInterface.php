<?php

namespace Palgu\Larachain\Contracts;

interface LLMInterface
{
    /**
     * Generate a summary from a given text
     */
    public function summarize(string $text, array $options = []): string;

    /**
     * Extract key points from a given text
     */
    public function extractKeyPoints(string $text, array $options = []): array;

    /**
     * Answer a question based on the given context
     */
    public function answerFromContext(string $question, string $context, array $options = []): string;

    /**
     * Get the current model being used
     */
    public function getModel(): string;

    /**
     * Set a different model
     */
    public function setModel(string $model): self;
}
