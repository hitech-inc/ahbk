<!-- Title Field -->
<div class="form-group col-sm-4">
    {!! Form::label('title', 'Title:') !!}
    {!! Form::text('title', null, ['class' => 'form-control']) !!}
</div>

<!-- Small_img Field -->
<div class="form-group col-sm-4">
    {!! Form::label('small_img', 'Small img:') !!}
    {!! Form::file('small_img') !!}
</div>

<!-- Img Field -->
<div class="form-group col-sm-4">
    {!! Form::label('img', 'Big img:') !!}
    {!! Form::file('img') !!}
</div>

<!-- Text Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('text', 'Text:') !!}
    {!! Form::textarea('text', null, ['class' => 'form-control editor']) !!}
</div>

<div class="clearfix"></div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('backend.galleries.index') !!}" class="btn btn-default">Cancel</a>
</div>
