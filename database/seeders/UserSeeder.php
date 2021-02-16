<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = New User();
        $user->name = 'Pahni';
        $user->email = 'pahni1232@gmail.com';
        $user->password = bcrypt('rahasia');
    }
}
