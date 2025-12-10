<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Profil extends Component
{
    public $user;
    public $highScore;
public $games_played;

    public function mount()
    {
        $this->user = Auth::user();
        $this->high_score = $this->user->high_score ?? 0;
        $this->games_played = $this->user->games_played ?? 0;
    }

    public function render()
    {
        return view('livewire.profil');
    }
}
