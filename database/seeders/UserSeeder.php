<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\user;

class UserSeeder extends Seeder{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            'identification' => '123456789',
            'uuid' => 'CdETdd',
            'name' => 'usuario',
            'surname' => 'administrador',
            'password' => bcrypt(123456),
            'email' => 'administrador@gmail.com',
            'gener_id' => 1,
            'role_id' => 1,
            'status_id' =>1,
        ];
        $u = User::firstOrCreate($data,$data);
    }
}