@extends('frontend.layouts.master')

@section('content')
<section id="content">
	<div class="center">
    <div class="breadcrumbs">
      <ul class="clear">
        <li><a href="/" title="Главная">Главная</a></li><li><span>Фотогалерея</span></li>
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
    <!-- <div class="text">
      <h2 style="border: 0px; background-image: initial; background-color: #ffffff;"><span style="border: 0px; background-image: initial;">АХБК Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod</span></h2>
      <p>
       <br>
       <b>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
        quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
      consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse.</b>
    </p>
    <p>
     <span style="background-color: #ffffff;">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
      tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
      quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
    consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse.</span><br>
  </p>
  <p style="border: 0px; background-image: initial; background-color: #ffffff;">
  </p>
  <h3></h3>
  <p>
  	<i>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
      tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
      quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
    consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse.</i><br>
  </p>
  <p>
  	<span style="background-color: #ffffff;">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
      tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
      quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
    consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse.</span>
  </p>
  <p>
  	<span style="background-color: #ffffff;">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
      tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
      quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
    consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse.</span><br>
  </p>
  <p style="border: 0px; background-image: initial; background-color: #ffffff;">
  	Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
    consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse.<br>
  </p>
  <p>
  </p>	<div style="clear:both"></div>        
</div> -->
@endsection