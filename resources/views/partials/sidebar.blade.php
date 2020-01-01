<div class="ui large vertical menu">
    <a href="{{ route('home') }}" class="active item">
        {{ __('Home') }}
    </a>
    <a href="{{ route('sets.index') }}" class="item">
        {{ __('Sets') }}
    </a>
    <div class="item">
        <a href="{{ route('courses.create') }}" class="ui small label">
            <i class="plus icon"></i>
            {{ __('Add') }}
        </a>
        <div class="header">
            {{ __('Courses') }}
        </div>
        <div class="menu">
            @each('partials.courses.menu', $user->courses, 'course')
        </div>
    </div>
</div>
