<div class="table-responsive">
    <table class="table">
        <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Nombre </th>
              <th scope="col">Autor </th>
              <th scope="col">Caraturla </th>
              <th scope="col">Actions</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($podcast_admin as $podcastAdmin )
            <tr>
                <th scope="row">{{ $podcastAdmin->id}} </th>
                <td> {{ $podcastAdmin->name}} </td>
                <td> {{ $podcastAdmin->autor->name}} </td>
                <td>
                    <img src="/public/{{ $podcastAdmin->caratula_url }}" class="card-img-top rounded" width="5px" height="40px" alt="imagen de caratula"> 
                </td>
                <td class="d-flex flex-row">
                    <div class="flex-fill">
                      @if ($podcastAdmin->deleted_at== null )
                      <form method="POST" name="delete" action="{{ route('podcast.delete', ['podcast'=>$podcastAdmin->id] )}}">
                        @csrf 
                        @method('DELETE')
                        <div class="form-group">
                            <input type="submit" class="btn btn-danger" value="B">
                        </div>
                      </form>
                      @else
                      <form method="POST" name="restore" action="{{ route('podcast.restore', ['podcast'=>$podcastAdmin->id] )}}">
                        @csrf 
                        <div class="form-group">
                            <input type="submit" class="btn btn-primary" value="A">
                        </div>
                      </form>
                      @endif
                    </div>
                    @if ($podcastAdmin->deleted_at== null )
                    <div class="flex-fill">
                      <button type="button" class="btn btn-warning" name="btnUpdatePodcast" 
                      data-bs-toggle="modal" data-bs-target="#modal"
                      value="{{ $podcastAdmin->id }}">
                        E
                      </button>
                    </div>
                    @endif     
                
                    
                </td>
              </tr>
            @endforeach
            
          </tbody>
    </table>
  </div>