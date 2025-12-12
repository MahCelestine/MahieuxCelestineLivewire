<div>
    <div class="m-auto text-center w-full max-w-6xl sm:px-10 lg:px-8 py-8 md:py-20">
    <h1 class="text-white text-3xl md:text-6xl font-extrabold leading-tight mb-4 mt-30">Maîtrisez le Royaume de la musique.</h1>
    <h1 class="text-3xl md:text-6xl font-extrabold leading-tight bg-gradient-to-r from-rosefirst via-purplesecond to-bluelast bg-clip-text text-transparent mb-8">
        Votre expertise musicale sera votre arme.
    </h1>
    <h2 class="text-palepurple text-sm md:text-lg mb-6 md:mb-8 mt-2 max-w-3xl mx-auto px-4">
        À vous de jouer. Identifiez chansons et artistes à la première note, défiez une communauté mondiale et
        inscrivez votre nom au palmarès des légendes. L'ultime test d'oreille et de culture.
    </h2>
    
    <div class="flex flex-col items-center gap-6">
        <a href="/game" class="relative bg-gradient-to-r from-rosefirst to-purplesecond text-white px-10 py-4 md:px-12 md:py-5 rounded-lg font-bold text-lg transition-all duration-300 transform hover:scale-105 w-full max-w-xs sm:max-w-sm md:max-w-md ">COMMENCER À JOUER</a>
        <a href="/rules" class="text-palepurple transition duration-300 font-medium text-lg border-b-2 border-transparent hover:border-palepurple pb-1">Voir les règles</a>
    </div>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 max-w-4xl mx-auto mt-30 pb-30">
        <div class="flex flex-col items-center text-center">
            <i class='bx bx-music text-rosefirst bg-backrose text-4xl p-2 rounded-lg'></i>
            <h3 class="text-white mt-2">{{ \App\Models\KpopSong::count() }} chansons</h3>
            <p class="text-palepurple">Des classiques aux derniers hits</p>
        </div>
        <div class="flex flex-col items-center text-center">
            <i class='bx bx-headphone text-rosefirst bg-backrose text-4xl p-2 rounded-lg'></i>
            <h3 class="text-white mt-2">Défi Audio</h3>
            <p class="text-palepurple">Testez votre oreille musicale</p>
        </div>
        <div class="flex flex-col items-center text-center">
            <i class='bx bx-star text-rosefirst bg-backrose text-4xl p-2 rounded-lg'></i>
            <h3 class="text-white mt-2">Classement</h3>
            <p class="text-palepurple">Affrontez les meilleurs joueurs</p>
        </div>
    </div>
</div>