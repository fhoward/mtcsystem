<?php

use Illuminate\Database\Seeder;

class UserSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [
            
            ['id' => 1, 'avatar' => '/tmp/phpitJU0z', 'emp_id' => '2017-IT-02', 'name' => 'Francis Howard Susa', 'email' => 'francishoward28@gmail.com', 'password' => '$2y$10$2ARgYurO0sF.0U0owMtV2ufogU31iNTlZLTA.YrRRYveipuz2145G', 'confirm_password' => 'howchi061396', 'rfid_no' => null, 'role_id' => 1, 'remember_token' => '', 'gender' => 'male', 'contact_no' => null, 'profession_id' => 5, 'prc_number' => null, 'sss_id' => null, 'tin_no' => null, 'philhealth_id' => null, 'guardian_name' => null, 'guardian_contact_no' => null, 'guardian_address' => null,],
            ['id' => 2, 'avatar' => '/tmp/phpPuhFOs', 'emp_id' => '2017-IT-01', 'name' => 'Gabriel Labrillazo', 'email' => 'gabzilla@gmail.com', 'password' => '$2y$10$MTmt2d7.QV4thnyxZiBKCuDo96JSEgcQzQEVebLixlQTU5/7/GaX6', 'confirm_password' => 'gabzilla', 'rfid_no' => '0004940437', 'role_id' => 2, 'remember_token' => null, 'gender' => 'female', 'contact_no' => '09066232222', 'profession_id' => 1, 'prc_number' => '123123213', 'sss_id' => '123123213', 'tin_no' => '123123213', 'philhealth_id' => '12312321321', 'guardian_name' => 'Angelo Baldomir', 'guardian_contact_no' => '09066451831', 'guardian_address' => 'Antipolo City',],

        ];

        foreach ($items as $item) {
            \App\User::create($item);
        }
    }
}
