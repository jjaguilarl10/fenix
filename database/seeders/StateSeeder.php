<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\State;

class StateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [ 'id' => 1, 'name_state'=> 'Active'],
            [ 'id' => 2, 'name_state'=> 'Inactive']
        ];

        foreach ($data as $v) {
            State::create($v);
        }
    }
}
