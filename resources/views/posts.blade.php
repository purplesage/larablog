@extends ('layout')

@section('content')

  @foreach ($posts as $post)
    <article>
      <a href="/post/{{$post->slug}}">
        <h2>{{$post->title}}</h2>
      </a>
      Wrote by <a href="/authors/{{$post->author->userName}}">{{$post->author->name}}</a> in <a href="#">{{$post->category->name}}</a>
      <p>{{$post->excerpt}}</p>
    </article>
  @endforeach

@endsection

