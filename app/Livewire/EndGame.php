<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class EndGame extends Component
{

    public $total_score = 0;
    public $songs_lost = 0;
    public $total_songs = 0;     
    public $high_score = 0;
    public $new_highscore = false;

    public $is_guest = false;

    public function mount()
    {
        $data = session('endgame_data', [
            'total_score' => 0,
            'songs_lost' => 0,
            'total_songs' => 2,
        ]);

        $this->total_score = $data['total_score'];
        $this->songs_lost = $data['songs_lost'];
        $this->total_songs = $data['total_songs'];

        $this->HighScore();
    }

    public function HighScore()
    {
        $user = Auth::user();

        if ($user) {
            $current_highscore = $user->high_score ?? 0;
            $this->high_score = $current_highscore;

            if ($this->total_score > $current_highscore) {
                $this->new_highscore = true;
                $user->update(['high_score' => $this->total_score, 'high_score_date' => now()]);
                $this->high_score = $this->total_score;
            }
        }
        else {
            $this->is_guest = true;
        }
    }
    public function Rejouer()
    {
        return redirect()->route('game');
    }

    public function Accueil()
    {
        return redirect()->route('home');
    }

    public function Classement()
    {
        return redirect()->route('leaderboard');
    }
    public function render()
    {
        return view('livewire.end-game');
    }
}
