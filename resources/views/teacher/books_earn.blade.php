@extends('layouts.master')
@section('css')

@section('title')
ارباح المذكرات
@stop
@endsection
<style>
    .rawone {
        margin: 0;
        padding: 0;
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 100vh;
        background-color: #175166;
        width: 100%;
    }

    .containerone {
        display: flex;
        height: 120px;
        width: 100%;
        overflow: hidden;
    }

    .itemone1 {
        flex: 1;
        display: flex;
        justify-content: center;
        align-items: center;
        background-color: #023047;
        /* لون الخلفية */
        color: #fff;
        /* لون النص */
        font-size: 23px;


    }

    .itemone2 {
        flex: 1;
        display: flex;
        justify-content: center;
        align-items: center;
        background-color: #219ebc;
        /* لون الخلفية */
        color: #fff;
        /* لون النص */
        font-size: 23px;


    }

    .itemone3 {
        flex: 1;
        display: flex;
        justify-content: center;
        align-items: center;
        background-color: #669bbc;
        /* لون الخلفية */
        color: #fff;
        /* لون النص */
        font-size: 23px;
    }

    @media (max-width: 600px) {
        .containerone {
            flex-direction: column;
            height: auto;
        }

        .itemone {
            flex: none;
            height: 100px;
            /* قم بتحديد الارتفاع المناسب للعناصر عند تغيير التوجيه إلى عمودي */
        }
    }
</style>
@section('page-header')
<!-- مجموع الارباح -->
@php
$totalBooksCount = 0;
$totalTeacherRatio = 0;
@endphp
@foreach($teacherbooks as $book)
    @php
    $item = \App\Models\Book::where('id', $book->book_id)->first();
    $totalBooksCount++;
    $totalTeacherRatio += $book->Teacher_ratio;
    @endphp
@endforeach
@foreach($packages as $booksInPackage)
    @foreach($booksInPackage as $book)
        @php
        $totalBooksCount++;
        $totalTeacherRatio += $book->Teacher_ratio;
        @endphp
    @endforeach
@endforeach
<!-- 0000 -->
<div class="rowone">
    <div class="containerone">
        <div class="itemone1 itemone"> <img src="https://cdn-icons-png.flaticon.com/128/536/536105.png " width="80px" style="padding-left: 20px;"> اجمالي عدد المشتريات ( {{$totalBooksCount}} ) </div>
        <div class="itemone2 itemone"><img src="https://cdn-icons-png.flaticon.com/128/536/536105.png " width="80px" style="padding-left: 20px;">اجمالي ارباحك {{$totalTeacherRatio}} د.ك</div>
    </div>
</div>
<!-- breadcrumb -->
@endsection
@section('content')
<!-- row -->

<!--  Add Modal -->

<!-- عرض book_id من teacherbooks -->


<!-- عرض book_id من packages -->



<div class="row">
    <div class="col-md-12 mb-30">
        <div class="card card-statistics h-100">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="datatable" class="table table-striped table-bordered p-0" style="text-align:center">
                        <thead>
                            <tr>
                                <th> المذكرة </th>
                                <th> الصف</th>
                                <th>ارباحك</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach($teacherbooks as $book)
                            @php
                            $item = \App\Models\Book::where('id', $book->book_id)->first();
                            @endphp
                            <tr>

                                <td> {{ $book->name }}
                                </td>
                                <td> {{ $book->classroom }}</td>
                                <td>{{$book->Teacher_ratio}}</td>


                            </tr>
                            @endforeach
                            @foreach($packages as $booksInPackage)
                            @foreach($booksInPackage as $book)
                            <tr>

                                <td> {{ $book->name }}
                                </td>
                                <td> {{ $book->classroom }}</td>
                                <td>{{$book->Teacher_ratio}}</td>


                            </tr>
                             @endforeach
                            @endforeach
                            </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>



<!-- row closed -->
@endsection
@section('js')

@endsection