<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class LeaderboardPage extends Component
{
    public $leaderboard = [];
    public $is_connected = false;
    public $user_rank = null;
    public $user_name = "";
    public $user_high_score = 0;

    public function mount()
    {
        $this->ResultLeaderboard();
    }

    public function ResultLeaderboard()
    {
        $user = Auth::user();

        $all_users = User::whereNotNull('high_score')
            ->where('high_score', '>', 0)
            ->orderByDesc('high_score')
            ->orderBy('high_score_date')
            ->get(['id', 'name', 'high_score']);

        $this->leaderboard = $all_users->take(100);
        
        if ($user) {
            $this->is_connected = true; 
            $this->user_high_score = $user->high_score ?? 0;
            $this->user_name = $user->name;

            if($this->user_high_score > 0) {
                $rank=1;
                foreach ($all_users as $player) {
                    if ($player->id == $user->id) {
                        $this->user_rank = $rank;
                        break;
                    }
                    $rank++;
                }
            }
        }
    }

    public function render()
    {
        return view('livewire.leaderboard-page');
    }
}
