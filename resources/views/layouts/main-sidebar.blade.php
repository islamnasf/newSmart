<div class="container-fluid">
    <div class="row">
        <!-- Left Sidebar start-->
        <div class="side-menu-fixed">
            <div class="scrollbar side-menu-bg">
                @if (auth()->user()->user_type == 'admin')
                    <ul class="nav navbar-nav side-menu" id="sidebarnav">
                        <!-- menu item Dashboard-->
                        <li>
                            <a href="{{ route('dashboard') }}" style="font-size: 18px;">
                                <div class="pull-left"><i class="ti-home"style="font-size: 18px;"></i><span
                                        class="right-nav-text">الصفحة الرئيسية</span>
                                </div>
                                <div class="clearfix"></div>
                            </a>
                        </li>

                        <li>
                            <a href="{{route('home')}}" style="font-size: 18px;">
                                <div class="pull-left"><i class="ti-palette" style="font-size: 18px;"></i><span
                                        class="right-nav-text">تصفح موقع المنصة</span></div>
                                <div class="clearfix"></div>
                            </a>

                        </li>
                        <!-- menu item calendar-->
                        <li>
                            <a href="{{ route('getStudent') }}" style="font-size: 20px;">
                                <div class="pull-left"><i class="ti-calendar"></i><span class="right-nav-text"
                                        style="font-size: 20px;">ادارة الطلبة</span></div>
                                <div class="clearfix"></div>
                            </a>

                        </li>
                        <li>
                            <a href="{{ route('getTeacher') }}"style="font-size: 20px;">
                                <div class="pull-left"><i class="ti-id-badge" style="font-size: 20px;"
                                        style="font-size: 20px;"></i><span class="right-nav-text">المعلمين</span></div>
                                <div class="clearfix"></div>
                            </a>
                        </li>
                        <li>
                            <a  href="{{ route('course') }}" style="font-size: 20px;"><i class="ti-menu-alt"
                                    style="font-size: 20px;"></i><span class="right-nav-text">الكورسات</span> </a>
                            <div class="clearfix"></div>

                        </li>
                        <li>
                            <a href="{{ route('getBook') }}" style="font-size: 20px;">
                                <div class="pull-left"><i class="ti-layout-tab-window"
                                        style="font-size: 20px;"></i><span class="right-nav-text">ادارة المذكرات </span>
                                </div>
                                <div class="clearfix"></div>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('getSecretary') }}" style="font-size: 20px;"><i class="ti-blackboard"
                                    style="font-size: 20px;"></i><span class="right-nav-text">السكرتارية </span></a>
                            <div class="clearfix"></div>
                        </li>
                        <!-- menu item Form-->
                        <li>
                            <a href="javascript:void(0);" data-toggle="collapse" data-target="#Form"
                                style="font-size: 20px;">
                                <div class="pull-left"><i class="ti-files" style="font-size: 20px;"></i><span
                                        class="right-nav-text">اختبارات وبنوك</span></div>
                                <div class="pull-right"><i class="ti-plus" style="font-size: 15px;"></i></div>
                                <div class="clearfix"></div>
                            </a>
                            <ul id="Form" class="collapse" data-parent="#sidebarnav">
                                <li> <a href="editor.html" style="font-size: 18px;">اضافة اختبار جديد</a> </li>
                                <li> <a href="editor-markdown.html" style="font-size: 18px;">اختبارات الترم الاول </a>
                                </li>
                                <li> <a href="form-input.html" style="font-size: 18px;">اختبارات الترم التاني</a> </li>
                            </ul>
                        </li>
                        <!-- menu item timeline-->
                        <li>
                            <a href="#" style="font-size: 20px;"><i class="ti-panel"
                                    style="font-size: 20px;"></i><span class="right-nav-text">اعداد المنصة</span>
                            </a>
                        </li>
                        <!-- menu item mailbox-->
                        <li>
                            <a href="#" style="font-size: 20px;"><i class="ti-email"
                                    style="font-size: 20px;"></i><span class="right-nav-text"> اسئلة الادارة </span></a>
                        </li>

                        <!-- menu item maps-->
                        <li>
                            <a href="{{ route('getProfile') }}"  style="font-size: 20px;"><i class="fa fa-unlock-alt"
                                    style="font-size: 20px;"></i><span class="right-nav-text">اعداد الحساب </span></a>
                        </li>
                    </ul>
                @endif
                @if (auth()->user()->user_type == 'teacher')
                    <ul class="nav navbar-nav side-menu" id="sidebarnav">
                        <!-- menu item Dashboard-->
                        <li>
                            <a href="{{ route('dashboard') }}" style="font-size: 18px;">
                                <div class="pull-left"><i class="ti-home"style="font-size: 18px;"></i><span
                                        class="right-nav-text">الصفحة الرئيسية</span>
                                </div>
                                <div class="clearfix"></div>
                            </a>
                        </li>

                        <li>
                            <a href="{{route('home')}}"  style="font-size: 18px;">
                                <div class="pull-left"><i class="ti-palette" style="font-size: 18px;"></i><span
                                        class="right-nav-text">تصفح موقع المنصة</span></div>
                                <div class="clearfix"></div>
                            </a>

                        </li>


                        <li>
                            <a href="{{ route('teacherCourse') }}" style="font-size: 20px;"><i class="ti-menu-alt"
                                    style="font-size: 20px;"></i><span class="right-nav-text">الكورسات المفعلة </span>
                            </a>
                            <div class="clearfix"></div>

                        </li>
                        <!-- <li>
                            <a href="#" style="font-size: 20px;"><i class="fa fa-file-archive-o"
                                    style="font-size: 20px;"></i><span class="right-nav-text">ارشيف الكورسات </span>
                            </a>
                            <div class="clearfix"></div>

                        </li> -->
                        <!-- <li>
                            <a href="#" style="font-size: 20px;"><i class="fa fa-money"
                                    style="font-size: 20px;"></i><span class="right-nav-text">الدفعات المحصلة </span>
                            </a>
                            <div class="clearfix"></div>

                        </li> -->

                        <!-- menu item Form-->
                        <!-- <li>
                            <a href="javascript:void(0);" data-toggle="collapse" data-target="#Form"
                                style="font-size: 20px;">
                                <div class="pull-left"><i class="ti-files" style="font-size: 20px;"></i><span
                                        class="right-nav-text">اختبارات وبنوك</span></div>
                                <div class="pull-right"><i class="ti-plus" style="font-size: 15px;"></i></div>
                                <div class="clearfix"></div>
                            </a>
                            <ul id="Form" class="collapse" data-parent="#sidebarnav">
                                <li> <a href="editor.html" style="font-size: 18px;">اضافة اختبار جديد</a> </li>
                                <li> <a href="editor-markdown.html" style="font-size: 18px;">اختبارات الترم الاول </a>
                                </li>
                                <li> <a href="form-input.html" style="font-size: 18px;">اختبارات الترم التاني</a>
                                </li>
                            </ul>
                        </li> -->
                        <li>
                            <a href="{{route('getCourseSubscription')}}" style="font-size: 20px;"><i class="fa fa-sign-in"
                                    style="font-size: 20px;"></i><span class="right-nav-text"> اشتركات الطلبة </span>
                            </a>
                            <div class="clearfix"></div>

                        </li>
                        <li>
                            <a href="{{route('getBookEarnTeacher')}}" style="font-size: 20px;"><i class="fa fa-money"
                                    style="font-size: 20px;"></i><span class="right-nav-text">  ارباح المذكرات </span>
                            </a>
                            <div class="clearfix"></div>

                        </li>
                        <!-- menu item timeline-->

                        <!-- menu item mailbox-->

                        <!-- menu item maps-->
                        <li>
                            <a href="{{ route('getProfile') }}" style="font-size: 20px;"><i class="fa fa-unlock-alt"
                                    style="font-size: 20px;"></i><span class="right-nav-text">اعداد الحساب </span></a>
                        </li>
                    </ul>
                @endif
                @if (auth()->user()->user_type == 'user')
                    <ul class="nav navbar-nav side-menu" id="sidebarnav">
                        <!-- menu item Dashboard-->
                        <li>
                            <a href="{{ route('dashboard') }}" style="font-size: 18px;">
                                <div class="pull-left"><i class="ti-home"style="font-size: 18px;"></i><span
                                        class="right-nav-text">الصفحة الرئيسية</span>
                                </div>
                                <div class="clearfix"></div>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('home') }}" style="font-size: 18px;">
                                <div class="pull-left"><i class="ti-search"style="font-size: 18px;"></i><span
                                        class="right-nav-text">تصفح المنصة</span>
                                </div>
                                <div class="clearfix"></div>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('studentSubscription') }}" style="font-size: 18px;">
                                <div class="pull-left"><i class="ti-check-box"style="font-size: 18px;"></i><span
                                        class="right-nav-text">اشتراكاتك</span>
                                </div>
                                <div class="clearfix"></div>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('studentcart') }}" style="font-size: 20px;"><i
                                    class="fa fa-cart-arrow-down" style="font-size: 20px;"></i><span
                                    class="right-nav-text"> سلة المشتريات </span></a>
                        </li>
                        <li>
                            <a href="{{ route('getProfile') }}" style="font-size: 20px;"><i class="fa fa-unlock-alt"
                                    style="font-size: 20px;"></i><span class="right-nav-text">اعداد الحساب </span></a>
                        </li>
                    </ul>
                @endif
            </div>
        </div>

        <!-- Left Sidebar End-->

        <!--=================================
