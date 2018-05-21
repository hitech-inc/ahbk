<li class="{{ Request::is('categories*') ? 'active' : '' }}">
    <a href="{!! route('categories.index') !!}"><i class="fa fa-edit"></i><span>Продукция</span></a>
</li>

<li class="{{ Request::is('contacts*') ? 'active' : '' }}">
    <a href="{!! route('backend.contacts.index') !!}"><i class="fa fa-edit"></i><span>Контакты</span></a>
</li>

<li class="{{ Request::is('galleries*') ? 'active' : '' }}">
    <a href="{!! route('backend.galleries.index') !!}"><i class="fa fa-edit"></i><span>Фотогалерея</span></a>
</li>

<li class="{{ Request::is('abouts*') ? 'active' : '' }}">
    <a href="{!! route('backend.abouts.index') !!}"><i class="fa fa-edit"></i><span>О нас</span></a>
</li>

<li class="{{ Request::is('technicalEquipments*') ? 'active' : '' }}">
    <a href="{!! route('technicalEquipments.index') !!}"><i class="fa fa-edit"></i><span>Техническое оснащение</span></a>
</li>

<li class="{{ Request::is('backgrounds*') ? 'active' : '' }}">
    <a href="{!! route('backend.backgrounds.index') !!}"><i class="fa fa-edit"></i><span>Фоновые рисунки на страницах</span></a>
</li>

<li class="{{ Request::is('certificates*') ? 'active' : '' }}">
    <a href="{!! route('backend.certificates.index') !!}"><i class="fa fa-edit"></i><span>Сертификаты</span></a>
</li>

<li class="{{ Request::is('textBlocks*') ? 'active' : '' }}">
    <a href="{!! route('backend.textBlocks.index') !!}"><i class="fa fa-edit"></i><span>Text Blocks</span></a>
</li>

