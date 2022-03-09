<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\Module;

class ModuleSeeder extends Seeder
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

        foreach ($modules as $key => $value) {
            $module = new Module();
            $module->name = $value;
            $module->save();
        }
    }
}
