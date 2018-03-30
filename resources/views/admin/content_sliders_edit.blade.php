<div class="wrapper container-fluid">
    {!! Form::open(['url' => route('sliderEdit',array('sliders'=>$data['id'])),'class'=>'form-horizontal','method'=>'POST','enctype'=>'multipart/form-data']) !!}
    <div class="form-group">
        {!! Form::hidden('id', $data['id']) !!}
        {!! Form::label('title', 'Заголовок:',['class'=>'col-xs-2 control-label']) !!}
        <div class="col-xs-8">
            {!! Form::text('title', $data['title'], ['class' => 'form-control','placeholder'=>'Введите заголовок слайда']) !!}
        </div>
    </div>
    {!! Form::hidden('id', $data['id']) !!}

    <div class="form-group">
        {!! Form::label('text', 'Текст:',['class'=>'col-xs-2 control-label']) !!}
        <div class="col-xs-8">
            {!! Form::text('text', $data['text'], ['class' => 'form-control','placeholder'=>'Введите текст слайда (до 60 символов)']) !!}
        </div>
    </div>
    
    <div class="form-group">
        {!! Form::label('old_img', 'Текущее изображение:',['class'=>'col-xs-2 control-label']) !!}
        <div class="col-xs-offset-2 col-xs-10">
            {!! Html::image('assets/images/slides/'.$data['img'],'',['class'=>'img-responsive','width'=>'150px']) !!}
            {!! Form::hidden('old_img', $data['img']) !!}
        </div>
    </div>

    <div class="form-group">
        {!! Form::label('img', 'Изображение:',['class'=>'col-xs-2 control-label']) !!}
        <div class="col-xs-8">
            {!! Form::file('img', ['class' => 'filestyle','data-buttonText'=>'Выберите изображение','data-buttonName'=>"btn-primary",'data-placeholder'=>"Файла нет"]) !!}
        </div>
    </div>

    <div class="form-group">
        <div class="col-xs-offset-2 col-xs-10">
            {!! Form::button('Сохранить', ['class' => 'btn','type'=>'submit']) !!}
        </div>
    </div>

    {!! Form::close() !!}
</div>
