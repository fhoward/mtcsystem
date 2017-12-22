<?php

use Illuminate\Database\Seeder;

class ContactSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [
            
            ['id' => 1, 'company_id' => null, 'name' => 'Juan DelaCruz', 'phone1' => '123', 'email' => 'francishoward28@gmail.com', 'address' => 'morong rizal', 'date' => '2017-07-31 02:00:00',],

        ];

        foreach ($items as $item) {
            \App\Contact::create($item);
        }
    }
}
