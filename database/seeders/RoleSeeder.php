<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [ 'id' => 1, 'name_role'=> 'Administrador','status_id'=>1 ],
            [ 'id' => 2, 'name_role'=> 'Usuario','status_id'=>1 ]
        ];

        foreach ($data as $v) {
            Role::create($v);
        }
    }
}
