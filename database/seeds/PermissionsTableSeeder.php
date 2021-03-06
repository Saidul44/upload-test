<?php

use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('permissions')->insert([
            [
                'name' => 'view'
            ],
            [
                'name' => 'update'
            ],
            [
                'name' => 'delete'
            ],
        ]);
    }
}
