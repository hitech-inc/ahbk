@extends('frontend.layouts.master')

@section('content')
<section id="content">
  <div class="center">
    <div class="breadcrumbs">
      <ul class="clear">
        <li><a href="/" title="Главная">@lang('a.index')</a></li><li><span>@lang('a.galleries')</span></li>
      </ul>
    </div>
    <div class="grid">
     <ul class="clear">
      @foreach ( $galleries as $gallery )
      <li data-form="" class="" style="width: 33.3333%">
        <div class="grid_block">
          <div class="product">
            <div class="product_img">
              <a href="/img/galleries/big/{{ $gallery->img }}" data-lightbox="roadtrip">
                <img class="product_img" src="/img/galleries/{{ $gallery->small_img }}" alt="$gallery->img" style="max-width: 100%" />
              </a>
            </div>
            {{--<div class="product_title">{{ $gallery->title }}</div>
              <a href="#" class="product_link">
                <span class="mask"></span>
                <span class="product_text">{!! $gallery->text !!}</span>
                <span class="more_span"><span>Подробнее</span></span>
              </a>--}}
          </div>
        </div>
      </li>
        @endforeach
      </ul>
    </div>
@endsection