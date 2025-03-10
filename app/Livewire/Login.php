<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
class Login extends Component
{
    public $form = [
        'email'=>'',
        'password'=>''
    ];

    public function submit(){
        $this->validate([
            'form.email'=>'required|email',
            'form.password'=>'required',
        ]);
        Auth::attempt($this->form);
        // $this->redirect('/'); 
        // $this->redirectRoute('home');
        return $this->js('Livewire.navigate("/")');
    }
    public function render()
    {
        return view('livewire.login');
    }
}
