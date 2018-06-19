@extends('frontend.layouts.master')

@section('content')
<div class="slider staticSlider" style="overflow: hidden;">
    <ul>
      <li style="background-image: url('/img/backgrounds/{{ $background->img }}');">
         <div class="slider_title">
            <center style="margin: 0 auto; max-width: 1360px; padding: 0px 20px;">
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
                <a href="/products" title="@lang('a.products')">@lang('a.products')</a>
            </li>
            <li>
                <a href="{{ url('/products/' . $category->slug) }}" title="{{ $category->title }}"> 
                    @if($lang == 'ru')
                    {{ $category->title }}
                    @else
                    {{ $category->title_kz }}
                    @endif    
                </a>
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
    <div class="text">
        @if($lang == 'ru')
            <h1>
            {{ $categories->title }}           
            </h1>
            <p>
            {!! $categories->text !!}
            </p>
        @else
            <h1>
            {{ $categories->title_kz }}           
            </h1>
            <p>
            {!! $categories->text_kz !!}
            </p>
        @endif
    </div>
    @include( 'frontend.partials._callback' )
</div><!-- center --> <!-- content --> 
</section>
@endsection