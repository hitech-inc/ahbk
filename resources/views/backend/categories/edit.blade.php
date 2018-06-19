@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Category
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                <!-- Что бы форма принимала файлы нужно в ней указать атрибут file и указать в него true как мы указадис здесь -->
                   {!! Form::model($category, ['route' => ['categories.update', $category->id], 'method' => 'patch', 'files' => true]) !!}

                        @include('backend.categories.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection