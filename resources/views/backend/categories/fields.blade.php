<!-- Title Field -->
<div class="form-group col-sm-4">
    {!! Form::label('title', 'Title:') !!}
    {!! Form::text('title', null, ['class' => 'form-control']) !!}
</div>

<!-- Slug Field -->
<div class="form-group col-sm-4">
    {!! Form::label('slug', 'Slug:') !!}
    {!! Form::text('slug', null, ['class' => 'form-control']) !!}
</div>

<!-- Slug Field -->
<div class="form-group col-sm-4">
    {!! Form::label('parent_id', 'Category:') !!}
    {!! Form::select('parent_id', App\Models\Category::select(), null, ['class' => 'form-control']) !!}
</div>

<!-- Text Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('text', 'Text:') !!}
    {!! Form::textarea('text', null, ['class' => 'form-control editor']) !!}
</div>

<!-- Title Field -->
<div class="form-group col-sm-4">
    {!! Form::label('title_kz', 'Title_kz:') !!}
    {!! Form::text('title_kz', null, ['class' => 'form-control']) !!}
</div>

<!-- Slug_kz Field -->
<div class="form-group col-sm-4">
    {!! Form::label('slug_kz', 'Slug_kz:') !!}
    {!! Form::text('slug_kz', null, ['class' => 'form-control']) !!}
</div>

<!-- Text Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('text_kz', 'Text_kz:') !!}
    {!! Form::textarea('text_kz', null, ['class' => 'form-control editor']) !!}
</div>

<!-- Img Field -->
<div class="form-group col-sm-6">
    @if ( isset($category) && isset($category->img) )
        <img src="{{ asset('img/products/' . $category->img) }}" alt="" class="img-responsive">
        <br>
    @endif
    {!! Form::label('img', 'Img:') !!}
    {!! Form::file('img') !!}
</div>
<div class="clearfix"></div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('categories.index') !!}" class="btn btn-default">Cancel</a>
</div>
