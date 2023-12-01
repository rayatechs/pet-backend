<?php

namespace Database\Seeders;

use App\Models\Event;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $eventSeeder = [
            ['name' => "بازی"],
            ['name' => "دارو"],
            ['name' => "خوراک"],
            ['name' => "تولد"],
            ['name' => "سالگرد پذیرش"],
            ['name' => "پیاده روی"],
            ['name' => "وزن‌دهی"],
            ['name' => "گرومینگ"],
            ['name' => "ویزیت دکتر"],
            ['name' => "واکسن"],
        ];

        foreach ($eventSeeder as $event) {
            Event::create($event);
        }
    }
}
