<h1>NEW ARTICLE</h1>

<form method="POST" action="/articles">
  @csrf
  <label for="title">Title</label>
  <!-- you can add a class when there is an error -->
  <input class="input @error('title') is-danger @enderror" type="text" name="title" id="title" value="{{old('title')}}"></input>

  @error('title')
    <p>{{$errors->first('title')}}</p>
  @enderror

  <label for="excerpt">Excerpt</label>
  <textarea class="input @error('title') is-danger @enderror" name="excerpt" id="excerpt" value="{{old('excerpt')}}"></textarea>

  @error('excerpt')
    <p>{{$errors->first('excerpt')}}</p>
  @enderror

  <label for="body">Body</label>
  <textarea class="input @error('title') is-danger @enderror" name="body" id="body" value="{{old('body')}}"></textarea>

  @error('body')
    <p>{{$errors->first('body')}}</p>
  @enderror

  <label for="img_path">Image Path</label>
  <input class="input @error('img_path') is-danger @enderror" type="text" name="img_path" id="img_path" value="{{old('img_path')}}"></input>

  @error('img_path')
    <p>{{$errors->first('img_path')}}</p>
  @enderror

  <label for="tags">Tags</label>
  <select name="tags[]" multiple id="">
    @foreach ($tags as $tag)
      <option value="{{$tag->id}}">{{$tag->name}}</option>
    @endforeach
  </select>  
  <!-- you need to pass tags variable through in controller -->

  @error('tags')
    <p>{{$message}}</p> <!-- just use message if using at error -->
  @enderror

  <button type="submit">Submit</button>
</form>
