<?php

namespace App\Livewire\Customer;

use Livewire\Component;
use App\Models\Service;
use Illuminate\Support\Facades\Auth;

class Services extends Component
{
    public $activeServices = [];
    public $historyServices = [];
    public $motor_model;
    public $problem_description;
    public $tanggal;

    public function submitBooking()
    {
        $this->validate([
            'motor_model' => 'required|string',
            'problem_description' => 'required|string',
            'tanggal' => 'required|date'
        ]);

        Service::create([
            'user_id' => Auth::id(),
            'motor_model' => $this->motor_model,
            'problem_description' => $this->problem_description,
            'requested_date' => $this->tanggal,
            'status' => 'in_progress', 
            'price' => 0
        ]);

        $this->reset(['motor_model', 'problem_description', 'tanggal']);

        session()->flash('success', 'Booking servis berhasil dibuat!');
    }

    public function mount()
    {
        $userId = Auth::id();

        $this->activeServices = Service::with('mechanic')
            ->where('user_id', $userId)
            ->where('status', '!=', 'selesai')
            ->latest()
            ->get();

        // Riwayat servis (status selesai)
        $this->historyServices = Service::with('mechanic')
            ->where('user_id', $userId)
            ->where('status', 'selesai')
            ->latest()
            ->get();
    }

    public function render()
{
    $services = Service::where('user_id', Auth::id())
        ->orderBy('created_at', 'desc')
        ->get();

    return view('livewire.customer.services', [
        'services' => $services,
        'activeServices' => $this->activeServices,
        'historyServices' => $this->historyServices,
    ]);
}

}
