<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TrainingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * 
     * @return void
     */
    public function run()
    {
        DB::table('trainings')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'PHP Basics',
                'description' => 'Learn the basics of PHP programming language',
                'date' => '2023-03-20',
                'start_time' => '13:57:53',
                'end_time' => '13:57:53',
                'available_slots' => 8,
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Laravel Framework',
                'description' => 'Learn the basics of Laravel framework',
                'date' => '2023-03-22',
                'start_time' => '13:58:53',
                'end_time' => '14:59:53',
                'available_slots' => 10,
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'React for Beginners',
                'description' => 'Learn the basics of React library',
                'date' => '2023-03-23',
                'start_time' => '15:57:53',
                'end_time' => '16:57:53',
                'available_slots' => 4,
            ),
        ));

        $this->command->info('Información de prueba de la tabla trainings OK');
    }
}
