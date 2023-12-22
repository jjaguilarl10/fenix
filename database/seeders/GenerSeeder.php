<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Gener;

class GenerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [ 'id' => 1, 'name_gener'=> 'Hombre','status_id'=>1 ],
            [ 'id' => 2, 'name_gener'=> 'Mujer','status_id'=>1 ],
            [ 'id' => 3, 'name_gener'=> 'Otro','status_id'=>1 ]
        ];

        foreach ($data as $v) {
            Gener::create($v);
        }
    }
}
