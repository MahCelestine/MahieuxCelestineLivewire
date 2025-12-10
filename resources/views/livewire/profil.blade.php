<div class="min-h-screen bg-gradient-to-br from-backpurple via-backblack to-backrose py-12 px-4">
    <div class="container mx-auto max-w-3xl">
        
        <!-- Titre principal -->
        <div class="text-center mb-12">
            <h1 class="text-4xl md:text-5xl font-bold mb-6 bg-gradient-to-r from-rosefirst via-purplesecond to-bluelast bg-clip-text text-transparent">
                Mon Profil
            </h1>
        </div>

        <!-- Section informations du compte -->
        <div class="bg-backblack/50 border border-white/10 rounded-xl p-6 md:p-8 mb-12">
            
            <div class="space-y-6">
                
                <!-- Nom -->
                <div class="flex flex-col md:flex-row md:items-center justify-between py-4">
                    <div class="mb-3 md:mb-0">
                        <div class="flex items-center mb-2">
                            <div class="w-10 h-10 rounded-lg bg-gradient-to-r from-rosefirst/20 to-rosefirst/5 flex items-center justify-center mr-4">
                                <i class='bx bx-user text-lg text-rosefirst'></i>
                            </div>
                            <div>
                                <h4 class="text-lg font-bold text-white">
                                    Nom d'utilisateur
                                </h4>
                            </div>
                        </div>
                    </div>
                    <div class="text-left md:text-right">
                        <p class="text-lg font-bold text-white break-words">
                            {{ $user->name }}
                        </p>
                    </div>
                </div>

                <!-- Email -->
                <div class="flex flex-col md:flex-row md:items-center justify-between py-4 border-t border-white/5">
                    <div class="mb-3 md:mb-0">
                        <div class="flex items-center mb-2">
                            <div class="w-10 h-10 rounded-lg bg-gradient-to-r from-purplesecond/20 to-purplesecond/5 flex items-center justify-center mr-4">
                                <i class='bx bx-envelope text-lg text-purplesecond'></i>
                            </div>
                            <div>
                                <h4 class="text-lg font-bold text-white">
                                    Adresse email
                                </h4>
                            </div>
                        </div>
                    </div>
                    <div class="text-left md:text-right">
                        <p class="text-lg font-bold text-white break-words">
                            {{ $user->email }}
                        </p>
                    </div>
                </div>

                <!-- Date d'inscription -->
                <div class="flex flex-col md:flex-row md:items-center justify-between py-4 border-t border-white/5">
                    <div class="mb-3 md:mb-0">
                        <div class="flex items-center mb-2">
                            <div class="w-10 h-10 rounded-lg bg-gradient-to-r from-bluelast/20 to-bluelast/5 flex items-center justify-center mr-4">
                                <i class='bx bx-calendar text-lg text-bluelast'></i>
                            </div>
                            <div>
                                <h4 class="text-lg font-bold text-white">
                                    Date d'inscription
                                </h4>
                            </div>
                        </div>
                    </div>
                    <div class="text-left md:text-right">
                        <p class="text-lg font-bold text-white">
                            {{ $user->created_at->format('d/m/Y') }}
                        </p>
                    </div>
                </div>

            </div>
        </div>

        <!-- Cartes des statistiques -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-12">
            
            <!-- Highscore -->
            <div class="bg-backblack/50 border border-rosefirst/30 rounded-xl p-6 text-center">
                <div class="w-14 h-14 mx-auto mb-4 rounded-full bg-gradient-to-r from-rosefirst/20 to-rosefirst/5 flex items-center justify-center">
                    <i class='bx bx-trophy text-xl text-rosefirst'></i>
                </div>
                <h3 class="text-lg font-bold mb-4 text-white">
                    Highscore
                </h3>
                <p class="text-4xl font-bold bg-gradient-to-r from-rosefirst to-rosefirst/80 bg-clip-text text-transparent mb-2">
                    {{ $user->high_score ?? 0 }}
                </p>
                <p class="text-palepurple text-sm">
                    points
                </p>
            </div>

            <!-- Parties jouées -->
            <div class="bg-backblack/50 border border-purplesecond/30 rounded-xl p-6 text-center">
                <div class="w-14 h-14 mx-auto mb-4 rounded-full bg-gradient-to-r from-purplesecond/20 to-purplesecond/5 flex items-center justify-center">
                    <i class='bx bx-game text-xl text-purplesecond'></i>
                </div>
                <h3 class="text-lg font-bold mb-4 text-white">
                    Parties jouées
                </h3>
                <p class="text-4xl font-bold bg-gradient-to-r from-purplesecond to-purplesecond/80 bg-clip-text text-transparent mb-2">
                    {{ $user->games_played ?? 0 }}
                </p>
                <p class="text-palepurple text-sm">
                    parties
                </p>
            </div>

        </div>

        <!-- Boutons -->
        <div class="flex flex-col sm:flex-row gap-6">
            
            <!-- Bouton Jouer (rose/violet) -->
            <a href="/game" 
               class="flex-1 bg-gradient-to-r from-rosefirst to-purplesecond text-white font-bold py-4 px-6 rounded-lg text-center text-lg transition-all duration-300 transform hover:scale-105">
                Jouer maintenant
            </a>

            <!-- Bouton Classement (violet/bleu) -->
            <a href="/leaderboard" 
               class="flex-1 bg-gradient-to-r from-purplesecond to-bluelast text-white font-bold py-4 px-6 rounded-lg text-center text-lg transition-all duration-300 transform hover:scale-105">
                Voir le classement
            </a>

        </div>
    </div>
</div>