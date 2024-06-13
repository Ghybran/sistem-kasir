<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{

    protected $table = "order";

    protected $guarded = [];

    public function getMenuAttribute($value)
    {
        if (is_string($value)) {//jika data yang diambil berupa string json maka
            return json_decode($value, true);//akan di mendecode json menjadi array asosiatif untuk ditampilkan kembali
        }                                    //jika bukan string json maka kembalikan data asli

        return $value;
    }
    // Fungsi getMenuAttribute yang Anda lihat adalah contoh dari accessor dalam model
    //  Eloquent Laravel. Accessor memungkinkan Anda untuk memanipulasi nilai kolom ketika
    //  Anda mengaksesnya sebagai properti dari model. Dalam hal ini, accessor getMenuAttribute
    //  mengambil nilai dari kolom menu dan memeriksa apakah nilainya adalah string JSON. Jika iya,
    //  accessor akan mendecode JSON tersebut menjadi array asosiatif sebelum mengembalikannya.
    //  Jika bukan, accessor akan mengembalikan nilai aslinya.

    // Mari kita jelaskan bagian-bagian dari fungsi tersebut:

// getMenuAttribute($value): Ini adalah metode accessor.
// Nama metode harus dimulai dengan get, diikuti oleh nama kolom yang ingin diakses
// (dalam hal ini, Menu). Suffix Attribute adalah konvensi untuk menunjukkan bahwa ini adalah accessor.

// Log::info('Decoding menu: ' . $value);: Ini adalah baris yang menulis pesan log ke file log Laravel.
// Pesan ini membantu Anda dalam proses debugging. Ini akan menampilkan nilai menu yang sedang diproses dalam log.

// if (is_string($value)) { ... }: Ini adalah pengecekan apakah nilai yang diterima adalah string.
// Karena dalam model, kolom dalam database biasanya disimpan sebagai string, meskipun berisi data JSON,
// kita perlu memeriksa tipe data sebelum mendecode JSON.

// return json_decode($value, true);: Jika nilai kolom menu adalah string JSON,
// fungsi json_decode digunakan untuk mendecode JSON tersebut menjadi array asosiatif.
// Parameter kedua true menunjukkan bahwa kita ingin hasilnya sebagai array asosiatif.

// return $value;: Jika nilai kolom menu bukan string JSON, accessor akan mengembalikan nilai aslinya tanpa perubahan.

// Dengan menggunakan accessor seperti ini, Anda bisa memanipulasi nilai yang Anda terima dari basis data sebelum nilai tersebut diberikan kepada pengguna. Hal ini berguna misalnya ketika Anda ingin memformat data tertentu, menghitung nilai turunan, atau dalam kasus Anda, mengonversi data JSON menjadi array untuk keperluan tampilan.
}
