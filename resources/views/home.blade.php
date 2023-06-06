@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if(session('status'))
            <div class="alert alert-{{ session('rol') }}">
                {{ session('status') }}
            </div>
          @endif
          <ul>
            @foreach ($errors->all() as $error)
                <li class="alert alert-danger">{{ $error }}</li>
            @endforeach
        </ul>
           @include('home.card')
           @include('modal')
        </div>
    </div>
</div>
@endsection
@section('script')
<script type="module">
$(function() {
    console.log( "ready!" );

    $('[name=btnUpdateAdmin]').on('click',function(){
        //console.log( "button update  "  );
       
        $.get('/user-show/'+$(this).val(),function(data){
               // $('#modal').modal('show');
                $("#modal .modal-body").html(data);
            }); 
       
       
       
    });

});
</script>
@endsection