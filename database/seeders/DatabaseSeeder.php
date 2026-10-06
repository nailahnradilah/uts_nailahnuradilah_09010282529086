<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Category;
use App\Models\Book;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => 'Admin Perpustakaan',
            'email' => 'admin@booklib.test',
            'password' => Hash::make('password'),
        ]);

        $teknologi = Category::create([
            'name' => 'Teknologi',
            'description' => 'Buku mengenai teknologi dan komputer.',
        ]);

        $pendidikan = Category::create([
            'name' => 'Pendidikan',
            'description' => 'Buku mengenai pendidikan dan pembelajaran.',
        ]);

        $novel = Category::create([
            'name' => 'Novel',
            'description' => 'Kumpulan buku novel dan fiksi.',
        ]);

        Book::create([
            'category_id' => $teknologi->id,
            'title' => 'Pemrograman Laravel',
            'author' => 'Taylor Otwell',
            'publisher' => 'Tech Press',
            'year' => 2025,
            'stock' => 8,
        ]);

        Book::create([
            'category_id' => $teknologi->id,
            'title' => 'Dasar-Dasar Web Development',
            'author' => 'Andi Setiawan',
            'publisher' => 'Informatika',
            'year' => 2024,
            'stock' => 10,
        ]);

        Book::create([
            'category_id' => $pendidikan->id,
            'title' => 'Metode Pembelajaran Modern',
            'author' => 'Siti Rahma',
            'publisher' => 'Edu Media',
            'year' => 2023,
            'stock' => 6,
        ]);

        Book::create([
            'category_id' => $pendidikan->id,
            'title' => 'Pengantar Ilmu Komputer',
            'author' => 'Budi Santoso',
            'publisher' => 'Gramedia',
            'year' => 2022,
            'stock' => 7,
        ]);

        Book::create([
            'category_id' => $novel->id,
            'title' => 'Senja di Perpustakaan',
            'author' => 'Nadia Putri',
            'publisher' => 'Literasi Nusantara',
            'year' => 2025,
            'stock' => 5,
        ]);
    }
}