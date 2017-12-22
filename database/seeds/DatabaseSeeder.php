<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $this->call(ContactSeed::class);
        $this->call(ProfessionSeed::class);
        $this->call(RoleSeed::class);
        $this->call(UserSeed::class);
        $this->call(PatientSeed::class);
        $this->call(ScheduleSeed::class);
        $this->call(PatientSeedPivot::class);

    }
}
