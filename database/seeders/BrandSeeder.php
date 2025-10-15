<?php

namespace Database\Seeders;

use App\Models\Brand;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $brands=['استدی','تروبریک',"استاپ لاین"];
        foreach ($brands as $brand) {
            Brand::create(['name'=>$brand]);
        }
    }
}
