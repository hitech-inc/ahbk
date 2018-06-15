<!-- Longitude Field -->
<div class="form-group col-sm-6">
    {!! Form::label('longitude', 'Longitude:') !!}
    {!! Form::text('longitude', null, ['class' => 'form-control']) !!}
</div>

<!-- Latitude Field -->
<div class="form-group col-sm-6">
    {!! Form::label('latitude', 'Latitude:') !!}
    {!! Form::text('latitude', null, ['class' => 'form-control']) !!}
</div>

<!-- Address Field -->
<div class="form-group col-sm-6">
    {!! Form::label('address', 'Address:') !!}
    {!! Form::text('address', null, ['class' => 'form-control']) !!}
</div>

<!-- Phone Field -->
<div class="form-group col-sm-6">
    {!! Form::label('phone', 'Phone:') !!}
    {!! Form::text('phone', null, ['class' => 'form-control']) !!}
</div>

<!-- Phone Field -->
<div class="form-group col-sm-6">
    {!! Form::label('contact_person', 'Контактное лицо:') !!}
    {!! Form::text('contact_person', null, ['class' => 'form-control']) !!}
</div>

<!-- Phone_city Field -->
<div class="form-group col-sm-6">
    {!! Form::label('phone_city', 'Городской номер:') !!}
    {!! Form::text('phone_city', null, ['class' => 'form-control']) !!}
</div>

<!-- Email Field -->
<div class="form-group col-sm-6">
    {!! Form::label('email', 'Email:') !!}
    {!! Form::text('email', null, ['class' => 'form-control']) !!}
</div>

<!-- Title Field -->
<div class="form-group col-sm-6">
    {!! Form::label('title', 'Title:') !!}
    {!! Form::text('title', null, ['class' => 'form-control']) !!}
</div>

<!-- Title_kz Field -->
<div class="form-group col-sm-6">
    {!! Form::label('title_kz', 'Title_kz:') !!}
    {!! Form::text('title_kz', null, ['class' => 'form-control']) !!}
</div>

<!-- Address_kz Field -->
<div class="form-group col-sm-6">
    {!! Form::label('address_kz', 'Address_kz:') !!}
    {!! Form::text('address_kz', null, ['class' => 'form-control']) !!}
</div>

<!-- Contact_person_kz Field -->
<div class="form-group col-sm-6">
    {!! Form::label('contact_person_kz', 'Contact_person_kz:') !!}
    {!! Form::text('contact_person_kz', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('backend.contacts.index') !!}" class="btn btn-default">Cancel</a>
</div>
