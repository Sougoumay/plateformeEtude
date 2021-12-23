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
        /*User::create([
            'nom'=>'Laure',
            'prenom'=>'Kahlem',
            'identifiant'=>'laureKa12345',
            'email'=>'kahlem@gmail.com',
            'status'=>'teacher',
            'password'=>'$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi'
        ]);*/
        User::create([
            'nom'=>'Ibrahm',
            'prenom'=>'Yacoub',
            'identifiant'=>'yacoub12345',
            'email'=>'yacoubI@gmail.com',
            'password'=>Hash::make(12345678)
        ]);
    }
}
