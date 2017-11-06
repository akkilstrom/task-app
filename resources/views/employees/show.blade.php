@extends( 'layouts.master' )

@section( 'content' )

    <h1>{{ $employee->firstname }} {{ $employee->lastname }}</h1>
    <h4>{{ $employee->title }}</h4>

    {{--  Checka om linked in och phone är null om inte så skriv ut  --}}
    @isset ( $employee->linkedin )
        <a href="{{ $employee->linkedin }}" target="_blank">My link in profile</a>
    @endisset

    <p>{{ $employee->email }} <br>

    @isset( $employee->phone )
       {{ $employee->phone }}
    @endisset

    </p>

@endsection