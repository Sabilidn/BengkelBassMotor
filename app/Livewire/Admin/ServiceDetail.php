<?php

namespace App\Livewire\Admin;

use App\Models\Service;
use App\Models\User;
use Livewire\Component;

class ServiceDetail extends Component
{
    public $service;

    public $motor_model;
    public $problem_description;
    public $status;
    public $price;
    public $mechanic_id;
    public $mechanics;

    public function mount($id)
    {
        // Ambil data service beserta relasi user & mechanic
        $this->service = Service::with(['user', 'mechanic'])->findOrFail($id);

        // Inisialisasi properti untuk form
        $this->motor_model = $this->service->motor_model;
        $this->problem_description = $this->service->problem_description;
        $this->status = $this->service->status;
        $this->price = $this->service->price;
        $this->mechanic_id = $this->service->mechanic_id;

        // Ambil daftar mekanik untuk dropdown
        $this->mechanics = User::where('role', 'mechanic')->get();
    }

   public function updateService()
{
    $this->validate([
        'motor_model' => 'required|string',
        'problem_description' => 'required|string',
        'status' => 'required|string',
        'price' => 'nullable|numeric',
        'mechanic_id' => 'nullable|exists:users,id',
    ]);

    $this->service->update([
        'motor_model' => $this->motor_model,
        'problem_description' => $this->problem_description,
        'status' => $this->status,
        'price' => $this->price,
        'mechanic_id' => $this->mechanic_id,
    ]);

    session()->flash('success', 'Data servis berhasil diperbarui!');
}


    public function render()
    {
        return view('livewire.admin.service-detail');
    }
}
