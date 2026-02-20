<?php

namespace Database\Seeders;

use App\Models\Property;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminAndPropertiesSeeder extends Seeder
{
    public function run(): void
    {
        $admin = User::firstOrCreate(
            ['email' => 'admin@luxsecure.com'],
            [
                'name' => 'Admin',
                'password' => Hash::make('password'),
                'role' => 'admin',
                'email_verified_at' => now(),
            ]
        );
        if (!$admin->isAdmin()) {
            $admin->update(['role' => 'admin', 'email_verified_at' => $admin->email_verified_at ?? now()]);
        }

        if (Property::count() > 0) {
            return;
        }

        $samples = [
            ['title' => 'Modern Family House', 'location' => 'DHA Phase 6, Karachi', 'type' => 'House', 'price' => 52000000],
            ['title' => 'Luxury Villa', 'location' => 'Bahria Town, Lahore', 'type' => 'Villa', 'price' => 85000000],
            ['title' => 'Cozy Apartment', 'location' => 'Gulberg, Islamabad', 'type' => 'Apartment', 'price' => 21000000],
            ['title' => 'Classic Bungalow', 'location' => 'Clifton, Karachi', 'type' => 'Bungalow', 'price' => 63000000],
            ['title' => 'Canal View Residence', 'location' => 'Canal Road, Lahore', 'type' => 'House', 'price' => 48000000],
            ['title' => 'Skyline Penthouse', 'location' => 'Blue Area, Islamabad', 'type' => 'Apartment', 'price' => 129000000],
            ['title' => 'Golf Facing Villa', 'location' => 'DHA Valley, Islamabad', 'type' => 'Villa', 'price' => 97000000],
            ['title' => 'Elegant Residence', 'location' => 'E-11, Islamabad', 'type' => 'House', 'price' => 45000000],
            ['title' => 'Defence Phase 5 House', 'location' => 'Defence Phase 5, Lahore', 'type' => 'House', 'price' => 72000000],
            ['title' => 'Hayatabad Family Home', 'location' => 'Hayatabad, Peshawar', 'type' => 'House', 'price' => 38000000],
            ['title' => 'Bahria Heights Apartment', 'location' => 'Bahria Town, Rawalpindi', 'type' => 'Apartment', 'price' => 26000000],
            ['title' => 'Bosan Road Villa', 'location' => 'Bosan Road, Multan', 'type' => 'Villa', 'price' => 54000000],
            ['title' => 'Canal View Home', 'location' => 'D Ground, Faisalabad', 'type' => 'House', 'price' => 32000000],
            ['title' => 'Murree Hills Cottage', 'location' => 'Murree', 'type' => 'House', 'price' => 68000000],
            ['title' => 'Karimabad View Residence', 'location' => 'Hunza Valley, Karimabad', 'type' => 'Villa', 'price' => 115000000],
            ['title' => 'Gwadar Sea View Apartment', 'location' => 'Gwadar', 'type' => 'Apartment', 'price' => 49000000],
            ['title' => 'Sialkot Cantt Bungalow', 'location' => 'Sialkot Cantt', 'type' => 'Bungalow', 'price' => 56000000],
        ];
        foreach ($samples as $s) {
            Property::create(array_merge($s, ['is_active' => true]));
        }
    }
}
