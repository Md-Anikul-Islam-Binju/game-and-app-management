<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = [
            //For roll and permission
            'role-list',
            'role-create',
            'role-edit',
            'role-delete',
            //For Role and permission
            'role-and-permission-list',
            //For Resource
            'resource-list',
            //For User
            'user-list',
            'user-create',
            'user-edit',
            'user-delete',
            //For Team
            'team-list',
            'team-create',
            'team-edit',
            'team-delete',
             //For Showcases
            'showcase-list',
            'showcase-create',
            'showcase-edit',
            'showcase-delete',
            //For About
            'about-list',
            'about-create',
            'about-edit',
            'about-delete',
            //For Slider
            'slider-list',
            'slider-create',
            'slider-edit',
            'slider-delete',
            //For Counter
            'counter-list',
            'counter-create',
            'counter-edit',
            'counter-delete',
            //For Project Category
            'project-category-list',
            'project-category-create',
            'project-category-edit',
            'project-category-delete',
            //For Project
            'project-list',
            'project-create',
            'project-edit',
            'project-delete',
            //For Notice
            'notice-list',
            'notice-create',
            'notice-edit',
            'notice-delete',
            //For Venue
            'venue-list',
            'venue-create',
            'venue-edit',
            'venue-delete',
            //For Training
            'training-list',
            'training-create',
            'training-edit',
            'training-delete',
            //For News
            'news-list',
            'news-create',
            'news-edit',
            'news-delete',
            //For Project File Category
            'project-file-category-list',
            'project-file-category-create',
            'project-file-category-edit',
            'project-file-category-delete',
            //For File Management
            'file-management-list',
            //For Project File
            'project-file-list',
            'project-file-create',
            'project-file-edit',
            'project-file-delete',
            //Site Setting
            'site-setting',
            //For Ott
            'ott-list',
            'ott-create',
            'ott-edit',
            'ott-delete',
            //Message
            'message-list',
            'message-delete',

            //Menu
            'menu-list',
            'menu-edit'
        ];
        foreach ($permissions as $permission) {
            if (!Permission::where('name', $permission)->exists()) {
                Permission::create(['name' => $permission]);
            }
        }
    }
}
