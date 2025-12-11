<div class="p-8 mx-auto max-w-5x1 pb-30">

    @if($is_connected && $user_high_score > 0)
        <h1 class="text-4xl md:text-5xl font-bold text-white text-center mb-15 mt-10">Votre position</h1>
        <table class="w-full mb-15">
            <thead>
                <tr class="border-b border-white/20">
                    <th class="py-4 px-4 text-white font-bold text-lg">Rang</th>
                    <th class="py-4 px-4 text-white font-bold text-lg">Joueur</th>
                    <th class="py-4 px-4 text-white font-bold text-lg">Score</th>
                    <th class="py-4 px-4 text-white font-bold text-lg">Date</th>
                </tr>
            </thead>
            <tbody>
                <tr class="border-b border-white/5 text-lg text-palepurple font-bold">
                    <td class="text-center py-4 px-4">{{ $user_rank }}</td>
                    <td class="text-center py-4 px-4">{{ $user_name }}</td>
                    <td class="text-center py-4 px-4">{{ $user_high_score }}</td>
                    <td class="text-center py-4 px-4">{{ $user_high_score }}</td>
                </tr>
            </tbody>
        </table>
    @elseif($is_connected)
        <p class="text-3xl md:text-4xl text-white mb-15 mt-10 text-center">Vous n'avez pas encore de score enregistré</p>
    @elseif(!$is_connected)
        <p class="text-3xl md:text-4xl text-white mb-15 mt-10 text-center">Connectez-vous pour voir votre position dans le classement</p>
    @endif
    <h1 class="text-4xl md:text-5xl font-bold text-white text-center mb-15 mt-10">TOP 50</h1>

    @if($leaderboard->count() > 0)
        <table class="w-full">
            <thead>
                <tr class="border-b border-white/20">
                    <th class="py-4 px-4 text-white font-bold text-lg">Rang</th>
                    <th class="py-4 px-4 text-white font-bold text-lg">Joueur</th>
                    <th class="py-4 px-4 text-white font-bold text-lg">Score</th>
                    <th class="py-4 px-4 text-white font-bold text-lg">Date</th>
                </tr>
            </thead>
            <tbody>
                @foreach($leaderboard as $index => $user)
                    <tr class="border-b border-white/5 text-lg text-palepurple font-bold">
                        <td class="text-center py-4 px-4">{{ $index + 1 }}</td>
                        <td class="text-center py-4 px-4">{{ $user->name}}</td>
                        <td class="text-center py-4 px-4">{{ $user->high_score }}</td>
                        <td class="text-center py-4 px-4">
                            @if($user->high_score_date)
                                {{ $user->high_score_date->format('d/m/Y H:i') }}
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif

    
</div>