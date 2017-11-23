@extends('layouts.master')

@section('content')

    <h1>Dashboard, {{ Auth::user()->name }}</h1>
    {{-- @if($projects) --}}
        <section class="projects-container">
            @foreach ($projects as $project)
                {{-- Här skall tasks för detta projekt synas under --}}
                <a href='/projects/{{$project->id}}'> 
                    {{ $project->name }}
                    {{-- User: {{ $project->user_id}} --}}
                </a>
            @endforeach  
        </section>
    {{-- @endif --}}
@endsection
