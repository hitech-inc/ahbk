@extends('frontend.layouts.master')

@section('content')
<div class="slider staticSlider" style="overflow: hidden;">
    <ul>
        <li style="background-image: url('/img/backgrounds/{{ $background->img }}');">
            <div class="slider_title">
              <center style="margin: 0 auto; max-width: 1360px; padding: 0px 20px;">АХБК</center>
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
                <a href="/products" title="@lang('a.products')">@lang('a.products')</a>
              </li>
              <li>
                @if($lang == 'ru')
                  <span>{{ $categories->title }}</span>
                @else
                  <span>{{ $categories->title_kz }}</span>
                @endif
            </li>        
            </ul>
            </div>
            <div class="grid">
                <ul class="clear"> 
                @if(!$children->isEmpty()) 
                  @foreach( $children as $child )    
                    <li data-form="1/4" class="smaller" style="width: 33.33%">
                        <div class="grid_block">
                            <div class="product">
                                <div class="product_img">
                                    <img class="product_img" src="/img/products/{{ $child->img }}" alt="" style="width: 150%"/>
                                </div>
                                <div class="product_title">
                                  @if($lang == 'ru')
                                    {{ $child->title }}
                                  @else
                                     {{ $child->title_kz }}
                                  @endif    
                                </div>
                                <a href="{{ url('products/'. $categories->slug . '/' . $child->slug) }}" class="product_link">
                                    <span class="mask"></span>
                                    <span class="product_text">
                                      @if($lang == 'ru')
                                        {!! $child->text !!}
                                      @else
                                        {!! $child->text_kz !!} 
                                      @endif  
                                    </span>
                                    <span class="more_span">
                                      @if($lang == 'ru')
                                        <span>Подробнее</span>
                                      @else
                                        <span>Толығырақ</span>
                                      @endif  
                                    </span>
                                </a>
                            </div>
                        </div>
                    </li>
                  @endforeach
                @else    
                  <div class="text">
                    <h1>
                      {{ $categories->title }}           
                    </h1>
                    <p>
                     {!! $categories->text !!}
                   </p>
                 </div>
                @endif        
                    <div style="clear: both;"></div>
                </ul>
            </div>
            <div class="grid">
              <ul class="clear"></ul></div><!-- center --> <!-- content -->
          </section>                      
          @endsection