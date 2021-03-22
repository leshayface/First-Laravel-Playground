@extends ('layout')


@section ('content')

<h1>EDIT ARTICLE</h1>


<!-- make fields equal default value in database using value -->
<form method="POST" action="/articles/{{$article->id}}">
  @csrf
  @method('PUT')

  <label for="title">Title</label>
  <input type="text" name="title" id="title" value="{{$article->title}}">


  <label for="excerpt">Excerpt</label>
  <textarea name="excerpt" id="excerpt">{{$article->excerpt}}</textarea>

  <label for="body">Body</label>
  <textarea name="body" id="body">{{$article->body}}</textarea>
 
  <button type="submit">Submit</button>
</form>

@endsection