@extends('layouts.master')

@section('content')
    <h1>Dashboard, {{ Auth::user()->name }}</h1>
    <section class="projects-container">
        <h2>Your projects</h2>
        @foreach ($projects as $project)
            {{-- Här skall tasks för detta projekt synas under --}}
            <div class="project-divider">
                <a href='/projects/{{$project->id}}'> 
                    {{ $project->name }}
                    {{-- User: {{ $project->user_id}} --}}
                </a>   
                <a href='/clients/{{$matchingClient->id}}'> 
                    {{ $matchingClient->name }}
                    {{-- User: {{ $project->user_id}} --}}
                </a>  
                <div class="edit-container">
                    <a class="edit-btn" href="/projects/{{$project->id}}/edit">
                        @include( 'icons.edit' )
                    </a>
                    {{-- <form action="{{ route('projects.destroy', ['id' => $project->id]) }}" 
                        method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}--}}
                        <button type="submit" class="trash-btn">
                            @include( 'icons.trash' )
                        </button>
                    {{-- </form>  --}}
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
@endsection


{{--  
<a href="{{ url('items/'.$row->id.'/edit') }}">Edit</a> | 
{{ Form::open(['route' => ['item.delete', $row->id], 'method' => 'delete']) }}
<button type="submit">Delete</button>
{{ Form::close() }}

<form action="{{ route('projects.update', ['id' => $project->id]) }}" 
		method="POST" enctype="multipart/form-data">
        {{ csrf_field() }}
        {{ method_field('PUT') }} --}}