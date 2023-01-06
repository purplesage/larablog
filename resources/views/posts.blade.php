@extends ('layout')

@section('content')

  @foreach ($posts as $post)
    <article>
      <a href="/post/{{$post->slug}}">
        <h2>{{$post->title}}</h2>
      </a>
      <a href="/categories/{{$post->category->slug}}">{{$post->category->name}}</a>
      <p>{{$post->excerpt}}</p>
    </article>
  @endforeach

@endsection

