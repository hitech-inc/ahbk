@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Text Blocks
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">

            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => 'backend.textBlocks.store']) !!}

                        @include('backend.text_blocks.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
