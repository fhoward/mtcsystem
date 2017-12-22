<?php

use Illuminate\Database\Seeder;

class PatientSeedPivot extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [
            
            1 => [
                'assigned_therapist' => [1],
            ],
            2 => [
                'assigned_therapist' => [2],
            ],

        ];

        foreach ($items as $id => $item) {
            $patient = \App\Patient::find($id);

            foreach ($item as $key => $ids) {
                $patient->{$key}()->sync($ids);
            }
        }
    }
}
