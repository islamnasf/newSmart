@section('title')
    مذكرات | Smart Student
@endsection
@section('active2')
    active
@endsection
@include('landingpage.layouts.head')
<section id="ten">
    <div class="container bg-light d-flex justify-content-start align-items-end h-100">
        <h2 class="fw-bold fs-1 text-dark">المذكرات</h2>
    </div>
    @if ($books->count() > 0)


</section>
@foreach ($books as $book)
@endforeach
<section>
    <div class="container py-5">
        <h4 class="text-center title fw-bold pt-5">مذكرات {{$book->classroom}} </h4>
        <div class="owl-carousel owl-theme pb-5 text-center">
            @foreach ($books as $book)
                <div class="item">
                    <div class="card bg-light text-dark ">
                        <div class="contant-2 mt-3 ms-3 d-flex gap-5 justify-content-center align-items-center">
                            <h5 class="fw-bold">{{ $book->name }}</h5>
                            <img src="/assets/ass/img/books.png" width="150" alt="">
                        </div>
                        <div class="shoping d-flex">
                            @php
                                $sessionId = session()->getId();
                                $bookInCart = \App\Models\BookCart::where('session_id', $sessionId)
                                    ->where('book_id', $book->id)
                                    ->exists();
                            @endphp

                            @if ($bookInCart)
                                <a href="{{ route('getCartBooks') }}"
                                    class="btn btn-info my-4 mx-auto text-dark fw-bold">
                                    الكتاب موجود في السلة
                                </a>
                            @else
                                <form action="{{ route('addToCartbooks') }}" method="post">
                                    @csrf
                                    <input type="hidden" name="book_id" value="{{ $book->id }}">
                                    <input type="hidden" name="price" value="{{ $book->book_price }}">
                                    <input type="hidden" name="quantity" value="1">
                                    <button type="submit" class="btn btn-dark my-4 mx-auto  fw-bold ms-3"
                                        onclick="disableButton()">
                                        إضافة إلى السلة <i class="fa-solid fa-basket-shopping"></i>
                                    </button>
                                </form>
                            @endif

                            <a class="btn btn-dark my-4 mx-auto  fw-bold"
                                href="{{ route('pdfBookFree', $book->pdf) }}">عينة المذكرة
                                <i class="fa-solid fa-download ms-2"></i></a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="row ">
            @foreach ($book_Packages as $package)
                <div class="col-lg-7 col-sm-12 mx-auto ">
                    <div class="card mb-3 w-100 bg-light text-dark">
                        <div class="contant-card d-flex align-items-center ">
                            <div class="contant-1 ps-4">
                                <h5 class="fw-bold  pt-2"> {{ $package->name }} <span
                                        class="text-danger">(الفضية)</span></h5>
                                <span class="text-dark d-block">(تشمل {{ $package->book()->count() }} مذكرات)</span>
                                @foreach ($package->book as $book)
                                    <span class="text-dark">{{ $book->name }}</span>
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
                            <h6 class="fw-bold  pt-2"> سعر الباقة <span class="text-danger">({{ $package->price }}
                                    د.ك)</span><del class="ms-2 d-block text-center">{{ $package->price * 2 }} د.ك</del>
                            </h6>
                            @php
                                $sessionId = session()->getId();
                                $packageInCart = \App\Models\BookCart::where('session_id', $sessionId)
                                    ->where('package_id', $package->id)
                                    ->exists();
                            @endphp

                            @if ($packageInCart)
                                <a href="{{ route('getCartBooks') }}"
                                    class="btn btn-info my-4 mx-auto text-dark fw-bold">
                                    الباقة موجوده في السلة
                                </a>
                            @else
                                <form action="{{ route('addToCartPackages') }}" method="post">
                                    @csrf
                                    <input type="hidden" name="package_id" value="{{ $package->id }}">
                                    <input type="hidden" name="price" value="{{ $package->price }}">
                                    <input type="hidden" name="quantity" value="1">
                                    <button type="submit" class="btn btn-dark my-4 mx-auto fw-bold "
                                        onclick="disableButton()">
                                        إضافة إلى السلة <i class="fa-solid fa-basket-shopping"></i>
                                    </button>
                                </form>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach

            <h4 class="fw-bold my-4 text-center">اقترحات</h4>
            @foreach ($course_Packages as $package)
                <div class="col-lg-6 col-sm-12 mx-auto">
                    <div class="card mb-3 w-100 bg-light text-dark">
                        <div class="contant-card d-flex align-items-center ">
                            <div class="contant-1 ps-4">
                                <h5 class="fw-bold  pt-2"> {{ $package->name }} <span
                                        class="text-danger">(الذهبية)</span></h5>
                                <span class="text-dark d-block">(تشمل {{ $package->course()->count() }}مواد)</span>
                                @foreach ($package->course as $course)
                                    <span class="text-dark">{{ $course->subject_name }}</span>
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
                            <h6 class="fw-bold  pt-2"> سعر الباقة <span class="text-danger">({{ $package->price }}
                                    د.ك)</span><del class="ms-2 d-block text-center">{{ $package->price * 2 }} د.ك</del>
                            </h6>
                            <a class="btn btn-dark my-4 mx-auto fw-bold"
                                href="{{ route('login') }}">إشتراك</a>
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
                                <span class="text-dark d-block">(تشمل {{ $bookPackage->book()->count() }} مذكرات &
                                    تشمل {{ $coursePackage->course()->count() }}مواد)</span>
                                <div><strong> المذكرات : </strong>
                                    @foreach ($bookPackage->book as $book)
                                        <span class="text-dark"> {{ $book->name }}</span>
                                        @if (!$loop->last)
                                            <span> - </span>
                                        @endif
                                    @endforeach
                                </div>
                                <div> <strong>المواد : </strong>
                                    @foreach ($coursePackage->course as $course)
                                        <span class="text-dark"> {{ $course->subject_name }}</span>
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
                            <h6 class="fw-bold  pt-2"> سعر الباقة <span
                                    class="text-danger">({{ $bookPackage->price + $coursePackage->price }}
                                    د.ك)</span><del
                                    class="ms-2 d-block text-center">{{ $bookPackage->price * 2 + $coursePackage->price * 2 }}
                                    د.ك</del></span></h6>
                            <a class="btn btn-dark my-4 mx-auto  fw-bold"
                                href="{{ route('login') }}">إشتراك</a>
                        </div>
                    </div>
                </div>
            @endif
        </div>

</section>
@else
<div class="container text-center">
    <p class="text-dark fs-3">لا يوجد مذكرات متاحة لهذا الصف </p>
</div>
@endif
@include('landingpage.layouts.footer')
