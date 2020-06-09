<?php

use Illuminate\Database\Seeder;

class MateriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('materias')->insert([
            'name' => 'Matematicas 1',
            'color' => 'red',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('materias')->insert([
            'name' => 'Sociales',
            'color' => 'blue',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('materias')->insert([
            'name' => 'Fisica',
            'color' => 'green',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('materias')->insert([
            'name' => 'Español',
            'color' => 'grey',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('materias')->insert([
            'name' => 'Biologia',
            'color' => 'yellow',
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
