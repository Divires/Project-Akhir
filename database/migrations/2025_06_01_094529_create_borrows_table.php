<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('borrow', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('student_id'); // relasi ke tabel students (berisi NIS juga)
            $table->unsignedBigInteger('book_id');    // relasi ke tabel books
            $table->date('borrow_date');              // tanggal pinjam
            $table->date('return_date')->nullable();  // tanggal kembali
            $table->enum('status', ['Dipinjam', 'Dikembalikan'])->default('Dipinjam');
            $table->timestamps();

            // Foreign Key
            $table->foreign('student_id')->references('id')->on('student')->onDelete('cascade');
            $table->foreign('book_id')->references('id')->on('books')->onDelete('cascade');        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('borrow');
    }
};
