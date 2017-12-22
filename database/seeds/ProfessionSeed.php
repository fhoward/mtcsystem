<?php

use Illuminate\Database\Seeder;

class ProfessionSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [
            
            ['id' => 1, 'profession' => 'Physical Therapy',],
            ['id' => 2, 'profession' => 'Occupational Therapy',],
            ['id' => 3, 'profession' => 'Speech and Language Therapy',],
            ['id' => 4, 'profession' => 'SPED Teacher',],
            ['id' => 5, 'profession' => 'Administrations',],

        ];

        foreach ($items as $item) {
            \App\Profession::create($item);
        }
    }
}
