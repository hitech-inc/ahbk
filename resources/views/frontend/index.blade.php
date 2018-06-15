@extends('frontend.layouts.master')

@section('content')
<div class="slider staticSlider" style="overflow: hidden;">
  <ul>
    <li >
      <div class="slider_title">
        <center class="mainText" style="margin: 0 auto; max-width: 1360px; padding: 0px 20px;">
         @if ($lang == 'ru')
          {!! $text->text !!}
         @else
          {!! $text->text_kz !!}
         @endif 
        </center>
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
            <div class="text_panel" style="overflow: hidden;">
              <div class="h3">@lang('a.about')</div>
              @if ($lang == 'ru')
                <p>{!! $textAbout->text !!}</p>
              @else
                <p>{!! $textAbout->text_kz !!}</p>      
              @endif    
              <a href="/about" class="more_span more_info indexMore"><span>@lang('a.more')</span></a>
            </div>
          </div>
        </li>
        <li data-form="" class="">
          <div class="grid_block">
            <div class="product product_info">
              <div class="product_img" style="height: inherit;">
                <img src="/img/galleries/big/{{ App\Models\Backend\Gallery::getGallery() }}" alt="" style="height: inherit;" />
              </div>
              <div class="product_title">@lang('a.galleries')</div>
              <a href="/galleries" class="product_link">
                <span class="more_span"><span>@lang('a.more')</span></span>
              </a>
            </div>
          </div>
        </li>
        <li data-form="" class="" style="width: 40%; height: 495px;">
          <div class="grid_block">
            <div class="info_block">
              <div class="info_title">@lang('a.contacts')</div>
              <div class="sliding_text">
                @foreach( App\Models\Backend\Contact::getContacts() as $contact )
                  @if ( $contact->id == 2 )
                  <div class="info_text" style="color: #fff; font-weight: bold">
                    @if ($lang == 'ru')
                      {{$contact->title}}
                    @else
                      {{$contact->title_kz}}
                    @endif 
                  </div>
                  <div class="sliding_text_front" style="position: initial; left: initial; top: initial;">
                    <div class="info_text">
                      @if ($lang == 'ru')
                        {{ $contact->address }}
                      @else
                        {{ $contact->address_kz }}
                      @endif   
                    </div>
                    <div class="info_text">{{ $contact->phone }}<br/><a href="#">{{ $contact->email }}</a></div>
                  </div>
                  @elseif($contact->id == 3)
                  <div class="info_text" style="color: #fff; font-weight: bold">
                    @if($lang == 'ru')
                      {{ $contact->title }}
                    @else
                      {{$contact->title_kz}} 
                    @endif
                  </div>
                  <div class="sliding_text_front" style="position: : initial; left: initial; top: initial;">
                    <div class="info_text">
                      @if ($lang == 'ru')
                        {{ $contact->address }}
                      @else
                        {{ $contact->address_kz }}
                      @endif 
                    </div>
                    <div class="info_text">{{ $contact->phone }}<br/><a href="#">{{ $contact->email }}</a></div>
                  </div>
                  @endif
                @endforeach
              </div>
              <a href="/contacts" class="more_span more_info indexMore"><span>@lang('a.more')</span></a>
            </div>
          </div>
        </li>
        <li data-form="" class="" style="width: 60%">
          <div class="grid_block">
            <div class="product product_info">
              <div class="product_img">
                <img src="/img/products/{{ App\Models\Category::getProduct() }}" alt="" />
              </div>
              <div class="product_title">@lang('a.products')</div>
              <a href="/products" class="product_link">
                <span class="more_span"><span>@lang('a.more')</span></span>
              </a>
            </div>
          </div>
        </li>
      </ul>
    </div>
  </div>  
</section>
@endsection