<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'identification' => '1193451765',
            'name' => 'diego fabian',
            'last_name' => 'cediel diaz',
            'email'=> 'diego123@gmail.com',
            'phone' => '3017368867',
            'location' => 'Calle 2n7-157',
            'password' => bcrypt('123456789')

        ])->assignRole('Profesional');


        User::create([
            'identification' => '1293451765',
            'name' => 'nathalia',
            'last_name' => 'rodriguez',
            'email'=> 'nath@gmail.com',
            'phone' => '3167656672',
            'location' => 'cra 2 #23-15 primavera',
            'password' => bcrypt('nath123')

        ])->assignRole('Profesional');



        User::create([
            'identification' => '1493451995',
            'name' => 'Jose fernando',
            'last_name' => 'perez sosa',
            'email'=> 'jose@gmail.com',
            'phone' => '3122344456',
            'location' => '123 norte san boul',
            'password' => bcrypt('jose123')

        ])->assignRole('Paciente');




        User::create([
            'identification' => '1593453325',
            'name' => 'Bibiana',
            'last_name' => 'pedraza diaz',
            'email'=> 'bibi@gmail.com',
            'phone' => '3138832277',
            'location' => 'cre 33 # 12-23 sur mell',
            'password' => bcrypt('bibi123')

        ])->assignRole('Paciente');
    }
}
