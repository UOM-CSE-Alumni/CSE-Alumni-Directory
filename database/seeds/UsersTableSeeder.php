<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create(array(
            'name' => 'Thilina Ashen Gamage',
            'email' => 'ashane.14@cse.mrt.ac.lk',
            'password' => Hash::make('1234'),
        ));
        User::create(array(
            'name' => 'Achala Diassanayake',
            'email' => 'achala@gmail.com',
            'password' => Hash::make('1234'),
        ));
        User::create(array(
            'name' => 'Lahiru De Alwis',
            'email' => 'lahiru@gmail.com',
            'password' => Hash::make('1234'),
        ));
        User::create(array(
            'name' => 'Amali',
            'email' => 'amali@gmail.com',
            'password' => Hash::make('1234'),
        ));
    }
}
