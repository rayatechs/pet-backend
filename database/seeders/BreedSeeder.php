<?php

namespace Database\Seeders;

use App\Models\Breed;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BreedSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $breeds = [
            ['name' => 'سگ'],
            ['name' => 'گربه'],
        ];


        foreach ($breeds as $breedData) {
            Breed::create($breedData);
        }


        $dogParentID = Breed::where('name', 'سگ')->first()->id;
        $catParentID = Breed::where('name', 'گربه')->first()->id;


        $subBreeds = [

            ['name' => 'گلدن رتریور', 'parent_id' => $dogParentID],
            ['name' => 'لابرادور رتریور', 'parent_id' => $dogParentID],
            ['name' => 'ژرمن شپرد', 'parent_id' => $dogParentID],
            ['name' => 'بولداگ', 'parent_id' => $dogParentID],
            ['name' => 'بیگل', 'parent_id' => $dogParentID],
            ['name' => 'پودل', 'parent_id' => $dogParentID],
            ['name' => 'روتوایلر', 'parent_id' => $dogParentID],
            ['name' => 'یورکشایر تریر', 'parent_id' => $dogParentID],
            ['name' => 'باکسر', 'parent_id' => $dogParentID],
            ['name' => 'داکس‌هاند', 'parent_id' => $dogParentID],

            ['name' => 'سیامی', 'parent_id' => $catParentID],
            ['name' => 'پرشین', 'parent_id' => $catParentID],
            ['name' => 'مین کون', 'parent_id' => $catParentID],
            ['name' => 'رگ‌دال', 'parent_id' => $catParentID],
            ['name' => 'بنگال', 'parent_id' => $catParentID],
            ['name' => 'اسکاتیش فولد', 'parent_id' => $catParentID],
            ['name' => 'اسفینکس', 'parent_id' => $catParentID],
            ['name' => 'آبیسینی', 'parent_id' => $catParentID],
            ['name' => 'بریتیش شورت‌هر', 'parent_id' => $catParentID],
            ['name' => 'برمز', 'parent_id' => $catParentID],

        ];


        foreach ($subBreeds as $breedData) {
            Breed::create($breedData);
        }
    }
}
