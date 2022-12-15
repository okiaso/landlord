<?php

namespace Database\Seeders;

use App\Models\Organization;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrganizationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $organizations = [
            [
                'name' => 'Demo',
                'domain' => 'demo'
            ],
            [
                'name' => 'Example',
                'domain' => 'example.test'
            ],
        ];

        foreach ($organizations as $organization) {
            $exist = Organization::where('name', $organization['name'])->count();

            if (!$exist) {
                $tenant = Organization::create([
                    'name' => $organization['name'],
                ]);

                // dd($tenant->domains());

                if (!in_array($organization['domain'], $tenant->domains->pluck('domain')->toArray())) {
                    $tenant->domains()->create([
                        'domain' => $organization['domain'],
                    ]);
                }
            }
        }
    }
}
