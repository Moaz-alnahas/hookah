<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        // الفئة: أركيل
        DB::table('products')->insert([
            ['id' => 1, 'name' => 'أركيل تفاح', 'subcategory_id' => 1, 'price' => 5.00,'image' => '/assets/images/app_icon1.png', 'created_at' => now(), 'updated_at' => now(),],
            ['id' => 2, 'name' => 'أركيل نعناع', 'subcategory_id' => 1, 'price' => 5.00,'image' => '/assets/images/app_icon1.png', 'created_at' => now(), 'updated_at' => now(),],
            ['id' => 4, 'name' => 'مشروب كولا', 'subcategory_id' => 2, 'price' => 3.00,'image' => '/assets/images/app_icon1.png', 'created_at' => now(), 'updated_at' => now(),],
        ]);
    }
}
