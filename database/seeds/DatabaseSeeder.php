<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        // $this->call('UserTableSeeder');

        $this->call('PlanosSeeder');
        $this->call('OpcoesSeeder');
        $this->call('CargosSeeder');
        $this->call('OpcoesPlanosSeeder');
        $this->call('TiposClientesSeeder');
        $this->call('EmpresasSeeder');
        $this->call('UsuariosSeeder');

        Model::reguard();
    }
}
