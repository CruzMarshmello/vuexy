<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

use App\Models\User;
use App\Models\UserVerify;
use App\Models\Permission;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User();
        $user->full_name = 'Vuexy';
        $user->email = 'info.vuexy@gmail.com';
        $user->email_verified_at = Carbon::now();
        $user->password = Hash::make('Dude5266325@');
        $user->role = 'Admin';
        $user->status = 'Active';
        $user->save();

        $userVerify = new UserVerify();
        $userVerify->token = Str::random(40);
        $userVerify->user_id = $user->id;
        $userVerify->save();

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
            foreach ($permissions as $key => $permission) {
                $name = Str::lower($permission.' '.$module);

                $array[] = Permission::where('name', $name)->first()->id;
            }
        }

        $user->permissions()->sync($array);
    }
}
