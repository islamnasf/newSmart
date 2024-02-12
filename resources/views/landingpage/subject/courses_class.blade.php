@section('title')
مواد | Smart Student
@endsection
@section('active1')
active
@endsection
@include('landingpage.layouts.head')
<section id="ten">
    <div class="container bg-light d-flex justify-content-start align-items-end h-100">
        <h2 class="fw-bold fs-1 text-dark">المواد</h2>
    </div>
    @if($courses->count() > 0)

</section>
@foreach($courses as $course)
@endforeach
<section>
    <div class="container py-5">
        <h4 class="text-center title fw-bold pt-5"> {{$course->classroom}}</h4>
        <div class="owl-carousel owl-theme pb-5 text-center">
            @foreach($courses as $course)
            <div class="item">

                <div class="card bg-light text-dark ">
                    @php
                    $tutorials = \App\Models\Tutorial::where('course_id', $course->id)->get();
                    $first_video_free = null; 
                    foreach($tutorials as $tutorial) {
                    $first_video_free = \App\Models\Video::where('tutorial_id', $tutorial->id)->where('type','free')->first();
                    if ($first_video_free) {
                    break; 
                    }
                    }
                    @endphp
                    @if($first_video_free)
                    <a href="{{ route('getSubjectTutorialsAndFreeVideos', [$course->id, $first_video_free->id]) }}" class="contant-2 mt-3 ms-3 d-flex gap-5 justify-content-center align-items-center text-dark">
                        <div class="imgvideo">
                            <h5 class="fw-bold text-dark">{{$course->subject_name}}</h5>
                            <button class="btn btn-danger">تجربة مجانية</button>
                        </div>
                        <img src="/assets/ass/img/books1.png" width="150" alt="">
                    </a>
                    @else
                    <a href="#" class="contant-2 mt-3 ms-3 d-flex gap-5 justify-content-center align-items-center text-dark">
                        <div class="imgvideo">
                            <h5 class="fw-bold text-dark">{{$course->subject_name}}</h5>
                            <button class="btn btn-danger">تجربة مجانية</button>
                        </div>
                        <img src="/assets/ass/img/books1.png" width="150" alt="">
                    </a>
                    @endif
                    <div class="btn-sub d-flex justify-content-around py-3 align-items-center">
                        <div class="shoping">
                            <a class="btn btn-dark fw-bold  mx-auto" href="{{route('login')}}" style="letter-spacing: .7px;"> شهر {{$course->monthly_subscription_price}} د.ك <i class="fa-solid fa-gift ms-2"></i></a>
                        </div>
                        <div class="shoping">
                            <a class="btn btn-dark fw-bold mx-auto" href="{{route('login')}}" style="letter-spacing: 1.1px;"> ترم {{$course->term_price}} د.ك <i class="fa-solid fa-gift ms-2"></i></a>
                        </div>
                    </div>

                </div>

            </div>
            @endforeach
        </div>
        <div class="row ">
            @foreach($course_Packages as $package)
            <div class="col-lg-7 col-sm-12 mx-auto">
                <div class="card mb-3 w-100 bg-light text-dark">
                    <div class="contant-card d-flex align-items-center ">
                        <div class="contant-1 ps-4">
                            <h5 class="fw-bold  pt-2"> {{$package->name}} <span class="text-danger">(الذهبية)</span></h5>
                            <span class="text-dark d-block">(تشمل {{$package->course()->count();}}مواد)</span>
                            @foreach($package->course as $course)
                            <span class="text-dark">{{$course->subject_name}}</span>
                            @if (!$loop->last)
                            <span> - </span>
                            @endif
                            @endforeach
                        </div>
                        <div class="img-card1 text-center ms-auto pe-4 py-4 w-100">
                            <img src="/assets/ass/img/img-card2.png" width="150" alt="">
                        </div>
                    </div>
                    <div class="d-flex justify-content-center align-items-center mx-auto gap-5 ">
                        <h6 class="fw-bold  pt-2"> سعر الباقة <span class="text-danger">({{$package->price}} د.ك)</span><del class="ms-2 d-block text-center">{{$package->price*2}} د.ك</del></h6>
                        <a class="btn btn-dark my-4 mx-auto  fw-bold" href="{{route('login')}}">إشتراك</a>
                    </div>
                </div>
            </div>
            @endforeach

            <h4 class="fw-bold my-4 text-center">اقترحات</h4>
            @foreach($book_Packages as $package)
            <div class="col-lg-6 col-sm-12 mx-auto ">
                <div class="card mb-3 w-100 bg-light text-dark">
                    <div class="contant-card d-flex align-items-center ">
                        <div class="contant-1 ps-4">
                            <h5 class="fw-bold  pt-2"> {{$package->name}} <span class="text-danger">(الفضية)</span></h5>
                            <span class="text-dark d-block">(تشمل {{$package->book()->count();}} مذكرات)</span>
                            @foreach($package->book as $book)
                            <span class="text-dark">{{$book->name}}</span>
                            @if (!$loop->last)
                            <span> - </span>
                            @endif
                            @endforeach
                        </div>
                        <div class="img-card1 text-center ms-auto pe-4 py-4 w-100">
                            <img src="/assets/ass/img/img-card1.png" width="150" alt="">
                        </div>
                    </div>
                    <div class="d-flex justify-content-center align-items-center mx-auto gap-5 ">
                        <h6 class="fw-bold  pt-2"> سعر الباقة <span class="text-danger">({{$package->price}} د.ك)</span><del class="ms-2 d-block text-center">{{$package->price*2}} د.ك</del></h6>
                        @php
                        $sessionId = session()->getId();
                        $packageInCart = \App\Models\BookCart::where('session_id', $sessionId)->where('package_id', $package->id)->exists();
                        @endphp

                        @if($packageInCart)
                        <a href="{{route('getCartBooks')}}" class="btn btn-info my-4 mx-auto text-dark fw-bold">
                            الباقة موجوده في السلة
                        </a>
                        @else
                        <form action="{{ route('addToCartPackages') }}" method="post">
                            @csrf
                            <input type="hidden" name="package_id" value="{{ $package->id }}">
                            <input type="hidden" name="price" value="{{ $package->price }}">
                            <input type="hidden" name="quantity" value="1">
                            <button type="submit" class="btn btn-dark my-4 mx-auto  fw-bold " onclick="disableButton()">
                                إضافة إلى السلة <i class="fa-solid fa-basket-shopping"></i>
                            </button>
                        </form>
                        @endif
                    </div>
                </div>
            </div>

            @endforeach

            @if ($bookPackage && $coursePackage)
            <div class="col-lg-6 col-sm-12 mx-auto">
                <div class="card mb-3 w-100 bg-light text-dark">
                    <div class="contant-card d-flex align-items-center ">
                        <div class="contant-1 ps-4">
                            <h5 class="fw-bold  pt-2"> الباقة <span class="text-danger">(الماسية)</span></h5>
                            <span class="text-dark d-block">(تشمل {{$bookPackage->book()->count();}} مذكرات & تشمل {{$coursePackage->course()->count();}}مواد)</span>
                            <div><strong> المذكرات : </strong>
                                @foreach($bookPackage->book as $book)
                                <span class="text-dark"> {{$book->name}}</span>
                                @if (!$loop->last)
                                <span> - </span>
                                @endif
                                @endforeach
                            </div>
                            <div> <strong>المواد : </strong>
                                @foreach($coursePackage->course as $course)
                                <span class="text-dark"> {{$course->subject_name}}</span>
                                @if (!$loop->last)
                                <span> - </span>
                                @endif
                                @endforeach
                            </div>
                        </div>
                        <div class="img-card1 text-center ms-auto pe-4 py-4 w-100">
                            <img src="/assets/ass/img/img-card3.png" width="150" alt="">
                        </div>
                    </div>
                    <div class="d-flex justify-content-center align-items-center mx-auto gap-5 ">
                        <h6 class="fw-bold  pt-2"> سعر الباقة <span class="text-danger">({{$bookPackage->price+$coursePackage->price}} د.ك)</span><del class="ms-2 d-block text-center">{{$bookPackage->price*2+$coursePackage->price*2 }} د.ك</del></span></h6>
                        <a class="btn btn-dark my-4 mx-auto fw-bold" href="{{route('login')}}">إشتراك</a>
                    </div>
                </div>
            </div>
            @endif

        </div>
</section>
@else
<div class="container text-center">
    <p class="text-dark fs-3">لا يوجد كورسات متاحة لهذا الصف </p>
</div>
@endif
@include('landingpage.layouts.footer')