<?php

namespace Palgu\Larachain\Contracts;

interface EmbeddingInterface
{
    /**
     * Generate embeddings for the given text
     */
    public function embed(string $text): array;

    /**
     * Generate embeddings for multiple texts
     */
    public function embedBatch(array $texts): array;
}
