<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\TipoServicioModel;

class TipoServicioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TipoServicioModel::firstOrCreate(
            [
                'name' => 'Admin',
                'description' => 'Cuentas de administracion'
            ],
        );
        TipoServicioModel::firstOrCreate(
            [
                'name' => 'Rider',
                'description' => 'Cuentas de choferes transporte'
            ],
        );
        TipoServicioModel::firstOrCreate( 
            [
                'name' => 'Client',
                'description' => 'Cuentas de clientes'
            ],
        );
        TipoServicioModel::firstOrCreate(
            [
                'name' => 'Entrenador',
                'description' => 'Cuentas de entrenadores'
            ],
        );
        TipoServicioModel::firstOrCreate(
            [
                'name' => 'Hospedaje',
                'description' => 'Cuentas de hospedaje'
            ],
        );
    }
}
