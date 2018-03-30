<div class="wrapper container-fluid">
    {!! Form::open(['url' => route('peoplesAdd'),'class'=>'form-horizontal','method'=>'POST','enctype'=>'multipart/form-data']) !!}
    
    <div class="form-group">
        {!! Form::label('name','Имя',['class'=>'col-xs-2 control-label']) !!}   
        <div class="col-xs-8">
            {!! Form::text('name',old('name'),['class'=>'form-control','placeholder'=>'Введите имя']) !!}
        </div>
    </div>

    <div class="form-group">
        {!! Form::label('position','Имя',['class'=>'col-xs-2 control-label']) !!}   
        <div class="col-xs-8">
            {!! Form::text('position',old('position'),['class'=>'form-control','placeholder'=>'Введите должность']) !!}
        </div>
    </div>

    <div class="form-group">
        {!! Form::label('text','Текст',['class'=>'col-xs-2 control-label']) !!}   
        <div class="col-xs-8">
            {!! Form::text('text',old('text'),['class'=>'form-control','placeholder'=>'Небольшой текст (до 100 символов)']) !!}
        </div>
    </div>

    <div class="form-group">
        {!! Form::label('images', 'Изображение:',['class'=>'col-xs-2 control-label']) !!}
        <div class="col-xs-8">
            {!! Form::file('images', ['class' => 'filestyle', 'data-buttonText'=>'&nbsp;&nbsp;Выберите изображение', 'data-buttonName'=>"", 'data-placeholder'=>"Файла нет"] ) !!}
        </div>
    </div>
    
    <div class="form-group">
        <div class="col-xs-offset-2 col-xs-10">
            {!! Form::button('Сохранить', ['class' => 'btn','type'=>'submit']) !!}
        </div>
    </div>
    
    {!! Form::close() !!}
</div>

