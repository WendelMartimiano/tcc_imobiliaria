<?php

use Illuminate\Database\Seeder;


class UsuariosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            0   =>  [
                'name'              =>  'Wendel M. Gonçalves',
                'email'             =>  'wendelprogrammer@gmail.com',
                'password'          =>  bcrypt('teste123'),
                'id_empresa'        =>  '1'
            ]
        ];

        DB::table('users')->insert($users);
    }
}
