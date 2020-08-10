<?php

use Illuminate\Database\Seeder;

use App\Models\User;
use Illuminate\Support\Str;

class CreateUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = [
            [
                'name' => "‌a‌dmin",
                'email' => 'admin@gmail.com', //$2y$12$QbDu1X.nhAzO1M2ynNtW3uyjkuPSi09VijhQUkGGgbcvpm87U/1ju
                'password' => '$2y$12$QbDu1X.nhAzO1M2ynNtW3uyjkuPSi09VijhQUkGGgbcvpm87U/1ju', // password 12345678
                'type' => 0, //0 for admin and 1 for user
                'phone' => '09876543212',
                'dob' => '1974-03-21',
                'address' => 'yangon',
                'profile' => Str::random(10) . '.jpg',
                'created_user_id' => 1,
                'updated_user_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'name' => "user",
                'email' => 'user@gmail.com', //$2y$12$QbDu1X.nhAzO1M2ynNtW3uyjkuPSi09VijhQUkGGgbcvpm87U/1ju
                'password' => '$2y$12$QbDu1X.nhAzO1M2ynNtW3uyjkuPSi09VijhQUkGGgbcvpm87U/1ju', // password 12345678
                'type' => 1, //0 for admin and 1 for user
                'phone' => '098765409887',
                'dob' => '1974-03-21',
                'address' => 'yangon',
                'profile' => Str::random(10) . '.jpg',
                'created_user_id' => 1,
                'updated_user_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];
  
        foreach ($user as $key => $value) {
            User::create($value);
        }
    }
}
