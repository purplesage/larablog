@extends ('layout')

@section('content')

  @foreach ($posts as $post)
    <article>
      <a href="/post/{{$post->id}}">
        <h2>{{$post->title}}</h2>
      </a>
      <p>{{$post->excerpt}}</p>
    </article>
  @endforeach

@endsection

