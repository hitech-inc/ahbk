@extends('frontend.layouts.master')

@section('content')
<div class="slider staticSlider" style="overflow: hidden;">
	<ul>
		<li style="background-image: url('/img/about/{{ $background->img }}');">
			<div class="slider_title">
				<center style="margin: 0 auto; max-width: 1360px; padding: 0px 20px;">
					О компании
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
				<li><a href="/" title="Главная">Главная</a></li><li><span>О компании</span></li>
			</ul>
		</div>
		<div class="text">
		@foreach ( $abouts as $about )
			<h2>{{ $about->title }}</h2>
			<br>
			<p>
				{!! $about->text !!}
			</p>
			<div style="clear:both"></div>   
		@endforeach		 
		</div>
		<div class="grid">
			<ul class="clear">
			</ul>
		</div>
	</div><!-- center --> <!-- content --> 
</section> 
@endsection