@extends('layout.dashboard')
@section('css')
@endsection
@section('co')

<div class="row">
    <div class="col">
        <div class="card card-flush bgi-size-contain bgi-position-x-end  mb-xl-10" style="background-color: #F1416C">
            <!--begin::Header-->
            <div class="card-header pt-5">
                <!--begin::Title-->
                <div class="card-title d-flex flex-column">
                    <!--begin::Amount-->
                    <span class="fs-2hx fw-bold text-white me-2 lh-1 ls-n2"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">{{\App\Models\doctors::count()}}</font></font></span>
                    <!--end::Amount-->
                    <!--begin::Subtitle-->
                    <span class="text-white opacity-75 pt-1 fw-semibold fs-6"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">عدد الاطباء</font></font></span>
                    <!--end::Subtitle-->
                </div>
                <!--end::Title-->
            </div>
            <!--end::Header-->
            <!--begin::Card body-->
            <div class="card-body d-flex align-items-end pt-0">
                <!--begin::Progress-->
                <div class="d-flex align-items-center flex-column mt-3 w-100">
                    <div class="d-flex justify-content-between fw-bold fs-6 text-white opacity-75 w-100 mt-auto mb-2">
                        <span><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"></font></font></span>
                        <span><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"></font></font></span>
                    </div>
                    <div class="h-8px mx-3 w-100">
                        <h4><a href="{{ route('doctor.index') }}" style="color: white">عرض ملف الاطباء</a></h4>
                    </div>
                </div>
                <!--end::Progress-->
            </div>
            <!--end::Card body-->
        </div>
    </div>

    <div class="col">
        <div class="card card-flush bgi-no-repeat bgi-size-contain bgi-position-x-end  mb-xl-10" style="background-color: #3b3db1">
            <!--begin::Header-->
            <div class="card-header pt-5">
                <!--begin::Title-->
                <div class="card-title d-flex flex-column">
                    <!--begin::Amount-->
                    <span class="fs-2hx fw-bold text-white me-2 lh-1 ls-n2"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">{{\App\Models\nurss::count()}}</font></font></span>
                    <!--end::Amount-->
                    <!--begin::Subtitle-->
                    <span class="text-white opacity-75 pt-1 fw-semibold fs-6"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">عدد الممرضين</font></font></span>
                    <!--end::Subtitle-->
                </div>
                <!--end::Title-->
            </div>
            <!--end::Header-->
            <!--begin::Card body-->
            <div class="card-body d-flex align-items-end pt-0">
                <!--begin::Progress-->
                <div class="d-flex align-items-center flex-column mt-3 w-100">
                    <div class="d-flex justify-content-between fw-bold fs-6 text-white opacity-75 w-100 mt-auto mb-2">
                        <span><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"></font></font></span>
                        <span><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"></font></font></span>
                    </div>
                    <div class="h-8px mx-3 w-100">
                        <h4><a href="{{ route('nurs.index') }}" style="color: white">عرض ملف الممرضين</a></h4>
                    </div>
                </div>
                <!--end::Progress-->
            </div>
            <!--end::Card body-->
        </div>
    </div>

    <div class="col">
        <div class="card card-flush bgi-no-repeat bgi-size-contain bgi-position-x-end  mb-xl-10" style="background-color:
        hsl(0, 4%, 26%)">
            <!--begin::Header-->
            <div class="card-header pt-5">
                <!--begin::Title-->
                <div class="card-title d-flex flex-column">
                    <!--begin::Amount-->
                    <span class="fs-2hx fw-bold text-white me-2 lh-1 ls-n2"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">{{\App\Models\Patients::count()}}</font></font></span>
                    <!--end::Amount-->
                    <!--begin::Subtitle-->
                    <span class="text-white opacity-75 pt-1 fw-semibold fs-6"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">عدد المرضى</font></font></span>
                    <!--end::Subtitle-->
                </div>
                <!--end::Title-->
            </div>
            <!--end::Header-->
            <!--begin::Card body-->
            <div class="card-body d-flex align-items-end pt-0">
                <!--begin::Progress-->
                <div class="d-flex align-items-center flex-column mt-3 w-100">
                    <div class="d-flex justify-content-between fw-bold fs-6 text-white opacity-75 w-100 mt-auto mb-2">
                        <span><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"></font></font></span>
                        <span><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"></font></font></span>
                    </div>
                    <div class="h-8px mx-3 w-100">
                        <h4><a href="{{ route('Patient.index') }}" style="color: white">عرض ملف المرضى</a></h4>
                    </div>
                </div>
                <!--end::Progress-->
            </div>
            <!--end::Card body-->
        </div>
    </div>
    <div class="col">
        <div class="card card-flush bgi-no-repeat bgi-size-contain bgi-position-x-end  mb-xl-10" style="background-color: #F1416C">
            <!--begin::Header-->
            <div class="card-header pt-5">
                <!--begin::Title-->
                <div class="card-title d-flex flex-column">
                    <!--begin::Amount-->
                    <span class="fs-2hx fw-bold text-white me-2 lh-1 ls-n2"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">{{\App\Models\Operating_room_reservation::count()}}</font></font></span>
                    <!--end::Amount-->
                    <!--begin::Subtitle-->
                    <span class="text-white opacity-75 pt-1 fw-semibold fs-6"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">عدد العمليات المحجوزة</font></font></span>
                    <!--end::Subtitle-->
                </div>
                <!--end::Title-->
            </div>
            <!--end::Header-->
            <!--begin::Card body-->
            <div class="card-body d-flex align-items-end pt-0">
                <!--begin::Progress-->
                <div class="d-flex align-items-center flex-column mt-3 w-100">
                    <div class="d-flex justify-content-between fw-bold fs-6 text-white opacity-75 w-100 mt-auto mb-2">
                        <span><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"></font></font></span>
                        <span><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"></font></font></span>
                    </div>
                    <div class="h-8px mx-3 w-100">
                        <h4><a href="{{ url('add_operating') }}" style="color: white">عرض قائمة العمليات</a></h4>
                    </div>
                </div>
                <!--end::Progress-->
            </div>
            <!--end::Card body-->
        </div>
    </div>
</div>

<div class="card-header-stretch overflow ">
    <!--begin::Tabs-->
    <ul class="nav  flex-nowrap" role="tablist" id="kt_layout_builder_tabs">
        <li class="nav-item" style="width:75%;>
            <span class="nav-link" data-bs-toggle="tab" href="#kt_builder_main" role="tab" aria-selected="true">
                 <div style="width: 450px; height: 520px;"> {!! $chartjs->render() !!}</div>
            </span>
        </li>
        <li class="nav-item" style="width:75%;>
            <span class="nav-link" data-bs-toggle="tab" href="#kt_builder_layout" role="tab" aria-selected="false" tabindex="-1"> <div style="width: 750px; height: 520px;"> {!! $chartjs2->render() !!}</div>
            </span>
        </li>
    </ul></div>

<div>
    <div id="calendar"></div>

</div>





    <div class="col " >
        <!--begin::Tables widget 16-->
        <div class="card card-flush ">
            <!--begin::Header-->
            <div class="card-header pt-5 ">
                <!--begin::Title-->
                <h3 class="card-title align-items-start flex-column">
                    <span class="card-label fw-bold text-gray-800">اخر العمليات على النظام</span>
                    <span class="text-gray-400 mt-1 fw-semibold fs-6">{{ Carbon\Carbon::now()}}</span>
                </h3>
                <!--end::Title-->

            </div>
            <!--end::Header-->
            <!--begin::Body-->
            <div class="card-body pt-6">
                <!--begin::Nav-->
                <ul class="nav nav-pills nav-pills-custom mb-3" role="tablist">
                    <!--begin::Item-->
                    <li class="nav-item mb-3 me-3 me-lg-6" role="presentation">
                        <!--begin::Link-->
                        <a class="nav-link btn btn-outline btn-flex btn-color-muted btn-active-color-primary flex-column overflow-hidden w-80px h-85px pt-5 pb-2 active" id="kt_stats_widget_16_tab_link_1" data-bs-toggle="pill" href="#kt_stats_widget_16_tab_1" aria-selected="true" role="tab">
                            <!--begin::Icon-->
                            <div class="nav-icon mb-3">
                                <i class="fonticon-drive fs-1 p-0"></i>
                            </div>
                            <!--end::Icon-->
                            <!--begin::Title-->
                            <span class="nav-text text-gray-800 fw-bold fs-6 lh-1">اداريين</span>
                            <!--end::Title-->
                            <!--begin::Bullet-->
                            <span class="bullet-custom position-absolute bottom-0 w-100 h-4px bg-primary"></span>
                            <!--end::Bullet-->
                        </a>
                        <!--end::Link-->
                    </li>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="nav-item mb-3 me-3 me-lg-6" role="presentation">
                        <!--begin::Link-->
                        <a class="nav-link btn btn-outline btn-flex btn-color-muted btn-active-color-primary flex-column overflow-hidden w-80px h-85px pt-5 pb-2" id="kt_stats_widget_16_tab_link_2" data-bs-toggle="pill" href="#kt_stats_widget_16_tab_2" aria-selected="false" tabindex="-1" role="tab">
                            <!--begin::Icon-->
                            <div class="nav-icon mb-3">
                                <i class="fonticon-bank fs-1 p-0"></i>
                            </div>
                            <!--end::Icon-->
                            <!--begin::Title-->
                            <span class="nav-text text-gray-800 fw-bold fs-6 lh-1">اطباء</span>
                            <!--end::Title-->
                            <!--begin::Bullet-->
                            <span class="bullet-custom position-absolute bottom-0 w-100 h-4px bg-primary"></span>
                            <!--end::Bullet-->
                        </a>
                        <!--end::Link-->
                    </li>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="nav-item mb-3 me-3 me-lg-6" role="presentation">
                        <!--begin::Link-->
                        <a class="nav-link btn btn-outline btn-flex btn-color-muted btn-active-color-primary flex-column overflow-hidden w-80px h-85px pt-5 pb-2" id="kt_stats_widget_16_tab_link_3" data-bs-toggle="pill" href="#kt_stats_widget_16_tab_3" aria-selected="false" tabindex="-1" role="tab">
                            <!--begin::Icon-->
                            <div class="nav-icon mb-3">
                                <i class="fonticon-like-1 fs-1 p-0"></i>
                            </div>
                            <!--end::Icon-->
                            <!--begin::Title-->
                            <span class="nav-text text-gray-800 fw-bold fs-6 lh-1">ممرضين</span>
                            <!--end::Title-->
                            <!--begin::Bullet-->
                            <span class="bullet-custom position-absolute bottom-0 w-100 h-4px bg-primary"></span>
                            <!--end::Bullet-->
                        </a>
                        <!--end::Link-->
                    </li>
                    <!--end::Item-->

                </ul>
                <!--end::Nav-->
                <!--begin::Tab Content-->
                <div class="tab-content">
                    <!--begin::Tap pane-->
                    <div class="tab-pane fade show active" id="kt_stats_widget_16_tab_1" role="tabpanel" aria-labelledby="#kt_stats_widget_16_tab_link_1">
                        <!--begin::Table container-->
                        <div class="table-responsive">
                            <!--begin::Table-->
                            <table class="table table-row-dashed align-middle gs-0 gy-3 my-0">
                                <!--begin::Table head-->
                                <thead>
                                    <tr class="fs-7 fw-bold text-gray-400 border-bottom-0">
                                        <th class="p-0 pb-3 min-w-150px text-start">الاسم</th>
                                        <th class="p-0 pb-3 min-w-100px text-end pe-13">رقم تعريف الاداري</th>
                                        <th class="p-0 pb-3 w-50px text-end">تاريخ الاضافة</th>
                                    </tr>
                                </thead>
                                <!--end::Table head-->
                                <!--begin::Table body-->
                                <tbody>

                                    <tr>
                                        @foreach(\App\Models\doctors::latest()->take(5)->get() as $doctor)
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div class="symbol symbol-50px me-3">
                                                    <img src='{{ asset("attachments/doctors/$doctor->name/$doctor->photos") }}' class="" alt="">
                                                </div>
                                                <div class="d-flex justify-content-start flex-column">
                                                    <a href="/metronic8/demo1/../demo1/pages/user-profile/overview.html" class="text-gray-800 fw-bold text-hover-primary mb-1 fs-6">{{ $doctor->user->name }}</a>
                                                    <span class="text-gray-400 fw-semibold d-block fs-7">{{ $doctor->email }}</span>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="text-end pe-13">
                                            <span class="text-gray-600 fw-bold fs-6">{{ $doctor->doctor_id }}</span>
                                        </td>

                                        <td class="text-end pe-0">
                                            <div>{{ $doctor->created_at }}</div>
                                        </td>

                                    </tr>
                                    @endforeach

                                    <tr>
                                        <td>

                                </tbody>
                                <!--end::Table body-->
                            </table>
                            <!--end::Table-->
                        </div>
                        <!--end::Table container-->
                    </div>
                    <!--end::Tap pane-->
                    <!--begin::Tap pane-->
                    <div class="tab-pane fade" id="kt_stats_widget_16_tab_2" role="tabpanel" aria-labelledby="#kt_stats_widget_16_tab_link_2">
                        <!--begin::Table container-->
                        <div class="table-responsive">
                            <!--begin::Table-->
                            <table class="table table-row-dashed align-middle gs-0 gy-3 my-0">
                                <!--begin::Table head-->
                                <thead>
                                    <tr class="fs-7 fw-bold text-gray-400 border-bottom-0">
                                        <th class="p-0 pb-3 min-w-150px text-start">الاسم</th>
                                        <th class="p-0 pb-3 min-w-100px text-end pe-13">رقم تعريف الطبيب</th>
                                        <th class="p-0 pb-3 w-50px text-end">تاريخ الاضافة</th>
                                    </tr>
                                </thead>
                                <!--end::Table head-->
                                <!--begin::Table body-->
                                <tbody>
                                    <tr>
                                        @foreach(\App\Models\doctors::latest()->take(5)->get() as $doctor)
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div class="symbol symbol-50px me-3">
                                                    <img src='{{ asset("attachments/doctors/$doctor->name/$doctor->photos") }}' class="" alt="">
                                                </div>
                                                <div class="d-flex justify-content-start flex-column">
                                                    <a href="/metronic8/demo1/../demo1/pages/user-profile/overview.html" class="text-gray-800 fw-bold text-hover-primary mb-1 fs-6">{{ $doctor->name }}</a>
                                                    <span class="text-gray-400 fw-semibold d-block fs-7">{{ $doctor->email }}</span>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="text-end pe-13">
                                            <span class="text-gray-600 fw-bold fs-6">{{ $doctor->doctor_id }}</span>
                                        </td>

                                        <td class="text-end pe-0">
                                            <div>{{ $doctor->created_at }}</div>
                                        </td>

                                    </tr>
                                    @endforeach
                                    </tr>
                                </tbody>
                                <!--end::Table body-->
                            </table>
                            <!--end::Table-->
                        </div>
                        <!--end::Table container-->
                    </div>
                    <!--end::Tap pane-->
                    <!--begin::Tap pane-->
                    <div class="tab-pane fade" id="kt_stats_widget_16_tab_3" role="tabpanel" aria-labelledby="#kt_stats_widget_16_tab_link_3">
                        <!--begin::Table container-->
                        <div class="table-responsive">
                            <!--begin::Table-->
                            <table class="table table-row-dashed align-middle gs-0 gy-3 my-0">
                                <!--begin::Table head-->
                                <thead>
                                    <tr class="fs-7 fw-bold text-gray-400 border-bottom-0">
                                        <th class="p-0 pb-3 min-w-150px text-start">الاسم</th>
                                        <th class="p-0 pb-3 min-w-100px text-end pe-13">رقم تعريف الممرض</th>
                                        <th class="p-0 pb-3 w-50px text-end">تاريخ الاضافة</th>
                                    </tr>
                                </thead>
                                <!--end::Table head-->
                                <!--begin::Table body-->
                                <tbody>



                                    <tr>
                                        @foreach(\App\Models\nurss::latest()->take(5)->get() as $doctor)
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div class="symbol symbol-50px me-3">
                                                    <img src='#' class="" alt="">
                                                </div>
                                                <div class="d-flex justify-content-start flex-column">
                                                    <a href="/metronic8/demo1/../demo1/pages/user-profile/overview.html" class="text-gray-800 fw-bold text-hover-primary mb-1 fs-6">{{ $doctor->name }}</a>
                                                    <span class="text-gray-400 fw-semibold d-block fs-7">{{ $doctor->email }}</span>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="text-end pe-13">
                                            <span class="text-gray-600 fw-bold fs-6">{{ $doctor->doctor_id }}</span>
                                        </td>

                                        <td class="text-end pe-0">
                                            <div>{{ $doctor->created_at }}</div>
                                        </td>

                                    </tr>
                                    @endforeach
                                    </tr>


                                </tbody>
                                <!--end::Table body-->
                            </table>
                            <!--end::Table-->
                        </div>
                        <!--end::Table container-->
                    </div>

                </div>
                <!--end::Tab Content-->
            </div>
            <!--end: Card Body-->
        </div>
        <!--end::Tables widget 16-->
    </div>


@endsection
@section('js')
<script>
$('#calendar').fullCalendar({
  header: {
    left: 'prev,next today',
    center: 'addEventButton',
    right: 'month,agendaWeek,agendaDay,listWeek'
  },
  defaultDate: '2018-11-16',
  navLinks: true,
  editable: true,
  eventLimit: true,
  events: [{
      title: 'Simple static event',
      start: '2018-11-16',
      description: 'Super cool event'
    },

  ],
  customButtons: {
    addEventButton: {
      text: 'Add new event',
      click: function () {
        var dateStr = prompt('Enter date in YYYY-MM-DD format');
        var date = moment(dateStr);

        if (date.isValid()) {
          $('#calendar').fullCalendar('renderEvent', {
            title: 'Dynamic event',
            start: date,
            allDay: true
          });
        } else {
          alert('Invalid Date');
        }

      }
    }
  },
  dayClick: function (date, jsEvent, view) {
    var date = moment(date);

    if (date.isValid()) {
      $('#calendar').fullCalendar('renderEvent', {
        title: 'Dynamic event from date click',
        start: date,
        allDay: true
      });
    } else {
      alert('Invalid');
    }
  },
});
</script>

@endsection
