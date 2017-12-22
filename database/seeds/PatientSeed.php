<?php

use Illuminate\Database\Seeder;

class PatientSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [
            
            ['id' => 1, 'image' => '/tmp/phpwEbUNt', 'name' => 'Baldomir, Angelo', 'gender' => 'male', 'birthday' => '2017-07-02', 'guardians_name' => 'Ely Buendia', 'contact_number' => '12345678910', 'address' => 'Antipolo City', 'doctors_name' => 'Dr. Stranger', 'remarks' => 'asdasdasdasdas', 'file' => '/tmp/phpLGyFhi',],
            ['id' => 2, 'image' => '/tmp/phpvDLABY', 'name' => 'Antonio Banderas', 'gender' => 'male', 'birthday' => '2017-07-19', 'guardians_name' => 'Anthony', 'contact_number' => '09192078771', 'address' => 'Morong rizal', 'doctors_name' => 'Dr. Olonggis', 'remarks' => 'asdads', 'file' => null,],

        ];

        foreach ($items as $item) {
            \App\Patient::create($item);
        }
    }
}
