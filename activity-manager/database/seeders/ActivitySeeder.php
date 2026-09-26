<?php

namespace Database\Seeders;

use App\Models\Activity;
use Illuminate\Database\Seeder;

class ActivitySeeder extends Seeder
{
    public function run(): void
    {
        Activity::query()->insert([
            [
                'title' => 'Workshop Git Dasar',
                'description' => 'Latihan kolaborasi repository.',
                'activity_date' => '2026-10-05',
                'category' => 'Workshop',
                'status' => 'Planned',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Seminar Web Quality',
                'description' => 'Pengenalan maintainability dan testing.',
                'activity_date' => '2026-10-12',
                'category' => 'Seminar',
                'status' => 'Planned',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Pengembangan Feature Activity',
                'description' => 'Implementasi CRUD sederhana.',
                'activity_date' => '2026-10-15',
                'category' => 'Tugas',
                'status' => 'Ongoing',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Evaluasi Sprint 1',
                'description' => 'Review hasil pengerjaan minggu pertama.',
                'activity_date' => '2026-10-20',
                'category' => 'Evaluasi',
                'status' => 'Done',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Penyusunan Laporan Proyek',
                'description' => 'Melengkapi dokumen pendukung.',
                'activity_date' => '2026-10-25',
                'category' => 'Tugas',
                'status' => 'Planned',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
