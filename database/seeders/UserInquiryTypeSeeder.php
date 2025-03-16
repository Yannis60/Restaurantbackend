<?php

namespace Database\Seeders;

use App\Models\UserInquiryType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserInquiryTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        UserInquiryType::create([
            'name' => 'General Inquiry',
        ]);
        UserInquiryType::create([
            'name' => 'Technical Support',
        ]);
        UserInquiryType::create([
            'name' => 'Partnership Opportunity',
        ]);
        UserInquiryType::create([
            'name' => 'Restaurant Onboarding',
        ]);
        UserInquiryType::create([
            'name' => 'Feedback',
        ]);
        UserInquiryType::create([
            'name' => 'Report an Issue',
        ]);
        UserInquiryType::create([
            'name' => 'Billing Question',
        ]);
    }
}
