<div style="margin:0px 50px 50px 50px;">
    @if($services)
    <table class="table table-hover table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Имя</th>
                <th>Псевдоним</th>
                <th class="text-center">Иконка</th>
                <th>Текст</th>
                <th>Дата создания</th>
                <th>Удалить</th>
            </tr>
        </thead>
        <tbody>
            @foreach($services as $k => $service)
            <tr>
                <td>{{ $service->id }}</td>
                <td>{!! Html::link(route('serviceEdit',['service'=>$service->id]), $service->name, ['alt'=>$service->name] ) !!}</td>
                <td>{{ $service->alias }}</td>
                <td> <div class="service_icon text-center"><i class="icon {{ $service->icon }}"></i></div> </td>
                <td>{{ $service->text }}</td>
                <td>{{ $service->created_at }}</td>
                <td>
                {!! Form::open(['url'=>route('serviceEdit',['service'=>$service->id]),'class'=>'form-horizontal','method'=>'POST']) !!}
                    {{ method_field('delete') }}
                    {!! Form::button('Удалить',['class'=>'btn btn-danger','type'=>'submit']) !!}
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
                <li><a  href="{{route('servicesAdd')}}"><h5>Add Service</h5></a></li>
            </ul>
        </div>
    </div>
</div>

