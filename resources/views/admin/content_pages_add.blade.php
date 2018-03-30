<div class="wrapper container-fluid">

    {!! Form::open(['url' => route('pagesAdd'),'class'=>'form-horizontal','method'=>'POST','enctype'=>'multipart/form-data']) !!}

    <div class="form-group">
        {!! Form::label('name','Название',['class'=>'col-xs-2 control-label']) !!}   
        <div class="col-xs-8">
            {!! Form::text('name',old('name'),['class'=>'form-control','placeholder'=>'Введите имя страницы']) !!}
        </div>
    </div>

    <div class="form-group">
        {!! Form::label('alias', 'Псевдоним:',['class'=>'col-xs-2 control-label']) !!}
        <div class="col-xs-8">
            {!! Form::text('alias', old('alias'), ['class' => 'form-control','placeholder'=>'Введите псевдоним страницы']) !!}
        </div>
    </div>

    <div class="form-group">
        {!! Form::label('title', 'Заголовок-1:',['class'=>'col-xs-2 control-label']) !!}
        <div class="col-xs-8">
            {!! Form::text('title', old('title'), ['class' => 'form-control','placeholder'=>'Введите заголовок']) !!}
        </div>
    </div>

    <div class="form-group">
        {!! Form::label('text', 'Текст-1:',['class'=>'col-xs-2 control-label']) !!}
        <div class="col-xs-8">
            {!! Form::textarea('text', old('text'), ['id'=>'editor','class' => 'form-control','placeholder'=>'Введите текст страницы']) !!}
        </div>
    </div>

    <div class="form-group">
        {!! Form::label('vtitle', 'Заголовок-2:',['class'=>'col-xs-2 control-label']) !!}
        <div class="col-xs-8">
            {!! Form::text('vtitle', old('vtitle'), ['class' => 'form-control','placeholder'=>'Введите заголовок', $odd%2 == 0 ? 'disabled' : '' ]) !!}
        </div>
    </div>

    <div class="form-group">
        {!! Form::label('vtext', 'Текст-2:',['class'=>'col-xs-2 control-label']) !!}
        <div class="col-xs-8">
            {!! Form::textarea('vtext', old('vtext'), ['id'=>'editor2','class' => 'form-control','placeholder'=>'Введите текст страницы', $odd%2 == 0 ? 'disabled' : '']) !!}
        </div>
    </div>

    <div class="form-group">
        {!! Form::label('images', 'Ссылка на видео:',['class'=>'col-xs-2 control-label']) !!}
        <div class="col-xs-8">
            {!! Form::text('video', old('video'), ['class' => 'form-control','placeholder'=>'например: https://www.youtube.com/embed/CpRLwLcLHNA?rel=0', $odd%2 == 0 ? 'disabled' : '']) !!}
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
        CKEDITOR.replace('editor2');
    </script>
        
    
</div>
