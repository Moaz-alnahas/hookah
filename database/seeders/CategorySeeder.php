<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            ['name' => 'مشروبات', 'description' => 'جميع أنواع المشروبات'],
            ['name' => 'معسلات', 'description' => 'أنواع المعسل المختلفة'],
            ['name' => 'تسالي', 'description' => 'مكسرات ووجبات خفيفة'],
        ];

        foreach ($categories as $category) {
            DB::table('categories')->insert($category);
        }
    }
}
