<div>
  <h1>{{$article->title}}</h1>
  <h3>{{$article->excerpt}}</h3>
  <p>{{$article->body}}</p>
  <img src="{{$article->img_path}}" />

  <p>
    @foreach($article->tags as $tag)
      <a href="/articles?tag={{$tag->name}}">{{$tag->name}}</a>
    @endforeach
  </p>
</div>