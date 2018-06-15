@extends('frontend.layouts.master')

@section('content')
<div class="slider staticSlider" style="overflow: hidden;">
  <ul>
    <li style="background-image: url('/img/backgrounds/{{$background->img}}');">
     <div class="slider_title">
      <center style="margin: 0 auto; max-width: 1360px; padding: 0px 20px;">
      @lang('a.technical-equipment')                                   
      </center>
    </div>
  </li>

</ul>
<div class="slider_pager"></div>
<a href="index.html#" class="prev_slide"></a>
<a href="index.html#" class="next_slide"></a>
</div>
<section id="content">
	<div class="center">
    <div class="breadcrumbs">
    	<ul class="clear">
        <li>
          <a href="/" title="@lang('a.index')">@lang('a.index')</a>
        </li>
        <li>
          <span>@lang('a.technical-equipment')</span>
        </li>        
      </ul>
      </div>


      {{--<div class="grid">
       <ul class="clear">
        @foreach( $techEquipments as $techEquipment )
        <li data-form="" class="">
          <div class="grid_block">
            <div class="product">
             <div class="product_img">
              <img class="product_img" src="/img/products/{{ $techEquipment->img }}" alt="" />
            </div>
            <div class="product_title">{{ $techEquipment->title }}</div>
            <a href="#" class="product_link">
              <span class="mask"></span>
              <span class="product_text">{!! $techEquipment->text !!}</span>
              <span class="more_span"><span>Подробнее</span></span>
            </a>
          </div>
        </div>
      </li>
      @endforeach
    </ul>
  </div>--}}
  {{--<div class="text">
  @foreach( $techEquipments as $techEquipment )
    <h2 style="border: 0px; background-image: initial; background-color: #ffffff;"><span style="border: 0px; background-image: initial;">{{ $techEquipment->title }}</span></h2>
    <p>{!! $techEquipment->text !!}</p>
    <p></p>	
  @endforeach  
    <div style="clear:both"></div>        
  </div>--}}

  <div class="text">
    <div class="container">
      <h2 style="border: 0px; background-image: initial; background-color: #ffffff;">
        <span style="border: 0px; background-image: initial;">
        @lang('a.title_technical_equipment')
        </span>
      </h2>

      @if ( $lang == 'ru' )
        <p>{!! App\Models\Backend\textBlocks::render('technical.text')->text !!}</p>
      @else
        <p>{!! App\Models\Backend\textBlocks::render('technical.text')->text_kz !!}</p>
      @endif 

      <div class="row">
        @foreach( $techEquipments as $techEquipment )
          @if ( $lang == 'ru' )
            <div class="col-4 imgTechnicalE">
              <h3 style="border: 0px; background-image: initial; background-color: #ffffff; font-size: 18px;"><span style="border: 0px; background-image: initial;">{{ $techEquipment->title }}</span></h3>
              <p>{!! $techEquipment->text !!}</p>
              <p></p> 
              <div style="clear:both"></div> 
            </div>
          @else
            <div class="col-4 imgTechnicalE">
              <h3 style="border: 0px; background-image: initial; background-color: #ffffff; font-size: 18px;"><span style="border: 0px; background-image: initial;">{{ $techEquipment->title_kz }}</span></h3>
              <p>{!! $techEquipment->text_kz !!}</p>
              <p></p> 
              <div style="clear:both"></div> 
            </div>
          @endif
        @endforeach 
      </div>
    </div>        
  </div>

<!-- center --> <!-- content -->
</section>
@endsection