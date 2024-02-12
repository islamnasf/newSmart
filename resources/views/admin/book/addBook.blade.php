@section('title')
اضافة مذكرة
@stop

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content="HTML5 Template" />
    <meta name="description" content="Webmin - Bootstrap 4 & Angular 5 Admin Dashboard Template" />
    <meta name="author" content="potenzaglobalsolutions.com" />
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        body {
            color: #000;
            overflow-x: hidden;
            height: 100%;
            background-image: url("https://img.freepik.com/free-photo/desk-stacked-with-books-studying-generated-by-ai_188544-29784.jpg?t=st=1701267777~exp=1701271377~hmac=38ea1385de5956d5b4032dff218cb53cc80c3592b77ae1f84a34e88bc83ed904&w=826");
            background-repeat: no-repeat;
            background-size: 100% 100%;
        }

        .card {
            padding: 30px 40px;
            margin-top: 60px;
            margin-bottom: 60px;
            border: none !important;
            box-shadow: 0 6px 12px 0 rgba(0, 0, 0, 0.2)
        }

        .blue-text {
            color: #00BCD4
        }

        .form-control-label {
            margin-bottom: 0
        }

        select,
        input,
        textarea,
        button {
            padding: 8px 15px;
            border-radius: 5px !important;
            margin: 5px 0px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            font-size: 18px !important;
            font-weight: 300
        }

        input:focus,
        textarea:focus {
            -moz-box-shadow: none !important;
            -webkit-box-shadow: none !important;
            box-shadow: none !important;
            border: 1px solid #00BCD4;
            outline-width: 0;
            font-weight: 400
        }

        .btn-block {
            text-transform: uppercase;
            font-size: 15px !important;
            font-weight: 400;
            height: 43px;
            cursor: pointer
        }

        .btn-block:hover {
            color: #fff !important
        }

        button:focus {
            -moz-box-shadow: none !important;
            -webkit-box-shadow: none !important;
            box-shadow: none !important;
            outline-width: 0
        }
        .custom-file-label1{
            padding: 40px;
            background-color: #eee;
            margin: 0px auto 10px auto ;
            width: 100%;
            justify-content: center;
            text-align: center;
            font-weight: bold;
            border-radius: 1px;
            border:#888 solid 1px ;
        }
        .form-group {
            margin-bottom: 10px;
        }
    </style>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    @include('layouts.head')
</head>

<body>

    <div class="wrapper">

        <!--=================================
 preloader -->

        <div id="pre-loader">
            <img src="assets/images/pre-loader/loader-01.svg" alt="">
        </div>

        <!--=================================
 preloader -->

        @include('layouts.main-header')

        @include('layouts.main-sidebar')

        <!--=================================
 Main content -->
        <!-- main-content -->

        <div class="container-fluid px-1 py-5 mx-auto">
            <div class="row d-flex justify-content-center">
                <div class="col-xl-7 col-lg-8 col-md-9 col-11 text-center">
                    <div class="card">
                        <h5 class="text-center mb-4"> اضافة مذكرة جديدة </h5>
                        <form action="{{ route('postBook') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row justify-content-between text-left">
                                <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">إسم المذكرة <span class="text-danger">
                                            *</span></label> <input type="text" id="fname" name="name" required onblur="validate(1)"> </div>
                                <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">مدرس المادة<span class="text-danger">
                                            *</span></label>
                                    <select type="text" id="lname" required name="techer_id" onblur="validate(2)">
                                        @foreach ($techer as $tech)
                                        <option value="{{ $tech->id }}">{{ $tech->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row justify-content-between text-left">
                                <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">المرحلة<span class="text-danger">
                                            *</span></label>
                                    <select id="category" name="stage" required>
                                        <option value="ابتدائي">ابتدائي</option>
                                        <option value="متوسط">متوسط</option>
                                        <option value="ثانوي">ثانوي</option>
                                    </select>
                                </div>
                                <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">الصف<span class="text-danger">
                                            *</span></label>
                                    <select id="item" name="classroom" required></select>
                                </div>
                            </div>
                            <div class="row justify-content-between text-left">
                            <div class="form-group col-6 flex-column d-flex"> <label class="form-control-label px-3">الكمية <span class="text-danger">
                                            *</span></label> <input type="number" id="ans" name="quantity" placeholder="" onblur="validate(6)">
                                </div>
                                <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">الترم<span class="text-danger">
                                            *</span></label>
                                    <select required id="job" name="term_type">
                                        <option value="termone">الترم الاول</option>
                                        <option value="termtow">الترم الثاني</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row justify-content-between text-left">
                                <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">سعر المذكرة <span class="text-danger">
                                            *</span></label> <input type="number" id="ans" name="book_price" required onblur="validate(6)"> </div>
                                <div class="form-group col-sm-6 flex-column d-flex">
                                    <label class="form-control-label px-3">ربح المعلم <span class="text-danger">*</span></label>
                                    <input type="number" id="ans" name="teacher_ratio" required onblur="validate(6)" min="0.1" step="0.1">
                                </div>
                            </div>

                            
    <div class="row justify-content-between text-left" >
        <div class="col-md-12 flex-column d-flex">
            <div class="form-group">
                <div class="custom-file">
                    <input type="file" class="custom-file-input" id="file" name="pdf" placeholder="" onchange="displayFileName()" required>
                    <label class=" custom-file-label1 " for="file" >اضافة عينة من المذكرة <span class="text-danger"><img src="https://cdn-icons-png.flaticon.com/128/4503/4503700.png" width="20" ></span></label>
                </div>
            </div>
        </div>
    </div>
<script>
    function displayFileName() {
        var input = document.getElementById('file');
        var fileName = input.files[0] ? input.files[0].name : 'اختر ملفًا';
        var label = document.querySelector('.custom-file-label1');
        label.innerHTML = fileName;

        // SweetAlert لعرض رسالة جميلة
        Swal.fire({
            title: 'تم اختيار الملف!',
            text: 'تم اختيار الملف: ' + fileName,
            icon: 'success',
            confirmButtonText: 'موافق'
        });
    }
</script>


                            <div class="row justify-content-center mt-5">
                                <div class="form-group col-sm-6"> <button type="submit" class="btn-block btn-primary">اضافة المذكرة</button> </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <script>
            function validate(val) {
                v1 = document.getElementById("fname");
                v2 = document.getElementById("lname");
                v3 = document.getElementById("email");
                v4 = document.getElementById("mob");
                v5 = document.getElementById("job");
                v6 = document.getElementById("ans");

                flag1 = true;
                flag2 = true;
                flag3 = true;
                flag4 = true;
                flag5 = true;
                flag6 = true;

                if (val >= 1 || val == 0) {
                    if (v1.value == "") {
                        v1.style.borderColor = "red";
                        flag1 = false;
                    } else {
                        v1.style.borderColor = "green";
                        flag1 = true;
                    }
                }

                if (val >= 2 || val == 0) {
                    if (v2.value == "") {
                        v2.style.borderColor = "red";
                        flag2 = false;
                    } else {
                        v2.style.borderColor = "green";
                        flag2 = true;
                    }
                }
                if (val >= 3 || val == 0) {
                    if (v3.value == "") {
                        v3.style.borderColor = "red";
                        flag3 = false;
                    } else {
                        v3.style.borderColor = "green";
                        flag3 = true;
                    }
                }
                if (val >= 4 || val == 0) {
                    if (v4.value == "") {
                        v4.style.borderColor = "red";
                        flag4 = false;
                    } else {
                        v4.style.borderColor = "green";
                        flag4 = true;
                    }
                }
                if (val >= 5 || val == 0) {
                    if (v5.value == "") {
                        v5.style.borderColor = "red";
                        flag5 = false;
                    } else {
                        v5.style.borderColor = "green";
                        flag5 = true;
                    }
                }
                if (val >= 6 || val == 0) {
                    if (v6.value == "") {
                        v6.style.borderColor = "red";
                        flag6 = false;
                    } else {
                        v6.style.borderColor = "green";
                        flag6 = true;
                    }
                }

                flag = flag1 && flag2 && flag3 && flag4 && flag5 && flag6;

                return flag;
            }
            const items = {
                ابتدائي: ['الصف الرابع', 'الصف الخامس'],
                متوسط: ['الصف السادس', 'الصف السابع', 'الصف الثامن', 'الصف التاسع'],
                ثانوي: ['الصف العاشر ', 'الصف الحادي عشر ', 'الصف الثاني عشر ']
            };

            // Function to update the items based on the selected category
            function updateItems() {
                const categorySelect = document.getElementById('category');
                const itemSelect = document.getElementById('item');
                const selectedCategory = categorySelect.value;

                // Clear existing options
                itemSelect.innerHTML = '';

                // Add new options based on the selected category
                items[selectedCategory].forEach(item => {
                    const option = document.createElement('option');
                    option.value = item;
                    option.text = item;
                    itemSelect.add(option);
                });
            }
            // Attach the updateItems function to the change event of the category select
            document.getElementById('category').addEventListener('change', updateItems);

            // Initial call to populate the items based on the default selected category
            updateItems();

            function check() {
                document.getElementById("male").checked = true;
            }
        </script>

        <!--=================================
 footer -->

        @include('layouts.footer-scripts')

</body>

</html>