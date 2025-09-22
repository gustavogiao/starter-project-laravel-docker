<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            'Trabalho',
            'Estudos',
            'Pessoal',
            'Saúde',
            'Finanças',
            'Família',
            'Projetos',
            'Compras',
            'Lazer',
        ];

        foreach($categories as $category) {
           Category::firstOrCreate(['name' => $category]);
        }
    }
}
