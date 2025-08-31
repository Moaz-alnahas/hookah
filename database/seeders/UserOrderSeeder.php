<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserOrderSeeder extends Seeder
{
    public function run(): void
    {
        // 1️⃣ إنشاء مستخدمين تجريبيين
        $userIds = [];
        for ($i = 1; $i <= 3; $i++) {
            $userIds[] = DB::table('users')->insertGetId([
                'name' => "User $i",
                'phone' => "09000000$i",
                'email' => "user$i@example.com",
                'password' => Hash::make('password123'),
                'image' => 'user.png', // صورة افتراضية
                'coin' => 0, // قيمة COIN افتراضية
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        foreach ($userIds as $userId) {
            $orderId = DB::table('orders')->insertGetId([
                'user_id' => $userId,
                'status_id' => 1, // Pending
                'note' => 'طلب تجريبي',
                'total_price' => 15.00,
                'delivery_time' => now()->addHours(1),
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            DB::table('order_items')->insert([
                [
                    'order_id' => $orderId,
                    'product_id' => 1,
                    'quantity' => 1,
                    'price' => 5.00,
                    'total' => 5.00,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'order_id' => $orderId,
                    'product_id' => 4,
                    'quantity' => 2,
                    'price' => 3.00,
                    'total' => 6.00,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]
            ]);

            // إضافة التوصيل لكل طلب
            DB::table('deliveries')->insert([
                'order_id' => $orderId,
                'delivery_person_name' => 'Delivery Man 1',
                'delivery_phone' => '099999999',
                'status' => 'in_progress',
                'latitude' => 40.712776,
                'longitude' => -74.005974,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        // 3️⃣ إضافة 3 طلبات للمستخدم "moaz alnahas"
        $moaz = DB::table('users')->where('name', 'User 2')->first();

        if ($moaz) {
            for ($i = 1; $i <= 3; $i++) {
                $orderId = DB::table('orders')->insertGetId([
                    'user_id' => $moaz->id,
                    'status_id' => 1, // Pending
                    'note' => "طلب تجريبي رقم $i",
                    'total_price' => 20.00,
                    'delivery_time' => now()->addHours($i),
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);

                // إضافة منتجات للطلب
                DB::table('order_items')->insert([
                    [
                        'order_id' => $orderId,
                        'product_id' => 2,
                        'quantity' => 1,
                        'price' => 10.00,
                        'total' => 10.00,
                        'created_at' => now(),
                        'updated_at' => now(),
                    ],
                    [
                        'order_id' => $orderId,
                        'product_id' => 1,
                        'quantity' => 2,
                        'price' => 5.00,
                        'total' => 10.00,
                        'created_at' => now(),
                        'updated_at' => now(),
                    ]
                ]);

                // إضافة التوصيل
                DB::table('deliveries')->insert([
                    'order_id' => $orderId,
                    'delivery_person_name' => 'Delivery Man 2',
                    'delivery_phone' => '098888888',
                    'status' => 'in_progress',
                    'latitude' => 40.712776,
                    'longitude' => -74.005974,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
    }
}
