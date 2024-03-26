<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Comment;

class CommentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Comment::create([
            'comment' => 'Tienes que cambiar...',
            'attachment' => 'afr1.png',
            'task_id' => 1,
            'user_id' => 1
        ]);

        Comment::create([
            'comment' => 'Tienes que ejecutar...',
            'attachment' => 'afr2.png',
            'task_id' => 2,
            'user_id' => 1
        ]);

        Comment::create([
            'comment' => 'Tienes que establecer...',
            'attachment' => 'afr3.png',
            'task_id' => 3,
            'user_id' => 2
        ]);

        Comment::create([
            'comment' => 'Tienes que covnertir...',
            'attachment' => 'afr4.png',
            'task_id' => 2,
            'user_id' => 2
        ]);

        Comment::create([
            'comment' => 'Tienes que covnertir...',
            'attachment' => 'afr4.png',
            'task_id' => 4,
            'user_id' => 3
        ]);

        Comment::create([
            'comment' => 'Tienes que covnertir...',
            'attachment' => 'afr4.png',
            'task_id' => 4,
            'user_id' => 2
        ]);

        Comment::create([
            'comment' => 'Tienes que covnertir...',
            'attachment' => 'afr4.png',
            'task_id' => 2,
            'user_id' => 4
        ]);
    }
}
