<div class="col">
    <button type="button" class="btn btn-success" name="btnCreatePodcast"
    data-bs-toggle="modal" data-bs-target="#modal"
    >Crear</button>
</div>

<div class="row g-3 text-center p-2">
@foreach ($podcast_user as $podcast)

    <div class="col">
        <div class="card" style="width: 18rem;">
              <img src="/public/{{ $podcast->caratula_url }}" class="card-img-top rounded" width="100" height="100" alt="imagen de caratula">
            <div class="card-body">
              <h5 class="card-title">{{ $podcast->name}} </h5>
              <p class="card-text">
                {{ $podcast->detail }}
              </p>
              <div class="row">
                <div class="col">
                  <a href="{{ route('podcast.descargar',['podcast'=>$podcast->id] ) }}" class="btn btn-primary">Descargar</a>
                </div>
                <div class="col"> 
                    <form method="POST" name="deletePodcast" action="{{ route('podcast.delete', ['podcast'=>$podcast->id] )}}">
                      @csrf 
                      @method('DELETE')
                      <div class="form-group">
                          <input type="submit" class="btn btn-danger" value="B">
                      </div>
                    </form>
                </div>
                <div class="col">
                  <button type="button" class="btn btn-warning" name="btnUpdatePodcast" 
                  data-bs-toggle="modal" data-bs-target="#modal"
                  value="{{ $podcast->id }}">
                    E
                  </button>
                </div>
              </div>
            </div>
          </div>
        </div>

@endforeach
</div>    


