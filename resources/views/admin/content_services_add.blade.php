<div class="wrapper container-fluid">
    {!! Form::open(['url'=>route('servicesAdd'), 'class'=>'form-horizontal', 'method'=>'POST', 'enctype'=>'multipart/form-data']) !!}
    <div class="form-group">
        {!! Form::label('name','Имя сервиса',['class'=>'col-xs-2 control-label']) !!}   
        <div class="col-xs-8">
            {!! Form::text('name',old('name'),['class'=>'form-control','placeholder'=>'Введите название сервиса']) !!}
        </div>
    </div>

    <div class="form-group">
        {!! Form::label('alias', 'Псевдоним:',['class'=>'col-xs-2 control-label']) !!}
        <div class="col-xs-8">
            {!! Form::text('alias', old('alias'), ['class' => 'form-control','placeholder'=>'Введите псевдоним']) !!}
        </div>
    </div>

    <div class="form-group">
        {!! Form::label('icon','Иконка',['class'=>'col-xs-2 control-label']) !!}   
        <div class="col-xs-8 iconpicker-container">
            {!! Form::text('icon',old('icon'),['placeholder'=>'Иконка для сервиса']) !!}
        </div>
    </div>

    <div class="form-group">
        {!! Form::label('text', 'Текст:',['class'=>'col-xs-2 control-label']) !!}
        <div class="col-xs-8">
            {!! Form::textarea('text', old('text'), ['id'=> 'editor', 'class' => 'form-control','placeholder'=>'Введите текст']) !!}
        </div>
    </div>

    <div class="form-group">
        <div class="col-xs-offset-2 col-xs-10">
            {!! Form::button('Сохранить', ['class' => 'btn btn-primary','type'=>'submit']) !!}
        </div>
    </div>

    {!! Form::close() !!}

    <script>
        CKEDITOR.replace('editor');
    </script>
</div>

