<?php

namespace Database\Seeders;

use App\Models\Website;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class WebsiteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Website::create([
            'title' => 'Default',
            'slug' => 'Default',
            'logo' => 'storage\Webiste\Default.png',
            'address' => 'North Badda, len-14',
            'email' => 'biplob@gmail.com',
            'phone' => '01643381009',
            'facebook' => 'http://www.facebook.com',
            'instagram' => 'http://www.instagram.com',
            'twitter' => 'http://www.twitter.com',
            'behance' => 'http://www.behance.com',
            'footer' => 'Copyright © 2022-2023 Developer Biplob. All rights reserved.',
        ]);
    }
}
