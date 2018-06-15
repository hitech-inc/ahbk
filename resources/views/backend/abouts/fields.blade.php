<!-- Title Field -->
<div class="form-group col-sm-6">
    {!! Form::label('title', 'Title:') !!}
    {!! Form::text('title', null, ['class' => 'form-control']) !!}
</div>

<!-- Img Field -->
<div class="form-group col-sm-6">
    {!! Form::label('img', 'Img:') !!}
    {!! Form::file('img') !!}
</div>

<!-- Text Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('text', 'Text:') !!}
    {!! Form::textarea('text', null, ['class' => 'form-control editor']) !!}
</div>

<!-- Title_kz Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('title_kz', 'Title_kz:') !!}
    {!! Form::text('title_kz', null, ['class' => 'form-control']) !!}
</div>

<!-- Text_kz Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('text_kz', 'Text_kz:') !!}
    {!! Form::textarea('text_kz', null, ['class' => 'form-control editor']) !!}
</div>

<div class="clearfix"></div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('backend.abouts.index') !!}" class="btn btn-default">Cancel</a>
</div>
