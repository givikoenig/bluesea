<div class="wrapper container-fluid">
    {!! Form::open(['url'=>route('pricesAdd'), 'class'=>'form-horizontal', 'method'=>'POST', 'enctype'=>'multipart/form-data']) !!}
    <div class="form-group">
        {!! Form::label('name','Название тарифа',['class'=>'col-xs-2 control-label']) !!}   
        <div class="col-xs-8">
            {!! Form::text('name',old('name'),['class'=>'form-control','placeholder'=>'Введите название тарифа']) !!}
        </div>
    </div>

    <div class="form-group">
        {!! Form::label('alias', 'Псевдоним:',['class'=>'col-xs-2 control-label']) !!}
        <div class="col-xs-8">
            {!! Form::text('alias', old('alias'), ['class' => 'form-control','placeholder'=>'Введите псевдоним']) !!}
        </div>
    </div>

    <div class="form-group">
        {!! Form::label('position','Позиция',['class'=>'col-xs-2 control-label']) !!}   
        <div class="col-xs-8">
            {!! Form::number('position',old('position')) !!}
        </div>
    </div>

    <div class="form-group">
        {!! Form::label('price','Цена [$]',['class'=>'col-xs-2 control-label']) !!}   
        <div class="col-xs-8">
            {!! Form::number('price',old('price')) !!}
        </div>
    </div>

    <div class="form-group">
        {!! Form::label('period','Периодичность',['class'=>'col-xs-2 control-label']) !!}   
        <div class="col-xs-8">
            {!! Form::text('period',old('period'), ['class' => 'form-control','placeholder'=>'Перодичность платежа']) !!}
        </div>
    </div>

    <div class="form-group">
        {!! Form::label('storage','Storage [GB]',['class'=>'col-xs-2 control-label']) !!}   
        <div class="col-xs-8">
            {!! Form::number('storage',old('storage')) !!}
        </div>
    </div>

    <div class="form-group">
        {!! Form::label('bandwidth','Bandwidth [GB]',['class'=>'col-xs-2 control-label']) !!}   
        <div class="col-xs-8">
            {!! Form::number('bandwidth',old('bandwidth')) !!}
        </div>
    </div>

    <div class="form-group">
        {!! Form::label('esupport','Email-поддержка',['class'=>'col-xs-2 control-label']) !!}   
        <div class="col-xs-8">
            {!! Form::checkbox('esupport') !!}
        </div>
    </div>
    
    <div class="form-group">
        {!! Form::label('support','Поддержка',['class'=>'col-xs-2 control-label']) !!}   
        <div class="col-xs-8">
            {!! Form::checkbox('support') !!}
        </div>
    </div>

    <div class="form-group">
        <div class="col-xs-offset-2 col-xs-10">
            {!! Form::button('Сохранить', ['class' => 'btn btn-primary','type'=>'submit']) !!}
        </div>
    </div>

    {!! Form::close() !!}

</div>

