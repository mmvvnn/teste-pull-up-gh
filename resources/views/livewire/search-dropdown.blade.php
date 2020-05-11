<div x-data="{ isOpen: true }" @click.away="isOpen = false">
    <input
        wire:model.debounce.500ms="search"
        type="text"
        class="focus:outline-none focus:shadow-outline" placeholder="Digite qualquer coisa relacionado ao que voce esta procurando..."
        x-ref="search"
        @keydown.window="
            if (event.keyCode === 191) {
                event.preventDefault();
                $refs.search.focus();
            }
        "
        @focus="isOpen = true"
        @keydown="isOpen = true"
        @keydown.escape.window="isOpen = false"
        @keydown.shift.tab="isOpen = false"
    >

    <div wire:loading class="loading"></div>

    @if (strlen($search) >= 2)
        <div
            class="results"
            x-show.transition.opacity="isOpen"
        >
            @if ($searchResults->count() > 0)
                <ul>
                    @foreach ($searchResults as $result)
                        <li>
                            <a
                                href="{{ route('filmes.show', $result['id']) }}" 
                                @if ($loop->last) @keydown.tab="isOpen = false" @endif
                            >
                            @if ($result['poster_path'])
                                <img src="https://image.tmdb.org/t/p/w92/{{ $result['poster_path'] }}" alt="poster" class="poster-img">
                            @else
                                <img src="https://via.placeholder.com/50x75" alt="poster" class="place-img">
                            @endif
                            <span class="title">{{ $result['title'] }}</span>
                        </a>
                        </li>
                    @endforeach

                </ul>
            @else
                <div class="no-results">Nenhum resultado encontrado para "{{ $search }}"</div>
            @endif
        </div>
    @endif
</div>
