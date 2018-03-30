<div class="wrapper container-fluid">
{!! Form::open(['url' => route('pagesEdit',array('page'=>$data['id'])),'class'=>'form-horizontal','method'=>'POST','enctype'=>'multipart/form-data']) !!}
    <div class="form-group">
        {!! Form::hidden('id', $data['id']) !!}
             {!! Form::label('name', 'Название:',['class'=>'col-xs-2 control-label']) !!}
             <div class="col-xs-8">
                        {!! Form::text('name', $data['name'], ['class' => 'form-control','placeholder'=>'Введите название страницы']) !!}
                 </div>
    </div>

    <div class="form-group">
             {!! Form::label('alias', 'Псевдоним:',['class'=>'col-xs-2 control-label']) !!}
             <div class="col-xs-8">
                        {!! Form::text('alias', $data['alias'], ['class' => 'form-control','placeholder'=>'Введите псевдоним страницы']) !!}
                 </div>
    </div>

    <div class="form-group">
             {!! Form::label('title', 'Заголовок-1:',['class'=>'col-xs-2 control-label']) !!}
             <div class="col-xs-8">
                        {!! Form::text('title', $data['title'], ['class' => 'form-control','placeholder'=>'Введите заголовок']) !!}
                 </div>
    </div>

    <div class="form-group">
             {!! Form::label('text', 'Текст-1:',['class'=>'col-xs-2 control-label']) !!}
             <div class="col-xs-8">
                        {!! Form::textarea('text', $data['text'], ['id'=>'editor','class' => 'form-control','placeholder'=>'Введите текст страницы']) !!}
                 </div>
    </div>
    
    @if($odd%2 == 0)
    <div class="form-group">
        {!! Form::label('vtitle', 'Заголовок-2:',['class'=>'col-xs-2 control-label']) !!}
        <div class="col-xs-8">
                        {!! Form::text('vtitle', $data['vtitle'], ['class' => 'form-control','placeholder'=>'Введите заголовок']) !!}
        </div>
    </div>
    @endif
    
    @if($odd%2 == 0)
    <div class="form-group">
             {!! Form::label('vtext', 'Текст-2:',['class'=>'col-xs-2 control-label']) !!}
             <div class="col-xs-8">
                        {!! Form::textarea('vtext', $data['vtext'], ['id'=>'editor2','class' => 'form-control','placeholder'=>'Введите текст страницы']) !!}
                 </div>
    </div>
    @endif

    @if($odd%2 == 0)
    <div class="form-group">
             {!! Form::label('vtitle', 'Текущее видео:',['class'=>'col-xs-2 control-label']) !!}
             <div class="col-xs-8">
                <iframe class="embed-responsive-item" src="{{ $data['video'] }}" allowfullscreen=""></iframe>
             </div>
    </div>
    @endif

    @if($odd%2 == 0)
    <div class="form-group">
        {!! Form::label('video', 'Ссылка на видео:',['class'=>'col-xs-2 control-label']) !!}
        <div class="col-xs-8">
                        {!! Form::text('video', $data['video'], ['class' => 'form-control','placeholder'=>'например: https://www.youtube.com/embed/CpRLwLcLHNA?rel=0']) !!}
        </div>
    </div>
    @endif
    
    <div class="form-group">
        <div class="col-xs-offset-2 col-xs-10">
            {!! Form::button('Сохранить', ['class' => 'btn btn-primary','type'=>'submit']) !!}
        </div>
    </div>

{!! Form::close() !!}

 <script>
        CKEDITOR.replace( 'editor' );
        CKEDITOR.replace( 'editor2' );
</script>
</div>


