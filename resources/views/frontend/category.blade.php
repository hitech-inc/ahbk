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
                <li><a href="/" title="Главная">Главная</a></li><li><a href="/products" title="Продукция">Продукция</a></li><li><span>{{ $categories->title }}
                </span></li>        </ul>
            </div>
            <div class="grid">
                <ul class="clear">  
                    @foreach( $children as $child )    
                    <li data-form="1/4" class="smaller" style="width: 33.33%">
                        <div class="grid_block">
                            <div class="product">
                                <div class="product_img">
                                    <img class="product_img" src="/img/products/{{ $child->img }}" alt="" />
                                </div>
                                <div class="product_title">{{ $child->title }}</div>
                                <a href="{{ url('products/'. $categories->slug . '/' . $child->slug) }}" class="product_link">
                                    <span class="mask"></span>
                                    <span class="product_text">{!! $child->text !!}</span>
                                    <span class="more_span"><span>Подробнее</span></span>
                                </a>
                            </div>
                        </div>
                    </li>
                    @endforeach     
                    <div style="clear: both;"></div>
                </ul>
            </div>
            <div class="grid">
              <ul class="clear"></ul></div><!-- center --> <!-- content -->
          </section>                      
          @endsection