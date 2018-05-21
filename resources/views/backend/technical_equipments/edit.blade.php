@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Technical Equipment
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($technicalEquipment, ['route' => ['technicalEquipments.update', $technicalEquipment->id], 'method' => 'patch']) !!}

                        @include('backend.technical_equipments.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection