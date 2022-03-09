<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\ContactUs;
use App\Models\ContactUsLocale;

class ContactUsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $contactUs = new ContactUs();
        $contactUs->email = 'info.vuexy@gmail.com';
        $contactUs->telephone = '+66945678126';
        $contactUs->fax = '+6625266328';
        $contactUs->facebook = 'https://www.facebook.com';
        $contactUs->instagram = 'https://www.instagram.com';
        $contactUs->twitter = 'https://www.twitter.com';
        $contactUs->youtube = 'https://www.youtube.com';
        $contactUs->save();

        $contactUsLocale = new ContactUsLocale();
        $contactUsLocale->locale = 'en';
        $contactUsLocale->company = 'Vuexy Company Limited';
        $contactUsLocale->address = '8 Phiboonsongkharm Rd. Nonthaburi 11000 Thailand';
        $contactUsLocale->contact_us_id = $contactUs->id;
        $contactUsLocale->save();

        $contactUsLocale = new ContactUsLocale();
        $contactUsLocale->locale = 'th';
        $contactUsLocale->company = 'วิวซี่ คอมพานี ลิมิเต็ด';
        $contactUsLocale->address = '8 ถนน พิบูลสงคราม จังหวัด นนทบุรี ประเทศไทย';
        $contactUsLocale->contact_us_id = $contactUs->id;
        $contactUsLocale->save();
    }
}
