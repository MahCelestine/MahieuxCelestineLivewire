<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>{{ $title ?? 'Page Title' }}</title>
</head>

<body>
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
    <div class="bg-gradient-to-br from-backpurple via-backblack to-backrose">
        {{ $slot }}
    </div>
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
</footer>
</body>

</html>