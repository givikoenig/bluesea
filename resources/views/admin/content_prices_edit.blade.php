<div class="wrapper container-fluid">
    {!! Form::open(['url'=>route('pricesEdit',array('prices'=>$data['id'])), 'class'=>'form-horizontal', 'method'=>'POST', 'enctype'=>'multipart/form-data']) !!}
    <div class="form-group">
        {!! Form::hidden('id', $data['id']) !!}
        {!! Form::label('name','Название тарифа',['class'=>'col-xs-2 control-label']) !!}   
        <div class="col-xs-8">
            {!! Form::text('name',$data['name'],['class'=>'form-control','placeholder'=>'Введите название тарифа']) !!}
        </div>
    </div>

    <div class="form-group">
        {!! Form::label('old_alias', 'Псевдоним:',['class'=>'col-xs-2 control-label']) !!}
        <div class="col-xs-8">
            {!! Form::text('alias', $data['alias'], ['class' => 'form-control','placeholder'=>'Введите псевдоним']) !!}
        </div>
    </div>
    
    <div class="form-group">
        {!! Form::label('old_position','Текущая позиция',['class'=>'col-xs-2 control-label']) !!}   
        <div class="col-xs-8">
            {!! Form::number('position',$data['position']) !!}
        </div>
    </div>

    <div class="form-group">
        {!! Form::label('old_price','Цена',['class'=>'col-xs-2 control-label']) !!}   
        <div class="col-xs-8">
            {!! Form::number('price',$data['price']) !!}
        </div>
    </div>

    <div class="form-group">
        {!! Form::label('old_period', 'Перодичность:',['class'=>'col-xs-2 control-label']) !!}
        <div class="col-xs-8">
            {!! Form::text('period', $data['period'], ['class' => 'form-control','placeholder'=>'Периодичность платежа']) !!}
        </div>
    </div>
    
    <div class="form-group">
        {!! Form::label('old_storage','Storage [GB]',['class'=>'col-xs-2 control-label']) !!}   
        <div class="col-xs-8">
            {!! Form::number('storage',$data['storage']) !!}
        </div>
    </div>

    <div class="form-group">
        {!! Form::label('old_bandwidth','Bandwidth [GB]',['class'=>'col-xs-2 control-label']) !!}   
        <div class="col-xs-8">
            {!! Form::number('bandwidth',$data['bandwidth']) !!}
        </div>
    </div>
    
    <div class="form-group">
        {!! Form::label('esupport', 'Email-поддержка:',['class'=>'col-xs-2 control-label']) !!}
        <div class="col-xs-8">
        @if($data['esupport'] == '1')
           {!! Form::checkbox('esupport', $data['esupport'] , true) !!}
        @else
            {!! Form::checkbox('esupport', $data['esupport']) !!}
        @endif    
        </div>
    </div>

    <div class="form-group">
        {!! Form::label('support', 'Поддержка:',['class'=>'col-xs-2 control-label']) !!}
        <div class="col-xs-8">
            @if($data['support'] == '1')
                {!! Form::checkbox('support', $data['support'] , true) !!}
            @else
                {!! Form::checkbox('support', $data['support']) !!}
            @endif
        </div>
    </div>
    
    <div class="form-group">
        <div class="col-xs-offset-2 col-xs-10">
            {!! Form::button('Сохранить', ['class' => 'btn','type'=>'submit']) !!}
        </div>
    </div>
    
     {!! Form::close() !!}

</div>
