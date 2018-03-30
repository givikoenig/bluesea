<div style="margin:0px 50px 50px 50px;">

	@if($testimonials)    
	<table class="table table-hover table-striped">
		<thead>
			<tr>
				<th>ID</th>
				<th>Имя</th>
				<th>Текст</th>
				<th>Дата создания</th>
				<th>Удалить</th>
			</tr>
		</thead>
		<tbody>
			@foreach($testimonials as $testimonial)
				<tr>
					<td>{{ $testimonial->id }}</td>
					<td>{!! Html::link(route('testimonialEdit',['testimonial'=>$testimonial->id]), $testimonial->name, ['alt'=>$testimonial->name]) !!}</td>
					<td>{{ $testimonial->text }}</td>
					<td>{{ $testimonial->created_at }}</td>
					<td>
                    {!! Form::open(['url'=>route('testimonialEdit',['testimonial'=>$testimonial->id]), 'class'=>'form-horizontal', 'method'=>'POST']) !!}
                        {{ method_field('delete') }}
                        {!! Form::button('Удалить', ['class'=>'btn','type'=>'submit']) !!}
                    {!! Form::close() !!}
                	</td>
				</tr>
			@endforeach
		</tbody>
	</table>
	@endif
	<br />
	<div class="portfolio">
		<div id="filters" class="sixteen columns">
			<ul style="padding:0px 0px 0px 0px">
				<li><a  href="{{route('testimonialsAdd')}}"><h5>Add Testimonial</h5></a></li>
			</ul>
		</div>
	</div>

</div>