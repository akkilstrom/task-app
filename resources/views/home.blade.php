@extends('layouts.master')

@section('content')

    <h1>Dashboard, {{ Auth::user()->name }}</h1>
    {{-- @if($projects) --}}
        <section class="projects-container">
            <h2>Your projects</h2>
            @foreach ($projects as $project)
                {{-- Här skall tasks för detta projekt synas under --}}
                <a href='/projects/{{$project->id}}'> 
                    {{ $project->name }}
                    {{-- User: {{ $project->user_id}} --}}
                </a>
            @endforeach  
            <a href="/projects/create">
                <button class="icon-btn">
                    @include( 'icons.plus' )
                    <span class="btn-txt">Add new</span>
                </button>
            </a>
        </section>
    {{-- @endif --}}
@endsection
