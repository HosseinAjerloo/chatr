<?php

namespace Database\Seeders;

use App\Models\Operator;
use App\Models\Prefix;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OperatorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         $prefix=[
                1=> [
                    "910","911","912","913","914","915","916","917","918","919",
                    "990","991","992","993","994","995","996","997","998","999"
                ],
             2=> [
                 "930","931","932","933","934","935","936","937","938","939",
                 "990","991","992","993","994","995","996","997","998","999"
             ],
             3=>[
                 "920","921","922","923","924","925","926","927","928","929"
             ]
        ];
        $operators=['همراه اول','ایرانسل','رایتل'];
        foreach ($operators as $operator)
        {
            $operator=Operator::create(['name'=>$operator]);
            foreach ($prefix[$operator->id] as $pre)
            {
                Prefix::create(['prefix_num'=>$pre,'operator_id'=>$operator->id]);
            }

        }
    }
}
