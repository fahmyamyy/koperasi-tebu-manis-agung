<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $admin = [
            'id' => Str::uuid(),
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'password' => '$2y$10$s3XtgG4VWEJpWRQvyEEXUul8XQ5bIPIioXqNIj1qCJF13UBmQeT4C',
            'role' => 'ADMIN',
            'nik' => 'ADMIN',
            'tanggal_lahir' => '2024-06-26',
            'tempat_lahir' => 'ADMIN',
            'umur' => 1,
            'agama' => 'Lainnya',
            'no_telp' => 0123,
            'luas_lahan' => 0123,
            'limit' => 123,
            'created_at' => Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon::now()->toDateTimeString()
        ];
        DB::table('users')->insert($admin);
    }
}
