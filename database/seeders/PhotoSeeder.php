<?php

namespace Database\Seeders;

use App\Models\Gallery;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class PhotoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 40; $i > 0; $i--) {
            DB::table('photos')->insert([
                'url' => fake()->imageUrl(),
                'gallery_id' => Gallery::where('id', $i)->first()->id,
            ]);
        }
    }
}
