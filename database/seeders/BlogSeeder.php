<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class BlogSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create();

        $categories = ['general', 'entertainment', 'health', 'science', 'sports', 'technology'];

        for ($i = 1; $i <= 100; $i++) {
            // Simulasi nama file seperti hasil upload
            $timestamp = time() + $i; // biar unik tiap iterasi
            $extension = $faker->randomElement(['jpg', 'jpeg', 'png', 'webp']);
            $imageName = $timestamp . '.' . $extension;

            // (Opsional) Jika kamu mau benar-benar punya file dummy-nya di /public/images/
            // kamu bisa tambahkan baris ini:
            // copy(public_path('default.jpg'), public_path('images/' . $imageName));

            DB::table('blogs')->insert([
                'user_id' => $faker->numberBetween(1, 5), // pastikan ada user_id 1–5
                'image' => 'images/' . $imageName, // sesuai path penyimpanan kamu
                'title' => $faker->sentence(6, true),
                'category' => $faker->randomElement($categories),
                'description' => $faker->paragraph(10, true),
                'tanggal' => $faker->date('Y-m-d'),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
