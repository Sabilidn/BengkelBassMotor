<?php

namespace App\Livewire\Mechanic;

use Livewire\Component;
use App\Models\Service;
use Illuminate\Support\Facades\Auth;

class ServiceDetail extends Component
{
    public $service;
    public $status;
    public $price;

    public function mount($id)
    {
        $mechanicId = Auth::id();

        $this->service = Service::where('id', $id)
            ->where('mechanic_id', $mechanicId)
            ->firstOrFail();

        $this->status = $this->service->status;
        $this->price = $this->service->price;
    }

    public function updateService()
    {
        $this->service->update([
            'status' => $this->status,
            'price' => $this->price,
        ]);

        session()->flash('success', 'Servis berhasil diperbarui!');
    }

    public function render()
    {
        return view('livewire.mechanic.service-detail');
    }
}
