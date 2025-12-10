<?php

namespace App\Livewire;

use App\Models\KpopSong;
use Livewire\Component;

class GamePage extends Component
{
    ////!\ Song pour le global du jeu, music pour le tour actuel /!\\\

    //Liste des music à jouer
    public $songs_list = [];

    //Tout sur index musique jouée
    public $current_song_index = 0;
    public $total_songs = 10;

    //Etat pour playing musique
    public $isPlaying = false;

    //Nombre d'écoute
    public $nbPlays = 0;

    //Vie
    public $lives = 5;
    public $songs_lost = 0;

    //Tout sur le score/ temps associé
    public $pointsByLevels = [
        1 => 50, //0.5s
        2 => 40, //1s
        3 => 20, //3s
        4 => 10, //5s
        5 => 5,  //10s
    ];
    public $time_levels = [
        1 => 0.5,
        2 => 1,
        3 => 3,
        4 => 5,
        5 => 10,
    ];
    public $historical_level = [];
    public $current_level = 1;
    public $total_score = 0;
    public $current_score = 0;

    //Infos musique actuelle
    public $current_music = null;

    //Réponses utilisateur
    public $title_user = "";
    public $artist_user = "";
    public $album_user = "";
    public $year_user = "";

    //Stocker ou sont les bonnes réponses
    public $bonnes_reponses = [0, 0, 0, 0];
    //Loser
    public $game_over_music = false;

    public $end_game = false;

    public function mount()
    {
        $this->StartNewGame();
    }
    public function StartNewGame()
    {
        $this->current_song_index = 0;
        $this->lives = 5;
        $this->total_score = 0;
        $this->current_level = 1;
        $this->bonnes_reponses = [0, 0, 0, 0];

        $this->songs_list = KpopSong::inRandomOrder()->limit($this->total_songs)->get()->toArray();
        if (empty($this->songs_list)) {
            dd("Aucune chanson disponible dans la base de données.");
        }

        $this->StartNewMusic();
    }

    public function StartNewMusic()
    {
        if ($this->current_song_index >= $this->total_songs) {
            $this->EndGame();
            return;
        }

        $this->current_score = 0;
        $this->lives = 5;
        $this->current_level = 1;
        $this->nbPlays = 0;
        $this->bonnes_reponses = [0, 0, 0, 0];
        $this->historical_level = [];
        $this->game_over_music = false;
        $this->songs_lost = 0;

        $this->title_user = "";
        $this->artist_user = "";
        $this->album_user = "";
        $this->year_user = "";

        $this->current_music = $this->songs_list[$this->current_song_index];
    }

    public function PlayMusic()
    {
        $nextPlayNumber = $this->nbPlays + 1;

        if ($nextPlayNumber <= 2) {
            $levelForThisPlay = 1;
        } elseif ($nextPlayNumber <= 4) {
            $levelForThisPlay = 2;
        } elseif ($nextPlayNumber <= 6) {
            $levelForThisPlay = 3;
        } elseif ($nextPlayNumber <= 8) {
            $levelForThisPlay = 4;
        } else {
            $levelForThisPlay = 5;
        }

        $this->current_level = $levelForThisPlay;

        $audio_path = asset($this->current_music['audio_path']);
        $time_level = $this->time_levels[$this->current_level];

        $this->dispatch('play-audio', [
            'url' => $audio_path,
            'duration' => $time_level,
            'level' => $this->current_level
        ]);

        $this->isPlaying = true;

        $this->historical_level[] = [
            'play_number' => $nextPlayNumber,
            'level' => $this->current_level,
            'points_per_element' => $this->pointsByLevels[$this->current_level],
            'time' => $time_level
        ];

        $this->nbPlays = $nextPlayNumber;
    }

    public function SubmitAnswers()
    {
        $this->validate([
            'title_user' => 'nullable|string',
            'artist_user' => 'nullable|string',
            'album_user' => 'nullable|string',
            'year_user' => 'nullable|string',
        ]);

        $scoreLevel = 1;

        if ($this->nbPlays <= 2) {
            $scoreLevel = 1;
        } elseif ($this->nbPlays <= 4) {
            $scoreLevel = 2;
        } elseif ($this->nbPlays <= 6) {
            $scoreLevel = 3;
        } elseif ($this->nbPlays <= 8) {
            $scoreLevel = 4;
        } else {
            $scoreLevel = 5;
        }

        $this->pointsPerElement = $this->pointsByLevels[$scoreLevel];

        if ($this->bonnes_reponses[0] == 0) {
            if (!empty($this->title_user) && strtolower(trim($this->title_user)) === strtolower($this->current_music['title'])) {
                $this->total_score += $this->pointsPerElement;
                $this->bonnes_reponses[0] = 1;
            } elseif (!empty($this->title_user) && strtolower(trim($this->title_user)) != strtolower($this->current_music['title'])) {
                if ($this->lives > 0) {
                    $this->lives -= 1;
                }
                if ($this->total_score >= 5) {
                    $this->total_score -= 5;
                }
                $this->title_user = "";
            }
        }

        if ($this->bonnes_reponses[1] == 0) {
            if (!empty($this->artist_user) && strtolower(trim($this->artist_user)) === strtolower($this->current_music['artist'])) {
                $this->total_score += $this->pointsPerElement;
                $this->bonnes_reponses[1] = 1;
            } elseif (!empty($this->artist_user) && strtolower(trim($this->artist_user)) != strtolower($this->current_music['artist'])) {
                if ($this->lives > 0) {
                    $this->lives -= 1;
                }
                if ($this->total_score >= 5) {
                    $this->total_score -= 5;
                }
                $this->artist_user = "";
            }
        }

        if ($this->bonnes_reponses[2] == 0) {
            if (!empty($this->album_user) && strtolower(trim($this->album_user)) === strtolower($this->current_music['album'])) {
                $this->total_score += $this->pointsPerElement;
                $this->bonnes_reponses[2] = 1;
            } elseif (!empty($this->album_user) && strtolower(trim($this->album_user)) != strtolower($this->current_music['album'])) {
                if ($this->lives > 0) {
                    $this->lives -= 1;
                }
                if ($this->total_score >= 5) {
                    $this->total_score -= 5;
                }
                $this->album_user = "";
            }
        }

        if ($this->bonnes_reponses[3] == 0) {
            if (!empty($this->year_user) && strtolower(trim($this->year_user)) === strtolower($this->current_music['release_year'])) {
                $this->total_score += $this->pointsPerElement;
                $this->bonnes_reponses[3] = 1;
            } elseif (!empty($this->year_user) && strtolower(trim($this->year_user)) != strtolower($this->current_music['release_year'])) {
                if ($this->lives > 0) {
                    $this->lives -= 1;
                }
                if ($this->total_score >= 5) {
                    $this->total_score -= 5;
                }
                $this->year_user = "";
            }
        }

        if ($this->lives <= 0 && !$this->game_over_music) {
            $this->game_over_music = true;
            $this->CorrectAnswers();
            $this->dispatch('game-over-message');
            return;
        }

        if ($this->bonnes_reponses == [1, 1, 1, 1]) {
            $this->dispatch('all-correct-message');
            return;
        }
    }

    public function CorrectAnswers()
    {
        $this->songs_lost += 1;
        if ($this->bonnes_reponses[0] == 0) {
            $this->title_user = $this->current_music['title'];
            $this->bonnes_reponses[0] = 1;
        }
        if ($this->bonnes_reponses[1] == 0) {
            $this->artist_user = $this->current_music['artist'];
            $this->bonnes_reponses[1] = 1;
        }
        if ($this->bonnes_reponses[2] == 0) {
            $this->album_user = $this->current_music['album'];
            $this->bonnes_reponses[2] = 1;
        }
        if ($this->bonnes_reponses[3] == 0) {
            $this->year_user = $this->current_music['release_year'];
            $this->bonnes_reponses[3] = 1;
        }
    }

    public function NextSong()
    {
        if ($this->current_song_index + 1 > $this->total_songs) {
            $this->EndGame();
        } else {
            $this->current_song_index += 1;
            $this->StartNewMusic();
        }
    }

    public function AfterGameOver()
    {
        $this->NextSong();
    }

    public function AfterAllCorrect()
    {
        $this->NextSong();
    }

    public function EndGame()
    {
        $this->end_game = true;
        session()->flash('endgame_data', [
            'total_score' => $this->total_score,
            'songs_lost' => $this->songs_lost,
            'total_songs' => $this->total_songs,
        ]);

        if (auth()->check()) {
            auth()->user()->increment('games_played');
        }
        return redirect()->route('endgame');
    }
    public function render()
    {
        return view('livewire.game-page');
    }
}
