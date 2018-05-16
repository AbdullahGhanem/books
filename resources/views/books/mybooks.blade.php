@extends('layouts.app')

@section('content')
	<my-books data="{{ json_encode(auth()->user()->my_books )}}" my_books="{{ json_encode($my_books) }}"></my-books>
@endsection
