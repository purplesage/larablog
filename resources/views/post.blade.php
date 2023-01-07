<x-layout>

  <article>
    <h1>{{$post->title}}</h1>

     Wrote by <a href="/authors/{{$post->author->userName}}">{{$post->author->name}}</a> in <a href="#">{{$post->category->name}}</a>

    <p>{!!$post->body!!}</p>
  </article>
  <a href="/">Go back</a>
  
</x-layout>



