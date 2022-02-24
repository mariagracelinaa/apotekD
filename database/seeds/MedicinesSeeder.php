<?php

use Illuminate\Database\Seeder;

class MedicinesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('medicines')->insert([
            "Generic Name" => "Fentanil",
            "Form" => "patch 12,5 mcg/jam" ,
            "Restriction Formula" => "10 patch/bulan",
            "Description" => "- Untuk nyeri kronik pada
            pasien kanker yang tidak
            terkendali.
            - Tidak untuk nyeri akut.",
            "faskes_1" => false,
            "faskes_2" => true,
            "faskes_3" => true,
            "category_id" => 2,
        ]);

        DB::table('medicines')->insert([
            "Generic Name" => "Hidromorfon",
            "Form" => "tab lepas lambat 8 mg" ,
            "Restriction Formula" => "30 tab/bulan",
            "Description" => "",
            "faskes_1" => false,
            "faskes_2" => true,
            "faskes_3" => true,
            "category_id" => 2,
        ]);

        DB::table('medicines')->insert([
            "Generic Name" => "Asam Mefenamat",
            "Form" => "kaps 250 mg" ,
            "Restriction Formula" => "30 kaps/bulan",
            "Description" => "",
            "faskes_1" => true,
            "faskes_2" => true,
            "faskes_3" => true,
            "category_id" => 3,
        ]);

        DB::table('medicines')->insert([
            "Generic Name" => "Ketoprofen",
            "Form" => "sup 100 mg" ,
            "Restriction Formula" => "2 sup/hari, maks 3
            hari",
            "Description" => "Untuk nyeri sedang sampai
            berat pada pasien yang tidak dapat menggunakan analgesik
            secara oral.",
            "faskes_1" => false,
            "faskes_2" => true,
            "faskes_3" => true,
            "category_id" => 3,
        ]);
    }
}
