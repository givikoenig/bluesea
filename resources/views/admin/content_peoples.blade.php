<div style="margin:0px 50px 50px 50px;">

	@if($peoples)    
	<table class="table table-hover table-striped">
		<thead>
			<tr>
				<th>ID</th>
				<th>Имя</th>
				<th>Должность</th>
				<th>Изображение</th>
				<th>Текст</th>
				<th>Дата создания</th>
				<th>Удалить</th>
			</tr>
		</thead>
		<tbody>
			@foreach($peoples as $people)
				<tr>
					<td>{{ $people->id }}</td>
					<td>{!! Html::link(route('peopleEdit',['people'=>$people->id]), $people->name, ['alt'=>$people->name]) !!}</td>
					<td>{{ $people->position }}</td>
					<td>{!! Html::image('assets/images/'.$people->images,'',array('style'=>'width:70px')) !!}</td>
					<td>{{ $people->text }}</td>
					<td>{{ $people->created_at }}</td>
					<td>
                    {!! Form::open(['url'=>route('peopleEdit',['people'=>$people->id]), 'class'=>'form-horizontal', 'method'=>'POST']) !!}
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
				<li><a  href="{{route('peoplesAdd')}}"><h5>Add People</h5></a></li>
			</ul>
		</div>
	</div>   

</div>