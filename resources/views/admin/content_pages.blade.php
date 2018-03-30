<div style="margin:0px 50px 0px 50px;">
    
@if($pages)    
    <table class="table table-hover table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Имя</th>
                <th>Заголовок-1</th>
                <th>Псевдоним</th>
                <th>Текст-1</th>
                <th>Заголовок-2</th>
                <th>Текст-2</th>
                <th>Видео</th>
                <th>Дата создания</th>
                <th>Удалить</th>
            </tr>
        </thead>
        <tbody>
            @foreach($pages as $k=>$page)
            <tr>
                <td>{{ $page->id }}</td>
                <td>{!! Html::link(route('pagesEdit',['page'=>$page->id]), $page->name, ['alt'=>$page->name]) !!}</td>
                <td>{{ $page->title }}</td>
                <td>{{ $page->alias }}</td>
                <td>{{ $page->text }}</td>
                <td>{{ $page->vtitle }}</td>
                <td>{{ $page->vtext }}</td>
                <td>
                    @if(isset($page->video))
                    <iframe class="embed-responsive-item" src="{{ $page->video }}" allowfullscreen=""></iframe>
                    @endif 
                </td>
                <td>{{ $page->created_at }}</td>
                <td>
                    {!! Form::open(['url'=>route('pagesEdit',['page'=>$page->id]), 'class'=>'form-horizontal', 'method'=>'POST']) !!}
                        <!--<input type="hidden" name="_method" value="DELETE">-->
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
            <li><a  href="{{route('pagesAdd')}}"><h5>Add Page</h5></a></li>
        </ul>

{{--!! Html::link(route('pagesAdd'), 'Новая страница') !!--}}
    </div>
 </div>   

</div>