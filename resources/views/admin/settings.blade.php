@extends('layouts.admin')

@section('content')

    @each('admin.partials.institution', $institutions, 'institution')

@endsection

@push('scripts')

@endpush
