@extends('public.index')
@section('content')
<section id="contentSection">
    <div class="row">
      <div class="col-lg-8 col-md-8 col-sm-8">
        <div class="left_content">
          <div class="single_page">
            <ol class="breadcrumb">
              <li><a href="{{ route('public') }}">Home</a></li>
              <li><a href="#">{{ $post->category->name }}</a></li>
              <li class="active">{{ $post->subcategory->name }}</li>
            </ol>
            <h1>{{ $post->title }}</h1>
            <div class="post_commentbox"> <a href="#"><i class="fa fa-user"></i>{{ $post->user->name }}</a> <span><i class="fa fa-calendar"></i>{{ date('d-M-Y:h:i:A',strtotime($post->created_at)) }}</span> <a href="#"><i class="fa fa-tags"></i>{{ $post->tag }}</a> </div>
            <div class="single_page_content"> <img class="img-center"  src="{{ asset('upload/postimage/'.$post->image) }}" alt="">
              <h4 style="text-align: justify;color: #000">{!! $post->description !!}</h4>
              {{-- <blockquote style="text-align: justify;color: blue"> <i> {!! $post->description !!} </i></blockquote> --}}
              
              <div style="padding-top: 50px" >
                @if($post->file == NULL)

                @else
                <a target="_blank" href="{{asset('upload/postfile/'.$post->file)}}" class="btn btn-primary">File Download &nbsp;&nbsp;<i class="fa fa-arrow-right"></i></a>
                @endif
                 @if($post->video_link == 'No')
              
                @else
                <a target="_blank" href="{{ $post->video_link }}" class="btn btn-warning">  Go To Video &nbsp;&nbsp;<i class="fa fa-arrow-right"></i></a>
                @endif
                 @if($post->link == 'No')
              
                @else
                <a target="_blank" href="{{ $post->link }}" class="btn btn-danger"> Visit Link  &nbsp;&nbsp;<i class="fa fa-arrow-right"></i></a>
                @endif
              </div>
              
            </div>
            <div class="social_link">
              <ul class="sociallink_nav">
                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                <li><a href="#"><i class="fa fa-pinterest"></i></a></li>
              </ul>
            </div>
            <div class="related_post">
              <h3>সম্পর্কিত</i></h3>
              <hr style="border: solid crimson">
              <ul class="photograph_nav  wow fadeInDown">
              	@foreach($relateds as $related)
                <li>
                  <div style="height: 125px" class="media"> <a class="media-left" href="{{ route('singlepost',$related->slug) }}"> <img src="{{ asset('upload/postimage/'.$related->image) }} " alt=""> </a>
                    <div class="media-body"> <a class="catg_title" href="{{ route('singlepost',$related->slug) }}">{{ $related->title }}</a> </div>
                  </div>
                </li>
                @endforeach
              </ul>
              {{ $relateds->links() }}
            </div>

            <div class="related_post">
              <h3>সর্বশেষ</i></h3>
              <hr style="border: solid crimson">
              <ul class="photograph_nav  wow fadeInDown">
                @foreach($latests as $latest)
                <li>
                  <div style="height: 125px" class="media"> <a class="media-left" href="{{ route('singlepost',$latest->slug) }}"> <img src="{{ asset('upload/postimage/'.$latest->image) }}" alt=""> </a>
                    <div class="media-body"> <a class="catg_title" href="{{ route('singlepost',$latest->slug) }}">{{ $latest->title }}</a> </div>
                  </div>
                </li>
                @endforeach
              </ul>
              {{ $latests->links() }}
            </div>

             <div class="related_post">
              <h3>জনপ্রিয়</i></h3>
              <hr style="border: solid crimson">
              <ul class="photograph_nav  wow fadeInDown">
                @foreach($populars as $popular)
                <li>
                  <div style="height: 125px" class="media"> <a class="media-left" href="{{ route('singlepost',$popular->slug) }}"> <img src="{{ asset('upload/postimage/'.$popular->image) }}" alt=""> </a>
                    <div class="media-body"> <a class="catg_title" href="{{ route('singlepost',$popular->slug) }}">{{ $popular->title }}</a> </div>
                  </div>
                </li>
                @endforeach
              </ul>
               {{ $populars->links() }}
            </div>



          </div>
        </div>
      </div>
      <nav class="nav-slit"> <a class="prev" href="#"> <span class="icon-wrap"><i class="fa fa-angle-left"></i></span>
        <div>
          <h3>City Lights</h3>
          <img src="{{ asset('frontend') }}/images/post_img1.jpg" alt=""/> </div>
        </a> <a class="next" href="#"> <span class="icon-wrap"><i class="fa fa-angle-right"></i></span>
        <div>
          <h3>Street Hills</h3>
          <img src="{{ asset('frontend') }}/images/post_img1.jpg" alt=""/> </div>
        </a> </nav>
      @include('public.single_page.single_sidebar')
    </div>
  </section>

@endsection