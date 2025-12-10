<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\KpopSong;
use Illuminate\Support\Facades\DB;

class KpopSongSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        DB::table('kpop_songs')->truncate();


        $songs = [
            // STRAY KIDS
            [
                'title' => 'CEREMONY',
                'artist' => 'StrayKids',
                'audio_path' => 'songs/straykids_ceremony.mp3',
                'album' => 'KARMA',
                'release_year' => 2025,
                'genre' => 'K-pop',
            ],
            [
                'title' => 'Chk Chk Boom',
                'artist' => 'StrayKids',
                'audio_path' => 'songs/straykids_chk_chk_boom.mp3',
                'album' => 'ATE',
                'release_year' => 2024,
                'genre' => 'K-pop',
            ],
            [
                'title' => 'S-Class',
                'artist' => 'StrayKids',
                'audio_path' => 'songs/straykids_sclass.mp3',
                'album' => '5-STAR',
                'release_year' => 2023,
                'genre' => 'K-pop',
            ],
            [
                'title' => 'MANIAC',
                'artist' => 'StrayKids',
                'audio_path' => 'songs/straykids_maniac.mp3',
                'album' => 'ODDINARY',
                'release_year' => 2022,
                'genre' => 'K-pop',
            ],
            [
                'title' => 'Thunderous',
                'artist' => 'StrayKids',
                'audio_path' => 'songs/straykids_thunderous.mp3',
                'album' => 'NOEASY',
                'release_year' => 2021,
                'genre' => 'K-pop',
            ],
            [
                'title' => 'Back Door',
                'artist' => 'StrayKids',
                'audio_path' => 'songs/straykids_back_door.mp3',
                'album' => 'IN LIFE',
                'release_year' => 2020,
                'genre' => 'K-pop',
            ],
            [
                'title' => 'MIROH',
                'artist' => 'StrayKids',
                'audio_path' => 'songs/straykids_miroh.mp3',
                'album' => 'Clé 1 : MIROH',
                'release_year' => 2019,
                'genre' => 'K-pop',
            ],
            [
                'title' => 'My Pace',
                'artist' => 'StrayKids',
                'audio_path' => 'songs/straykids_my_pace.mp3',
                'album' => 'I am WHO',
                'release_year' => 2018,
                'genre' => 'K-pop',
            ],

            // ATEEZ
            [
                'title' => 'ICE ON MY TEETH',
                'artist' => 'ATEEZ',
                'audio_path' => 'songs/ateez_ice_on_my_teeth.mp3',
                'album' => 'GOLDEN HOUR : Part.1',
                'release_year' => 2024,
                'genre' => 'K-pop',
            ],
            [
                'title' => 'HALAZIA',
                'artist' => 'ATEEZ',
                'audio_path' => 'songs/ateez_halazia.mp3',
                'album' => 'SPIN OFF : FROM THE WITNESS',
                'release_year' => 2022,
                'genre' => 'K-pop',
            ],
            [
                'title' => 'Say My Name',
                'artist' => 'ATEEZ',
                'audio_path' => 'songs/ateez_say_my_name.mp3',
                'album' => 'TREASURE EP.2 : Zero To One',
                'release_year' => 2019,
                'genre' => 'K-pop',
            ],

            //TWICE
            [
                'title' => 'SET ME FREE',
                'artist' => 'TWICE',
                'audio_path' => 'songs/twice_set_me_free.mp3',
                'album' => 'READY TO BE',
                'release_year' => 2023,
                'genre' => 'K-pop',
            ],
            [
                'title' => 'Talk that Talk',
                'artist' => 'TWICE',
                'audio_path' => 'songs/twice_talk_that_talk.mp3',
                'album' => 'BETWEEN 1&2',
                'release_year' => 2022,
                'genre' => 'K-pop',
            ],
            [
                'title' => 'What is Love?',
                'artist' => 'TWICE',
                'audio_path' => 'songs/twice_what_is_love.mp3',
                'album' => 'What is Love?',
                'release_year' => 2018,
                'genre' => 'K-pop',
            ],

            // JENNIE (BLACKPINK)
            [
                'title' => 'like JENNIE',
                'artist' => 'JENNIE',
                'audio_path' => 'songs/jennie_like_jennie.mp3',
                'album' => 'RUBY',
                'release_year' => 2025,
                'genre' => 'K-pop',
            ],

            // ENHYPEN
            [
                'title' => 'Bite Me',
                'artist' => 'ENHYPEN',
                'audio_path' => 'songs/enhypen_bite_me.mp3',
                'album' => 'DARK BLOOD',
                'release_year' => 2023,
                'genre' => 'K-pop',
            ],
            [
                'title' => 'Polaroid Love',
                'artist' => 'ENHYPEN',
                'audio_path' => 'songs/enhypen_polaroid_love.mp3',
                'album' => 'DIMENSION : ANSWER',
                'release_year' => 2022,
                'genre' => 'K-pop',
            ],

            // TXT (TOMORROW X TOGETHER)
            [
                'title' => 'Sugar Rush Ride',
                'artist' => 'TXT',
                'audio_path' => 'songs/txt_sugar_rush_ride.mp3',
                'album' => 'The Name Chapter: TEMPTATION',
                'release_year' => 2023,
                'genre' => 'K-pop',
            ],
            [
                'title' => 'Good Boy Gone Bad',
                'artist' => 'TXT',
                'audio_path' => 'songs/txt_good_boy_gone_bad.mp3',
                'album' => 'minisode 2: Thursday\'s Child',
                'release_year' => 2022,
                'genre' => 'K-pop',
            ],

            // NMIXX
            [
                'title' => 'DICE',
                'artist' => 'NMIXX',
                'audio_path' => 'songs/nmixx_dice.mp3',
                'album' => 'ENTWURF',
                'release_year' => 2022,
                'genre' => 'K-pop',
            ],
            [
                'title' => 'Love Me Like This',
                'artist' => 'NMIXX',
                'audio_path' => 'songs/nmixx_love_me_like_this.mp3',
                'album' => 'expérgo',
                'release_year' => 2023,
                'genre' => 'K-pop',
            ],

            // ITZY
            [
                'title' => 'WANNABE',
                'artist' => 'ITZY',
                'audio_path' => 'songs/itzy_wannabe.mp3',
                'album' => 'IT\'z ME',
                'release_year' => 2020,
                'genre' => 'K-pop',
            ],
            [
                'title' => 'Not Shy',
                'artist' => 'ITZY',
                'audio_path' => 'songs/itzy_not_shy.mp3',
                'album' => 'Not Shy',
                'release_year' => 2020,
                'genre' => 'K-pop',
            ],
        ];

        foreach ($songs as $song) {
            KpopSong::create($song);
        }
    }
}
