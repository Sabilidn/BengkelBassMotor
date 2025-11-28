<?php

namespace App\Livewire;

use App\Models\Service;
use App\Models\User;
use Livewire\Component;

class AdminDashboard extends Component
{
    public function render()
    {
        return view('livewire.admin-dashboard', [
            'totalCustomers' => User::where('role', 'customer')->count(),
            'totalMechanics' => User::where('role', 'mechanic')->count(),
            'totalServices' => Service::count(),
            'activeServices' => Service::where('status', '!=', 'selesai')->count(),

            // 5 servis terbaru
            'recentServices' => Service::with(['user', 'mechanic'])
                ->latest()
                ->take(5)
                ->get(),

            // notifikasi (nanti bisa diganti dengan tabel notifikasi di DB)
            'recentNotifications' => [
                [
                    'title' => 'Servis Baru',
                    'message' => 'Ada servis baru masuk.',
                    'time' => 'Baru saja'
                ]
            ],
        ]);
    }
}
