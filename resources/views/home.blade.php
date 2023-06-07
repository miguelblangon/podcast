@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
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

    //Boton de crear podcast
    $('[name=btnCreatePodcast]').on('click',function(){
      
         $.get('/podcast-create',function(data){$("#modal .modal-body").html(data);});     
    });
    //boton de actualizar
    $('[name=btnUpdatePodcast]').on('click',function(){
      $.get('/podcast-update/'+$(this).val(),function(data){$("#modal .modal-body").html(data);});     
    });


    




    //Boton de actualizar usuario en el panel del admin
    $('[name=btnUpdateAdmin]').on('click',function(){
        $.get('/user-show/'+$(this).val(),function(data){$("#modal .modal-body").html(data);});     
    });

});
</script>
@endsection