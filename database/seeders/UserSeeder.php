<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'nom'=>'Mht Saleh',
            'prenom'=>'Ben Ali',
            'identifiant'=>'benAli123',
            'email'=>'benAli@gmail.com',
            'status'=>'teacher',
            'password'=>1234567890
        ]);
    }
}
