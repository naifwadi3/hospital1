@extends('layout.dashboard')
@section('css')

@section('tit')
حجز موعد مع الطبيب
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

@can('حجز موعد مع طبيب')
<div>
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#kt_modal_new_target">
        حجز موعد مع الطبيب <i class="bi bi-plus"></i>
    </button>
</div>
@endcan
<div style="padding: 1cm">
<div class="table-responsive">
    <table id="kt_datatable_dom_positioning" class="table table-striped table-row-bordered gy-5 gs-7 border rounded">
		<thead>
            <tr class="fw-bold fs-6 text-gray-800 px-7">
				<th><input name="select_all" id="example-select-all" type="checkbox" onclick="CheckAll('box1', this)" /></th>
				<th scope="col">#</th>
                <th scope="col">اسم الطبيب</th>
                <th scope="col">اسم المريض</th>
                <th scope="col"> رقم هاتف المريض</th>
                <th scope="col">تاريخ الزيارة</th>
                <th scope="col">procesor</th>
		</thead>
		<tbody>

@php
	$i=0;
@endphp

             @foreach ($date as $date )
				<tr>
					<?php $i++; ?>
					<td><input type="checkbox"  value="" class="box1" ></td>
					<td>{{ $i }}</td>
					<td>{{ $date->doctors->name }}</td>
					<td>{{ $date->Patients->patient_name }}</td>
					<td>{{ $date->Patients->patient_phone }}</td>
					<td>{{ $date->visit_date }}</td>
					<td>
                        @can('تعديل حجز موعد مع طبيب')
						<button type="button" class="btn btn-info btn-xl" data-bs-toggle="modal"
							data-target="#edit{{ $date->id }}"
							title="edit"><i class="fa fa-edit"></i></button>
                            @endcan

                        @can('حذف حجز موعد مع طبيب')
						<button type="button" class="btn btn-danger btn-xl" data-bs-toggle="modal"
							data-target="#delete"
							title="delete"><i
								class="fa fa-trash"></i></button>
                                @endcan

                                @can('عرض حجز موعد مع طبيب')
                                <button type="button" class="btn btn-danger btn-xl" data-bs-toggle="modal"
							data-target="#show"
							title="show"><i class="fa-solid fa-eye"></i></button>
                            @endcan

					</td>
				</tr>

				<!-- edit_modal_Grade -->

                <div class="modal fade" id="edit{{ $date->id }}" tabindex="-1" aria-hidden="true">
                            <!--begin::Modal dialog-->
                            <div class="modal-dialog modal-dialog-centered mw-650px">
                                <!--begin::Modal content-->
                                <div class="modal-content rounded">
                                    <form action="{{ route('date.update',$date->id) }}" method="post">
                                        @csrf
                                        @method('PUT')
                                    <!--begin::Modal header-->
                                    <div class="modal-header pb-0 border-0 justify-content-end">
                                        <!--begin::Close-->
                                        <div class="btn btn-sm btn-icon btn-active-color-primary" data-dismiss="modal">
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
                                            <div class="col-md-6 fv-row">
                                                <label class="required fs-6 fw-semibold mb-2">اسم الطبيب</label>
                                                <select class="form-select form-select-solid"  name="doctor_id">
                                                    @foreach ($doctor as $doctors)
                                                    <option value="{{ $doctors->id }}" value="{{ $date->doctor_id }}">{{ $doctors->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <!--end::Input group-->
                                            <!--begin::Input group-->
                                            <div class="row g-9 mb-8">

                                                <!--begin::Col-->
                                                <div class="col-md-6 fv-row">

                                                    <div class="col">
                                                    <label class="required fs-6 fw-semibold mb-2">اسم المريض</label>
                                                    <select class="form-select form-select-solid" data-control="select2" data-hide-search="true" data-placeholder="Select a Team Member" name="patient_id" value="{{ $date->patient_id }}">
                                                        @foreach ($Patient as $Patients)
                                                        <option value="{{ $Patients->id }}" value="{{ $date->patient_id }}">{{ $Patients->patient_name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                    <!--end::Input-->
                                                </div>
                                                <!--end::Col-->
                                                <!--begin::Col-->
                                                <div class="col-md-6 fv-row">
                                                    <label class="required fs-6 fw-semibold mb-2">رقم هاتف المريض</label>
                                                    <input type="text" class="form-control form-control-solid" placeholder="Enter Target Title" name="patient_phone" value="{{ $date->patient_phone }}" />
                                                </div>
                                                <!--end::Col-->
                                            </div>
                                            <!--end::Input group-->
                                            <!--begin::Input group-->

                                            <!--end::Input group-->

                                            <!--begin::Input group-->
                                            <div class="row">
                                            <div class="col flex-stack mb-8">
                                                <!--begin::Label-->
                                                <div class="me-5">
                                                    <label class="required fs-6 fw-semibold">موعد الزيارة</label><br>
                                                </div>
                                                <!--end::Label-->
                                                <!--begin::Switch-->
                                                <input type="date" class="form-control form-control-solid" name="visit_date" value="{{ $date->visit_date }}">
                                                <!--end::Switch-->
                                            </div>


                                            </div>
                                            <!--begin::Actions-->
                                            <div class="text-center">
                                                <button type="reset"  class="btn btn-light me-3" data-dismiss="modal">Cancel</button>
                                                <button type="submit" class="btn btn-primary">
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

                    </form>
                </div>
                <!--end::Modal content-->
            </div>
            <!--end::Modal dialog-->
        </div>

				<!-- delete_modal_Grade -->
				<div class="modal fade" id="delete" tabindex="-1" role="dialog"
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
								<form action=""
									  method="post">
									{{ method_field('POST') }}
									@csrf
									{{ trans('My_Classes_trans.Warning_Grade') }}
									<input id="id" type="hidden" name="id" class="form-control"
										   value="">
									<div class="modal-footer">
										<button type="button" class="btn btn-secondary"
												data-dismiss="modal">{{ trans('My_Classes_trans.Close') }}</button>
										<button type="submit"
												class="btn btn-danger">{{ trans('My_Classes_trans.submit') }}</button>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
                @endforeach

	</table>
</div>

</div>










<form action="{{ route('date.store') }}" method="post">
    @csrf
    @method('POST')
<div class="modal fade" id="kt_modal_new_target" tabindex="-1" aria-hidden="true">
			<!--begin::Modal dialog-->
			<div class="modal-dialog modal-dialog-centered mw-650px">
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
							<div class="col-md-6 fv-row">
                                <label class="required fs-6 fw-semibold mb-2">اسم الطبيب</label>
                                <select class="form-select form-select-solid" data-control="select2" data-hide-search="true" data-placeholder="Select a Team Member" name="doctor_id">
                                    @foreach ($doctor as $doctor)
                                    <option value="{{ $doctor->id }}">{{ $doctor->name }}</option>
                                    @endforeach
                                </select>
                            </div>
							<!--end::Input group-->
							<!--begin::Input group-->
							<div class="row g-9 mb-8">

								<!--begin::Col-->
								<div class="col-md-6 fv-row">

									<div class="col">
									<label class="required fs-6 fw-semibold mb-2">اسم المريض</label>
                                    <select class="form-select form-select-solid" data-control="select2" data-hide-search="true" data-placeholder="Select a Team Member" name="patient_id">
                                        @foreach ($Patient as $Patients)
                                        <option value="{{ $Patients->id }}">{{ $Patients->patient_name }}</option>
                                        @endforeach
                                    </select>
								</div>
									<!--end::Input-->
								</div>
								<!--end::Col-->
                                <!--begin::Col-->
								<div class="col-md-6 fv-row">
									<label class="required fs-6 fw-semibold mb-2">رقم هاتف المريض</label>
                                    <input type="text" class="form-control form-control-solid" placeholder="Enter Target Title" name="patient_phone" />
								</div>
								<!--end::Col-->
							</div>
							<!--end::Input group-->
							<!--begin::Input group-->

							<!--end::Input group-->

							<!--begin::Input group-->
                            <div class="row">
							<div class="col flex-stack mb-8">
								<!--begin::Label-->
								<div class="me-5">
									<label class="required fs-6 fw-semibold">موعد الزيارة</label><br>
								</div>
								<!--end::Label-->
								<!--begin::Switch-->
                                <input type="date" class="form-control form-control-solid" name="visit_date">
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
