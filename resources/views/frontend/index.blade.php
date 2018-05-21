@extends('frontend.layouts.master')

@section('content')
<div class="slider staticSlider" style="overflow: hidden;">
  <ul>
    <li >
      <div class="slider_title">
        <center style="margin: 0 auto; max-width: 1360px; padding: 0px 20px;">
         {!! $text->text !!}</center>
      </div>
      <video id="video" style="width: 100%;" autoplay="autoplay" muted loop controls="">
        <source src="/videos/video.mp4" type="video/mp4">
        <!-- <source src="/videos/video.webm" type="video/webm"> -->
      </video>
    </li>
  </ul>
  <div class="slider_pager"></div>
    <a href="index.html#" class="prev_slide"></a>
    <a href="index.html#" class="next_slide"></a>
</div>
<section id="content">
  <div class="center">
    <div class="grid">
      <ul class="clear">
        <li data-form="" ">
          <div class="grid_block">
            <div class="text_panel">
              <div class="h3">О компании</div>
              <p> {!! $textAbout->text !!}</p>
              <a href="/about" class="more_span more_info indexMore"><span>Подробнее</span></a>
            </div>
          </div>
        </li>
        <li data-form="" class="">
          <div class="grid_block">
            <div class="product product_info">
              <div class="product_img" style="height: inherit;">
                <img src="/img/galleries/big/{{ App\Models\Backend\Gallery::getGallery() }}" alt="" style="height: inherit;" />
              </div>
              <div class="product_title">Фотогалерея</div>
              <a href="/galleries" class="product_link">
                <span class="more_span"><span>Подробнее</span></span>
              </a>
            </div>
          </div>
        </li>
        <li data-form="" class="" style="width: 40%; height: 495px;">
          <div class="grid_block">
            <div class="info_block">
              <div class="info_title">Контакты</div>
              <div class="sliding_text">
                @foreach( App\Models\Backend\Contact::getContacts() as $contact )
                @if ( $loop->index == 0 )
                <div class="info_text" style="color: #fff; font-weight: bold">Отдел продаж в Шымкенте</div>
                <div class="sliding_text_front" style="position: initial; left: initial; top: initial;">
                  <div class="info_text">{{ $contact->address }}</div>
                  <div class="info_text">{{ $contact->phone }}<br/><a href="#">{{ $contact->email }}</a></div>
                </div>
                @else
                <div class="info_text" style="color: #fff; font-weight: bold">Отдел продаж в Алматы</div>
                <div class="sliding_text_front" style="position: : initial; left: initial; top: initial;">
                  <div class="info_text">{{ $contact->address }}</div>
                  <div class="info_text">{{ $contact->phone }}<br/><a href="#">{{ $contact->email }}</a></div>
                </div>
                @endif
                @endforeach
              </div>
              <a href="/contacts" class="more_span more_info indexMore"><span>Подробнее</span></a>
            </div>
          </div>
        </li>
        <li data-form="" class="" style="width: 60%">
          <div class="grid_block">
            <div class="product product_info">
              <div class="product_img">
                <img src="/img/products/{{ App\Models\Category::getProduct() }}" alt="" />
              </div>
              <div class="product_title">Продукция</div>
              <a href="/products" class="product_link">
                <span class="more_span"><span>Подробнее</span></span>
              </a>
            </div>
          </div>
        </li>
      </ul>
    </div>
  </div>  
</section>
@endsection