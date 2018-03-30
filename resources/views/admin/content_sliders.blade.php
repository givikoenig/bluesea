<div style="margin:0px 50px 50px 50px;">

	@if($sliders)    
	<table class="table table-hover table-striped">
		<thead>
			<tr>
				<th>ID</th>
				<th>Изображение</th>
				<th>Заголовок</th>
				<th>Текст</th>
				<th>Дата создания</th>
				<th>Удалить</th>
			</tr>
		</thead>
		<tbody>
			@foreach($sliders as $slider)
				<tr>
					<td>{{ $slider->id }}</td>
					<td>{!! Html::image('assets/images/slides/'.$slider->img,'',array('style'=>'width:150px')) !!}</td>
					<td>{!! Html::link(route('sliderEdit',['slider'=>$slider->id]), $slider->title, ['alt'=>$slider->title]) !!}</td>
					<td>{{ $slider->text }}</td>
					<td>{{ $slider->created_at }}</td>
					<td>
                    {!! Form::open(['url'=>route('sliderEdit',['slider'=>$slider->id]), 'class'=>'form-horizontal', 'method'=>'POST']) !!}
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
				<li><a  href="{{route('slidersAdd')}}"><h5>Add Slider</h5></a></li>
			</ul>
		</div>
	</div>

</div>