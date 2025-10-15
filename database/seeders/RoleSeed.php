<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         $roles= ['سوپر ادمین','مدیر فروش','مدیر اعتبارات'];
        foreach ($roles as $role) {
            Role::create(['name'=>$role]);
        }

    }
}
