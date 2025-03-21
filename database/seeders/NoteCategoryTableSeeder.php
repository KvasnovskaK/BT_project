<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class NoteCategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('note_category')->insert([
            ['note_id' => 1,
            'category_id' => 1        
            ],
            ['note_id' => 2,
            'category_id' => 3       
            ],
            ['note_id' => 3,
            'category_id' => 4        
            ],
           
        ]);
    }
}
