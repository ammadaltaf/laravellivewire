<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
class Logout extends Component
{
    public function logout(){
        Auth::logout();
        return $this->js('Livewire.navigate("/login")');
    }
    public function render()
    {
        return view('livewire.logout');
    }
}
