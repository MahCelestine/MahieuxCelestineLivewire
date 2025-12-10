<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>{{ $title ?? 'Page Title' }}</title>
</head>

<body class="min-h-screen flex flex-col">
    <nav class="bg-backblack text-palepurple">
        <div class="container mx-auto flex justify-between items-center py-4 px-4 md:px-8 lg:px-16">
            <!-- Logo complet -->
            <a href="/" class="bg-gradient-to-r from-rosefirst via-purplesecond to-bluelast bg-clip-text text-transparent font-bold hover:scale-105 transition-all duration-300 text-xl md:text-2xl">
                Blind test
            </a>
            
            <!-- Menu desktop (visible sur md et plus) -->
            <div class="hidden md:flex items-center gap-6 lg:gap-8">
                <a href="/game" class="hover:text-rosefirst hover:border-rosefirst border-b-2 border-transparent transition-all duration-300 font-semibold">Game</a>
                <a href="/leaderboard" class="hover:text-rosefirst hover:border-rosefirst border-b-2 border-transparent transition-all duration-300 font-semibold">Leaderboard</a>
                <a href="/rules" class="hover:text-rosefirst hover:border-rosefirst border-b-2 border-transparent transition-all duration-300 font-semibold">Rules</a>
                @auth
                    <a href="/profil" class="hover:text-rosefirst hover:border-rosefirst border-b-2 border-transparent transition-all duration-300 font-semibold">Profil</a>
                    <form method="POST" action="{{ route('logout') }}" class="inline">
                        @csrf
                        <button type="submit" class="bg-gradient-to-r from-rosefirst to-purplesecond text-white rounded-lg font-semibold transition-all duration-300 transform hover:scale-105 hover:shadow-lg py-2 px-4">
                            Déconnexion
                        </button>
                    </form>
                @else
                    <div class="flex items-center gap-4 border-l border-white/20 pl-4">
                        <a href="/login" class="bg-gradient-to-r from-rosefirst to-purplesecond text-white rounded-lg font-semibold transition-all duration-300 transform hover:scale-105 hover:shadow-lg py-2 px-4">Login</a>
                        <a href="/register" class="bg-gradient-to-r from-rosefirst to-purplesecond text-white rounded-lg font-semibold transition-all duration-300 transform hover:scale-105 hover:shadow-lg py-2 px-4">
                            Register
                        </a>
                    </div>
                @endauth
            </div>
            
            <!-- Bouton menu mobile (visible uniquement sur mobile) -->
            <button id="mobile-menu-button" class="md:hidden text-2xl text-palepurple hover:text-rosefirst transition-colors">
                <i class='bx bx-menu'></i>
            </button>
        </div>
        
        <!-- Menu mobile (dropdown) -->
        <div id="mobile-menu" class="md:hidden bg-backblack/95 backdrop-blur-lg border-t border-white/10 py-4 px-4 hidden">
            <div class="flex flex-col gap-4">
                <a href="/game" class="hover:text-rosefirst transition-all duration-300 font-semibold py-2 border-b border-white/10">Game</a>
                <a href="/leaderboard" class="hover:text-rosefirst transition-all duration-300 font-semibold py-2 border-b border-white/10">Leaderboard</a>
                <a href="/rules" class="hover:text-rosefirst transition-all duration-300 font-semibold py-2 border-b border-white/10">Rules</a>
                
                @auth
                    <a href="/profil" class="hover:text-rosefirst transition-all duration-300 font-semibold py-2 border-b border-white/10">Profil</a>
                    <form method="POST" action="{{ route('logout') }}" class="pt-2">
                        @csrf
                        <button type="submit" class="w-full bg-gradient-to-r from-rosefirst to-purplesecond hover:from-purplesecond hover:to-rosefirst text-white rounded-lg font-semibold transition-all duration-300 transform hover:scale-105 py-3 px-4">
                            Déconnexion
                        </button>
                    </form>
                @else
                    <div class="flex flex-col gap-3 pt-2 border-t border-white/10 mt-2">
                        <a href="/login" class="bg-gradient-to-r from-rosefirst to-purplesecond hover:from-purplesecond hover:to-rosefirst text-white rounded-lg font-semibold transition-all duration-300 transform hover:scale-105 py-3 px-4 text-center">Login</a>
                        <a href="/register" class="bg-gradient-to-r from-rosefirst to-purplesecond hover:from-purplesecond hover:to-rosefirst text-white rounded-lg font-semibold transition-all duration-300 transform hover:scale-105 py-3 px-4 text-center">
                            Register
                        </a>
                    </div>
                @endauth
            </div>
        </div>
    </nav>

    <!-- Contenu principal -->
    <main class="flex-grow bg-gradient-to-br from-backpurple via-backblack to-backrose py-8 px-4">
        <div class="container mx-auto max-w-md">
            <!-- Carte d'inscription -->
            <div class="bg-backblack/50 border border-white/10 rounded-xl p-6 md:p-8">
                
                <!-- Titre -->
                <div class="text-center mb-8">
                    <h1 class="text-3xl md:text-4xl font-bold mb-4 bg-gradient-to-r from-rosefirst via-purplesecond to-bluelast bg-clip-text text-transparent">
                        Inscription
                    </h1>
                </div>

                <!-- Formulaire -->
                <form method="POST" action="{{ route('register') }}">
                    @csrf
                    
                    <!-- Affichage des erreurs -->
                    @if ($errors->any())
                        <div class="mb-6 bg-red-500/10 border border-red-500/30 rounded-lg p-4">
                            <div class="text-sm font-medium text-red-400 mb-2">
                                Erreurs :
                            </div>
                            <ul class="text-red-300 text-sm space-y-1">
                                @foreach ($errors->all() as $error)
                                    <li class="flex items-center">
                                        <i class='bx bx-error-alt mr-2'></i>
                                        {{ $error }}
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <!-- Nom complet -->
                    <div class="mb-6">
                        <label for="name" class="block text-white font-bold mb-2">
                            Nom d'utilisateur
                        </label>
                        <input id="name" name="name" type="text" required value="{{ old('name') }}"
                               class="w-full bg-backblack/70 border border-white/20 rounded-lg px-4 py-3 text-white placeholder-palepurple/50 focus:border-rosefirst focus:outline-none transition-all duration-300"
                               placeholder="Votre pseudo">
                    </div>

                    <!-- Email -->
                    <div class="mb-6">
                        <label for="email" class="block text-white font-bold mb-2">
                            Adresse Email
                        </label>
                        <input id="email" name="email" type="email" required value="{{ old('email') }}"
                               class="w-full bg-backblack/70 border border-white/20 rounded-lg px-4 py-3 text-white placeholder-palepurple/50 focus:border-purplesecond focus:outline-none transition-all duration-300"
                               placeholder="exemple@email.com">
                    </div>

                    <!-- Mot de passe -->
                    <div class="mb-6">
                        <label for="password" class="block text-white font-bold mb-2">
                            Mot de passe
                        </label>
                        <input id="password" name="password" type="password" required
                               class="w-full bg-backblack/70 border border-white/20 rounded-lg px-4 py-3 text-white placeholder-palepurple/50 focus:border-bluelast focus:outline-none transition-all duration-300"
                               placeholder="Créez un mot de passe">
                    </div>

                    <!-- Confirmation mot de passe -->
                    <div class="mb-8">
                        <label for="password_confirmation" class="block text-white font-bold mb-2">
                            Confirmer le mot de passe
                        </label>
                        <input id="password_confirmation" name="password_confirmation" type="password" required
                               class="w-full bg-backblack/70 border border-white/20 rounded-lg px-4 py-3 text-white placeholder-palepurple/50 focus:border-cyan-500 focus:outline-none transition-all duration-300"
                               placeholder="Confirmez votre mot de passe">
                    </div>

                    <!-- Bouton d'inscription -->
                    <button type="submit"
                            class="w-full bg-gradient-to-r from-rosefirst to-purplesecond hover:from-purplesecond hover:to-rosefirst text-white font-bold py-3 px-6 rounded-lg text-lg transition-all duration-300 transform hover:scale-105 mb-6">
                        S'inscrire
                    </button>

                    <!-- Lien vers connexion -->
                    <div class="text-center pt-4 border-t border-white/10">
                        <p class="text-palepurple">
                            Déjà un compte ?
                            <a href="{{ route('login') }}" 
                               class="text-rosefirst hover:text-purplesecond font-bold transition-colors duration-300 ml-1">
                                Connectez-vous ici
                            </a>
                        </p>
                    </div>
                </form>
            </div>
        </div>
    </main>

    <footer class="bg-backblack text-palepurple py-8 px-4 md:px-16 border-t border-white/10">
        <div class="max-w-7xl mx-auto">
            <div class="flex flex-col md:flex-row justify-between items-center gap-6 mb-8">
                <a href="/" class="bg-gradient-to-r from-rosefirst via-purplesecond to-bluelast bg-clip-text text-transparent font-bold text-xl md:text-2xl">Blind test</a>
                <div class="flex flex-wrap justify-center gap-4 md:gap-8">
                    <a href="/" class="hover:text-rosefirst transition-all duration-300">Home</a>
                    <a href="/game" class="hover:text-rosefirst transition-all duration-300">Game</a>
                    <a href="/leaderboard" class="hover:text-rosefirst transition-all duration-300">Leaderboard</a>
                    <a href="/rules" class="hover:text-rosefirst transition-all duration-300">Rules</a>
                    @auth
                        <a href="/profil" class="hover:text-rosefirst transition-all duration-300">Profil</a>
                    @endauth
                </div>
            </div>
            <div class="flex flex-col md:flex-row justify-between items-center gap-6 py-6 border-t border-white/10">
                <div class="text-center md:text-left">
                    <p class="text-lg font-medium mb-4">Nous contacter:</p>
                    <div class="flex justify-center md:justify-start gap-4">
                        <a href="#" class="hover:text-rosefirst p-3 transition-all duration-300 transform hover:scale-110"><i class='bx bxl-facebook text-xl'></i></a>
                        <a href="#" class="hover:text-rosefirst p-3 rounded-full transition-all duration-300 transform hover:scale-110"><i class='bx bxl-twitter text-xl'></i></a>
                        <a href="#" class="hover:text-rosefirst p-3 rounded-full transition-all duration-300 transform hover:scale-110"><i class='bx bxl-instagram text-xl'></i></a>
                    </div>
                </div>
                <div class="text-center md:text-right">
                    <p class="text-gray-400 text-sm">Projet Laravel/Livewire & Tailwind CSS</p>
                </div>
            </div>
        </div>
    </footer>

    <!-- Script pour le menu mobile -->
    <script>
        document.getElementById('mobile-menu-button').addEventListener('click', function() {
            const menu = document.getElementById('mobile-menu');
            menu.classList.toggle('hidden');
            
            // Changer l'icône
            const icon = this.querySelector('i');
            if (menu.classList.contains('hidden')) {
                icon.classList.remove('bx-x');
                icon.classList.add('bx-menu');
            } else {
                icon.classList.remove('bx-menu');
                icon.classList.add('bx-x');
            }
        });
        
        // Fermer le menu si on clique en dehors
        document.addEventListener('click', function(event) {
            const menu = document.getElementById('mobile-menu');
            const button = document.getElementById('mobile-menu-button');
            
            if (!menu.contains(event.target) && !button.contains(event.target)) {
                menu.classList.add('hidden');
                const icon = button.querySelector('i');
                icon.classList.remove('bx-x');
                icon.classList.add('bx-menu');
            }
        });
    </script>
</body>
</html>