<?php

namespace Database\Seeders;

use App\Models\Roles;
use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [
            ['title' => 'Administrador'],
            ['title' => 'Usuário'],
        ];

        foreach($items as $item){
            Roles::create($item);
        }
    }
}
