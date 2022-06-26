<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Navbar;

class NavbarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $links = [
            [
                'name' => 'Home',
                'route' => 'dashboard',
                'ordering' => 1,
            ],
            [
                'name' => 'Products',
                'route' => 'products.index',
                'ordering' => 2,
            ],
            [
                'name' => 'Users',
                'route' => 'users.index',
                'ordering' => 3,
            ]
        ];

        foreach ($links as $key => $navbar) {
            Navbar::create($navbar);
        }
    }
}
