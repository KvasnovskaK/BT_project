<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class NotesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('notes')->insert([
            ['user_id' => 1, 'title' => 'Laravel Seeder', 'body' => 'Ako vytvoriť seeder v Laraveli?', 'created_at' => now(), 'updated_at' => now()],
            ['user_id' => 2, 'title' => 'Shopping List', 'body' => 'Mlieko, chlieb, vajcia', 'created_at' => now(), 'updated_at' => now()],
            ['user_id' => 3, 'title' => 'Project Idea', 'body' => 'Nápad na nový startup...', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
