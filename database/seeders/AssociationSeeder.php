<?php

namespace Database\Seeders;

use App\Models\Association;
use Illuminate\Database\Seeder;

class AssociationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Association::create([
            'name' => 'Association One',
            'logo' => asset('assets/images/image-brand-1.png'),
        ]);

        Association::create([
            'name' => 'Association Two',
            'logo' => asset('assets/images/image-brand-2.png'),
        ]);

        Association::create([
            'name' => 'Association Three',
            'logo' => asset('assets/images/image-brand-3.png'),
        ]);

        Association::create([
            'name' => 'Association Four',
            'logo' => asset('assets/images/image-brand-4.png'),
        ]);
    }
}
