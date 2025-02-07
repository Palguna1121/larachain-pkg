# Larachain

Larachain adalah package Laravel yang dirancang untuk mempermudah integrasi Kecerdasan Buatan (AI), Basis Data Vektor, dan Pemrosesan Bahasa Alami (NLP) ke dalam aplikasi Laravel.

## 🚀 Ringkasan

Larachain berperan sebagai jembatan antara Laravel dan teknologi AI modern, menyediakan alur kerja yang fleksibel dan modular untuk membangun aplikasi berbasis AI seperti chatbot, sistem rekomendasi, dan platform pencarian semantik.

### Teknologi yang Didukung

- Model Bahasa Besar (LLM): Ollama, OpenAI, Hugging Face
- Basis Data Vektor: Qdrant, Pgvector
- Sistem Memori
- Sistem Rantai (Chain)
- Sistem Agen

## ✨ Fitur Utama

- **Integrasi LLM**: Koneksi mulus dengan model bahasa besar
- **Integrasi Penyimpanan Vektor**: Penyimpanan dan pengambilan data berbasis embedding
- **Manajemen Memori**: Pelacakan konteks dan percakapan
- **Sistem Rantai**: Pipeline proses AI berurutan
- **Sistem Agen**: Manajemen interaksi pintar antara pengguna dan AI
- **Sistem Callback**: Penanganan event dan pemrosesan lanjutan

## 🔧 Instalasi

Instal Larachain melalui Composer:

```bash
composer require [nama-vendor-anda]/larachain
```

## 💡 Contoh Penggunaan

### 1. Chatbot Layanan Pelanggan

```php
use Larachain\Chatbot\ConversationChain;
use Larachain\VectorStore\QdrantVectorStore;
use Larachain\Agent\OllamaAgent;

$vectorStore = new QdrantVectorStore();
$agent = new OllamaAgent();
$conversationChain = new ConversationChain($vectorStore, $agent);

$response = $conversationChain->handleUserQuery('Bantu saya menemukan produk');
```

### 2. Pencarian Dokumen Semantik

```php
use Larachain\Embedding\OllamaEmbedding;
use Larachain\VectorStore\QdrantVectorStore;
use Larachain\Chain\RetrievalChain;

$embedding = new OllamaEmbedding();
$vectorStore = new QdrantVectorStore();
$retrievalChain = new RetrievalChain($embedding, $vectorStore);

$dokumenRelevans = $retrievalChain->search('Praktik terbaik pengembangan perangkat lunak');
```

### 3. Sistem Rekomendasi Produk

```php
use Larachain\Memory\VectorStoreMemory;
use Larachain\Chain\RetrievalChain;

$ingatanPreferensiPengguna = new VectorStoreMemory();
$rantaiRekomendasi = new RetrievalChain($ingatanPreferensiPengguna);

$produkDirekomendasikan = $rantaiRekomendasi->getRecommendations($idPengguna);
```

## 🌟 Keunggulan Utama

- **Desain Modular**: Mudah mengkustomisasi dan mengganti komponen
- **Native Laravel**: Integrasi dengan proyek Laravel yang sudah ada
- **Skalabel**: Mendukung aplikasi dengan berbagai ukuran
- **Dokumentasi Komprehensif**: Panduan dan contoh penggunaan yang jelas

## 📦 Integrasi yang Didukung

### Model Bahasa Besar
- Ollama
- OpenAI
- Hugging Face

### Basis Data Vektor
- Qdrant
- Pgvector

## 🛠 Konfigurasi

Publikasikan file konfigurasi:

```bash
php artisan larachain:install
```

Konfigurasikan kredensial di file `.env`:

```env
LARACHAIN_LLM_PROVIDER=ollama
LARACHAIN_VECTOR_DB=qdrant
```

<!--
## 📚 Dokumentasi

Untuk dokumentasi lengkap, silakan kunjungi [tautan-dokumentasi].

## 🤝 Kontribusi

Kontribusi sangat kami sambut! Silakan lihat [CONTRIBUTING.md](CONTRIBUTING.md) untuk detail.

## 📄 Lisensi

Proyek ini dilisensikan di bawah Lisensi MIT - lihat file [LICENSE.md](LICENSE.md) untuk detail.
 --->

## 🚧 Roadmap

- [ ] Tambahkan dukungan untuk lebih banyak model AI
- [ ] Perluas integrasi basis data vektor
- [ ] Tingkatkan sistem manajemen memori
- [ ] Buat interaksi agen yang lebih canggih

<!--
## 📞 Dukungan

Jika Anda mengalami masalah atau memiliki pertanyaan, silakan buka issue di GitHub.
 --->

## Berkontribusi

Terima kasih telah mempertimbangkan untuk berkontribusi pada framework Laravel! Panduan kontribusi dapat ditemukan di [dokumentasi Laravel](https://laravel.com/docs/contributions).

## Kode Etik

Untuk memastikan bahwa komunitas Laravel terbuka untuk semua, harap tinjau dan patuhi [Kode Etik](https://laravel.com/docs/contributions#code-of-conduct).

## Kerentanan Keamanan

Jika Anda menemukan kerentanan keamanan dalam Laravel, silakan kirim email ke Taylor Otwell melalui [taylor@laravel.com](mailto:taylor@laravel.com). Semua kerentanan keamanan akan segera ditangani.

## Lisensi

Framework Laravel adalah perangkat lunak sumber terbuka yang dilisensikan di bawah [lisensi MIT](https://opensource.org/licenses/MIT).

---

Dibuat dengan ❤️ oleh Palguna1121 ~
