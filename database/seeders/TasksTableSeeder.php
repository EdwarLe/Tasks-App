<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Task;

class TasksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Task::create([
            'title' => 'Task 1',
            'description' => 'La tarea es desarrollar...',
            'attachment' => 'arl.jpg',
            'user_id' => 1,
            'asigned_to' => 2
        ]);

        Task::create([
            'title' => 'Task 2',
            'description' => 'La tarea es crear...',
            'attachment' => 'ar2.jpg',
            'user_id' => 1,
            'asigned_to' => 3
        ]);

        Task::create([
            'title' => 'Task 3',
            'description' => 'La tarea es montar...',
            'attachment' => 'ar3.jpg',
            'user_id' => 1,
            'asigned_to' => 4
        ]);

        Task::create([
            'title' => 'Task 4',
            'description' => 'La tarea es ejecutar...',
            'attachment' => 'ar4.jpg',
            'user_id' => 1,
            'asigned_to' => 2
        ]);
    }
}
