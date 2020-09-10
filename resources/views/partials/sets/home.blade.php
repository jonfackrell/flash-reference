<a href="{{ route('sets.show', ['set' => $set]) }}" class="card">
    <div class="content">
        <div class="header">{{ $set->name }}</div>
        <div class="meta">{{ $set->cards->count() }} {{ ucfirst(trans_choice('flashcards.card', $set->cards->count())) }}</div>
        <div class="description">

        </div>
    </div>
</a>
