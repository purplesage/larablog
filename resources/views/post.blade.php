@extends('layout')


@section('content')

  <article>
    <h1>{{$post->title}}</h1>
    <a href="#">{{$post->category->name}}</a>

    <p>{!!$post->body!!}</p>
  </article>

  <a href="/">Go back</a>

@endsection

