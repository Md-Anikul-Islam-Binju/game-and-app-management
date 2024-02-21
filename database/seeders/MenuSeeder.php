<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $menus = [
            ['name_en' => 'Home', 'name_bn' => 'হোম', 'order_no' => 1],
            ['name_en' => 'About Us', 'name_bn' => 'আমাদের সম্পর্কে', 'order_no' => 2],
            ['name_en' => 'Notice Board', 'name_bn' => 'নোটিশ বোর্ড', 'order_no' => 3],
            ['name_en' => 'News', 'name_bn' => 'নিউজ', 'order_no' => 4],
            ['name_en' => 'Resource', 'name_bn' => 'রিসৌর্স', 'order_no' => 5],
            ['name_en' => 'Project', 'name_bn' => 'প্রজেক্ট', 'order_no' => 6],
            ['name_en' => 'Contact Us', 'name_bn' => 'যোগাযোগ', 'order_no' => 7],
            ['name_en' => 'Team', 'name_bn' => 'টিম', 'order_no' => 8],
        ];

//        foreach ($menus as $menu) {
//            DB::table('menus')->insert($menu);
//        }
        foreach ($menus as $menu) {
            // Check if the menu already exists
            $existingMenu = DB::table('menus')
                ->where('name_en', $menu['name_en'])
                ->orWhere('name_bn', $menu['name_bn'])
                ->first();

            if (!$existingMenu) {
                DB::table('menus')->insert($menu);
            }
        }
    }
}
