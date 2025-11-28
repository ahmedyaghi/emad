<?php

namespace Database\Seeders;

use App\Models\Lecturer;
use Illuminate\Database\Seeder;

class LecturerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Lecturer::create([
            'name' => 'Dr. Ahmed Al-Mutairi',
            'image' => asset('assets/images/avatar.png'),
            'bio' => 'Dr. Ahmed Al-Mutairi is a renowned expert in renewable energy with over 15 years of experience in the field. He has contributed to numerous international projects and has published extensively on sustainable energy solutions.',
        ]);

    }
}
