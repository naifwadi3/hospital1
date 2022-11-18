@extends('layout.dashboard')
@section('css')


@section('tit')
قسم الاشعه
@endsection
@section('co')


@if ($errors->any())
<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif


 @can('اضافة حجز اشعه')
<div>
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#kt_modal_new_target">
        اضافة حجز جديد <i class="bi bi-plus"></i>
    </button>
</div>
@endcan

<div style="padding: 1cm">
<div class="table-responsive">
    <table id="kt_datatable_dom_positioning" class="table table-striped table-row-bordered gy-5 gs-7 border rounded">
		<thead>
			<tr>
				<th><input name="select_all" id="example-select-all" type="checkbox" onclick="CheckAll('box1', this)" /></th>
                <th scope="col">اسم المريض</th>
                <th scope="col">اسم الجهاز</th>
                <th scope="col">العمليات</th>
		</thead>
		<tbody>

@php
	$i=1;
@endphp
@foreach ($ray as $ray)

<tr>
                    <th>{{ $i++ }}</th>
					<td>{{ $ray->patient->patient_name }}</td>
					<td>{{$ray->device_name  }}</td>
					<td>{{ $ray->booking_date }}</td>
                    <td>
                        @can('تعديل حجز قسم الاشعه')
                        <button type="button" class="btn btn-info btn-sm" data-bs-toggle="modal"
                            data-bs-target="#edit{{ $ray->id }}"
                            title="{{ trans('Grades_trans.Edit') }}"><i class="fa fa-edit"></i></button>
                            @endcan

                            @can('حذف حجز قسم الاشعه')
                        <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal"
                            data-bs-target="#delete{{ $ray->id }}"
                            title="{{ trans('Grades_trans.Delete') }}"><i
                                class="fa fa-trash"></i></button>
                                @endcan

                    </td>
                    </tr>





  <div class="modal fade" tabindex="-1" id="edit{{ $ray->id }}">
      <div class="modal-dialog modal-lg">
          <br><br><br><br>
          <div class="modal-content rounded">
              <div class="modal-header">
                  <h3 class="modal-title" >اضافة قسم</h3>

                  <!--begin::Close-->

                  <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
                      <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
                      width="30" height="30"
                      viewBox="0 0 30 30"
                      style=" fill:#1A1A1A;">    <path d="M 7 4 C 6.744125 4 6.4879687 4.0974687 6.2929688 4.2929688 L 4.2929688 6.2929688 C 3.9019687 6.6839688 3.9019687 7.3170313 4.2929688 7.7070312 L 11.585938 15 L 4.2929688 22.292969 C 3.9019687 22.683969 3.9019687 23.317031 4.2929688 23.707031 L 6.2929688 25.707031 C 6.6839688 26.098031 7.3170313 26.098031 7.7070312 25.707031 L 15 18.414062 L 22.292969 25.707031 C 22.682969 26.098031 23.317031 26.098031 23.707031 25.707031 L 25.707031 23.707031 C 26.098031 23.316031 26.098031 22.682969 25.707031 22.292969 L 18.414062 15 L 25.707031 7.7070312 C 26.098031 7.3170312 26.098031 6.6829688 25.707031 6.2929688 L 23.707031 4.2929688 C 23.316031 3.9019687 22.682969 3.9019687 22.292969 4.2929688 L 15 11.585938 L 7.7070312 4.2929688 C 7.5115312 4.0974687 7.255875 4 7 4 z"></path></svg>                </div>
                  <!--end::Close-->
              </div>
              <form action="{{ route('rays.update',$ray->id) }}" method="post">
                @csrf
                @method('PUT')
            <!--begin::Modal header-->
            <div class="modal-header pb-0 border-0 justify-content-end">
                <!--begin::Close-->
                <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                    <!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
                    <span class="svg-icon svg-icon-1">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="currentColor" />
                            <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="currentColor" />
                        </svg>
                    </span>
                    <!--end::Svg Icon-->
                </div>
                <!--end::Close-->
            </div>
            <!--begin::Modal header-->
            <!--begin::Modal body-->
            <div class="modal-body scroll-y px-10 px-lg-15 pt-0 pb-15">
                <!--begin:Form-->
                  <!--begin::Heading-->
                  <div class="mb-13 text-center">
                    <!--begin::Title-->
                    <h1 class="mb-3">حجز موعد جديد</h1>
                    <!--end::Title-->
                    <!--begin::Description-->
                    <div class="text-muted fw-semibold fs-5">اذا لم يكن المريض مسجل فيمكنك تسجيله من
                    <a href="{{ route('Patient.index') }}" class="fw-bold link-primary">هنا</a>.</div>
                    <!--end::Description-->
                </div>
                <!--end::Heading-->
                    <!--begin::Input group-->
                    <div class="row">
                    <div class="col">
                        <!--begin::Label-->
                        <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                            <span class="required">اسم المريض</span>
                            <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Specify a target name for future usage and reference"></i>
                        </label>
                        <!--end::Label-->
                        <select class="form-select form-select-solid" name="patient_id">
                            @foreach ($Patient as $Patients)
                            <option value="{{ $Patients->id }}" {{$Patients->id == $ray->patient_id ?'selected':''}}>{{ $Patients->patient_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <!--end::Input group-->
                    <!--begin::Input group-->
                    <div class="col">

                        <!--begin::Col-->
                        <div class="col-md-6 fv-row">

                            <label class="required fs-6 fw-semibold mb-2">اسم الجهاز</label>
                            <!--begin::Input-->
                            <div class="position-relative d-flex align-items-center">
                                <!--begin::Icon-->
                                <!--begin::Svg Icon | path: icons/duotune/general/gen014.svg-->
                                <div class="col fv-row">
                                    <select class="form-select form-select-solid" data-control="select2" data-hide-search="true" data-placeholder="Select a Team Member" name="device_name">
                                        <option value="جهازالأشعة السينية x-ray machine">جهازالأشعة السينية x-ray machine </option>
                                        <option value="جهاز الأشعة المقطعية computed tomography">جهاز الأشعة المقطعية computed tomography</option>
                                        <option value="جهاز الرنين المغناطيسي M.R.I">جهاز الرنين المغناطيسي M.R.I</option>
                                        <option value="جهاز الغاما كاميرا">جهاز الغاما كاميرا</option>
                                        <option value="جهاز الموجات فوق الصوتية">جهاز الموجات فوق الصوتية</option>
                                        <option value="جهاز الكوبالت 60">جهاز الكوبالت 60</option>
                                    </select>
                                </div>
                                </span>
                                <!--end::Svg Icon-->
                                <!--end::Icon-->
                                <!--begin::Datepicker-->

                                <!--end::Datepicker-->
                            </div>
                            <!--end::Input-->
                        </div>
                        <!--end::Col-->
                        <!--begin::Col-->

                        <!--end::Col-->
                    </div>
                    <!--end::Input group-->
                    <!--begin::Input group-->

                    <!--end::Input group-->

                    <!--begin::Input group-->
                    <div class="col">
                    <div class="col flex-stack mb-8">
                        <!--begin::Label-->
                        <div class="me-5">
                            <label class="required fs-6 fw-semibold">موعد الزيارة</label><br>
                        </div>
                        <!--end::Label-->
                        <!--begin::Switch-->
                        <input type="date" class="form-control form-control-solid" name="booking_date" value="{{ $ray->booking_date }}">
                        <!--end::Switch-->
                    </div>


                    </div>
                    <!--begin::Actions-->
                    <div class="text-center">
                        <button type="reset" id="kt_modal_new_target_cancel" class="btn btn-light me-3" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" id="" class="btn btn-primary">
                            <span class="indicator-label">Submit</span>
                            <span class="indicator-progress">Please wait...
                            <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                        </button>
                    </div>

                    <!--end::Actions-->

                <!--end:Form-->
            </div>
        </form>

      </div>
  </div>

  </div>




  <div class="modal fade" id="delete{{ $ray->id }}" tabindex="-1" role="dialog"
       aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
          <div class="modal-content">
              <div class="modal-header">
                  <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                      id="exampleModalLabel">
                      {{ trans('My_Classes_trans.delete_class') }}
                  </h5>
                  <button type="button" class="close" data-dismiss="modal"
                          aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
              </div>
              <div class="modal-body">
                  <form action="{{ route('rays.destroy',$ray->id) }}"
                        method="post">
                      {{ method_field('DELETE') }}
                      @csrf
                      هل أنت متاكد من حذف
                      <h5 id="id" type="text" name="id" class="form-control"
                             value="{{ $ray->patient->patient_name }}">{{ $ray->patient->patient_name }}</h5>
                      <div class="modal-footer">

                      <div class="modal-footer">
                          <button type="button" class="btn btn-info"
                                  data-dismiss="modal">لا</button>
                          <button type="submit"
                                  class="btn btn-danger">نعم ,متأكد</button>
                      </div>
                  </form>
              </div>
          </div>
      </div>
  </div>
  @endforeach

</tbody>
</table>

</div></div>










<form action="{{ route('rays.store') }}" method="post">
    @csrf
    @method('POST')
<div class="modal fade" id="kt_modal_new_target" tabindex="-1" aria-hidden="true">
			<!--begin::Modal dialog-->
			<div class="modal-dialog modal-dialog-center mw-850px">
				<!--begin::Modal content-->
				<div class="modal-content rounded">
					<!--begin::Modal header-->
					<div class="modal-header pb-0 border-0 justify-content-end">
						<!--begin::Close-->
						<div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
							<!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
							<span class="svg-icon svg-icon-1">
								<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
									<rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="currentColor" />
									<rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="currentColor" />
								</svg>
							</span>
							<!--end::Svg Icon-->
						</div>
						<!--end::Close-->
					</div>
					<!--begin::Modal header-->
					<!--begin::Modal body-->
					<div class="modal-body scroll-y px-10 px-lg-15 pt-0 pb-15">
						<!--begin:Form-->
						<form id="kt_modal_new_target_form" class="form" action="#">
						  <!--begin::Heading-->
                          <div class="mb-13 text-center">
                            <!--begin::Title-->
                            <h1 class="mb-3">حجز موعد جديد</h1>
                            <!--end::Title-->
                            <!--begin::Description-->
                            <div class="text-muted fw-semibold fs-5">اذا لم يكن المريض مسجل فيمكنك تسجيله من
                            <a href="{{ route('Patient.index') }}" class="fw-bold link-primary">هنا</a>.</div>
                            <!--end::Description-->
                        </div>
                        <!--end::Heading-->
							<!--begin::Input group-->
                            <div class="row">
							<div class="col">
								<!--begin::Label-->
								<label class="d-flex align-items-center fs-6 fw-semibold mb-2">
									<span class="required">اسم المريض</span>
									<i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Specify a target name for future usage and reference"></i>
								</label>
								<!--end::Label-->
                                <select class="form-select form-select-solid" name="patient_id">
                                    @foreach ($Patient as $ray)
                                    <option value="{{ $ray->id }}">{{ $ray->patient_name }}</option>
                                    @endforeach
                                </select>
							</div>
							<!--end::Input group-->
							<!--begin::Input group-->
							<div class="col">

								<!--begin::Col-->
								<div class="col-md-6 fv-row">

									<label class="required fs-6 fw-semibold mb-2">اسم الجهاز</label>
									<!--begin::Input-->
									<div class="position-relative d-flex align-items-center">
										<!--begin::Icon-->
										<!--begin::Svg Icon | path: icons/duotune/general/gen014.svg-->
                                        <div class="col fv-row">
                                            <select class="form-select form-select-solid" data-control="select2" data-hide-search="true" data-placeholder="Select a Team Member" name="device_name">
                                                <option value="جهازالأشعة السينية x-ray machine">جهازالأشعة السينية x-ray machine </option>
                                                <option value="جهاز الأشعة المقطعية computed tomography">جهاز الأشعة المقطعية computed tomography</option>
                                                <option value="جهاز الرنين المغناطيسي M.R.I">جهاز الرنين المغناطيسي M.R.I</option>
                                                <option value="جهاز الغاما كاميرا">جهاز الغاما كاميرا</option>
                                                <option value="جهاز الموجات فوق الصوتية">جهاز الموجات فوق الصوتية</option>
                                                <option value="جهاز الكوبالت 60">جهاز الكوبالت 60</option>
                                            </select>
                                        </div>
										</span>
										<!--end::Svg Icon-->
										<!--end::Icon-->
										<!--begin::Datepicker-->

										<!--end::Datepicker-->
									</div>
									<!--end::Input-->
								</div>
								<!--end::Col-->
                                <!--begin::Col-->

								<!--end::Col-->
							</div>
							<!--end::Input group-->
							<!--begin::Input group-->

							<!--end::Input group-->

							<!--begin::Input group-->
                            <div class="col">
							<div class="col flex-stack mb-8">
								<!--begin::Label-->
								<div class="me-5">
									<label class="required fs-6 fw-semibold">موعد الزيارة</label><br>
								</div>
								<!--end::Label-->
								<!--begin::Switch-->
                                <input type="date" class="form-control form-control-solid" name="booking_date">
								<!--end::Switch-->
							</div>


                            </div>
							<!--begin::Actions-->
							<div class="text-center">
								<button type="reset" id="kt_modal_new_target_cancel" class="btn btn-light me-3" data-bs-dismiss="modal">Cancel</button>
								<button type="submit" id="" class="btn btn-primary">
									<span class="indicator-label">Submit</span>
									<span class="indicator-progress">Please wait...
									<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
								</button>
							</div>

							<!--end::Actions-->
						</form>
						<!--end:Form-->
					</div>
					<!--end::Modal body-->
				</div>
				<!--end::Modal content-->
			</div>
			<!--end::Modal dialog-->
		</div>
    </form>





@endsection
@section('js')

@endsection
<script type="text/javascript">
    $(function() {
        $("#btn_delete_all").click(function() {
            var selected = new Array();
            $("#datatable input[type=checkbox]:checked").each(function() {
                selected.push(this.value);
            });

            if (selected.length > 0) {
                $('#delete_all').modal('show')
                $('input[id="delete_all_id"]').val(selected);
            }
        });
    });

</script>
<script>
    $("form").on("change", ".file-upload-field", function () {
  $(this)
    .parent(".file-upload-wrapper")
    .attr(
      "data-text",
      $(this)
        .val()
        .replace(/.*(\/|\\)/, "")
    );
});

</script>
