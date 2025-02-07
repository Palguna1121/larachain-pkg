<?php

namespace Palgu\Larachain\Embeddings;

use Palgu\Larachain\Contracts\EmbeddingInterface;

abstract class BaseEmbedding implements EmbeddingInterface
{
    protected $config;

    public function __construct(array $config)
    {
        $this->config = $config;
    }

    /**
     * Generate embeddings for multiple texts
     */
    public function embedBatch(array $texts): array
    {
        $embeddings = [];
        foreach ($texts as $text) {
            $embeddings[] = $this->embed($text);
        }
        return $embeddings;
    }
}
