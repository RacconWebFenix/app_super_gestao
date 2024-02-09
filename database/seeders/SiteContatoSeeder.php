<?php

namespace Database\Seeders;

use App\Models\SiteContato;
use Database\Factories\SiteContatoFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SiteContatoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        // $sitecontato = new SiteContato();
        // $sitecontato->nome = 'Sistema SG';
        // $sitecontato->telefone = '151023';
        // $sitecontato->email = 'sistems@sistema.com.br';
        // $sitecontato->motivo = 1;
        // $sitecontato->mensagem = 'teste';
        // $sitecontato->save();
        SiteContatoFactory::new()->count(100)->create();
    }
}
