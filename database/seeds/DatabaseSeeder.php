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

        /*
         * Criar seed da empresa endsystem
         * Criar seed dos planos
         * Criar seed das opções
         * Criar seed das opções por planos
         * Criar seed de cargos da endsystem
         * Criar seed de usuários da endsystem
         * */
        Model::reguard();
    }
}
