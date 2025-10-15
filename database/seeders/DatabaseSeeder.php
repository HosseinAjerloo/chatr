<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Database\Seeders\RoleSeed;
use Illuminate\Database\Seeder;
use Database\Seeders\BrandSeeder;
use Illuminate\Support\Facades\Config;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create(
            [
                'name'=>'حسین',
                'email'=>'ahosseinajerloo@gmail.com',
                'password'=>'hr_hon4774',
                'family'=>'ajerloo',
                'username'=>'hosseinajerloo',
                'side'=>'برنامه نویس',
                'nationality'=>'0521378680',
                'phone_number'=>'09186414452',
            ]

            );
        $this->call(
            [
                RoleSeed::class,
                BrandSeeder::class,
                OperatorSeeder::class,
                Cityseeder::class,
                ConfigSeeder::class
            ]);
    }
}
