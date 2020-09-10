
<a href="{{ route('courses.show', ['course' => $course]) }}" class="{{ request()->is('courses/'. $course->id) ? 'active' : '' }} item">{{ $course->name }}</a>
