@extends('layouts.master')

@section('content')
    <h1>Dashboard, {{ Auth::user()->name }}</h1>
    {{-- @if($projects) --}}
        <section class="projects-container">
            <h2>Your projects</h2>
            @foreach ($projects as $project)
                {{-- Här skall tasks för detta projekt synas under --}}
                <div class="project-divider">
                    <a href='/projects/{{$project->id}}'> 
                        {{ $project->name }}
                        {{-- User: {{ $project->user_id}} --}}
                    </a>    
                    <div class="edit-container">
                        <a class="edit-btn" href="/projects/{{$project->id}}/edit">
                            @include( 'icons.edit' )
                        </a>
                        <a class="trash-btn" href="/projects/{{$project->id}}/delete">
                            @include( 'icons.trash' )
                        </a>
                    </div>
                </div>
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
