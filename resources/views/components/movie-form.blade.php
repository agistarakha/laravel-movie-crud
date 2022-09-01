<form class="px-5 d-flex flex-column gap-3 p-5" action="{{($movie != "")? route("movies.update",$movie) : route("movies.store")}}" method="POST">
    @csrf
    
    @if (! empty($movie))
        @method("PATCH")
    @endif
  <div class="form-group">
    <label class="form-label" for="Title">Title</label>
    <input type="text" class="form-control" name="title" id="title" placeholder="Title" value="{{ old("title",$movie->title ?? "") }}" required>
    @error('title')
            <small class="form-text text-muted">{{ $message }}</small>

    @enderror
  </div>
  <div class="form-group">
    <label class="form-label">Release Date</label>
    <input type="date" class="form-control" name="release_date" value="{{ old('release_date',$movie->release_date ?? "YYYY-MM-DD") }}">
     @error('release_date')
            <small class="form-text text-muted">{{ $message }}</small>

    @enderror
  </div>

  <div class="border border-2 d-flex flex-column p-2 gap-1" style="height: 200px;overflow: auto">
    
    @foreach ($genres as $genre)
    
    <div class="">
      <input type="checkbox" class="form-check-input" id="{{ $genre->id }}" value="{{ $genre->id }}" name="genres[]"
      @if ($movie != "")
            
        @foreach ($movie->genres as $movie_genre)
          @if ($movie_genre->id == $genre->id)
              {{ "checked" }}
          @endif
        @endforeach
      @endif

      >
      <label class="form-label" class="form-check-label" for="{{ $genre->id }}"">{{ $genre->name }}</label>
    </div>
    
    @endforeach
    

    
  </div>
  @error('genres')
            <small class="form-text text-muted">{{ $message }}</small>

    @enderror

  <div class="form-group">
    <label for="" class="form-label">Director</label>
    <select class="form-select" name="director_id">
      @foreach ($directors as $director)
        <option value="{{ $director->id }}"
          @if ($movie != "")
              {{ ($movie->director->id == $director->id) ? "selected":"" }}
          @endif
          >
          {{ $director->name }}
        </option>
      @endforeach
    </select>
    @error('director_id')
            <small class="form-text text-muted">{{ $message }}</small>

    @enderror
  </div>

  <div class="form-group">
    <label class="form-label" for="synopsis">Synopsis</label>
    <textarea class="form-control" id="synopsis" rows="3" name="synopsis">{{ old('synopsis',$movie->synopsis ?? "") }}</textarea>
     @error('synopsis')
            <small class="form-text text-muted">{{ $message }}</small>

    @enderror
  </div>
  <button type="submit" class="btn btn-primary">
    {{ ($movie != "") ?"Update": "Create"}}

  </button>
</form>