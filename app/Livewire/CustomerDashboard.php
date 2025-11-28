<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Service;
use Illuminate\Support\Facades\Auth;

class CustomerDashboard extends Component
{
    public $myBookings;

   public $myServices;

    public function mount()
    {
        $this->myServices = Service::where('user_id', Auth::id())
            ->latest()
            ->take(5) 
            ->get();
    }


    public function render()
    {
        return view('livewire.customer-dashboard');
    }
}

