<div class="min-h-screen bg-gradient-to-br from-backpurple via-backblack to-backrose py-8 px-4 flex items-center">
    <div class="container mx-auto max-w-2xl">
        
        <div class="bg-backblack/50 border border-white/10 rounded-xl p-6 md:p-8">
            
            <h1 class="text-4xl font-bold mb-8 bg-gradient-to-r from-rosefirst via-purplesecond to-bluelast bg-clip-text text-transparent text-center">
                Fin du jeu
            </h1>

            <!-- Score en gros -->
            <div class="text-center mb-8">
                <p class="text-palepurple mb-2">Score final</p>
                <p class="text-5xl font-bold text-white">{{ $total_score }} pts</p>
                <p class="text-palepurple mt-2">{{ $total_songs - $songs_lost }} / {{ $total_songs }} chansons réussies</p>
            </div>

            <!-- Messages -->
            <div class="mb-8">
                @if($is_guest)
                    <div class="bg-yellow-500/10 border border-yellow-500/30 rounded-lg p-4 mb-4">
                        <p class="text-white text-center">Score non sauvegardé - Jouez connecté pour garder vos records !</p>
                        <div class="flex gap-3 mt-3">
                            <a href="/login" class="flex-1 bg-gradient-to-r from-rosefirst to-purplesecond text-white font-bold py-2 rounded text-center text-sm">
                                Connexion
                            </a>
                            <a href="/register" class="flex-1 border border-white/30 text-white font-bold py-2 rounded text-center text-sm">
                                Inscription
                            </a>
                        </div>
                    </div>
                @else
                    @if($new_highscore)
                        <div class="bg-green-500/10 border border-green-500/30 rounded-lg p-4 mb-4">
                            <p class="text-white text-center font-bold">🎉 Nouveau record personnel !</p>
                        </div>
                    @else
                        <div class="bg-purplesecond/10 border border-purplesecond/30 rounded-lg p-4 mb-4">
                            <p class="text-white text-center">Essayez à nouveau pour battre votre record !</p>
                        </div>
                    @endif
                @endif
            </div>

            <!-- Boutons -->
            <div class="grid grid-cols-1 gap-3">
                <button wire:click="Rejouer" 
                        class="bg-gradient-to-r from-rosefirst to-purplesecond text-white font-bold py-3 rounded-lg">
                    Rejouer
                </button>
                <button wire:click="Classement" 
                        class="bg-gradient-to-r from-purplesecond to-bluelast text-white font-bold py-3 rounded-lg">
                    Classement
                </button>
                <button wire:click="Accueil" 
                        class="border border-white/30 text-white font-bold py-3 rounded-lg">
                    Accueil
                </button>
            </div>

        </div>

    </div>
</div>