@extends('layouts.master')

@section('content')
    <h1>Dashboard, {{ Auth::user()->name }}</h1>
    @include( 'layouts.projects' )
@endsection

  {{-- <a href='/clients/{{$matchingClient->id}}'> 
                    {{ $matchingClient->name }}
                </a>  --}}