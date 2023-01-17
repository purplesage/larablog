@props(['comment'])
<article class="flex bg-gray-50 p-6 border border-gray-200 rounded-xl space-x-4">
  <div class="flex-shrink-0">
    <img class="rounded-xl" src="https://i.pravatar.cc/60?u={{$comment->id}}" alt="avatar" width="60" height="60">
  </div>

  <div>
    <header class="mb-4">
      <h3 class="font-bold">{{$comment->author->userName}}</h3>
      <p class="text-xs">
        Posted <time>{{$comment->created_at->diffForHumans()}}</time>
      </p>
    </header>
    <p>{{$comment->body}}</p>
  </div>

</article>