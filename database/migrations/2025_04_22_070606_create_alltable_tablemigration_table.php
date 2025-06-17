<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        // Tabel Admins
        Schema::create('admin', function (Blueprint $table) {
            $table->id();
            $table->string('namaadmin');
            $table->string('username')->unique();
            $table->string('password');
            $table->enum('status', ['pending', 'setujui', 'tolak'])->default('pending');
            $table->enum('role', ['admin', 'petugas'])->default('petugas');
            $table->string('foto')->nullable();
            $table->timestamp('setujui')->nullable();
            $table->timestamps();
        });

        // Tabel Jabatans
        Schema::create('jabatan', function (Blueprint $table) {
            $table->id();
            $table->string('namajabatan');
            $table->decimal('gajijabatan', 15, 2);
            $table->timestamps();
        });

        // Tabel Pegawais
        Schema::create('pegawai', function (Blueprint $table) {
            $table->id();
            $table->string('namapegawai');
            $table->foreignId('jabatan')->constrained('jabatan')->onDelete('cascade');
            $table->string('pangkat');
            $table->timestamps();
        });

        // Tabel Penggajians
        Schema::create('penggajian', function (Blueprint $table) {
            $table->id();
            $table->foreignId('idpegawai')->constrained('pegawai')->onDelete('cascade');
            $table->foreignId('idadmin')->constrained('admin')->onDelete('cascade');
            $table->foreignId('idjabatan')->constrained('jabatan')->onDelete('cascade');
            $table->string('pangkat');
            $table->decimal('total', 15, 2);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('penggajian');
        Schema::dropIfExists('pegawai');
        Schema::dropIfExists('jabatan');
        Schema::dropIfExists('admin');
    }
};
