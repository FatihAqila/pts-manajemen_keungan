<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('transaksis', function (Blueprint $table) {
            $table->id();
            $table->string('jenis'); // 'pemasukan' atau 'pengeluaran'
            $table->string('kategori');
            $table->string('deskripsi')->nullable();
            $table->decimal('jumlah', 10, 2);
            $table->date('tanggal');
            $table->timestamps();
        });
    }
};
