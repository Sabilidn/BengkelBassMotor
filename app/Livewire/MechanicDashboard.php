<?php

namespace App\Livewire;

use App\Models\Service;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class MechanicDashboard extends Component
{
    public $newNotifications = 0;

    public function render()
    {
        $mechanicId = Auth::id(); // ID mekanik yang login

        // Servis yang ditugaskan ke mekanik saat ini (belum selesai)
        $assignedServices = Service::with('user')
            ->where('mechanic_id', $mechanicId)
            ->whereIn('status', ['pending', 'in_progress'])
            ->latest()
            ->get();

        // Statistik
        $activeServices = $assignedServices->count();

        $completedServices = Service::where('mechanic_id', $mechanicId)
            ->where('status', 'completed')
            ->count();

        // Tanggal servis berikutnya
        $nextServiceDate = Service::where('mechanic_id', $mechanicId)
            ->whereIn('status', ['pending', 'in_progress'])
            ->orderBy('created_at', 'asc')
            ->value('created_at');

        // Notifikasi dummy
        $recentNotifications = [
            [
                'title' => 'Servis Baru Ditugaskan',
                'message' => 'Anda mendapatkan servis baru dari admin.',
                'time' => 'Baru saja'
            ]
        ];

        return view('livewire.mechanic-dashboard', compact(
            'assignedServices',
            'activeServices',
            'completedServices',
            'nextServiceDate',
            'recentNotifications',
        ));
    }
}
