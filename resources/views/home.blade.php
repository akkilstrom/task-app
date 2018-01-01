<?php $nav_dashboard = 'active'; ?>

@extends('layouts.master')

@section('content')
    <h1>Dashboard</h1>
    <section class="profile-container">
        <div class="profile-img">@include( 'icons.user' )</div>
        <div class="profile-txt">
            <p><strong>Username: </strong> <br>{{ Auth::user()->name }} <br>
            <strong>E-mail: </strong> <br>{{ Auth::user()->email }}</p>
        </div>
    </section>
    @include( 'layouts.projects' )
@endsection

