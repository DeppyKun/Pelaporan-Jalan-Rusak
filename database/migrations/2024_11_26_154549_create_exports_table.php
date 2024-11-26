<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('exports', function (Blueprint $table) {
            $table->id(); // ID utama
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // User yang melakukan ekspor
            $table->string('exporter'); // Nama exporter
            $table->unsignedInteger('total_rows'); // Jumlah baris yang diekspor
            $table->string('file_disk'); // Disk tempat file disimpan
            $table->string('file_name')->nullable(); // Nama file ekspor
            $table->timestamps(); // created_at dan updated_at
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('exports');
    }
};
