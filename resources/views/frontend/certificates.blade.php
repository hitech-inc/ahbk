@extends('frontend.layouts.master')

@section('content')
<section id="content">
	<div class="center">
		<div class="breadcrumbs">
			<ul class="clear">
				<li><a href="/" title="Главная">@lang('a.index')</a></li><li><span>@lang('a.certificates')</span></li>
			</ul>
		</div>
		<div class="container">
			<div class="row">
				@foreach( $certificates as $certificate )
				<div class="col-4">
					<div class="certItem">
						<a href="#"><img src="/img/certificates/{{ $certificate->img }}" alt="$certificate->title" style="max-width: 100%"></a>
					</div>
				</div>
				@endforeach
			</div>
		</div>
	</div>
</section>		
@endsection