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
        ];
        foreach ($samples as $s) {
            Property::create(array_merge($s, ['is_active' => true]));
        }
    }
}
