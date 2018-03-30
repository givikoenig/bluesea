<header id="header">
    <div class="header-content clearfix"> <a class="logo" href="/">BlueSea</a>
      @if(isset($menu))
      <nav class="navigation" role="navigation">
        <ul class="primary-nav">
          @foreach($menu as $item)
            <li><a href="#{{ $item['alias'] }}">{{ $item['title'] }}</a></li>
          @endforeach
        </ul>
      </nav>
      @endif
      <a href="#" class="nav-toggle">Menu<span></span></a> </div>

@if(session('status'))
<div class="alert alert-success">
    {{ session('status') }}
</div>
@endif

@if(count($errors) > 0)
<div class="alert alert-danger">
    <ul>
        @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

  