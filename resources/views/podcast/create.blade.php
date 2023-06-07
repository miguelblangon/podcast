
@if ( isset($podcast) )
    <form action="{{ route('podcast.update',['podcast'=>$podcast->id] ) }}" method="POST" enctype="multipart/form-data">
    
@else
    <form action="{{ route('podcast.create') }}" method="POST" enctype="multipart/form-data">    
@endif
    @csrf
    <div class="row mb-3">
      <label for="inputEmail3" class="col-sm-2 col-form-label">Nombre</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="nombrePodcast" name="nombrePodcast"
        @isset($podcast) value="{{ $podcast->name }}" @endisset
        >
      </div>
    </div>
    <div class="row mb-3">
        <label for="inputEmail3" class="col-sm-2 col-form-label">Descripción</label>
        <div class="col-sm-10">
            <textarea class="form-control" name="descripcionPodcast" id="descripcionPodcast" rows="3">
                @isset($podcast) {{ $podcast->detail }} @endisset
            </textarea> 
        </div>
    </div>
    <div class="row mb-3">
        <label for="inputEmail3" class="col-sm-2 col-form-label">Portada</label>
        <div class="col-sm-10">
            <input class="form-control" type="file" id="portadaPodCast" name="portadaPodCast">
        </div>
    </div>
    <div class="row mb-3">
        <label for="inputEmail3" class="col-sm-2 col-form-label">Audio</label>
        <div class="col-sm-10">
            <input class="form-control" type="file" id="audioPodCast" name="audioPodCast">
        </div>
    </div>
    <button type="submit" class="btn btn-primary">
        @if (isset($podcast)) Actualizar @else Crear @endif  
    </button>
  </form>