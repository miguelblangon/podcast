<div class="table-responsive">
    <table class="table">
        <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Email</th>
              <th scope="col">Name</th>
              <th scope="col">Actions</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($users as $user )
            <tr>
                <th scope="row">{{ $user->id}} </th>
                <td> {{ $user->email}} </td>
                <td>{{ $user->name}}</td>
                <td class="d-flex flex-row">

                    @if (auth()->user()->id!= $user->id )
                    <div class="flex-fill">
                      @if ($user->deleted_at== null )
                      <form method="POST" name="delete" action="{{ route('user.delete', ['user'=>$user->id] )}}">
                        @csrf 
                        @method('DELETE')
                        <div class="form-group">
                            <input type="submit" class="btn btn-danger" value="B">
                        </div>
                      </form>
                      @else
                      <form method="POST" name="restore" action="{{ route('user.restore', ['user'=>$user->id] )}}">
                        @csrf 
                        <div class="form-group">
                            <input type="submit" class="btn btn-primary" value="A">
                        </div>
                      </form>
                      @endif
                    </div>
                    @if ($user->deleted_at== null )
                    <div class="flex-fill">
                      <button type="button" class="btn btn-warning" name="btnUpdateAdmin" 
                      data-bs-toggle="modal" data-bs-target="#modal"
                      value="{{ $user->id }}">
                        E
                      </button>
                    </div>
                    @endif     
                    @endif
                    
                </td>
              </tr>
            @endforeach
            
          </tbody>
    </table>
  </div>