<?php

namespace Database\Seeders;

use App\Models\Type;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */




    public function run(): void
    {
        $types = [
            [
                'name' => 'pizzeria',
            ],
            [
                'name' => 'sushi',
            ],
            [
                'name' => 'braceria',
            ],
            [
                'name' => 'sea food',
            ],
            [
                'name' => 'fast-food',
            ],
        ];

        foreach ($types as $type) {
            $new_type = new Type();
            $new_type->name = $type['name'];
            $new_type->image = 'image';
            $new_type->save();
        }
    }
}
