<?php

namespace Database\Seeders;

use App\Models\User;

use Illuminate\Support\Facades\Hash;

use Illuminate\Database\Seeder;

class Users extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::firstOrCreate(
            [
                'name' => 'Admin',
                'lastname1' => 'Admin',
                'lastname2' => 'Admin',
				'email' => 'admin@test.com',
	            'password' => Hash::make('Petride2021$'),
                'role_id' => 1,
                'estatus' => 'Aprobado'
            ]
        );
    }
}
