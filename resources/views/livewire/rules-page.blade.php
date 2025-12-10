<div class="min-h-screen bg-gradient-to-br from-backpurple via-backblack to-backrose py-8 px-4">
    <div class="container mx-auto max-w-5xl text-white pb-30">
        <h1 class="text-4xl md:text-5xl font-bold text-white text-center mb-10">Règles</h1>

        <div class="bg-backblack/50 border border-white/10 rounded-xl p-6 mb-8">
            <h2 class="text-2xl md:text-3xl font-bold text-white mb-6 border-b border-white/10 pb-3">Objectif du Jeu</h2>
            <p class="text-palepurple text-lg">Devinez les chansons K-pop avec précision en identifiant 4 éléments : Titre, Artiste, Album et Année. Plus vos réponses sont rapides et complètes, plus votre score sera élevé !</p>
        </div>

        <div class="bg-backblack/50 border border-white/10 rounded-xl p-6 mb-8">
            <h2 class="text-2xl md:text-3xl font-bold text-white mb-6 border-b border-white/10 pb-3">Déroulement d'une Partie</h2>

            <div class="mb-8">
                <h3 class="text-xl font-bold text-white mb-4">1. Structure du Jeu</h3>
                <ul class="text-palepurple space-y-2 ml-4">
                    <li class="flex items-start"><span class="text-rosefirst mr-2">•</span><span>10 musiques aléatoires par partie</span></li>
                    <li class="flex items-start"><span class="text-rosefirst mr-2">•</span><span>Chaque musique est indépendante avec vies réinitialisées</span></li>
                </ul>
            </div>

            <div class="mb-8">
                <h3 class="text-xl font-bold text-white mb-4">2. Système d'Écoute Progressive</h3>
                <p class="text-palepurple mb-4">Chaque chanson propose 5 niveaux d'écoute :</p>

                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead>
                            <tr class="border-b border-white/20">
                                <th class="py-4 px-4 text-white font-bold">Niveau</th>
                                <th class="py-4 px-4 text-white font-bold">Durée</th>
                                <th class="py-4 px-4 text-white font-bold">Points max par élément</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="border-b border-white/5">
                                <td class="text-center py-4 px-4 text-white font-medium">1</td>
                                <td class="text-center py-4 px-4 text-palepurple">0.5 seconde</td>
                                <td class="text-center py-4 px-4 text-green-400 font-bold">50 points</td>
                            </tr>
                            <tr class="border-b border-white/5">
                                <td class="text-center py-4 px-4 text-white font-medium">2</td>
                                <td class="text-center py-4 px-4 text-palepurple">1 seconde</td>
                                <td class="text-center py-4 px-4 text-green-300 font-bold">40 points</td>
                            </tr>
                            <tr class="border-b border-white/5">
                                <td class="text-center py-4 px-4 text-white font-medium">3</td>
                                <td class="text-center py-4 px-4 text-palepurple">3 secondes</td>
                                <td class="text-center py-4 px-4 text-yellow-400 font-bold">20 points</td>
                            </tr>
                            <tr class="border-b border-white/5">
                                <td class="text-center py-4 px-4 text-white font-medium">4</td>
                                <td class="text-center py-4 px-4 text-palepurple">5 secondes</td>
                                <td class="text-center py-4 px-4 text-orange-400 font-bold">10 points</td>
                            </tr>
                            <tr>
                                <td class="text-center py-4 px-4 text-white font-medium">5</td>
                                <td class="text-center py-4 px-4 text-palepurple">10 secondes</td>
                                <td class="text-center py-4 px-4 text-red-400 font-bold">5 points</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="mb-8">
                <h3 class="text-xl font-bold text-white mb-4">3. Ce qu'il faut deviner</h3>
                <p class="text-palepurple mb-3">Pour chaque chanson, vous devez trouver 4 éléments :</p>
                <ol class="text-palepurple space-y-2 ml-4">
                    <li class="flex items-start"><span class="text-rosefirst font-bold mr-2">1.</span><span>Le <strong class="text-white">TITRE</strong></span></li>
                    <li class="flex items-start"><span class="text-rosefirst font-bold mr-2">2.</span><span>L'<strong class="text-white">ARTISTE</strong></span></li>
                    <li class="flex items-start"><span class="text-rosefirst font-bold mr-2">3.</span><span>L'<strong class="text-white">ALBUM</strong></span></li>
                    <li class="flex items-start"><span class="text-rosefirst font-bold mr-2">4.</span><span>L'<strong class="text-white">ANNÉE</strong> de sortie</span></li>
                </ol>
            </div>
        </div>

        <div class="bg-backblack/50 border border-white/10 rounded-xl p-6 mb-8">
            <h3 class="text-xl font-bold text-white mb-6 border-b border-white/10 pb-3">4. Calcul des Points</h3>

            <div class="mb-6">
                <h4 class="text-lg font-bold text-white mb-3">Réponse PAR ÉLÉMENT :</h4>
                <ul class="text-palepurple space-y-2 ml-4">
                    <li class="flex items-start"><span class="text-rosefirst mr-2">•</span><span>Chaque élément trouvé rapporte des points indépendamment</span></li>
                    <li class="flex items-start"><span class="text-rosefirst mr-2">•</span><span>Points attribués selon le niveau d'écoute au moment de la réponse</span></li>
                </ul>
            </div>

            <div class="mb-6">
                <h4 class="text-lg font-bold text-white mb-3">Exemple de calcul :</h4>
                <ul class="text-palepurple space-y-2 ml-4">
                    <li class="flex items-start"><span class="text-rosefirst mr-2">•</span><span>Artiste deviné au niveau 1 (0.5s) = <strong class="text-green-400">50 points</strong></span></li>
                    <li class="flex items-start"><span class="text-rosefirst mr-2">•</span><span>Album et Année devinés au niveau 3 (3s) = <strong class="text-yellow-400">20 + 20 = 40 points</strong></span></li>
                    <li class="flex items-start"><span class="text-rosefirst mr-2">•</span><span>Titre deviné au niveau 4 (5s) = <strong class="text-orange-400">10 points</strong></span></li>
                    <li class="flex items-start"><span class="text-rosefirst mr-2">→</span><span class="font-bold text-white">TOTAL = 50 + 40 + 10 = 100 points</span></li>
                </ul>
            </div>

            <div class="mb-6">
                <h4 class="text-lg font-bold text-white mb-3">Score maximum par musique :</h4>
                <ul class="text-palepurple space-y-2 ml-4">
                    <li class="flex items-start"><span class="text-rosefirst mr-2">•</span><span>4 éléments × 50 points = <strong class="text-green-400">200 points maximum</strong></span></li>
                    <li class="flex items-start"><span class="text-rosefirst mr-2">•</span><span>Réponse parfaite au niveau 1 (0.5 seconde)</span></li>
                </ul>
            </div>

            <div class="mb-6">
                <h4 class="text-lg font-bold text-white mb-3">Mauvaise réponse (élément incorrect) :</h4>
                <ul class="text-palepurple space-y-2 ml-4">
                    <li class="flex items-start"><span class="text-rosefirst mr-2">•</span><span>Perte d'<strong class="text-red-400">UNE VIE</strong> (5 vies par musique)</span></li>
                    <li class="flex items-start"><span class="text-rosefirst mr-2">•</span><span><strong class="text-red-400">-5 points</strong> sur le score total</span></li>
                    <li class="flex items-start"><span class="text-rosefirst mr-2">•</span><span>Game Over pour la musique après 5 erreurs</span></li>
                </ul>
            </div>
        </div>

        <div class="bg-backblack/50 border border-white/10 rounded-xl p-6 mb-8">
            <h3 class="text-xl font-bold text-white mb-6 border-b border-white/10 pb-3">5. Système de Vies</h3>
            <ul class="text-palepurple space-y-2 ml-4">
                <li class="flex items-start"><span class="text-rosefirst mr-2">•</span><span>5 vies au début de chaque nouvelle musique</span></li>
                <li class="flex items-start"><span class="text-rosefirst mr-2">•</span><span>Vies réinitialisées à chaque nouvelle chanson</span></li>
                <li class="flex items-start"><span class="text-rosefirst mr-2">•</span><span>Une vie perdue par élément incorrect soumis</span></li>
                <li class="flex items-start"><span class="text-rosefirst mr-2">•</span><span>La musique continue tant qu'il reste des vies</span></li>
                <li class="flex items-start"><span class="text-rosefirst mr-2">•</span><span>Fin de la musique après 5 erreurs</span></li>
            </ul>
        </div>

        <div class="bg-backblack/50 border border-white/10 rounded-xl p-6 mb-8">
            <h2 class="text-2xl md:text-3xl font-bold text-white mb-6 border-b border-white/10 pb-3">Classement et Scores</h2>

            <div class="mb-6">
                <h3 class="text-xl font-bold text-white mb-4">Enregistrement des Scores</h3>
                <ul class="text-palepurple space-y-2 ml-4">
                    <li class="flex items-start"><span class="text-rosefirst mr-2">•</span><span>Score total uniquement est enregistré</span></li>
                    <li class="flex items-start"><span class="text-rosefirst mr-2">•</span><span>Pas de sauvegarde des détails par musique</span></li>
                </ul>
            </div>

            <div class="mb-6">
                <h3 class="text-xl font-bold text-white mb-4">Tableau des Records</h3>
                <ul class="text-palepurple space-y-2 ml-4">
                    <li class="flex items-start"><span class="text-rosefirst mr-2">•</span><span>Top 50 des meilleurs scores</span></li>
                    <li class="flex items-start"><span class="text-rosefirst mr-2">•</span><span>Classement par points totaux décroissants</span></li>
                    <li class="flex items-start"><span class="text-rosefirst mr-2">•</span><span>En cas d'égalité : priorité au score le plus ancien</span></li>
                </ul>
            </div>
        </div>

        <div class="bg-backblack/50 border border-white/10 rounded-xl p-6 mb-8">
            <h2 class="text-2xl md:text-3xl font-bold text-white mb-6 border-b border-white/10 pb-3">Déroulement Type d'un Tour</h2>
            <ol class="text-palepurple space-y-3 ml-4">
                <li class="flex items-start"><span class="text-rosefirst font-bold mr-2">1.</span><span>Cliquez sur "Jouer l'extrait" pour démarrer le niveau 1</span></li>
                <li class="flex items-start"><span class="text-rosefirst font-bold mr-2">2.</span><span>Écoutez attentivement pendant la durée impartie</span></li>
                <li class="flex items-start"><span class="text-rosefirst font-bold mr-2">3.</span><span>Entrez vos réponses dans les 4 champs (Titre, Artiste, Album, Année)</span></li>
                <li class="flex items-start"><span class="text-rosefirst font-bold mr-2">4.</span><span>Validez pour vérifier les réponses</span></li>
                <li class="flex items-start"><span class="text-rosefirst font-bold mr-2">5.</span><span>Continuez jusqu'à la musique suivante</span></li>
            </ol>
        </div>

        <div class="bg-backblack/50 border border-white/10 rounded-xl p-6 mb-8">
            <h2 class="text-2xl md:text-3xl font-bold text-white mb-6 border-b border-white/10 pb-3">Fin de Partie</h2>
            <p class="text-palepurple mb-4">La partie se termine lorsque :</p>
            <ul class="text-palepurple space-y-2 ml-4 mb-6">
                <li class="flex items-start"><span class="text-rosefirst mr-2">•</span><span>10 musiques ont été traitées (complétées ou échouées)</span></li>
                <li class="flex items-start"><span class="text-rosefirst mr-2">•</span><span>Vous abandonnez manuellement</span></li>
            </ul>

            <div class="mb-6">
                <h3 class="text-xl font-bold text-white mb-4">Score Final</h3>
                <ul class="text-palepurple space-y-2 ml-4">
                    <li class="flex items-start"><span class="text-rosefirst mr-2">•</span><span>Somme de tous les points gagnés sur les 10 musiques</span></li>
                    <li class="flex items-start"><span class="text-rosefirst mr-2">•</span><span>Moins les pénalités de -5 pts par erreur</span></li>
                    <li class="flex items-start"><span class="text-rosefirst mr-2">•</span><span>Score maximum théorique : <strong class="text-green-400">10 × 200 = 2000 points</strong></span></li>
                </ul>
            </div>
        </div>

        <div class="bg-gradient-to-r from-rosefirst/10 to-purplesecond/10 border border-white/20 rounded-xl p-6 mb-8">
            <h2 class="text-2xl font-bold text-white mb-4">Objectif Ultime</h2>
            <p class="text-palepurple text-lg mb-4">Atteindre les <strong class="text-green-400">2000 points</strong> avec une réponse parfaite à chaque musique au niveau 1 !</p>
            <p class="text-white text-lg font-bold">Défi : Pouvez-vous deviner Titre, Artiste, Album ET Année en seulement <span class="text-rosefirst">0.5 seconde</span> d'écoute ?</p>
        </div>

        <div class="text-center mt-12">
            <a href="/game" class="inline-block bg-gradient-to-r from-rosefirst to-purplesecond text-white font-bold py-4 px-10 rounded-lg text-lg transition-all duration-300 transform hover:scale-105">Commencer à jouer</a>
        </div>
    </div>
</div>