<div class="wrapper container-fluid">
	{!! Form::open(['url' => route('testimonialsAdd'),'class'=>'form-horizontal','method'=>'POST','enctype'=>'multipart/form-data']) !!}

	<div class="form-group">
		{!! Form::label('name','Имя',['class'=>'col-xs-2 control-label']) !!}   
		<div class="col-xs-8">
			{!! Form::text('name',old('name'),['class'=>'form-control','placeholder'=>'Введите имя']) !!}
		</div>
	</div>

	<div class="form-group">
		{!! Form::label('text','Текст',['class'=>'col-xs-2 control-label']) !!}   
		<div class="col-xs-8">
			{!! Form::textarea('text',old('text'),['class'=>'form-control','placeholder'=>'Короткий текст (до 255 символов)']) !!}
		</div>
	</div>

	<div class="form-group">
		<div class="col-xs-offset-2 col-xs-10">
			{!! Form::button('Сохранить', ['class' => 'btn','type'=>'submit']) !!}
		</div>
	</div>

	{!! Form::close() !!}
</div>

