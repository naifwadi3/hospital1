

<div class="app-sidebar-menu overflow-hidden flex-column-fluid "  >
    <!--begin::Menu wrapper-->
    <div  id="kt_app_sidebar_menu_wrapper"  class="app-sidebar-wrapper hover-scroll-overlay-y my-5" data-kt-scroll="true" data-kt-scroll-activate="true" data-kt-scroll-height="auto" data-kt-scroll-dependencies="#kt_app_sidebar_logo, #kt_app_sidebar_footer" data-kt-scroll-wrappers="#kt_app_sidebar_menu" data-kt-scroll-offset="5px" data-kt-scroll-save-state="true" >
        <!--begin::Menu-->
        <div class="menu menu-column menu-rounded menu-sub-indention px-3" id="#kt_app_sidebar_menu" data-kt-menu="true" data-kt-menu-expand="false" >
            <!--begin:Menu item-->
            <div data-kt-menu-trigger="click" class="menu-item here  menu-accordion" >
                <!--begin:Menu link-->
                <div class="menu-item">
                    <!--begin:Menu link-->
                    <a style="text-decoration: none" class="menu-link active" href="{{ route('dashboard') }}">
                        <span class="menu-bullet">
                            <i class="fa-solid fa-house"></i>
                        </span>
                        <span class="menu-title" style="font-size: 15px">الصفحة الرئيسية</span>
                    </a>
                    <!--end:Menu link-->
                </div>
                <div class="menu-item">
                    <!--begin:Menu link-->
                    <a style="text-decoration: none" class="menu-link" href="{{ route('day_work') }}">
                        <span class="menu-bullet">
                            <i class="fa-solid fa-house"></i>
                        </span>
                        <span class="menu-title" style="font-size: 15px">جدول عمل الموظفين</span>
                    </a>
                    <!--end:Menu link-->
                </div>
            </div>

            @can('قائمة الحجوزات')

            <!--end:Menu item-->
            <!--begin:Menu item-->
            <div class="menu-item pt-3">
                <!--begin:Menu content-->
                <div class="menu-content">
                    <span class="menu-heading fw-bold text-uppercase fs-7">الحجوزات</span>
                </div>
                <!--end:Menu content-->
            </div>
            <!--end:Menu item-->
            <!--begin:Menu item-->
            @can('غرف العمليات')
            <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
                <!--begin:Menu link-->
                <span class="menu-link">
                    <span class="menu-icon">
                        <!--begin::Svg Icon | path: icons/duotune/communication/com005.svg-->
                        <span class="svg-icon svg-icon-2">
                            <i class="fa-solid fa-bed-pulse"></i>
                                     </span>
                        <!--end::Svg Icon-->
                    </span>
                    <span class="menu-title" style="font-size: 15px">غرف العمليات</span>
                    <span class="menu-arrow"></span>
                </span>
                <!--end:Menu link-->
                <!--begin:Menu sub-->
                <div class="menu-sub menu-sub-accordion">
                    <!--begin:Menu item-->
                    <div class="menu-item">
                        <!--begin:Menu link-->
                        <a style="text-decoration: none" class="menu-link" href="{{ url('add_operating') }}">
                            <span class="menu-bullet">
                                <span class="bullet bullet-dot"></span>
                            </span>
                            <span class="menu-title" style="font-size: 15px">جدول الحوجوزات</span>
                        </a>
                        <!--end:Menu link-->
                    </div>
                    <!--end:Menu item-->
                    <!--begin:Menu item-->

                    <!--end:Menu item-->
                </div>
                <!--end:Menu sub-->
            </div>
            <!--end:Menu item-->
            <!--begin:Menu item-->
            @endcan


@can('حجز غرفة جديدة')
            <!--end:Menu item-->
            <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
                <!--begin:Menu link-->
                <span class="menu-link">
                    <span class="menu-icon">
                        <!--begin::Svg Icon | path: icons/duotune/general/gen022.svg-->
                        <span class="svg-icon svg-icon-2">
                            <i class="fa-solid fa-pen"></i>
                        </span>
                        <!--end::Svg Icon-->
                    </span>
                    <span class="menu-title" style="font-size: 15px">حجز غرفة </span>
                    <span class="menu-arrow"></span>
                </span>
                <!--end:Menu link-->
                <!--begin:Menu sub-->
                <div class="menu-sub menu-sub-accordion">
                    <!--begin:Menu item-->
                    <div class="menu-item">
                        <!--begin:Menu link-->
                        <a style="text-decoration: none" class="menu-link" href="{{ route('room_reservations.index') }}">
                            <span class="menu-bullet">
                                <span class="bullet bullet-dot"></span>
                            </span>
                            <span class="menu-title" style="font-size: 15px">جدول الحجوزات للغرف</span>
                        </a>
                        <!--end:Menu link-->
                    </div>
                    <!--end:Menu item-->
                    <!--begin:Menu item-->

                </div>
                <!--end:Menu sub-->
            </div>
            @endcan

            @can('حجز موعد مع طبيب')
            <!--begin:Menu item-->
            <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
                <!--begin:Menu link-->
                <span class="menu-link">
                    <span class="menu-icon">
                        <!--begin::Svg Icon | path: icons/duotune/general/gen022.svg-->
                        <span class="svg-icon svg-icon-2">
                            <i class="fa-solid fa-user-doctor"></i>
                        </span>
                        <!--end::Svg Icon-->
                    </span>
                    <span class="menu-title" style="font-size: 15px">حجز موعد مع طبيب </span>
                    <span class="menu-arrow"></span>
                </span>
                <!--end:Menu link-->
                <!--begin:Menu sub-->
                <div class="menu-sub menu-sub-accordion">
                    <!--begin:Menu item-->
                    <div class="menu-item">
                        <!--begin:Menu link-->
                        <a style="text-decoration: none" class="menu-link" href="{{ route('date.index') }}">
                            <span class="menu-bullet">
                                <span class="bullet bullet-dot"></span>
                            </span>
                            <span class="menu-title" style="font-size: 15px">جدول حجز المواعيد</span>
                        </a>
                        <!--end:Menu link-->
                    </div>
                    <!--end:Menu item-->
                    <!--begin:Menu item-->

                </div>
                <!--end:Menu sub-->
            </div>
            <!--end:Menu item-->
            <!--begin:Menu item-->
            @endcan
@can('حجز موعد مراجعه')
            <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
                <!--begin:Menu link-->
                <span class="menu-link">
                    <span class="menu-icon">
                        <!--begin::Svg Icon | path: icons/duotune/files/fil003.svg-->
                        <span class="svg-icon svg-icon-2">
                            <i class="fa-sharp fa-solid fa-stethoscope"></i>
                        </span>
                        <!--end::Svg Icon-->
                    </span>
                    <span class="menu-title" style="font-size: 15px">حجز موعد مراجعه</span>
                    <span class="menu-arrow"></span>
                </span>
                <!--end:Menu link-->
                <!--begin:Menu sub-->
                <div class="menu-sub menu-sub-accordion">
                    <!--begin:Menu item-->
                    <div class="menu-item">
                        <!--begin:Menu link-->
                        <a style="text-decoration: none" class="menu-link" href="{{ route('book_an_appointment.index') }}">
                            <span class="menu-bullet">
                                <span class="bullet bullet-dot"></span>
                            </span>
                            <span class="menu-title" style="font-size: 15px">جدول الحوجوزات</span>
                        </a>
                        <!--end:Menu link-->
                    </div>
                    <!--end:Menu item-->
                    <!--begin:Menu item-->
                    <div class="menu-item">
                        <!--begin:Menu link-->
                        <a style="text-decoration: none" class="menu-link" href="{{ url('send_masseg') }}">
                            <span class="menu-bullet">
                                <span class="bullet bullet-dot"></span>
                            </span>
                            <span class="menu-title" style="font-size: 15px">تذكير بموعد المراجعة</span>
                        </a>
                        <!--end:Menu link-->
                    </div>

                </div>
            </div>
            @endcan
@can('حجز قسم الاشعه')
            <!--end:Menu item-->
            <!--begin:Menu item-->
            <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
                <!--begin:Menu link-->
                <span class="menu-link">
                    <span class="menu-icon">
                        <!--begin::Svg Icon | path: icons/duotune/abstract/abs048.svg-->
                        <span class="svg-icon svg-icon-2">
                            <i class="fa-solid fa-circle-radiation"></i>
                         </span>
                        <!--end::Svg Icon-->
                    </span>
                    <span class="menu-title" style="font-size: 15px">حجوزات قسم الاشعة</span>
                    <span class="menu-arrow"></span>
                </span>
                <!--end:Menu link-->
                <!--begin:Menu sub-->
                <div class="menu-sub menu-sub-accordion">
                    <!--begin:Menu item-->
                    <div class="menu-item">
                        <!--begin:Menu link-->
                        <a style="text-decoration: none" class="menu-link" href="{{ route('rays.index') }}">
                            <span class="menu-bullet">
                                <span class="bullet bullet-dot"></span>
                            </span>
                            <span class="menu-title" style="font-size: 15px">جدول الحجوزات</span>
                        </a>
                        <!--end:Menu link-->
                    </div>
                    <!--end:Menu item-->


                </div>
                <!--end:Menu sub-->
            </div>
            <!--end:Menu item-->
            <!--begin:Menu item-->
            @endcan
@can('حجز العيادة الخارجية')

            <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
                <!--begin:Menu link-->
                <span class="menu-link">
                    <span class="menu-icon">
                        <!--begin::Svg Icon | path: icons/duotune/finance/fin001.svg-->
                        <span class="svg-icon svg-icon-2">
                            <i class="fa-solid fa-hospital-user"></i>
                        </span>
                        <!--end::Svg Icon-->
                    </span>
                    <span class="menu-title" style="font-size: 15px">حجز موعد في العيادات الخارجية</span>
                    <span class="menu-arrow"></span>
                </span>
                <!--end:Menu link-->
                <!--begin:Menu sub-->
                <div class="menu-sub menu-sub-accordion menu-active-bg">
                    <!--begin:Menu item-->
                    <div class="menu-item">
                        <!--begin:Menu link-->
                        <a style="text-decoration: none" class="menu-link" href="../../demo1/dist/pages/blog/home.html">
                            <span class="menu-bullet">
                                <span class="bullet bullet-dot"></span>
                            </span>
                            <span class="menu-title" style="font-size: 15px">جدول الحجوزات</span>
                        </a>
                        <!--end:Menu link-->
                    </div>
                    <!--end:Menu item-->
                    <!--begin:Menu item-->

                    <!--end:Menu item-->
                </div>
                <!--end:Menu sub-->
            </div>
            <!--end:Menu item-->
            <!--begin:Menu item-->
            @endcan
            @endcan
            <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
                <!--begin:Menu link-->

                <!--end:Menu link-->
                <!--begin:Menu sub-->
                <div class="menu-sub menu-sub-accordion menu-active-bg">
                    <!--begin:Menu item-->
                    <div class="menu-item">
                        <!--begin:Menu link-->
                        <a style="text-decoration: none" class="menu-link" href="../../demo1/dist/pages/faq/classic.html">
                            <span class="menu-bullet">
                                <span class="bullet bullet-dot"></span>
                            </span>
                            <span class="menu-title" style="font-size: 15px">FAQ Classic</span>
                        </a>
                        <!--end:Menu link-->
                    </div>
                    <!--end:Menu item-->
                    <!--begin:Menu item-->

                    <!--end:Menu item-->
                </div>
                <!--end:Menu sub-->
            </div>
            <!--end:Menu item-->
            <!--begin:Menu item-->
            <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
                <!--begin:Menu link-->

                <!--end:Menu link-->
                <!--begin:Menu sub-->

                <!--end:Menu sub-->
            </div>
            <!--end:Menu item-->
            <!--begin:Menu item-->
            <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
                <!--begin:Menu link-->

                <!--end:Menu link-->
                <!--begin:Menu sub-->

                <!--end:Menu sub-->
            </div>
            <!--end:Menu item-->
            <!--begin:Menu item-->
            <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
                <!--begin:Menu link-->

                <!--end:Menu link-->
                <!--begin:Menu sub-->
                <div class="menu-sub menu-sub-accordion">
                    <!--begin:Menu item-->
                    <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
                        <!--begin:Menu link-->

                        <!--end:Menu link-->
                        <!--begin:Menu sub-->

                        <!--end:Menu sub-->
                    </div>
                    <!--end:Menu item-->
                    <!--begin:Menu item-->

                    <!--end:Menu item-->
                    <!--begin:Menu item-->

                    <!--end:Menu item-->
                </div>
                <!--end:Menu sub-->
            </div>
            <!--end:Menu item-->
            <!--begin:Menu item-->

@can('التسجيل')
            <!--end:Menu item-->
            <!--begin:Menu item-->
            <div class="menu-item pt-3">
                <!--begin:Menu content-->
                <div class="menu-content">
                    <span class="menu-heading fw-bold text-uppercase fs-7">التسجيل</span>
                </div>
                <!--end:Menu content-->
            </div>
            <!--end:Menu item-->
            <!--begin:Menu item-->
@can('قائمة الاقسام')
            <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
                <!--begin:Menu link-->
                <span class="menu-link">
                    <span class="menu-icon">
                        <!--begin::Svg Icon | path: icons/duotune/abstract/abs042.svg-->
                        <span class="svg-icon svg-icon-2">
                            <i class="fa-solid fa-section"></i>
                        </span>
                        <!--end::Svg Icon-->
                    </span>
                    <span class="menu-title" style="font-size: 15px">الاقسام</span>
                    <span class="menu-arrow"></span>
                </span>
                <!--end:Menu link-->
                <!--begin:Menu sub-->
                <div class="menu-sub menu-sub-accordion">
                    <!--begin:Menu item-->
                    <div class="menu-item">
                        <!--begin:Menu link-->
                        <a style="text-decoration: none" class="menu-link" href="{{ route('section.index') }}">
                            <span class="menu-bullet">
                                <span class="bullet bullet-dot"></span>
                            </span>
                            <span class="menu-title" style="font-size: 15px">قائمة الاقسام</span>
                        </a>
                        <!--end:Menu link-->
                    </div>
                    <!--end:Menu item-->

                </div>
                <!--end:Menu sub-->
            </div>
            <!--end:Menu item-->
            <!--begin:Menu item-->
            @endcan
@can('قائمة الغرف')
            <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
                <!--begin:Menu link-->
                <span class="menu-link">
                    <span class="menu-icon">
                        <!--begin::Svg Icon | path: icons/duotune/ecommerce/ecm002.svg-->
                        <span class="svg-icon svg-icon-2">
                            <i class="fa-solid fa-door-closed"></i>
                        </span>
                        <!--end::Svg Icon-->
                    </span>
                    <span class="menu-title" style="font-size: 15px">الغرف</span>
                    <span class="menu-arrow"></span>
                </span>

                <!--end:Menu link-->
                <!--begin:Menu sub-->
                <div class="menu-sub menu-sub-accordion">

                    <!--begin:Menu item-->
                    <div class="menu-item">
                        <!--begin:Menu link-->
                        <a style="text-decoration: none"  class="menu-link" href="{{ route('room.index') }}" style="text-decoration: none">
                            <span class="menu-bullet">
                                <span class="bullet bullet-dot"></span>
                            </span>
                            <span class="menu-title" style="font-size: 15px">قائمة الغرف</span>
                        </a>
                        <!--end:Menu link-->
                    </div>
                    <!--end:Menu item-->
                </div>
                <!--end:Menu sub-->
            </div>
            <!--end:Menu item-->
            <!--begin:Menu item-->
            @endcan

            @can('قائمة التخصصات')
            <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
                <!--begin:Menu link-->
                <span class="menu-link">
                    <span class="menu-icon">
                        <!--begin::Svg Icon | path: icons/duotune/graphs/gra006.svg-->
                        <span class="svg-icon svg-icon-2">
                            <i class="fa-solid fa-graduation-cap"></i>
                        </span>
                        <!--end::Svg Icon-->
                    </span>
                    <span class="menu-title" style="font-size: 15px">التخصصات</span>
                    <span class="menu-arrow"></span>
                </span>
                <!--end:Menu link-->
                <!--begin:Menu sub-->
                <div class="menu-sub menu-sub-accordion">
                    <!--begin:Menu item-->
                    <div class="menu-item">
                        <!--begin:Menu link-->
                        <a style="text-decoration: none" class="menu-link" href="{{ route('Specialties.index') }}">
                            <span class="menu-bullet">
                                <span class="bullet bullet-dot"></span>
                            </span>
                            <span class="menu-title" style="font-size: 15px">قائمة التخصصات</span>
                        </a>
                        <!--end:Menu link-->
                    </div>
                    <!--end:Menu item-->

                    <!--end:Menu item-->
                </div>
                <!--end:Menu sub-->
            </div>
            @endcan


            @can('قائمة الاطباء')
            <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
                <!--begin:Menu link-->
                <span class="menu-link">
                    <span class="menu-icon">
                        <!--begin::Svg Icon | path: icons/duotune/abstract/abs026.svg-->
                        <span class="svg-icon svg-icon-2">
                            <i class="fa-solid fa-user-doctor"></i>
                        </span>
                        <!--end::Svg Icon-->
                    </span>
                    <span class="menu-title" style="font-size: 15px">الاطباء</span>
                    <span class="menu-arrow"></span>
                </span>
                <!--end:Menu link-->
                <!--begin:Menu sub-->
                <div class="menu-sub menu-sub-accordion">
                    <!--begin:Menu item-->
                    <div class="menu-item">
                        <!--begin:Menu link-->
                        <a style="text-decoration: none" style="text-decoration: none" class="menu-link" href="{{ route('doctor.index') }}">
                            <span class="menu-bullet">
                                <span class="bullet bullet-dot"></span>
                            </span>
                            <span class="menu-title" style="font-size: 15px">قائمة الاطباء</span>
                        </a>
                        <!--end:Menu link-->
                    </div>
                    <!--end:Menu item-->
                    <!--begin:Menu item-->

                    <!--end:Menu item-->
                </div>
                <!--end:Menu sub-->
            </div>
            @endcan

            @can('قائمة الممرضين')
            <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
                <!--begin:Menu link-->
                <span class="menu-link">
                    <span class="menu-icon">
                        <!--begin::Svg Icon | path: icons/duotune/abstract/abs029.svg-->
                        <span class="svg-icon svg-icon-2">
                            <i class="fa-solid fa-user-nurse"></i>
                        </span>
                        <!--end::Svg Icon-->
                    </span>
                    <span class="menu-title" style="font-size: 15px">الممرضين</span>
                    <span class="menu-arrow"></span>
                </span>
                <!--end:Menu link-->
                <!--begin:Menu sub-->
                <div class="menu-sub menu-sub-accordion">

                    <!--begin:Menu item-->
                    <div class="menu-item">
                        <!--begin:Menu link-->
                        <a style="text-decoration: none" class="menu-link" href="{{ route('nurs.index') }}">
                            <span class="menu-bullet">
                                <span class="bullet bullet-dot"></span>
                            </span>
                            <span class="menu-title" style="font-size: 15px">قائمة الممرضين</span>
                        </a>
                        <!--end:Menu link-->
                    </div>
                    <!--end:Menu item-->
                </div>
                <!--end:Menu sub-->
            </div>
            @endcan

            @can('قسم الاستقبال و الطوارئ')
            <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
                <!--begin:Menu link-->
                <span class="menu-link">
                    <span class="menu-icon">
                        <!--begin::Svg Icon | path: icons/duotune/abstract/abs040.svg-->
                        <span class="svg-icon svg-icon-2">
                            <i class="fa-solid fa-house-fire"></i>
                        </span>
                        <!--end::Svg Icon-->
                    </span>
                    <span class="menu-title" style="font-size: 15px">قسم الاستقبال و الطوارئ</span>
                    <span class="menu-arrow"></span>
                </span>
                <!--end:Menu link-->
                <!--begin:Menu sub-->
                <div class="menu-sub menu-sub-accordion">
                    <!--begin:Menu item-->
                    <div class="menu-item">
                        <!--begin:Menu link-->
                        <a style="text-decoration: none" class="menu-link" href="{{ route('Reception.index') }}">
                            <span class="menu-bullet">
                                <span class="bullet bullet-dot"></span>
                            </span>
                            <span class="menu-title" style="font-size: 15px">قائمة المرضى</span>
                        </a>
                        <!--end:Menu link-->
                    </div>
                    <!--end:Menu item-->
                    <!--begin:Menu item-->
                    <div class="menu-item">
                        <!--begin:Menu link-->
                        <a style="text-decoration: none" class="menu-link" href="../../demo1/dist/apps/customers/list.html">
                            <span class="menu-bullet">
                                <span class="bullet bullet-dot"></span>
                            </span>
                            <span class="menu-title" style="font-size: 15px">Customer Listing</span>
                        </a>
                        <!--end:Menu link-->
                    </div>
                    <!--end:Menu item-->
                    <!--begin:Menu item-->
                    <div class="menu-item">
                        <!--begin:Menu link-->
                        <a style="text-decoration: none" class="menu-link" href="../../demo1/dist/apps/customers/view.html">
                            <span class="menu-bullet">
                                <span class="bullet bullet-dot"></span>
                            </span>
                            <span class="menu-title" style="font-size: 15px">Customer Details</span>
                        </a>
                        <!--end:Menu link-->
                    </div>
                    <!--end:Menu item-->
                </div>
                <!--end:Menu sub-->
            </div>
            <!--end:Menu item-->
            @endcan

            @can('قائمة المرضى')
            <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
                <!--begin:Menu link-->
                <span class="menu-link">
                    <span class="menu-icon">
                        <!--begin::Svg Icon | path: icons/duotune/maps/map002.svg-->
                        <span class="svg-icon svg-icon-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-person" viewBox="0 0 16 16">
                                <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z"/>
                              </svg>
                        </span>
                        <!--end::Svg Icon-->
                    </span>
                    <span class="menu-title" style="font-size: 15px">المرضى</span>
                    <span class="menu-arrow"></span>
                </span>
                <!--end:Menu link-->
                <!--begin:Menu sub-->
                <div class="menu-sub menu-sub-accordion">
                    <!--begin:Menu item-->
                    <div class="menu-item">
                        <!--begin:Menu link-->
                        <a style="text-decoration: none" class="menu-link" href="{{ route('Patient.index') }}">
                            <span class="menu-bullet">
                                <span class="bullet bullet-dot"></span>
                            </span>
                            <span class="menu-title" style="font-size: 15px">قائمة المرضى</span>
                        </a>
                        <!--end:Menu link-->
                    </div>

                </div>
                <!--end:Menu sub-->
            </div>
            <!--begin:Menu item-->
            @endcan

            @can('قائمة الصيدلية')

            <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
                <!--begin:Menu link-->
                <span class="menu-link">
                    <span class="menu-icon">
                        <!--begin::Svg Icon | path: icons/duotune/maps/map002.svg-->
                        <span class="svg-icon svg-icon-2">
                            <i class="fa-solid fa-mortar-pestle"></i>
                        </span>
                        <!--end::Svg Icon-->
                    </span>
                    <span class="menu-title" style="font-size: 15px">الصيدلية</span>
                    <span class="menu-arrow"></span>
                </span>
                <!--end:Menu link-->
                <!--begin:Menu sub-->
                <div class="menu-sub menu-sub-accordion">
                    <!--begin:Menu item-->
                    <div class="menu-item">
                        <!--begin:Menu link-->
                        <a style="text-decoration: none" class="menu-link" href="{{ route('pharmacy.index') }}">
                            <span class="menu-bullet">
                                <span class="bullet bullet-dot"></span>
                            </span>
                            <span class="menu-title" style="font-size: 15px">مخازن الصيدلية</span>
                        </a>
                        <!--end:Menu link-->
                    </div>
                    <!--end:Menu item-->
                    <!--begin:Menu item-->
                    <div class="menu-item">
                        <!--begin:Menu link-->
                        <a style="text-decoration: none" class="menu-link" href="{{ route('patients_medicines.index') }}">
                            <span class="menu-bullet">
                                <span class="bullet bullet-dot"></span>
                            </span>
                            <span class="menu-title" style="font-size: 15px">ادوية المرضى</span>
                        </a>
                        <!--end:Menu link-->
                    </div>
                    <!--end:Menu item-->
                    <!--begin:Menu item-->
                    <div class="menu-item">
                        <!--begin:Menu link-->
                        <a style="text-decoration: none" class="menu-link" href="../../demo1/dist/apps/subscriptions/add.html">
                            <span class="menu-bullet">
                                <span class="bullet bullet-dot"></span>
                            </span>
                            <span class="menu-title" style="font-size: 15px">Add Subscription</span>
                        </a>
                        <!--end:Menu link-->
                    </div>
                    <!--end:Menu item-->
                    <!--begin:Menu item-->
                    <div class="menu-item">
                        <!--begin:Menu link-->
                        <a style="text-decoration: none" class="menu-link" href="../../demo1/dist/apps/subscriptions/view.html">
                            <span class="menu-bullet">
                                <span class="bullet bullet-dot"></span>
                            </span>
                            <span class="menu-title" style="font-size: 15px">View Subscription</span>
                        </a>
                        <!--end:Menu link-->
                    </div>
                    <!--end:Menu item-->
                </div>
                <!--end:Menu sub-->
            </div>
            <!--end:Menu item-->
            @endcan

            @endcan


            <!--end:Menu item-->
            <!--begin:Menu item-->
            @can('قائمة المالية')
            <div class="menu-item pt-3">
                <!--begin:Menu content-->
                <div class="menu-content">
                    <span class="menu-heading fw-bold text-uppercase ">المالية</span>
                </div>
                <!--end:Menu content-->
            </div>
            <!--end:Menu item-->
            <!--begin:Menu item-->

            @can('املاك المسشفى')
            <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
                <!--begin:Menu link-->
                <span class="menu-link">
                    <span class="menu-icon">
                        <!--begin::Svg Icon | path: icons/duotune/layouts/lay008.svg-->
                        <span class="svg-icon svg-icon-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-shop" viewBox="0 0 16 16">
                                <path d="M2.97 1.35A1 1 0 0 1 3.73 1h8.54a1 1 0 0 1 .76.35l2.609 3.044A1.5 1.5 0 0 1 16 5.37v.255a2.375 2.375 0 0 1-4.25 1.458A2.371 2.371 0 0 1 9.875 8 2.37 2.37 0 0 1 8 7.083 2.37 2.37 0 0 1 6.125 8a2.37 2.37 0 0 1-1.875-.917A2.375 2.375 0 0 1 0 5.625V5.37a1.5 1.5 0 0 1 .361-.976l2.61-3.045zm1.78 4.275a1.375 1.375 0 0 0 2.75 0 .5.5 0 0 1 1 0 1.375 1.375 0 0 0 2.75 0 .5.5 0 0 1 1 0 1.375 1.375 0 1 0 2.75 0V5.37a.5.5 0 0 0-.12-.325L12.27 2H3.73L1.12 5.045A.5.5 0 0 0 1 5.37v.255a1.375 1.375 0 0 0 2.75 0 .5.5 0 0 1 1 0zM1.5 8.5A.5.5 0 0 1 2 9v6h1v-5a1 1 0 0 1 1-1h3a1 1 0 0 1 1 1v5h6V9a.5.5 0 0 1 1 0v6h.5a.5.5 0 0 1 0 1H.5a.5.5 0 0 1 0-1H1V9a.5.5 0 0 1 .5-.5zM4 15h3v-5H4v5zm5-5a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1h-2a1 1 0 0 1-1-1v-3zm3 0h-2v3h2v-3z"/>
                              </svg>
                                                    </span>
                        <!--end::Svg Icon-->
                    </span>
                    <span class="menu-title" style="font-size: 15px">املاك المسشفى</span>
                    <span class="menu-arrow"></span>
                </span>

                <!--end:Menu link-->
                <!--begin:Menu sub-->
                <div class="menu-sub menu-sub-accordion">
                    <!--begin:Menu item-->
                    <div class="menu-item">
                        <!--begin:Menu link-->
                        <a style="text-decoration: none" class="menu-link" href="../../demo1/dist/layouts/light-sidebar.html">
                            <span class="menu-bullet">
                                <span class="bullet bullet-dot"></span>
                            </span>
                            <span class="menu-title" style="font-size: 15px">اضافة املاك</span>
                        </a>
                        <!--end:Menu link-->
                    </div>

                    <!--end:Menu item-->
                    <!--begin:Menu item-->
                    {{-- <div class="menu-item">
                        <!--begin:Menu link-->
                        <a style="text-decoration: none" class="menu-link" href="../../demo1/dist/layouts/dark-sidebar.html">
                            <span class="menu-bullet">
                                <span class="bullet bullet-dot"></span>
                            </span>
                            <span class="menu-title" style="font-size: 15px">Dark Sidebar</span>
                        </a>
                        <!--end:Menu link-->
                    </div> --}}
                    <!--end:Menu item-->
                    <!--begin:Menu item-->
                    {{-- <div class="menu-item">
                        <!--begin:Menu link-->
                        <a style="text-decoration: none" class="menu-link" href="../../demo1/dist/layouts/light-header.html">
                            <span class="menu-bullet">
                                <span class="bullet bullet-dot"></span>
                            </span>
                            <span class="menu-title" style="font-size: 15px">Light Header</span>
                        </a>
                        <!--end:Menu link-->
                    </div> --}}



                    <!--end:Menu item-->
                    <!--begin:Menu item-->
                    {{-- <div class="menu-item">
                        <!--begin:Menu link-->
                        <a style="text-decoration: none" class="menu-link" href="../../demo1/dist/layouts/dark-header.html">
                            <span class="menu-bullet">
                                <span class="bullet bullet-dot"></span>
                            </span>
                            <span class="menu-title" style="font-size: 15px">Dark Header</span>
                        </a>
                        <!--end:Menu link-->
                    </div> --}}
                    <!--end:Menu item-->
                </div>
                <!--end:Menu sub-->
            </div>
            @endcan

            @can('قائمة المخازن')
            <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
                <!--begin:Menu link-->
                <span class="menu-link">
                    <span class="menu-icon">
                        <!--begin::Svg Icon | path: icons/duotune/layouts/lay008.svg-->
                        <span class="svg-icon svg-icon-2">
                            <i class="fa-solid fa-warehouse"></i>

                        </span>
                        <!--end::Svg Icon-->
                    </span>
                    <span class="menu-title" style="font-size: 15px">المخازن</span>
                    <span class="menu-arrow"></span>
                </span>

                <!--end:Menu link-->
                <!--begin:Menu sub-->
                <div class="menu-sub menu-sub-accordion">
                    <!--begin:Menu item-->
                    <div class="menu-item">
                        <!--begin:Menu link-->
                        <a style="text-decoration: none" class="menu-link" href="{{ route('stores.index') }}">
                            <span class="menu-bullet">
                                <span class="bullet bullet-dot"></span>
                            </span>
                            <span class="menu-title" style="font-size: 15px">مخازن المستشفى</span>
                        </a>
                        <!--end:Menu link-->
                    </div>
                    <!--end:Menu item-->
                    <!--begin:Menu item-->
                    <div class="menu-item">
                        <!--begin:Menu link-->
                        <a style="text-decoration: none" class="menu-link" href="../../demo1/dist/layouts/dark-sidebar.html">
                            <span class="menu-bullet">
                                <span class="bullet bullet-dot"></span>
                            </span>
                            <span class="menu-title" style="font-size: 15px">مخازن الصيدلية</span>
                        </a>
                        <!--end:Menu link-->
                    </div>
                    <!--end:Menu item-->
                    <!--begin:Menu item-->
                    {{-- <div class="menu-item">
                        <!--begin:Menu link-->
                        <a style="text-decoration: none" class="menu-link" href="../../demo1/dist/layouts/light-header.html">
                            <span class="menu-bullet">
                                <span class="bullet bullet-dot"></span>
                            </span>
                            <span class="menu-title" style="font-size: 15px">Light Header</span>
                        </a>
                        <!--end:Menu link-->
                    </div> --}}



                    <!--end:Menu item-->
                    <!--begin:Menu item-->
                    {{-- <div class="menu-item">
                        <!--begin:Menu link-->
                        <a style="text-decoration: none" class="menu-link" href="../../demo1/dist/layouts/dark-header.html">
                            <span class="menu-bullet">
                                <span class="bullet bullet-dot"></span>
                            </span>
                            <span class="menu-title" style="font-size: 15px">Dark Header</span>
                        </a>
                        <!--end:Menu link-->
                    </div> --}}
                    <!--end:Menu item-->
                </div>
                <!--end:Menu sub-->
            </div>
            @endcan

            @can('قائمة الفواتير')
            <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
                <!--begin:Menu link-->
                <span class="menu-link">
                    <span class="menu-icon">
                        <!--begin::Svg Icon | path: icons/duotune/text/txt002.svg-->
                        <span class="svg-icon svg-icon-2">
                            <i class="fa-regular fa-credit-card"></i>
                                                </span>
                        <!--end::Svg Icon-->
                    </span>
                    <span class="menu-title" style="font-size: 15px">الفواتير</span>
                    <span class="menu-arrow"></span>
                </span>
                <!--end:Menu link-->
                <!--begin:Menu sub-->
                <div class="menu-sub menu-sub-accordion">
                    <!--begin:Menu item-->
                    <div class="menu-item">
                        <!--begin:Menu link-->
                        <a style="text-decoration: none" class="menu-link" href="{{ route('fee.index') }}">
                            <span class="menu-bullet">
                                <span class="bullet bullet-dot"></span>
                            </span>
                            <span class="menu-title" style="font-size: 15px">فواتير</span>
                        </a>
                        <!--end:Menu link-->
                    </div>
                    <!--end:Menu item-->
                    <!--begin:Menu item-->
                    <div class="menu-item">
                        <!--begin:Menu link-->
                        <a style="text-decoration: none" class="menu-link" href="invoices">
                            <span class="menu-bullet">
                                <span class="bullet bullet-dot"></span>
                            </span>
                            <span class="menu-title" style="font-size: 15px">ايصال قبض</span>
                        </a>
                        <!--end:Menu link-->
                    </div>
                    <!--end:Menu item-->
                    <!--begin:Menu item-->
                    {{-- <div class="menu-item">
                        <!--begin:Menu link-->
                        <a style="text-decoration: none" class="menu-link" href="../../demo1/dist/toolbars/accounting.html">
                            <span class="menu-bullet">
                                <span class="bullet bullet-dot"></span>
                            </span>
                            <span class="menu-title" style="font-size: 15px">Accounting</span>
                        </a>
                        <!--end:Menu link-->
                    </div> --}}
                    <!--end:Menu item-->
                    <!--begin:Menu item-->
                    {{-- <div class="menu-item">
                        <!--begin:Menu link-->
                        <a style="text-decoration: none" class="menu-link" href="../../demo1/dist/toolbars/extended.html">
                            <span class="menu-bullet">
                                <span class="bullet bullet-dot"></span>
                            </span>
                            <span class="menu-title" style="font-size: 15px">Extended</span>
                        </a>
                        <!--end:Menu link-->
                    </div> --}}
                    <!--end:Menu item-->
                    <!--begin:Menu item-->
                    {{-- <div class="menu-item">
                        <!--begin:Menu link-->
                        <a style="text-decoration: none" class="menu-link" href="../../demo1/dist/toolbars/reports.html">
                            <span class="menu-bullet">
                                <span class="bullet bullet-dot"></span>
                            </span>
                            <span class="menu-title" style="font-size: 15px">Reports</span>
                        </a>
                        <!--end:Menu link-->
                    </div> --}}
                    <!--end:Menu item-->
                </div>
                <!--end:Menu sub-->
            </div>
            <!--end:Menu item-->
            <!--begin:Menu item-->
            @endcan

            <div class="menu-item">
                <!--begin:Menu link-->
                <a style="text-decoration: none" class="menu-link" href="https://preview.keenthemes.com/metronic8/demo1/layout-builder.html">
                    <span class="menu-icon">
                        <!--begin::Svg Icon | path: icons/duotune/abstract/abs014.svg-->
                        <span class="svg-icon svg-icon-2">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path opacity="0.3" d="M11.8 5.2L17.7 8.6V15.4L11.8 18.8L5.90001 15.4V8.6L11.8 5.2ZM11.8 2C11.5 2 11.2 2.1 11 2.2L3.8 6.4C3.3 6.7 3 7.3 3 7.9V16.2C3 16.8 3.3 17.4 3.8 17.7L11 21.9C11.3 22 11.5 22.1 11.8 22.1C12.1 22.1 12.4 22 12.6 21.9L19.8 17.7C20.3 17.4 20.6 16.8 20.6 16.2V7.9C20.6 7.3 20.3 6.7 19.8 6.4L12.6 2.2C12.4 2.1 12.1 2 11.8 2Z" fill="currentColor" />
                                <path d="M11.8 8.69995L8.90001 10.3V13.7L11.8 15.3L14.7 13.7V10.3L11.8 8.69995Z" fill="currentColor" />
                            </svg>
                        </span>
                        <!--end::Svg Icon-->
                    </span>
                    <span class="menu-title" style="font-size: 15px">الحسابات الاضافية و الخارجية</span>
                </a>
                <!--end:Menu link-->
            </div>
            @endcan

            <!--end:Menu item-->
            <!--begin:Menu item-->
            @can('قائمة المساعدة')
            <div class="menu-item pt-3">
                <!--begin:Menu content-->
                <div class="menu-content">
                    <span class="menu-heading fw-bold text-uppercase fs-7">المساعدة</span>
                </div>
                <!--end:Menu content-->
            </div>
            <!--end:Menu item-->
            <!--begin:Menu item-->
            @can('الاعدادات')
            <div class="menu-item">
                <!--begin:Menu link-->
                <a style="text-decoration: none" class="menu-link" href="https://preview.keenthemes.com/html/metronic/docs/base/utilities">
                    <span class="menu-icon">
                        <!--begin::Svg Icon | path: icons/duotune/general/gen002.svg-->
                        <span class="svg-icon svg-icon-2">
                            <i class="fa-solid fa-bars-progress"></i>
                        </span>
                        <!--end::Svg Icon-->
                    </span>
                    <span class="menu-title" style="font-size: 15px">الاعدادات</span>
                </a>
                <!--end:Menu link-->
            </div>
            @endcan

            <!--end:Menu item-->
            <!--begin:Menu item-->
            @can('صلاحيات المستخدمين')
            <div class="menu-item">
                <!--begin:Menu link-->
                <a style="text-decoration: none" class="menu-link" href="{{ route('users.index') }}">
                    <span class="menu-icon">
                        <!--begin::Svg Icon | path: icons/duotune/abstract/abs027.svg-->
                        <span class="svg-icon svg-icon-2">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path opacity="0.3" d="M21.25 18.525L13.05 21.825C12.35 22.125 11.65 22.125 10.95 21.825L2.75 18.525C1.75 18.125 1.75 16.725 2.75 16.325L4.04999 15.825L10.25 18.325C10.85 18.525 11.45 18.625 12.05 18.625C12.65 18.625 13.25 18.525 13.85 18.325L20.05 15.825L21.35 16.325C22.35 16.725 22.35 18.125 21.25 18.525ZM13.05 16.425L21.25 13.125C22.25 12.725 22.25 11.325 21.25 10.925L13.05 7.62502C12.35 7.32502 11.65 7.32502 10.95 7.62502L2.75 10.925C1.75 11.325 1.75 12.725 2.75 13.125L10.95 16.425C11.65 16.725 12.45 16.725 13.05 16.425Z" fill="currentColor" />
                                <path d="M11.05 11.025L2.84998 7.725C1.84998 7.325 1.84998 5.925 2.84998 5.525L11.05 2.225C11.75 1.925 12.45 1.925 13.15 2.225L21.35 5.525C22.35 5.925 22.35 7.325 21.35 7.725L13.05 11.025C12.45 11.325 11.65 11.325 11.05 11.025Z" fill="currentColor" />
                            </svg>
                        </span>
                        <!--end::Svg Icon-->
                    </span>
                    <span class="menu-title" style="font-size: 15px">المستخدمين</span>
                </a>
                <!--end:Menu link-->
            </div>
            @endcan

            @can('المستخدمين')
            <div class="menu-item">
                <!--begin:Menu link-->
                <a style="text-decoration: none" class="menu-link" href="{{ route('roles.index') }}">
                    <span class="menu-icon">
                        <!--begin::Svg Icon | path: icons/duotune/abstract/abs027.svg-->
                        <span class="svg-icon svg-icon-2">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path opacity="0.3" d="M21.25 18.525L13.05 21.825C12.35 22.125 11.65 22.125 10.95 21.825L2.75 18.525C1.75 18.125 1.75 16.725 2.75 16.325L4.04999 15.825L10.25 18.325C10.85 18.525 11.45 18.625 12.05 18.625C12.65 18.625 13.25 18.525 13.85 18.325L20.05 15.825L21.35 16.325C22.35 16.725 22.35 18.125 21.25 18.525ZM13.05 16.425L21.25 13.125C22.25 12.725 22.25 11.325 21.25 10.925L13.05 7.62502C12.35 7.32502 11.65 7.32502 10.95 7.62502L2.75 10.925C1.75 11.325 1.75 12.725 2.75 13.125L10.95 16.425C11.65 16.725 12.45 16.725 13.05 16.425Z" fill="currentColor" />
                                <path d="M11.05 11.025L2.84998 7.725C1.84998 7.325 1.84998 5.925 2.84998 5.525L11.05 2.225C11.75 1.925 12.45 1.925 13.15 2.225L21.35 5.525C22.35 5.925 22.35 7.325 21.35 7.725L13.05 11.025C12.45 11.325 11.65 11.325 11.05 11.025Z" fill="currentColor" />
                            </svg>
                        </span>
                        <!--end::Svg Icon-->
                    </span>
                    <span class="menu-title" style="font-size: 15px">الصلاحيات</span>
                </a>
                <!--end:Menu link-->
            </div>
            @endcan

            @endcan

        </div>
        <!--end::Menu-->
    </div>
    <!--end::Menu wrapper-->
</div>
