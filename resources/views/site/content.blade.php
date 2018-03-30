@if(isset($sliders) && is_object($sliders))

<div class="banner" id="banner"> 
  <div class="slider-banner">
    @foreach($sliders as $slider)
    <div class="text-center" data-lazy-background="{{ URL::asset('assets/images/slides/'.$slider->img) }}"> 
      <h3 data-pos="['68%', '-40%', '58%', '42%']" data-duration="700" data-effect="move">
        {{ $slider->title }}
      </h3> <br>
      <p data-pos="['75%', '110%', '75%', '32%']" data-duration="700" data-effect="move">{{ $slider->text }}</p> 
    </div>
    @endforeach
  </div>
</div>
<!-- banner text --> 
@endif
</section>
<!-- header section --> 

@if(isset($pages) && is_object($pages))

@foreach($pages as $k=>$page)
@if($k%2 == 0)
<!-- intro section -->
<section id="{{ $page->alias }}" class="section intro">
  <div class="container">
    <div class="col-md-8 col-md-offset-2 text-center">
      <a href="{{ route('page',array('alias'=>$page->alias)) }}"><h3>{{ $page->title }}</h3>
        {!! $page->text !!}</a>
      </div>
    </div>
  </section>
  <!-- intro section --> 
  @else
  <!--About-->
  <section id="{{ $page->alias }}" class="content-block data-section nopad content-3-10">
    <div class="image-container col-sm-6 col-xs-12 pull-left">
      <div class={{ ($k == 1) ?  'background-image-holder' : ''}}>
      </div>
    </div>
    <div class="container-fluid">
      <div class="row">
        @if($k == 1)
          <div class="col-sm-6 col-sm-offset-6 col-xs-12 content">
        @else
          <div class="col-sm-6 col-xs-12 content">
          
        @endif
          <div class="editContent">
            <h3>{{ $page->title }}</h3>
          </div>
          <div class="editContent">
            {!! $page->text !!}
          </div>
          <a href="#gallery" class="btn btn-outline btn-outline outline-dark">Our Gallery</a>
        </div>
      </div><!-- /.row-->
    </div><!-- /.container -->
  </section>
  <!-- package section -->
  <section class="video-section">
    <div class="container"> 
      <div class="row">  
        <div id="content24" data-section="content-24" class="data-section"> 
          <div class="col-md-6">
            <h3 class="eidtContent">{{ $page->vtitle }}</h3>
            <p class="eidtContent">{!! $page->vtext !!}</p>
          </div>
          <div class="col-md-6">
            <div class="embed-responsive embed-responsive-16by9">
              <!-- <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/CpRLwLcLHNA" frameborder="0" allowfullscreen></iframe> -->
              <iframe class="embed-responsive-item" src="{{ $page->video }}" allowfullscreen=""></iframe>
            </div>

            </iframe>
          </div> 
        </div>
      </div><!-- end row -->    
    </div>
  </section>
  <!-- package section --> 
  @endif
  @endforeach

  @endif

  @if(isset($services) && is_object($services))

  <!-- services section -->
  <section id="services" class="services service-section">
    <div class="container">
      <div class="section-header">
        <h2 class="wow fadeInDown animated">Our Services</h2>
        <p class="wow fadeInDown animated">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent eget risus vitae massa <br> semper aliquam quis mattis quam.</p>
      </div>
      <div class="row">

        @foreach($services as $k=>$service)

        <div class="col-md-4 col-sm-6 services text-center"> <span class="icon {{ $service->icon }}"></span>
          <div class="services-content" style="height: 220px;  overflow: hidden;">
            <h5><a style="color: #2d3033;" href="{{ route('service',array('alias'=>$service->alias)) }}">{{ $service->name }}</a></h5>
            <p><a style="color: #939191;" href="{{ route('service',array('alias'=>$service->alias)) }}">{!! str_limit($service->text, 127) !!}</a></p>
          </div>
        </div>

        @endforeach

      </div>
      
    </div>
  </section>
  <!-- services section --> 

  @endif

  @if(isset($galleries) && is_object($galleries))
  <!-- gallery section -->
  <section id="gallery" class="gallery section">
    <div class="container-fluid">
      <div class="section-header">
        <h2 class="wow fadeInDown animated">Gallery</h2>
        <p class="wow fadeInDown animated">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent eget risus vitae massa <br> semper aliquam quis mattis quam.</p>
      </div>
      <div class="row no-gutter">
        @foreach($galleries as $gallery)
        <div class="col-lg-3 col-md-6 col-sm-6 work"> <a href="{{ URL::asset('/assets/images/portfolio/'.$gallery->images) }}" class="work-box"> <img src="{{ URL::asset('/assets/images/portfolio/'.$gallery->images) }}" alt="{{ $gallery->name }}"  style="position: relative; overflow: hidden; height: 277px;">
          <div class="overlay">
            <div class="overlay-caption">
              <p><span class="icon icon-magnifying-glass"> {{ $gallery->name }}</span></p>
            </div>
          </div>
        </a> </div>
        @endforeach
      </div><!--./row-->
    </div>
  </section>
  <!-- gallery section --> 
  @endif


  @if(isset($peoples) && is_object($peoples))
  <!-- our team section -->
  <section id="teams" class="section teams">
    <div class="container">
      <div class="section-header">
        <h2 class="wow fadeInDown animated">Our Team</h2>
        <p class="wow fadeInDown animated">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent eget risus vitae massa <br> semper aliquam quis mattis quam.</p>
      </div>
      <div class="row">

        @foreach($peoples as $people)

        <div class="col-md-3 col-sm-6">
          <div class="person"><img src="{{ URL::asset('assets/images/'.$people->images) }}" alt="{{ $people->name }}" class="img-responsive"  style="position: relative; overflow: hidden; height: 150px;">
            <div class="person-content">
              <h4>{{ $people->name }}</h4>
              <h5 class="role">{{ $people->position }}</h5>
              <p>{{ $people->text }}</p>
            </div>
            <ul class="social-icons clearfix">
              <li><a href="#"><span class="fa fa-facebook"></span></a></li>
              <li><a href="#"><span class="fa fa-twitter"></span></a></li> 
              <li><a href="#"><span class="fa fa-google-plus"></span></a></li> 
            </ul>
          </div>
        </div>

        @endforeach

      </div>
    </div>
  </section>
  <!-- our team section --> 
  @endif

  @if(isset($prices) && is_object($prices))
  <section id="pricing5" data-section="pricing-5" class="data-section">
    <div class="container">
      <div class="section-header">
        <h2 class="wow fadeInDown animated">Pricing</h2>
        <p class="wow fadeInDown animated">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent eget risus vitae massa <br> semper aliquam quis mattis quam.</p>
      </div>
      <div class="row">
        @foreach($prices as $k=>$price)
        @if($k%2 == 0)
        <div class="col-md-3 {{ $k == 0 ? 'col-md-offset-1' : '' }}">
          <div class="table">
            <h3 class="editContent">{{ $price->name }}</h3>
            <h2 class="editContent">${{ $price->price }}</h2>
            <p class="editContent">{{ $price->period }}</p>
            <ul class="table-content">
              <li class="editContent"><i class="fa fa-hdd-o"></i> {{ $price->storage }} GB Storage</li>
              <li class="editContent"><i class="fa fa-pie-chart"></i> {{ $price->bandwidth }} GB Bandwidth</li>
              @if($price->esupport == '1')
              <li class="editContent"><i class="fa fa-envelope-o"></i> Email Support </li>
              @else
              <li class="editContent" style="text-decoration: line-through;"><i class="fa fa-envelope-o"></i> Email Support </li>
              @endif
              @if($price->support == '1')
              <li class="editContent"><i class="fa fa-cogs"></i> 24x7 Support</li>
              @else
              <li class="editContent" style="text-decoration: line-through;><i class="fa fa-cogs"></i> 24x7 Support</li>
              @endif
            </ul>
            <div class="text-center text-uppercase">
              <a href="#" class="btn btn-default-green-transparent-tiny editContent">Signup Now</a>
            </div>
          </div>
        </div>
        @else
        <div class="col-md-4">
          <div class="table long-table">
            <h3 class="editContent">{{ $price->name }}</h3>
            <h2 class="editContent">${{ $price->price }}</h2>
            <p class="editContent">{{ $price->period }}</p>
            <ul class="table-content">
              <li class="editContent"><i class="fa fa-hdd-o"></i> {{ $price->storage }} GB Storage</li>
              <li class="editContent"><i class="fa fa-pie-chart"></i> {{ $price->bandwidth }} GB Bandwidth</li>
              @if($price->esupport == '1')
              <li class="editContent"><i class="fa fa-envelope-o"></i> Email Support </li>
              @else
              <li class="editContent" style="text-decoration: line-through;"><i class="fa fa-envelope-o"></i> Email Support </li>
              @endif
              @if($price->support == '1')
              <li class="editContent"><i class="fa fa-cogs"></i> 24x7 Support</li>
              @else
              <li class="editContent" style="text-decoration: line-through;><i class="fa fa-cogs"></i> 24x7 Support</li>
              @endif
            </ul>
            <div class="text-center text-uppercase">
              <a href="#" class="btn btn-default-blue-tiny editContent">Signup Now</a>
            </div>
          </div>
        </div>
        @endif
        @endforeach
      </div>
    </div>
  </section>
  @endif

  @if(isset($testimonials) && is_object($testimonials))
  <!-- Testimonials section -->
  <section id="testimonials" class="section testimonials no-padding">
    <div class="container-fluid">
      <div class="row no-gutter">
        <div class="flexslider">
          <ul class="slides">
            @foreach($testimonials as $testimonial)
            <li>
              <div class="col-md-12">
                <blockquote>
                  <h1>"{{ $testimonial->text }}" </h1>
                  <p>{{ $testimonial->name }}</p>
                </blockquote>
              </div>
            </li>
            @endforeach
          </ul>
        </div>
      </div>
    </div>
  </section>
  <!-- Testimonials section --> 
  @endif


  <!-- contact section -->
  <section id="contact" class="section">
    <div class="container">
      <div class="section-header">
        <h2 class="wow fadeInDown animated">Contact Us</h2>
        <p class="wow fadeInDown animated">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent eget risus vitae massa <br> semper aliquam quis mattis quam.</p>
      </div>
      <div class="row">
        <div class="col-md-8 col-md-offset-2 conForm">       
          <div id="message"></div>

          <form method="post" action="{{ route('home') }}">
           <!-- name="cform"  id="cform"-->
            <input name="name" id="name" type="text" class="col-xs-12 col-sm-12 col-md-12 col-lg-12" placeholder="Your name..." >
             <!-- id="name" -->
            <input name="email" id="email" type="email" class=" col-xs-12 col-sm-12 col-md-12 col-lg-12 noMarr" placeholder="Email Address..." >
             <!-- id="email" -->
            <textarea name="text" id="comments" cols="" rows="" class="col-xs-12 col-sm-12 col-md-12 col-lg-12" placeholder="Message..."></textarea>
             <!-- id="comments" -->
            <input type="submit" class="submitBnt" id="submit" name="send" value="Send">
             <!-- name="send"  id="submit"  name="send"-->
            <div id="simple-msg"></div>

            {{ csrf_field() }}
          </form>

        </div>
      </div>
    </div>
  </section>
  <!-- contact section --> 
  <!-- Footer section -->
  <footer class="footer">
    <div class="container-fluid">
      <div id="map-row" class="row">
        <div class="col-xs-12">   

          <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d2304.3287149089256!2d20.4714493!3d54.7214326!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x46e3161626440a81%3A0x7b1c16df1e073f3!2z0JXRgtCw0LnQvw!5e0!3m2!1sru!2sru!4v1491204277451" width="100%" height="400" frameborder="0" style="border:0" allowfullscreen></iframe>

          <div id="map-overlay" class="col-xs-5 col-xs-offset-6" style="left: 50px;">
            <h2 style="margin-top:0;color:#fff;">Contact us</h2>
            <address style="color:#fff;">
              <strong>Etype Co.</strong><br>
              94 Mira Av.<br>
              Kaliningrad,<br>
              Russia<br>
              236000<br>
              <abbr title="Phone">Tel:</abbr> (4012) 555-4321
            </address>
            © 2018 Company Name. Template by <a target="_blank" href="http://webthemez.com/interior-design/" title="Bootstrap Themes and HTML Templates">WebThemez.com</a>
          </div>
        </div>
      </div>
    </div>
  </footer>
  <!-- Footer section --> 

