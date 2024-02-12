@extends('layouts.master')

@section('css')
<style>
    body {
        color: #333;
        overflow-x: hidden;
        height: 100%;
        background-image: url("https://img.freepik.com/free-photo/desk-stacked-with-books-studying-generated-by-ai_188544-29784.jpg?t=st=1701267777~exp=1701271377~hmac=38ea1385de5956d5b4032dff218cb53cc80c3592b77ae1f84a34e88bc83ed904&w=826");
        background-repeat: no-repeat;
        background-size: cover;

        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    .card {
        padding: 30px;
        margin: 60px auto;
        border: none;
        box-shadow: 0 6px 12px 0 rgba(0, 0, 0, 0.2);
        background-color: #fff;
        border-radius: 15px;
        max-width: 900px;
    }

    .blue-text {
        color: #00BCD4;
    }

    .form-control-label {
        margin-bottom: 0;
    }

    select,
    input,
    textarea,
    button {
        padding: 10px;
        border-radius: 5px;
        margin: 5px 0px;
        box-sizing: border-box;
        border: 1px solid #ccc;
        font-size: 16px;
        font-weight: 300;
        width: 100%;
    }

    input:focus,
    textarea:focus {
        border: 1px solid #00BCD4;
        outline-width: 0;
        font-weight: 400;
    }

    .btn-block {
        text-transform: uppercase;
        font-size: 18px;
        font-weight: 400;
        height: 40px;
        cursor: pointer;
        background-color: #00BCD4;
        color: #fff;
        transition: background-color 0.3s;
    }

    .btn-block:hover {
        background-color: #007d8a;
    }

    button:focus {
        outline-width: 0;
    }

    /* Additional Styles */
    .content-container {
        margin-top: 20px;
        background-color: #006d7a;
        border: #007d8a 2px solid;
    }

    .package-info {
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        margin-bottom: 20px;
        font-size: 18px;
        text-align: center;
    }


    .course-list {
        list-style-type: none;
        padding: 0;
        margin: 0;
    }

    .course-list li {
        display: flex;
        align-items: center;
        justify-content: space-between;
        font-size: 16px;
        margin-bottom: 10px;
        border-bottom: 1px solid #ccc;
        padding-bottom: 5px;
    }

    .course-list li:last-child {
        border-bottom: none;
    }

    .checkbox-container {
        display: flex;
        align-items: center;
        padding: 5px;
        font-size: 25px;
        border-radius: 5px;
        margin-right: 20px;
        width: 250px;

    }

    .package-info p {
        background-color: #fff;
        padding: 10px;
    }

    .package-info li {
        background-color: #006d7a;
        color: #eee;
        padding: 5px;
        text-align: center;
    }


    .checkbox-container input {
        margin-left: 10px;
        width: 20%;
        border: #007d8a 2px solid
    }
</style>
@endsection

@section('title')
بيانات الباقة
@stop

@section('page-header')
<!-- breadcrumb -->
@endsection

@section('content')

@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
<!-- row -->
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <h4 class="text-center mb-4 blue-text">بيانات الباقة</h4>
            <div class="content-container">
                <form action="{{ route('PackageDetails',$package->id) }}" method="POST">
                    @csrf
                    <div class="package-info">
                        <p class="mb-3"><strong> اسم الباقة : </strong> {{ $package->name }}</p>
                        <p class="mb-3"><strong> سعر الباقة : </strong> {{ $package->price }} د.ك</p>
                        @if(isset($packagecourses) && (is_array($packagecourses) || is_object($packagecourses)))
                        <p style="text-align: right;"><strong> كورسات الباقة الحالية  ({{ count($packagecourses) }})</strong></p>
                        <ul class="course-list">
                            @foreach($packagecourses as $cour)
                            <li>{{ $cour->subject_name }}</li>
                            @endforeach
                        </ul>
                        @endif
                        @if(isset($packagecourses) && $packagecourses)
                        <p style="text-align: right;"><strong> تغير كورسات الباقة </strong></p>
                        @else
                        <p style="text-align: right;"><strong>اضافة كورسات جديدة للباقة </strong></p>
                        @endif
                        <ul class="course-list">
                            @forelse($courses as $course)
                            <li>
                                <label>
                                    <div class="checkbox-container">
                                        <input type="checkbox" name="selected_subjects[]" value="{{ $course->id }}" data-price="{{ $course->price }}" class="course-checkbox">
                                        {{ $course->subject_name }}
                                    </div>
                                </label>
                            </li>
                            @empty
                            <li>لا توجد كورسات متاحة حالياً.</li>
                            @endforelse
                        </ul>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="content-container">
                                    <p><strong>عدد الكورسات المحددة:</strong> <span id="selected-count">0</span></p>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
            <button type="submit" class="btn-block btn-primary">حفظ الباقة </button>

            </form>
        </div>
    </div>
</div>
<!-- row closed -->

<!-- Display count of selected courses immediately -->




@endsection

@section('js')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Get all checkboxes
        var checkboxes = document.querySelectorAll('.course-checkbox');

        // Add event listener to each checkbox
        checkboxes.forEach(function(checkbox) {
            checkbox.addEventListener('change', updateSelection);
        });

        // Function to update the selected count
        function updateSelection() {
            var selectedCount = 0;

            // Loop through each checkbox
            checkboxes.forEach(function(checkbox) {
                if (checkbox.checked) {
                    selectedCount++;
                }
            });

            // Display the selected count immediately
            document.getElementById('selected-count').textContent = selectedCount;

            // Call the function to update the total
            updateTotal();
        }

        // Function to update the total
        function updateTotal() {
            var total = 0;

            // Loop through each checkbox
            checkboxes.forEach(function(checkbox) {
                if (checkbox.checked) {
                    // Add the price of the selected course to the total
                    total += parseFloat(checkbox.dataset.price);
                }
            });

            // Display the total at the bottom
            document.getElementById('total-price').textContent = total.toFixed(2);
        }
    });
</script>
@endsection