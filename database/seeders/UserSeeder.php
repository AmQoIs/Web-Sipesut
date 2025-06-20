<?php

namespace Database\Seeders;

use App\Constants\Roles;
use Illuminate\Database\Seeder;
use App\Models\User;

// use Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::updateOrCreate(['id' => 1], [
            'id' => 1,
            'nama' => 'Admin Test',
            'email' => 'admin@example.com',
            'is_deleted' => false,
            'password' => password_hash('12345678', PASSWORD_DEFAULT),
            'pangkat_kerja' => 'Sekretaris',
            'role' => Roles::ADMIN
        ]);

        User::updateOrCreate(['id' => 2], [
            'id' => 2,
            'nama' => 'Anggota Test',
            'email' => 'anggota@example.com',
            'password' => password_hash('12345678', PASSWORD_DEFAULT),
            'role' => Roles::ANGGOTA,
            'pangkat_kerja' => 'Sertu II',
            'is_deleted' => false,
        ]);

        User::updateOrCreate(['id' => 3], [
            'id' => 3,
            'nama' => 'Admin Mutlak',
            'email' => 'admin-mutlak@example.com',
            'is_deleted' => false,
            'password' => password_hash('12345678', PASSWORD_DEFAULT),
            'pangkat_kerja' => 'Admin Mutlak',
            'role' => Roles::ADMIN_MUTLAK
        ]);
    }
}
