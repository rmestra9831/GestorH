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
            'name' => 'matematicas 1',
            'color' => 'red',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('materias')->insert([
            'name' => 'sociales',
            'color' => 'blue',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('materias')->insert([
            'name' => 'fisica',
            'color' => 'green',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('materias')->insert([
            'name' => 'español',
            'color' => 'grey',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('materias')->insert([
            'name' => 'biologia',
            'color' => 'yellow',
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
