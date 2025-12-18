<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Garantir que existe pelo menos um utilizador
        $user = User::first();
        
        if (!$user) {
            $user = User::create([
                'name' => 'Demo User',
                'email' => 'demo@example.com',
                'password' => bcrypt('password'),
            ]);
        }

        // Criar tarefas de exemplo
        DB::table('tasks')->insert([
            [
                'name' => 'Preparar relatório mensal',
                'description' => 'Compilar todos os dados do mês e criar relatório',
                'status' => true,
                'due_at' => '2025-12-31',
                'user_id' => $user->id,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Rever documentação',
                'description' => 'Atualizar toda a documentação do projeto',
                'status' => false,
                'due_at' => '2025-12-28',
                'user_id' => $user->id,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Implementar nova funcionalidade',
                'description' => 'Desenvolver sistema de notificações',
                'status' => false,
                'due_at' => '2026-01-15',
                'user_id' => $user->id,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Testes de integração',
                'description' => 'Executar todos os testes do sistema',
                'status' => true,
                'due_at' => '2025-12-20',
                'user_id' => $user->id,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Reunião com cliente',
                'description' => 'Apresentar progresso do projeto',
                'status' => null,
                'due_at' => '2025-12-22',
                'user_id' => $user->id,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
