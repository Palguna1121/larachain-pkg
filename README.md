# Larachain

Larachain adalah sebuah package PHP yang dirancang untuk memudahkan integrasi Large Language Models (LLM) seperti Gemini dan Ollama dalam pengembangan aplikasi web. Package ini menyediakan berbagai fitur seperti summarization, knowledge extraction, dan embedding yang dapat digunakan baik di dalam maupun di luar framework Laravel.

## Fitur Utama

- **Summarization**: Meringkas teks panjang menjadi poin-poin penting.
- **Knowledge Extraction**: Mengekstrak informasi spesifik dari dokumen.
- **Embedding**: Menghasilkan representasi numerik dari teks untuk berbagai tugas seperti pencarian semantik dan klasifikasi teks.
- **Multi-Provider Support**: Mendukung berbagai provider LLM seperti Gemini dan Ollama.
- **Fleksibel**: Dapat digunakan di dalam atau di luar framework Laravel.

## Instalasi

Anda dapat menginstall package ini melalui Composer:

```bash
composer require palgu/larachain
```

## Konfigurasi

### Konfigurasi Standalone (Non-Laravel)

Buat file config.php di root folder project Anda dengan konfigurasi berikut:

```php
<?php

const LARACHAIN_LLM_PROVIDER = 'gemini'; // 'gemini' atau 'ollama'
const GEMINI_API_KEY = 'your_gemini_api_key';
const GEMINI_MODEL = 'gemini-2.0-flash-thinking-exp'; //sesuaikan dengan model Gemini
const GEMINI_TEMPERATURE = 0.7;
const GEMINI_TOP_P = 0.9;
const GEMINI_TOP_K = 40;
const GEMINI_MAX_OUTPUT_TOKENS = 8192;

const OLLAMA_BASE_URL = 'http://localhost:11434';
const OLLAMA_MODEL = 'gemma2:2b'; //sesuaikan dengan model Ollama anda

const LARACHAIN_EMBEDDING_PROVIDER = 'gemini'; // 'gemini' atau 'ollama'
const GEMINI_EMBEDDING_MODEL = 'text-embedding-004'; //sesuaikan dengan model Gemini embedding
const LARACHAIN_EMBEDDING_DIMENSION = 768;
```

### Konfigurasi Laravel

Jika Anda menggunakan Laravel, Anda dapat mempublish file konfigurasi dengan menjalankan perintah berikut:

```bash
php artisan vendor:publish --provider="Palgu\Larachain\LarachainServiceProvider"
```

Kemudian, atur konfigurasi di file .env:

```env
LARACHAIN_LLM_PROVIDER=gemini
GEMINI_API_KEY=your_gemini_api_key
GEMINI_MODEL=gemini-2.0-flash-thinking-exp
GEMINI_TEMPERATURE=0.7
GEMINI_TOP_P=0.9
GEMINI_TOP_K=40
GEMINI_MAX_OUTPUT_TOKENS=8192

OLLAMA_BASE_URL=http://localhost:11434
OLLAMA_MODEL=gemma2:2b

LARACHAIN_EMBEDDING_PROVIDER=gemini
GEMINI_EMBEDDING_MODEL=text-embedding-004
LARACHAIN_EMBEDDING_DIMENSION=768
```

## Penggunaan

### Summarization

```php
use Palgu\Larachain\LLM\Gemini;
use Palgu\Larachain\Config\LLMConfig;

$config = new LLMConfig([
    'api_key' => GEMINI_API_KEY,
    'model' => GEMINI_MODEL,
]);

$gemini = new Gemini($config);
$summary = $gemini->summarize("Teks panjang yang ingin diringkas.");
echo $summary;
```

### Knowledge Extraction

```php
$keyPoints = $gemini->extractKeyPoints("Teks panjang yang ingin diekstrak poin-poin pentingnya.");
print_r($keyPoints);
```

### Embedding

```php
use Palgu\Larachain\Embeddings\GeminiEmbedding;

$geminiEmbedding = new GeminiEmbedding([
    'api_key' => GEMINI_API_KEY,
    'model' => GEMINI_EMBEDDING_MODEL,
]);

$embedding = $geminiEmbedding->embed("Teks yang ingin diembed.");
print_r($embedding);
```

### Answer From Context

```php
$context = "Large Language Models (LLMs) adalah sistem AI canggih yang dirancang untuk memahami dan menghasilkan teks seperti manusia.";
$question = "Apa itu LLM?";
$answer = $gemini->answerFromContext($question, $context);
echo $answer;
```

### Testing

Package ini dilengkapi dengan unit test untuk memastikan fungsionalitasnya berjalan dengan baik. Anda dapat menjalankan test dengan perintah berikut:

```bash
./vendor/bin/phpunit tests/Unit/LLMTest.php
./vendor/bin/phpunit tests/Unit/EmbeddingTest.php
```

## Kontribusi

Jika Anda ingin berkontribusi pada pengembangan package ini, silakan buka issue atau pull request di repository GitHub.

## Lisensi

Package ini dilisensikan di bawah MIT License.

---

Dibuat dengan ❤️ oleh Palguna1121 ~
