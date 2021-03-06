<?php

namespace Database\Seeders;

use App\Models\Client;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class ClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $clients = [
            [
                'name' => 'Fira',
                'phone' => '081231231230',
                'address' => 'Aceh Indonesia',
            ],
            [
                'name' => 'Uwais',
                'phone' => '081231231231',
                'address' => 'Makkah Saudi Arabia',
            ],
            [
                'name' => 'Aishah',
                'phone' => '081231231232',
                'address' => 'Jeddah Saudi Arabia',
            ],
        ];

        foreach ($clients as $client) {
            Client::create($client);
        };
    }
}
