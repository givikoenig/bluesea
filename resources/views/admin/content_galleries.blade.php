<div style="margin:0px 50px 50px 50px;">

	@if($galleries)    
	<table class="table table-hover table-striped">
		<thead>
			<tr>
				<th>ID</th>
				<th>Имя</th>
				<th>Изображение</th>
				<th>Дата создания</th>
				<th>Удалить</th>
			</tr>
		</thead>
		<tbody>
			@foreach($galleries as $gallery)
				<tr>
					<td>{{ $gallery->id }}</td>
					<td>{!! Html::link(route('galleryEdit',['gallery'=>$gallery->id]), $gallery->name, ['alt'=>$gallery->name]) !!}</td>
					<td>{!! Html::image('assets/images/portfolio/'.$gallery->images,'',array('style'=>'width:150px')) !!}</td>
					<td>{{ $gallery->created_at }}</td>
					<td>
                    {!! Form::open(['url'=>route('galleryEdit',['gallery'=>$gallery->id]), 'class'=>'form-horizontal', 'method'=>'POST']) !!}
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
				<li><a  href="{{route('galleriesAdd')}}"><h5>Add Art</h5></a></li>
			</ul>
		</div>
	</div>   

</div>