<a href="{{ route('courses.show', ['course' => $course]) }}" class="card">
    <div class="content">
        <div class="header">{{ $course->name }}</div>
        <div class="meta">{{ $course->sets->count() }} {{ __('Sets') }}</div>
        <div class="description">

        </div>
    </div>
</a>
