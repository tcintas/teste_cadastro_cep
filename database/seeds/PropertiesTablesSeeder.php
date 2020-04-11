<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PropertiesTablesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('properties')->insert([
            'product_name'=> 'Borracha Branca',
            'item'=> 'borracha-branca',
            'amount'=> 20,
            'ini_year'=> 2019,  
            'provider_name'=> 'Teste 1' ,
            'zipcode'=> '08226021',
            'street'=> 'Rua 18 de Abril',
            'district'=> 'Cidade Antônio Estevão de Carvalho',
            'city'=> 'São Paulo',
            'state'=> 'SP',
            'ibge' => '3550308'
        ]);

        DB::table('properties')->insert([
            'product_name'=> 'Notebook Acer',
            'item'=> 'notebook-acer',
            'amount'=> 15,
            'ini_year'=> 2015,  
            'provider_name'=> 'Teste 2' ,
            'zipcode'=> '03047000',
            'street'=> 'Rua 21 de Abril',
            'district'=> 'Brás',
            'city'=> 'São Paulo',
            'state'=> 'SP',
            'ibge' => '3550308'
        ]);

        DB::table('properties')->insert([
            'product_name'=> 'Agendas 2020',
            'item'=> 'agendas-2020',
            'amount'=> 3,
            'ini_year'=> 2020,  
            'provider_name'=> 'Teste 3' ,
            'zipcode'=> '20020070',
            'street'=> 'Praça Estado da Guanabara',
            'district'=> 'Centro',
            'city'=> 'Rio de Janeiro',
            'state'=> 'RJ',
            'ibge' => '3304557'
        ]);

    }
}
