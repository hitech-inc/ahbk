@extends('frontend.layouts.master')

@section('content')
<script type="text/javascript">
	ymaps.ready(init);
	var myMap, 
	myPlacemark;

	var longitude, latitude;

	longitude = {{ App\Models\Backend\Contact::getCoords()['longitude'] }};
	latitude = {{ App\Models\Backend\Contact::getCoords()['latitude'] }}; 

	function init(){ 
		myMap = new ymaps.Map("map", {
			center: [longitude, latitude],
			zoom: 12
		}); 

		myPlacemark = new ymaps.Placemark([longitude, latitude], {
			hintContent: 'Шымкент, Аксукент!',
			balloonContent: 'Южно - Казахстанская область'
		});

		myMap.geoObjects.add(myPlacemark);
		myMap.setType('yandex#hybrid');
	}
</script>
<section id="content">
	<div class="center">
		<div class="breadcrumbs">
			<ul class="clear">
				<li><a href="/" title="Главная">@lang('a.index')</a></li><li><span>@lang('a.contacts')</span></li>        
			</ul>
		</div>
<!-- <style>
.contact_map.active > ymaps{
    height: 377px!important;
}
</style> -->
<div class="contact_list">
	<ul class="clear">

		<li style="width: 100%">
			<div class="contact_info" style="height: auto">
				<div class="product_title">
					АХБК   
				</div>
				<div class="contact_image">
					<div id="map" style="width: 100%; height: 400px"></div>
				</div>
				<div class="contact_table">
					<table>
						@foreach ( $contacts as $contact )
							@if ( $loop->index == 0 )
							<tr>
								<td colspan="2" style="text-align:center;">
								@if($lang == 'ru')	
									{{ $contact->title }}
								@else
									{{ $contact->title_kz }}
								@endif
								</td>
							</tr>
								<tr>
									@if($lang == 'ru')	
										<td>Адрес</td>
										<td>{{ $contact->address }}</td>
									@else
										<td>Мекенжай</td>
										<td>{{ $contact->address_kz }}</td>
									@endif
								</tr>
								<tr>
									@if($lang == 'ru')	
										<td>Телефон</td>
										<td>{{ $contact->phone_city }}</td>
									@else
										<td>Телефон</td>
										<td>{{ $contact->phone_city }}</td>
									@endif
								</tr>
							@else	
							<tr>
								<td colspan="2" style="text-align:center;">
									@if($lang == 'ru')
										{{ $contact->title }}
									@else
										{{ $contact->title_kz }}
									@endif
								</td>
							</tr>
								<tr>
									@if($lang == 'ru')	
										<td>Телефон городской</td>
										<td>{{ $contact->phone_city }}</td>
									@else
										<td>Стационарлық телефон</td>
										<td>{{ $contact->phone_city }}</td>
									@endif
								</tr>
								<tr>
									<td>
									@if($lang == 'ru')
										Телефон мобильный
									@else
										Мобильдік телефон
									@endif		
									</td>
									<td>
										{{ $contact->phone }}
									</td>
								</tr>
								<tr>
									<td>
										E-mail
									</td>
									<td>
										 {{ $contact->email }}
									</td>
								</tr>
								<tr>
									@if($lang == 'ru')
									<td>
										Контактной лицо
									</td>
									<td>
										{{ $contact->contact_person }}
									</td>
									@else
									<td>Байланысушы тұлға</td>
									<td>
										{{ $contact->contact_person_kz }}
									</td>
									@endif	
								</tr>
							<tr>
							@endif
						@endforeach
						</table>
					</div>
					@include('frontend.partials._callback')
		</li>
	</ul>
</div><!-- contact_list -->
	<!-- <div class="contact_map_block">
			<div class="contact_map" id="map0"></div>
			<div class="contact_map" id="map1"></div>
			<a class="close_button"></a>
		</div> -->
	</section>
	@endsection