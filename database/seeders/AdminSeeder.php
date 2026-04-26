<?php

namespace Database\Seeders;

use App\Models\SiteSetting;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        // Create admin user
        User::updateOrCreate(
            ['email' => 'admin@kmcollege.edu.in'],
            [
                'name'     => 'KMC Admin',
                'password' => Hash::make('Kmc@Admin2025'),
                'is_admin' => true,
            ]
        );

        // Seed default site settings
        $settings = [
            ['key' => 'college_name',       'value' => 'K.M.C. College',                          'type' => 'text',     'label' => 'College Name',          'group' => 'general'],
            ['key' => 'college_tagline',     'value' => 'Khalapur Taluka Shikshan Prasarak Mandal\'s',       'type' => 'text',     'label' => 'College Tagline',       'group' => 'general'],
            ['key' => 'college_motto',       'value' => 'TEJ • GATI • SHAKTI',                               'type' => 'text',     'label' => 'College Motto',         'group' => 'general'],
            ['key' => 'naac_grade',          'value' => "NAAC Reaccredited 'B+' Grade (3rd Cycle)",          'type' => 'text',     'label' => 'NAAC Status',           'group' => 'general'],
            ['key' => 'established_year',    'value' => '1979',                                              'type' => 'text',     'label' => 'Established Year',      'group' => 'general'],
            ['key' => 'principal_name',      'value' => 'Dr. Dayanand Prabhu Gaikwad',                       'type' => 'text',     'label' => 'Principal Name',        'group' => 'general'],
            ['key' => 'chairman_name',       'value' => 'Shri. Santosh Gurunath Jangam',                     'type' => 'text',     'label' => 'Chairman Name',         'group' => 'general'],
            ['key' => 'phone',               'value' => '95116 16009',                                       'type' => 'text',     'label' => 'Phone Number',          'group' => 'contact'],
            ['key' => 'email',               'value' => 'college_kmc@yahoo.co.in',                           'type' => 'text',     'label' => 'Email Address',         'group' => 'contact'],
            ['key' => 'website',             'value' => 'kmcc.edu.in',                                       'type' => 'text',     'label' => 'Website',               'group' => 'contact'],
            ['key' => 'address',             'value' => 'K.M.C. College, Khopoli, Dist. Raigad, Maharashtra','type' => 'textarea', 'label' => 'Address',               'group' => 'contact'],
            ['key' => 'anti_ragging_number', 'value' => '1800-180-5522',                                     'type' => 'text',     'label' => 'Anti-Ragging Helpline', 'group' => 'contact'],
            ['key' => 'facebook_url',        'value' => '',                                                  'type' => 'text',     'label' => 'Facebook URL',          'group' => 'social'],
            ['key' => 'twitter_url',         'value' => '',                                                  'type' => 'text',     'label' => 'Twitter/X URL',         'group' => 'social'],
            ['key' => 'youtube_url',         'value' => '',                                                  'type' => 'text',     'label' => 'YouTube URL',           'group' => 'social'],
            ['key' => 'instagram_url',       'value' => '',                                                  'type' => 'text',     'label' => 'Instagram URL',         'group' => 'social'],
            ['key' => 'admission_notice',    'value' => 'Admissions Open for Academic Year 2025-26',         'type' => 'text',     'label' => 'Admission Notice Text', 'group' => 'academic'],
            ['key' => 'total_students',      'value' => '2600+',                                             'type' => 'text',     'label' => 'Total Students Count',  'group' => 'academic'],
        ];

        foreach ($settings as $setting) {
            SiteSetting::updateOrCreate(['key' => $setting['key']], $setting);
        }

        $this->command->info('Admin user created: admin@kmcollege.edu.in / Kmc@Admin2025');
        $this->command->info('Site settings seeded successfully.');
    }
}
