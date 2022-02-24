<?php

use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            'category_name' => 'Analgesik Narkotik'
        ]);

        DB::table('categories')->insert([
            'category_name' => 'Analgesik Non Narkotik'
        ]);

        DB::table('categories')->insert([
            'category_name' => 'Antipirai'
        ]);

        DB::table('categories')->insert([
            'category_name' => 'Nyeri Neuropatik'
        ]);

        DB::table('categories')->insert([
            'category_name' => 'Anestetik Lokal'
        ]);

        DB::table('categories')->insert([
            'category_name' => 'Anestetik Umum dan Oksigen'
        ]);

        DB::table('categories')->insert([
            'category_name' => 'Obat untuk Prosedur Pre Operatif'
        ]);

        DB::table('categories')->insert([
            'category_name' => 'Antialergi dan Obat untuk Anafilaksis'
        ]);

        DB::table('categories')->insert([
            'category_name' => 'Khusus'
        ]);

        DB::table('categories')->insert([
            'category_name' => 'Umum'
        ]);

        DB::table('categories')->insert([
            'category_name' => 'Antiepilepsi - Antikonvulsi'
        ]);
    }
}
