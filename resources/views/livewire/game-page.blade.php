<div class="min-h-screen bg-gradient-to-br from-backpurple via-backblack to-backrose py-8 px-4">
    <div class="container mx-auto max-w-4xl">

        <!-- En-tête avec infos de jeu -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 md:gap-6 mb-8">

            <!-- Progression -->
            <div class="bg-backblack/50 border border-rosefirst/30 rounded-xl p-4 md:p-6 text-center">
                <h3 class="text-sm md:text-base font-bold mb-1 md:mb-2 text-white">Musique</h3>
                <p class="text-2xl md:text-4xl font-bold bg-gradient-to-r from-rosefirst to-rosefirst/80 bg-clip-text text-transparent">
                    {{ $current_song_index + 1 }}/{{ $total_songs }}
                </p>
            </div>

            <!-- Vies -->
            <div class="bg-backblack/50 border border-purplesecond/30 rounded-xl p-4 md:p-6 text-center">
                <h3 class="text-sm md:text-base font-bold mb-1 md:mb-2 text-white">Vies restantes</h3>
                <p class="text-2xl md:text-4xl font-bold bg-gradient-to-r from-purplesecond to-purplesecond/80 bg-clip-text text-transparent">
                    {{ $lives }}
                </p>
            </div>

            <!-- Score -->
            <div class="bg-backblack/50 border border-bluelast/30 rounded-xl p-4 md:p-6 text-center">
                <h3 class="text-sm md:text-base font-bold mb-1 md:mb-2 text-white">Score total</h3>
                <p class="text-2xl md:text-4xl font-bold bg-gradient-to-r from-bluelast to-bluelast/80 bg-clip-text text-transparent">
                    {{ $total_score }}
                </p>
            </div>

        </div>

        <!-- Section audio avec AlpineJS -->
        <div x-data="{
    isPlaying: false,
    audioElement: null,
    
    init() {
        // Créer un élément audio caché
        this.audioElement = document.createElement('audio');
        this.audioElement.style.display = 'none';
        document.body.appendChild(this.audioElement);
        
        // Gérer les événements Livewire SIMPLEMENT
        $wire.on('play-audio', (eventData) => {
            
            // Extraire les données
            let url, duration;
            
            if (Array.isArray(eventData)) {
                // Format: [{url: '...', duration: X}]
                url = eventData[0]?.url;
                duration = eventData[0]?.duration;
            } else {
                // Format: {url: '...', duration: X}
                url = eventData.url;
                duration = eventData.duration;
            }
            
            if (url) {
                this.playSimpleAudio(url, duration);
            }
        });
    },
    
    playSimpleAudio(url, duration) {
        
        // Arrêter si en cours
        if (this.audioElement) {
            this.audioElement.pause();
            this.audioElement.currentTime = 0;
        }
        
        // Jouer avec un timeout
        this.audioElement.src = url;
        
        this.audioElement.play()
            .then(() => {
                this.isPlaying = true;
                $wire.isPlaying = true;
                
                // Arrêter après X secondes
                if (duration) {
                    setTimeout(() => {
                        this.audioElement.pause();
                        this.audioElement.currentTime = 0;
                        this.isPlaying = false;
                        $wire.isPlaying = false;
                    }, duration * 1000);
                }
            })
            .catch(error => {
                this.isPlaying = false;
                $wire.isPlaying = false;
            });
    }
}">

            <!-- Bouton Play - Centré et aligné -->
            <div class="text-center mb-8">
                <button wire:click="PlayMusic" x-bind:disabled="isPlaying"
                    class="inline-flex items-center justify-center gap-3 bg-gradient-to-r from-rosefirst to-purplesecond text-white font-bold py-4 px-8 rounded-lg text-lg md:text-xl transition-all duration-300 transform hover:scale-105 disabled:opacity-50 disabled:cursor-not-allowed min-w-[200px]">
                    
                    <!-- Logo Play/Pause aligné -->
                    <span x-show="!isPlaying">
                        <i class='bx bx-play text-2xl'></i>
                    </span>
                    <span x-show="isPlaying" x-cloak>
                        <i class='bx bx-pause text-2xl'></i>
                    </span>
                    
                    <!-- Texte du bouton -->
                    <span x-show="!isPlaying" class="whitespace-nowrap">
                        Jouer 
                        @php
                            // Calcul du prochain niveau directement
                            $nextPlay = $nbPlays + 1;
                            if ($nextPlay <= 2)
                                $nextLevel = 1;
                            elseif ($nextPlay <= 4)
                                $nextLevel = 2;
                            elseif ($nextPlay <= 4)
                                $nextLevel = 3;
                            elseif ($nextPlay <= 8)
                                $nextLevel = 4;
                            else
                                $nextLevel = 5;
                            echo $time_levels[$nextLevel] . 's';
                        @endphp
                    </span>
                    <span x-show="isPlaying" x-cloak class="whitespace-nowrap">Écoute en cours...</span>
                </button>
            </div>

            <!-- Messages de résultat -->
            <div class="mb-6">
                @if($game_over_music)
                    <div class="bg-gradient-to-r from-red-500/10 to-pink-500/10 border border-red-500/30 rounded-xl p-4 md:p-6 mb-4">
                        <h2 class="text-xl md:text-2xl font-bold mb-3 md:mb-4 text-white">Musique terminée !</h2>
                        <p class="text-palepurple mb-3 md:mb-4 text-sm md:text-base">Les réponses correctes étaient :</p>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-3 md:gap-4">
                            <div class="bg-backblack/30 rounded-lg p-3 md:p-4">
                                <p class="text-palepurple mb-1 text-sm">Titre</p>
                                <p class="text-base md:text-lg font-bold text-white">{{ $current_music['title'] }}</p>
                            </div>
                            <div class="bg-backblack/30 rounded-lg p-3 md:p-4">
                                <p class="text-palepurple mb-1 text-sm">Artiste</p>
                                <p class="text-base md:text-lg font-bold text-white">{{ $current_music['artist'] }}</p>
                            </div>
                            <div class="bg-backblack/30 rounded-lg p-3 md:p-4">
                                <p class="text-palepurple mb-1 text-sm">Album</p>
                                <p class="text-base md:text-lg font-bold text-white">{{ $current_music['album'] }}</p>
                            </div>
                            <div class="bg-backblack/30 rounded-lg p-3 md:p-4">
                                <p class="text-palepurple mb-1 text-sm">Année</p>
                                <p class="text-base md:text-lg font-bold text-white">{{ $current_music['release_year'] }}</p>
                            </div>
                        </div>
                    </div>
                @endif

                @if ($bonnes_reponses == [1, 1, 1, 1] && !$game_over_music && !$end_game)
                    <div class="bg-gradient-to-r from-green-500/10 to-emerald-500/10 border border-green-500/30 rounded-xl p-4 md:p-6 mb-4">
                        <h2 class="text-xl md:text-2xl font-bold mb-2 text-white">🎉 Félicitations !</h2>
                        <p class="text-palepurple text-sm md:text-base">Toutes vos réponses sont correctes !</p>
                    </div>
                @endif
            </div>

            <!-- Formulaire de réponses -->
            <div class="bg-backblack/50 border border-white/10 rounded-xl p-4 md:p-8">
                <form wire:submit.prevent="SubmitAnswers">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 md:gap-6 mb-6 md:mb-8">
                        
                        <!-- Titre -->
                        <div>
                            <label for="title_user" class="block text-white font-bold mb-2 text-sm md:text-base">
                                Titre de la musique
                            </label>
                            <input type="text" id="title_user" wire:model="title_user"
                                class="w-full bg-backblack/70 border border-white/20 rounded-lg px-4 py-3 text-white placeholder-palepurple/50 focus:border-rosefirst focus:outline-none transition-all duration-300 text-sm md:text-base"
                                placeholder="Entrez le titre...">

                            @if($mauvaises_reponses[0] == 1)
                                <p class="text-red-400 text-sm mt-1 flex items-center gap-1">
                                <i class='bx bx-x-circle'></i>
                                Mauvaise réponse
                                </p>
                            @endif
                        </div>

                        <!-- Artiste -->
                        <div>
                            <label for="artist_user" class="block text-white font-bold mb-2 text-sm md:text-base">
                                Artiste
                            </label>
                            <input type="text" id="artist_user" wire:model="artist_user"
                                class="w-full bg-backblack/70 border border-white/20 rounded-lg px-4 py-3 text-white placeholder-palepurple/50 focus:border-purplesecond focus:outline-none transition-all duration-300 text-sm md:text-base"
                                placeholder="Entrez l'artiste...">
                                @if($mauvaises_reponses[1] == 1)
                                <p class="text-red-400 text-sm mt-1 flex items-center gap-1">
                                <i class='bx bx-x-circle'></i>
                                Mauvaise réponse
                                </p>
                            @endif
                        </div>

                        <!-- Album -->
                        <div class="md:col-span-1">
                            <label for="album_user" class="block text-white font-bold mb-2 text-sm md:text-base">
                                Album
                            </label>
                            <input type="text" id="album_user" wire:model="album_user"
                                class="w-full bg-backblack/70 border border-white/20 rounded-lg px-4 py-3 text-white placeholder-palepurple/50 focus:border-bluelast focus:outline-none transition-all duration-300 text-sm md:text-base"
                                placeholder="Entrez l'album...">
                                @if($mauvaises_reponses[2] == 1)
                                <p class="text-red-400 text-sm mt-1 flex items-center gap-1">
                                <i class='bx bx-x-circle'></i>
                                Mauvaise réponse
                                </p>
                            @endif
                        </div>

                        <!-- Année -->
                        <div class="md:col-span-1">
                            <label for="year_user" class="block text-white font-bold mb-2 text-sm md:text-base">
                                Année de sortie
                            </label>
                            <input type="text" id="year_user" wire:model="year_user"
                                class="w-full bg-backblack/70 border border-white/20 rounded-lg px-4 py-3 text-white placeholder-palepurple/50 focus:border-cyan-500 focus:outline-none transition-all duration-300 text-sm md:text-base"
                                placeholder="Entrez l'année...">
                                @if($mauvaises_reponses[3] == 1)
                                <p class="text-red-400 text-sm mt-1 flex items-center gap-1">
                                <i class='bx bx-x-circle'></i>
                                Mauvaise réponse
                                </p>
                            @endif
                        </div>

                    </div>

                    <!-- Bouton de validation -->
                    <button type="submit"
                        class="w-full bg-gradient-to-r from-rosefirst to-purplesecond text-white font-bold py-3 md:py-4 px-6 rounded-lg text-lg md:text-xl transition-all duration-300 transform hover:scale-105">
                        Valider les réponses
                    </button>
                </form>
            </div>

        </div>

        <!-- Scripts Livewire -->
        <script>
            document.addEventListener('livewire:init', () => {
                Livewire.on('game-over-message', () => {
                    setTimeout(() => {
                        @this.call('AfterGameOver');
                    }, 3000);
                });
                Livewire.on('all-correct-message', () => {
                    setTimeout(() => {
                        @this.call('AfterAllCorrect');
                    }, 1000);
                });
            });
        </script>

    </div>
</div>