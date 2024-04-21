@extends('layouts.login')

@section('content')
{!! Form::open(['url' => '/search']) !!}
@csrf
{{Form::hidden('id',Auth::user()->id)}}
<div class="search-container">
  <div class="search">
    <input class="search-form" type="text" name="search" placeholder="ユーザー名">
    <button type="submit" class="btn"><img class="search-img" src="images/search.png" alt="検索"></button>
  </div>
</div>
{!! Form::close() !!}
@endsection
