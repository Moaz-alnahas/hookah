<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SubCategorySeeder extends Seeder
{
    public function run(): void
    {
        $subcategories = [
            // مشروبات
            ['category_id' => 1, 'name' => 'عصائر', 'description' => 'عصائر طبيعية وصناعية'],
            ['category_id' => 1, 'name' => 'مشروبات غازية', 'description' => 'مشروبات غازية متنوعة'],

            // معسلات
            ['category_id' => 2, 'name' => 'تفاحتين', 'description' => 'معسل تفاحتين'],
            ['category_id' => 2, 'name' => 'علكة نعناع', 'description' => 'معسل علكة بالنعناع'],

            // تسالي
            ['category_id' => 3, 'name' => 'مكسرات', 'description' => 'مكسرات مشكلة'],
            ['category_id' => 3, 'name' => 'شيبس', 'description' => 'شيبس بنكهات متنوعة'],
        ];

        foreach ($subcategories as $subcategory) {
            DB::table('subcategories')->insert($subcategory);
        }
    }
}
