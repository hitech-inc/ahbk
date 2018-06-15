@extends('frontend.layouts.master')

@section('content')
<div class="slider staticSlider" style="overflow: hidden;">
	<ul>
		<li style="background-image: url('/img/about/{{ $background->img }}');">
			<div class="slider_title">
				<center style="margin: 0 auto; max-width: 1360px; padding: 0px 20px;">
					@lang('a.about')
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
				<li><a href="/" title="Главная">@lang('a.index')</a></li><li><span>@lang('a.about')</span></li>
			</ul>
		</div>
		<div class="text">
		@foreach ( $abouts as $about )
			@if ($lang == 'ru')
				<h2>{{ $about->title }}</h2>
				<br>
				<p>
					{!! $about->text !!}
				</p>
				<div style="clear:both"></div>
			@else  
				<h2>{{ $about->title_kz }}</h2>
				<br>
				<p>
					{!! $about->text_kz !!}
				</p>
				<div style="clear:both"></div>
			@endif
		@endforeach		 
		</div>
		<div class="grid">
			<ul class="clear">
			</ul>
		</div>
	</div><!-- center --> <!-- content --> 
</section> 
@endsection