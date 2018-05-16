@extends('layouts.app')

@section('content')
    <books data="{{ json_encode( auth()->user()->my_books ?? [] )}}"></books>
@endsection
