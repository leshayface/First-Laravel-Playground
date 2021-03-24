@extends ('layout')


@section ('content')

<div>
    <h1>ALL ARTICLES:</h1>
    @forelse ($articles as $article)
      <div style="width:40%">
        <a href="articles/{{$article->id}}"><h2>{{$article->title}}</h2></a>
        <h4>{{$article->excerpt}}</h4>
        <!-- <p>{{$article->body}}</p> -->
      </div>
      <p>
        @foreach($article->tags as $tag)
          <a href="/articles?tag={{$tag->name}}">{{$tag->name}}</a>
        @endforeach
      </p>
    @empty
        <p>No Relavent Articles</p>
    @endforelse
  </div>

@endsection