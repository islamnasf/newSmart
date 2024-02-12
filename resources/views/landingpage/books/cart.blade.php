@section('title')
المشتريات | Smart Student
@endsection
@include('landingpage.layouts.head')
<section id="ten">
  <div class="container bg-light d-flex justify-content-start align-items-end h-100">
    <h2 class="fw-bold fs-1 text-dark">عربة التسوق</h2>
  </div>
</section>
@php
$sessionId = session()->getId();
$bookInCartCount = \App\Models\BookCart::where('session_id', $sessionId)->count();
@endphp
@if($bookInCartCount > 0)
<section>
  <div class="container">

    <div class="row py-5 bg-light">
      <div class="col-lg-7">
        <div class="card border-warning fw-bold py-3">
          <h4 class="mt-3 px-4">عربة التسوق</h4>
          <hr class="border-warning fw-bold">
          @foreach($items as $item)
          @if($item->book_id)
          @php
          $book = \App\Models\Book::where('id', $item->book_id)->first();
          @endphp
          <div class="total row px-4 mb-5">
            <div class="col-lg-2">
              <a href="{{route('deleteCartBooksItem',$item->id)}}"><i class="fa-solid fa-trash text-danger"></i></a>
            </div>
            <div class="col-lg-2 text-center">
              <img src="/assets/ass/img/books.png" width="100" alt="">
            </div>
            <div class="col-lg-5">
              <div class="contant-cart">
                <h4 class="ms-5">{{$book->name}}</h4>
                <span class="fw-bold fs-5 text-dark ms-5"> {{$item->price}} د.ك</span>
              </div>
            </div>
            <div class="col-lg-3">
              <h5 class="text-center">الكمية</h5>
              <div class="btn_min_max text-center">
                <form id="quantityForm" action="{{ route('postnewquantitybook', $item->id) }}" method="post">
                  @csrf
                  <input type="number" id="count" data-price="2489.91" data-id="2406" name="count" class="quantity2406 form-control text-center input-number" value="{{ $item->quantity }}" min="1" step="1" oninput="updateQuantity()">
                </form>


              </div>
            </div>
          </div>
          @endif
          @if($item->package_id)
          @php
          $package = \App\Models\AnotherPackage::where('id', $item->package_id)->first();
          @endphp
          <div class="total row px-4 mb-5">
            <div class="col-lg-2">
              <a href="{{route('deleteCartBooksItem',$item->id)}}"><i class="fa-solid fa-trash text-danger"></i></a>
            </div>
            <div class="col-lg-2 text-center">
              <img src="/assets/ass/img/img-card1.png" width="100" alt="">
            </div>
            <div class="col-lg-5">
              <div class="contant-cart">
                <h4 class="ms-5">{{$package->name}}</h4>
                <h6 class="ms-5">{{$package->book()->count()}} مذكرات</h6>
                <span class="fw-bold fs-5 text-dark ms-2">{{$item->price}} د.ك</span> -
                <span class="fw-bold fs-5 text-danger ms-1 "><del>{{$item->price*2}} د.ك</del></span>
              </div>
            </div>
            <div class="col-lg-3">
              <h5 class="text-center">الكمية</h5>
              <div class="btn_min_max text-center">
                <form id="quantityForm" action="{{ route('postnewquantitybook', $item->id) }}" method="post">
                  @csrf
                  <input type="number" id="count" data-price="2489.91" data-id="2406" name="count" class="quantity2406 form-control text-center input-number" value="{{ $item->quantity }}" min="1" step="1" oninput="updateQuantity()">
                </form>



              </div>
            </div>
          </div>
          @endif
          @endforeach
          @php
          $total = 0;
          $discount = 0;
          @endphp
          @foreach($items as $item)
          @if($item->book_id)
          @php
          $book = \App\Models\Book::where('id', $item->book_id)->first();
          $total += $item->price;
          @endphp
          @endif
          @if($item->package_id)
          @php
          $package = \App\Models\AnotherPackage::where('id', $item->package_id)->first();
          $total += $item->price;
          $discount += $item->price;
          @endphp
          @endif
          @endforeach
        </div>
      </div>
      <div class="col-lg-5">
        <div class="card border-warning fw-bold border-3">
          <h4 class="mt-3 px-4">ملخص الطلبية</h4>
          <hr class="border-warning fw-bold">
          <div class="total d-flex justify-content-between px-4">
            <h5 class="fw-bold">الاجمالي</h5>
            <span class="fw-bold"> {{ $total+$discount }} د.ك </span>
          </div>
          <div class="total d-flex justify-content-between px-4">
            <h5 class="px-4 pt-3">الخصم</h5>
            <span class="px-4 pt-3"> - {{ $discount }} د.ك </span>
          </div>
          <hr class="border-warning fw-bold">
          <div class="total d-flex justify-content-between px-4">
            <h5 class="fw-bold">المجموع الكلي</h5>
            <span class="text-dark-200 fw-bold"> {{ $total }} د.ك </span>
          </div>
          <a href="{{route('getNotesStage')}}" class="btn btn-info fw-bold my-3 mx-auto "> تسوق المزيد</a>

          <botton id="done" class="btn btn-danger fw-bold my-3 mx-auto ">اتمام عملية الشراء</botton>
        </div>
        <form action="{{route('postneworderbook')}}" method="post">
          @csrf
          <div id="chackout" class="card border-warning fw-bold border-3 mt-3 hide">
            <div class="col-md-12 order-md-1 p-4">
              <h4 class="mb-3">تفاصيل الارسال </h4>
              <div class="row">
                <div class="col-md-12 mb-3">
                  <label for="firstName">اسم الطالب</label>
                  <input type="text" class="form-control" id="firstName" placeholder="" value="" required="" name="buyer">
                </div>
              </div>
              <div class="mb-3">
                <label for="username">الهاتف</label>
                <div class="input-group">
                  <input type="text" class="form-control" id="phone" placeholder="05555555" required="" name="phone">
                </div>
              </div>
              <div class="row">
                <div class="col-md-12 mb-3">
                  <label for="country">المحافظة</label>
                  <select class="form-select d-block w-100" id="country" required="" name="city_id">
                    <option selected>اختار...</option>
                    @foreach($cities as $city)
                    <option value="{{$city->id}}">{{$city->name}}</option>
                    @endforeach
                  </select>
                </div>
              </div>
              <div class="mb-3">
                <label for="address"> العنوان</label>
                <input type="text" class="form-control" id="address" placeholder="1234 Main St" required="" name="address">
              </div>
              <hr class="mb-4">
              <button class="btn btn-danger btn-lg btn-block" type="submit">تأكيد عملية الشراء</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</section>



<script>
  document.addEventListener("DOMContentLoaded", function() {
    // استهداف جميع عناصر الإدخال بناءً على الفئة
    var quantityInputs = document.querySelectorAll(".quantity2406");

    // إضافة مستمع لحدث الإدخال لكل عنصر
    quantityInputs.forEach(function(input) {
      input.addEventListener("input", function() {
        updateQuantity(this); // يمرر الدالة العنصر الحالي
      });
    });

    // الدالة لتحديث الكمية
    function updateQuantity(input) {
      var formData = new FormData(input.form);

      fetch(input.form.action, {
          method: "POST",
          body: formData
        })
        .then(response => response.json())
        .then(data => {
          // يمكنك إضافة التحديثات التي ترغب فيها هنا
          console.log("تم تحديث الكمية بنجاح!");
        })
        .catch(error => {
          console.error("حدث خطأ أثناء تحديث الكمية:", error);
        });
    }
  });
</script>
@else
<h1 class="text-center py-5"> لا يوجد مشتريات حاليا </h1>
@endif
@include('landingpage.layouts.footer')