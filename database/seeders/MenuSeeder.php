<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('Menus')->insert([
            'name' => "ROOTA",
            'url' => "#",
            'img' => "rootA.jpg",
            'order' => "1",
            'is_active' => "1",
        ]);

        DB::table('Menus')->insert([
            'name' => "ROOTB",
            'url' => "#",
            'img' => "rootB.jpg",
            'order' => "2",
            'is_active' => "1",
        ]);

        DB::table('Menus')->insert([            
            'parent_id' => 1,
            'name' => "Sub 1",
            'url' => "#",
            'img' => "",
            'order' => "1",
            'is_active' => "1",
        ]);

        DB::table('Menus')->insert([            
            'parent_id' => 2,
            'name' => "Sub 2",
            'url' => "#",
            'img' => "",
            'order' => "1",
            'is_active' => "1",
        ]);

        DB::table('Menus')->insert([            
            'parent_id' => 2,
            'name' => "Sub 3",
            'url' => "#",
            'img' => "",
            'order' => "2",
            'is_active' => "1",
        ]);

    }
}
