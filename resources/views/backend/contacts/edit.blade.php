@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Contact
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($contact, ['route' => ['backend.contacts.update', $contact->id], 'method' => 'patch']) !!}

                        @include('backend.contacts.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection