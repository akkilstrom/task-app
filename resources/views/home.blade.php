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
                <button>
                    <img class="icon" src="https://icongr.am/clarity/plus.svg?size=30&color=ffffff" alt="plus">
                    Edit
                </button>
            </a>
        </section>
    {{-- @endif --}}
@endsection
