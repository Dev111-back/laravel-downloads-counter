<?php

namespace Database\Seeders;

use App\Models\File;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class FileSeeder extends Seeder
{
    public function run()
    {
        File::create([
            'name' => 'Sample File',
            'path' => 'uploads/sample.pdf',
            'downloads' => 0,
        ]);
    }
}
