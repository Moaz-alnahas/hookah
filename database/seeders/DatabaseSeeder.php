<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
{
    // أولاً، تنشئ مستخدم تجريبي
    User::factory()->create([
        'name' => 'Test User',
        'email' => 'test@example.com',
        'phone' => '0900000001',
        'password' => bcrypt('password123'),
    ]);


   $this->call([
            OrderStatusSeeder::class,
            CategorySeeder::class,      // ← التصنيفات
            SubCategorySeeder::class,   // ← التصنيفات الفرعية
            ProductSeeder::class,
            UserOrderSeeder::class,
        ]);

}

}
