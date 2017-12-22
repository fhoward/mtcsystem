<?php

use Illuminate\Database\Seeder;

class ScheduleSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [
            
            ['id' => 1, 'staff_id' => 1, 'patient_id' => 1, 'activity' => 'Joint Mobilization', 'status' => 'present', 'date' => '2017-07-30', 'start' => '04:05:00', 'end' => '06:00:00',],
            ['id' => 2, 'staff_id' => 1, 'patient_id' => 1, 'activity' => 'Massage', 'status' => 'present', 'date' => '', 'start' => '', 'end' => '',],

        ];

        foreach ($items as $item) {
            \App\Schedule::create($item);
        }
    }
}
