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
            ],
            1   =>  [
                'name'              =>  'Taisa Palenciano',
                'email'             =>  'taisapalenciano@gmail.com',
                'password'          =>  bcrypt('teste123'),
                'id_empresa'        =>  '1'
            ],
            2   =>  [
                'name'              =>  'Mailson Marques',
                'email'             =>  'mailson@gmail.com',
                'password'          =>  bcrypt('teste123'),
                'id_empresa'        =>  '1'
            ],
            3   =>  [
                'name'              =>  'Lucas Maximiano',
                'email'             =>  'lucas@gmail.com',
                'password'          =>  bcrypt('teste123'),
                'id_empresa'        =>  '1'
            ],
            4   =>  [
                'name'              =>  'Maria da Silva',
                'email'             =>  'maria@gmail.com',
                'password'          =>  bcrypt('teste123'),
                'id_empresa'        =>  '1'
            ],
            5   =>  [
                'name'              =>  'João de Deus',
                'email'             =>  'joao@gmail.com',
                'password'          =>  bcrypt('teste123'),
                'id_empresa'        =>  '1'
            ],
            6   =>  [
                'name'              =>  'Fulano da Silva',
                'email'             =>  'fulano@gmail.com',
                'password'          =>  bcrypt('teste123'),
                'id_empresa'        =>  '1'
            ],
            7   =>  [
                'name'              =>  'Cicrano de Souza',
                'email'             =>  'cicrano@gmail.com',
                'password'          =>  bcrypt('teste123'),
                'id_empresa'        =>  '1'
            ],
            8   =>  [
                'name'              =>  'Viviane Badoco',
                'email'             =>  'viviane@gmail.com',
                'password'          =>  bcrypt('teste123'),
                'id_empresa'        =>  '1'
            ],
            9   =>  [
                'name'              =>  'Thais Palenciano',
                'email'             =>  'thais@gmail.com',
                'password'          =>  bcrypt('teste123'),
                'id_empresa'        =>  '1'
            ]
        ];

        DB::table('users')->insert($users);
    }
}
