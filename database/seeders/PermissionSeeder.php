<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Illuminate\Support\Str;

use App\Models\Module;
use App\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $modules = [
            'Dashboards',
            'Staff',
            'Filters',
            'Categories',
            'Products',
            'Customers',
            'Orders',
            'Slideshows',
            'Tags',
            'Blogs',
            'Contact Us',
            'Information',
            'Coupons',
            'Emails'
        ];

        $permissions = [
            'create',
            'read',
            'update',
            'delete'
        ];

        foreach ($modules as $key => $module) {
            foreach ($permissions as $key => $value) {
                $name = Str::lower($value.' '.$module);

                $permission = new Permission();
                $permission->name = $name;
                $permission->module_id = Module::where('name', $module)->first()->id;
                $permission->save();
            }
        }
    }
}
