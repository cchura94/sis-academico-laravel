<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user1 = new User();
        $user1->name = "Cristian";
        $user1->email = "cristian@gmail.com";
        $user1->password = bcrypt("cristian54321");
        $user1->role="estudiante";
        $user1->save();

        $user2 = new User();
        $user2->name = "Juan";
        $user2->email = "juan@gmail.com";
        $user2->password = bcrypt("juan54321");
        $user2->role="docente";
        $user2->save();
    }
}
