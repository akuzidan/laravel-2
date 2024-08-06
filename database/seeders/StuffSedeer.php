<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\Stuff;

class StuffSedeer extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = Category::all();

        foreach($categories as $key => $item){
            Stuff::factory(rand(5, 20))->create([
                'id_category' => $item->id,
            ]);
        }
    }
}
