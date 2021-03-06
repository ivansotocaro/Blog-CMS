@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">

        <div class="card-header d-flex justify-content-between  align-items-center">
           <span>Ver Categorias</span>
            <!-- <a href="{{ route('tags.index') }}" class="btn btn-primary btn-sm">Volver a lista de Etiquetas</a> -->
        </div>

        <div class="card-body">    

            <strong>Nombre: </strong>
            <p style="display: inline-block">{{ $category->name }}</p>

            <br>

            <strong>Slug: </strong>
            <p style="display: inline-block">{{ $category->slug }}</p>

            <br>

            <strong>Body: </strong>
            <p style="display: inline-block">{{ $category->slug }}</p>
            
        </div>

      </div>
    </div>
  </div>
</div>
@endsection