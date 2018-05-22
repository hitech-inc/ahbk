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
            <li><a href="/" title="Главная">Главная</a></li><li><a href="/products" title="Продукция">Продукция</a></li><li><a href="{{ url('/products/' . $category->slug) }}" title="{{ $category->title }}">{{ $category->title }}</a></li><li><span>{{ $categories->title }}</span></li>        </ul>
    </div>
    <div class="text">
        <h1>
                   {{ $categories->title }}           </h1>
                                    <p>
	 {!! $categories->text !!}
</p>
</div>
@include( 'frontend.partials._callback' )
</div><!-- center --> <!-- content --> 
	                  </section>
@endsection