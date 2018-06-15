@extends('frontend.layouts.master')

@section('content')
<style>
    div.center div.text > p {
        /*margin-left: 0;
        margin-right: 0 ;*/
        padding-right: 0;
    }
</style>
<div class="slider staticSlider" style="overflow: hidden;">
    <ul>
        <li style="background-image: url('/img/backgrounds/{{ $background->img  }}');">
         <div class="slider_title">
            <center style="margin: 0 auto; max-width: 1360px; padding: 0px 20px;">
            <!-- продукция компании «АХБК» -->
            @lang('a.title_products')
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
            <li><a href="/" title="Главная">@lang('a.index')</a></li><li><span>@lang('a.products')</span></li>        </ul>
        </div>
        <div class="text" style="padding: 15px;">
            @if ( $lang == 'ru' )
                {!! $textProd->text !!}
            @else  
                {!! $textProd->text_kz !!}
            @endif      
        </div>
        <div class="grid">
          <ul class="clear">
            @foreach( $categories as $category )
                @if ( $lang == 'ru' )
                <li data-form="" class="">
                  <div class="grid_block">
                    <div class="product">
                     <div class="product_img">
                      <img class="product_img" src="/img/products/{{ $category->img }}" alt="" />
                    </div>
                    <div class="product_title">{{ $category->title }}</div>
                    <a href="{{ url('products/' . $category->slug) }}" class="product_link">
                      <span class="mask"></span>
                      <span class="product_text">{!! $category->text !!}</span>
                      <span class="more_span"><span>Подробнее</span></span>
                    </a>
                  </div>
                </div>
              </li>
            @else
              <li data-form="" class="">
                  <div class="grid_block">
                    <div class="product">
                     <div class="product_img">
                      <img class="product_img" src="/img/products/{{ $category->img }}" alt="" />
                    </div>
                    <div class="product_title">{{ $category->title_kz }}</div>
                    <a href="{{ url('products/' . $category->slug) }}" class="product_link">
                      <span class="mask"></span>
                      <span class="product_text">{!! $category->text_kz !!}</span>
                      <span class="more_span"><span>Толығырақ</span></span>
                    </a>
                  </div>
                </div>
              </li>
            @endif
        @endforeach
    </ul>
</div> 
@include( 'frontend.partials._callback' )       
</div><!-- center --> <!-- content -->
</section>
@endsection