<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class MasterSeeder extends Seeder
{
    public function run(): void
    {
        // Seeder untuk tabel 'admin'
        for ($i = 1; $i <= 10; $i++) {
            DB::table('admin')->insert([
                'namaadmin' => 'Admin ' . $i,
                'username' => 'admin' . $i,
                'password' => Hash::make('password'),
                'status' => 'setujui',
                'role' => 'admin',
                'foto' => null,
                'setujui' => now(),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        // Seeder untuk tabel 'jabatan'
        for ($i = 1; $i <= 10; $i++) {
            DB::table('jabatan')->insert([
                'namajabatan' => 'Jabatan ' . $i,
                'gajijabatan' => rand(3000000, 10000000),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        // Seeder untuk tabel 'pegawai'
        for ($i = 1; $i <= 10; $i++) {
            DB::table('pegawai')->insert([
                'namapegawai' => 'Pegawai ' . $i,
                'jabatan' => rand(1, 10),
                'pangkat' => 'Pangkat ' . chr(64 + $i),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        // Seeder untuk tabel 'penggajian'
        for ($i = 1; $i <= 10; $i++) {
            DB::table('penggajian')->insert([
                'idpegawai' => rand(1, 10),
                'idadmin' => rand(1, 10),
                'idjabatan' => rand(1, 10),
                'pangkat' => 'Pangkat ' . chr(64 + $i),
                'total' => rand(5000000, 15000000),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
