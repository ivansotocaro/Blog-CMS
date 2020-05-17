@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header d-flex justify-content-between  align-items-center">
           <span>Agregar Post</span>
            <!-- <a href="{{ route('tags.index') }}" class="btn btn-primary btn-sm">Volver a lista de Etiquetas</a> -->
        </div>
        <div class="card-body">     
            @if ( session('agregar') )
                <div class="alert alert-success">{{ session('agregar') }}</div>
            @endif
          <form method="post" action="{{ route('posts.update', $post->id) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf

            <input
            id="user_id"
            type="hidden"
            name="user_id"
            value="{{ auth()->user()->id }}"/>

            <label>Categoria</label>
            
            <select class="mb-3" style="display: block" name="category_id">
            @foreach($categories as $category)
              <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
            </select> 

           
            <label>Nombre</label>
            <input
            id="name"
            type="text"
            name="name"
            value="{{ $post->name }}"
            class="form-control mb-2"
            />

            <label>Slug</label>
            <input
            id="slug"
            type="text"
            name="slug"
            value="{{ $post->slug }}"
            class="form-control mb-2"
            readonly="readonly"
            />
            
            <label>Imagen</label>
            <input type="file" name="file" class="form-control-file mb-3" id="file" value="{{ $post->file }}">

            <label>Estado</label>
            <select class="mb-3" style="display: block" name="status">
              <option value="PUBLISHED">Publicado</option>
              <option value="DRAFT">Borrador</option>
            </select> 
            
              <div class="form-group">
                  <label>Etiquetas</label>
                <div>
                  @foreach($tags as $tag)
                  <input type="checkbox" name="tags[]" value="{{ $tag->id }}">{{$tag->name}}
                  @endforeach
                </div>
              </div>
            
              <label>Extracto</label>
            <div class="form-group">
            
            <textarea 
            id="excerpt" 
            name="excerpt"
            rows="2"
            cols="93">{{ $post->excerpt }}"</textarea>
            </div>

            <label style="display: block" >Descripción</label>
            <textarea 
            id="body" 
            class="mb-3"
            name="body"
            rows="5"
            cols="93">{{ $post->body }}</textarea>
           
         
            <button id="add" class="btn btn-primary btn-block" type="submit">Agregar</button>

          </form>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection

@section('scripts')
<script src="{{ asset('js/formPost.js') }}"></script>
<script src="{{ asset('vendor/ckeditor/ckeditor.js') }}"></script>;
@endsection