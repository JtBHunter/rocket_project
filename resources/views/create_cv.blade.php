@extends('layouts.admin')

@section('content')
<form method="POST" action="{{ route('cv.create') }}" role="form">
	{{ csrf_field() }}
	@include('partials.cv.form')
</form>
@include('partials.modals.create_university')
@include('partials.modals.create_technology')
@endsection

@section('scripts')
	@include('partials.cv.form_scripts')
@endsection
