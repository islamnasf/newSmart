@section('title')
مواد | smart student
@endsection

@section('active1')
active
@endsection

@include('landingpage.layouts.head')

<section id="ten">
    <div class="container bg-light d-flex justify-content-start align-items-end h-100">
        <h2 class="fw-bold fs-1 text-dark">مادة {{$courseDetails->subject_name}}</h2>
    </div>
</section>
<section id="videos">
    <div class="container py-5">
        <div class="row">
            <div class="col-lg-8 col-sm-12 text-center">

                <iframe src="{{$free_video->link}}" width="540" height="360" frameborder="0" allow="autoplay; fullscreen; picture-in-picture" allowfullscreen></iframe>
                @if($free_video->pdf)
                <a class="btn btn-success d-block m-auto w-50 mb-3" download href="{{route('fileDownload', $free_video->pdf)}}">مذكرة الدرس <i class="fa-solid fa-download"></i></a>
                @endif
            </div>
            <div class="col-lg-4 col-sm-12">
                <div class="accordion" id="accordionExample">
                    @foreach($tutorials as $tutorial)
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                <strong> {{$tutorial->name}} </strong>
                            </button>
                        </h2>
                        @foreach($tutorial->video as $video)
                        <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
                            @if($video->type=='free')
                            <a href="{{ route('getSubjectTutorialsAndFreeVideos', [$courseDetails->id, $video->id]) }}">
                                <div class="accordion-body d-flex justify-content-between  ">
                                    <h6>{{$video->name}}</h6>
                                    <i class="fa-solid fa-eye "></i>
                                </div>
                            </a>
                            @else
                            <div class="accordion-body d-flex justify-content-between   bg-dark text-light ">
                                <h6>{{$video->name}} </h6>
                                <i class="fa-solid fa-lock"></i>

                            </div>
                            @endif
                        </div>
                        @endforeach
                    </div>
                    @endforeach


                </div>
            </div>

        </div>
    </div>
</section>
@include('landingpage.layouts.footer')