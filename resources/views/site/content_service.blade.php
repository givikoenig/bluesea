<br /><br /><br /><br /><br /><br /><br /><br />
<section class="data-section nopad content-3-10">
	<div class="container-fluid">
		<div class="row">
			<div class="col-sm-6 col-sm-offset-3 col-xs-12 content">
				<div class="editContent">
					<h3>{{ $service->name }}</h3>
				</div>
				<div class="editContent">
					{!! $service->text !!}
				</div>
				<br /><br /><br /><br />
				<a href="{{ route('home') }}#services" class="btn btn-outline btn-outline outline-dark">« Back</a>
			</div>
		</div>
	</div><!-- /.container -->
</section>