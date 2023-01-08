  <x-layout>
    {{-- <x-header :currentCategory="$currentCategory" :categories={{isset($categories) ?? "$categories" : null}} /> --}}
    @include('/components/header')

  <main class="max-w-6xl mx-auto mt-6 lg:mt-20 space-y-6">

    @if ($posts->count())
      <x-post-grid :posts="$posts" />

    @else
      <p>No posts yet. Please check back later</p>  
    @endif
  </main>
  </x-layout>
  
  
  
  
  {{-- @foreach ($posts as $post)
    <article>
      <a href="/post/{{$post->slug}}">
        <h2>{{$post->title}}</h2>
      </a>
      Wrote by <a href="/authors/{{$post->author->userName}}">{{$post->author->name}}</a> in <a href="#">{{$post->category->name}}</a>
      <p>{{$post->excerpt}}</p>
    </article>
  @endforeach --}}