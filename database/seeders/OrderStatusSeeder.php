<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrderStatusSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('order_status')->insert([
            ['id' => 1, 'name' => 'Pending', 'description' => 'بانتظار الموافقة', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 2, 'name' => 'Approved', 'description' => 'تمت الموافقة', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 3, 'name' => 'Delivered', 'description' => 'تم التوصيل', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 4, 'name' => 'Canceled', 'description' => 'تم الإلغاء', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
