@extends('layout.dashboard')
@section('css')

@section('tit')
قائمة المرضى
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


@can('اضافة مريض جديد')
<div>
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#kt_modal_new_target">
        اضافة مريض جديد <i class="bi bi-plus"></i>
    </button>
</div>
@endcan

<div class="table-responsive">
    <table id="kt_datatable_dom_positioning" class="table table-striped table-row-bordered gy-5 gs-7 border rounded">
		<thead>
            <tr class="fw-bold fs-6 text-gray-800 px-7">
				<th><input name="select_all" id="example-select-all" type="checkbox" onclick="CheckAll('box1', this)" /></th>
				<th scope="col">#</th>
                <th scope="col">اسم المريض</th>
                <th scope="col">رقم هاتف المريض</th>
                <th scope="col">جنس المريض</th>
                <th scope="col">المواد المتحسسة</th>
                <th scope="col">ملاحظة</th>
                <th scope="col">العمليات</th>
		</thead>
		<tbody>

@php
	$i=0;
@endphp
@foreach ($Patient as $Patient)

				<tr>
					<?php $i++; ?>

					<td><input type="checkbox"  value="" class="box1" ></td>
					<td>{{ $i }}</td>
					<td>{{ $Patient->patient_name }}</td>
					<td>{{ $Patient->patient_phone }}</td>
					<td>{{ $Patient->patient_gender }}</td>
					<td>{{ $Patient->patient_allergy }}</td>
					<td>{{ $Patient->reason_for_visit }}</td>
					<td>
                        @can('تعديل مريض')
						<button type="button" class="btn btn-info btn-xl" data-bs-toggle="modal"
							data-bs-target="#edit{{ $Patient->id }}"
							title="edit"><i class="fa fa-edit"></i></button>
                            @endcan

                            @can('حذف مريض')
						<button type="button" class="btn btn-danger btn-xl" data-bs-toggle="modal"
							data-bs-target="#delete{{ $Patient->id }}"
							title="delete"><i
								class="fa fa-trash"></i></button>
                                @endcan

                                @can('عرض مريض')
                                <button type="button" class="btn btn-danger btn-xl" data-bs-toggle="modal"
							data-bs-target="#show"
							title="show"><i class="fa-solid fa-eye"></i></button>
                            @endcan

					</td>

				</tr>

				<!-- edit_modal_Grade -->

                         <div class="modal fade" id="edit{{ $Patient->id }}" tabindex="-1" aria-hidden="true">
                            <!--begin::Modal dialog-->
                            <div class="modal-dialog modal-dialog-centered mw-700px">
                                <!--begin::Modal content-->
                                <div class="modal-content rounded">
                                    <form action="{{ route('Patient.update',$Patient->id) }}" method="post">
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
                                        <form id="kt_modal_new_target_form" class="form" action="#">
                                          <!--begin::Heading-->
                                          <div class="mb-13 text-center">
                                            <!--begin::Title-->
                                            <h1 class="mb-3">اضافة مريض جديد</h1>
                                            <!--end::Title-->
                                            <!--begin::Description-->
                                            <div class="text-muted fw-semibold fs-5">اذا لم يكن التخصص موجود فيمكنك اضافته من
                                            <a href="#" class="fw-bold link-primary">هنا</a>.</div>
                                            <!--end::Description-->
                                        </div>
                                        <!--end::Heading-->
                                            <!--begin::Input group-->
                                            <div class="d-flex flex-column mb-8 fv-row">
                                                <!--begin::Label-->
                                                <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                                                    <span class="required">اسم المريض</span>
                                                    <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Specify a target name for future usage and reference"></i>
                                                </label>
                                                <!--end::Label-->
                                                <input type="text" class="form-control form-control-solid" placeholder="Enter Target Title" name="patient_name" value="{{ $Patient->patient_name }}"/>
                                            </div>
                                            <!--end::Input group-->
                                            <!--begin::Input group-->
                                            <div class="row g-9 mb-8">

                                                <!--begin::Col-->
                                                <div class="col-md-6 fv-row">

                                                    <label class="required fs-6 fw-semibold mb-2">رقم هوية المريض</label>
                                                    <!--begin::Input-->
                                                    <div class="position-relative d-flex align-items-center">
                                                        <!--begin::Icon-->
                                                        <!--begin::Svg Icon | path: icons/duotune/general/gen014.svg-->

                                                        </span>
                                                        <!--end::Svg Icon-->
                                                        <!--end::Icon-->
                                                        <!--begin::Datepicker-->

                                                        <input type="text" class="form-control form-control-solid" placeholder="Enter Target Title" name="patient_id" value="{{ $Patient->patient_id }}"/>
                                                        <!--end::Datepicker-->
                                                    </div>
                                                    <!--end::Input-->
                                                </div>
                                                <!--end::Col-->
                                                <!--begin::Col-->
                                                <div class="col-md-6 fv-row">
                                                    <label class="required fs-6 fw-semibold mb-2">رقم هاتف المريض</label>
                                                    <input type="text" class="form-control form-control-solid" placeholder="Enter Target Title" name="patient_phone" value="{{ $Patient->patient_phone }}"/>
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
                                                    <label class="required fs-6 fw-semibold">فصيلة دم المريض</label><br>
                                                </div>
                                                <!--end::Label-->
                                                <!--begin::Switch-->
                                                <select class="form-select form-select-solid" name="patient_blood_type" value="{{ $Patient->patient_blood_type }}">
                                                    <option value="A+">A+</option>
                                                    <option value="A*">A-</option>
                                                    <option value="B+">B+</option>
                                                    <option value="B-">B-</option>
                                                    <option value="AB+">AB+</option>
                                                    <option value="AB-">AB-</option>
                                                    <option value="O+">O+</option>
                                                    <option value="O-">O-</option>
                                                </select>
                                                <!--end::Switch-->
                                            </div>
                                            <div class="col flex-stack mb-8">
                                                <!--begin::Label-->
                                                <div class="me-5">
                                                    <label class="required fs-6 fw-semibold">ديانة المريض</label><br>
                                                </div>
                                                <!--end::Label-->
                                                <!--begin::Switch-->
                                                <input type="text" class="form-control form-control-solid" name="patient_religion" value="{{ $Patient->patient_religion }}">
                                                <!--end::Switch-->
                                            </div>
                                        </div>
                                            <!--end::Input group-->
                                            <!--begin::Input group-->
                                            <div class="row">
                                                <div class="col flex-stack mb-8">
                                                    <!--begin::Label-->
                                                    <div class="me-5">
                                                        <label class="required fs-6 fw-semibold">جنس المريض</label><br>
                                                    </div>
                                                    <!--end::Label-->
                                                    <!--begin::Switch-->
                                                    <select class="form-select form-select-solid" name="patient_gender" value="{{ $Patient->patient_gender }}">
                                                        <option>ذكر</option>
                                                        <option>انثى</option>
                                                    </select>
                                                    <!--end::Switch-->
                                                </div>
                                                <div class="col flex-stack mb-8">
                                                    <!--begin::Label-->
                                                    <div class="me-5">
                                                        <label class="required fs-6 fw-semibold">المواد المتحسسة</label><br>
                                                    </div>
                                                    <!--end::Label-->
                                                    <!--begin::Switch-->
                                                    <select class="form-select form-select-solid" name="patient_allergy" value="{{ $Patient->patient_allergy }}">
                                                        <option value="غاز">غاز</option>
                                                        <option value="هواء">هواء</option>
                                                    </select>
                                                    <!--end::Switch-->
                                                </div>

                                            </div>
                                            <div class="row">
                                                <div class="col flex-stack mb-8">
                                                    <!--begin::Label-->
                                                    <div class="me-5">
                                                        <label class="required fs-6 fw-semibold">تاريخ ميلاد المريض</label><br>
                                                    </div>
                                                    <!--end::Label-->
                                                    <!--begin::Switch-->
                                                    <input type="date" class="form-control form-control-solid" name="patient_birthday" value="{{ $Patient->patient_birthday }}">
                                                    <!--end::Switch-->
                                                </div>
                                                <div class="col flex-stack mb-8">
                                                    <!--begin::Label-->
                                                    <div class="me-5">

                                                        <label class="required fs-6 fw-semibold">وقت وصول المريض</label><br>
                                                    </div>
                                                    <!--end::Label-->
                                                    <!--begin::Switch-->
                                                    <input type="date" class="form-control form-control-solid" name="patient_arrival_time" value="{{ $Patient->patient_arrival_time }}">

                                                    <!--end::Switch-->
                                                </div>

                                            </div>
                                            <!--end::Input group-->
                                            <div class="d-flex flex-column mb-8">
                                                <label class="fs-6 fw-semibold mb-2">سبب زيارة قسم الاستقبال و الطوارئ</label>
                                                <textarea class="form-control form-control-solid" rows="3" name="reason_for_visit" placeholder="Type Target Details">{{ $Patient->reason_for_visit }}</textarea>
                                            </div>

                                            <!--begin::Actions-->
                                            <div class="text-center">
                                                <button type="reset" id="kt_modal_new_target_cancel" class="btn btn-light me-3">Cancel</button>
                                                <button type="submit" id="" class="btn btn-primary">
                                                    <span class="">Submit</span>
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



				<!-- delete_modal_Grade -->
				<div class="modal fade" id="delete{{ $Patient->id }}" tabindex="-1" role="dialog"
					 aria-labelledby="exampleModalLabel" aria-hidden="true">
					<div class="modal-dialog" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
									id="exampleModalLabel">
									هل تريد حذف المريض ؟
								</h5>
								<button type="button" class="close" data-dismiss="modal"
										aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<div class="modal-body">
								<form action="{{ route('Patient.destroy',$Patient->id) }}"
									  method="post">
									{{ method_field('DELETE') }}
									@csrf
									هل تريد حذف المريض :
									<input id="id" type="text" name="id" class="form-control"
										   value="{{ $Patient->patient_name }}">
									<div class="modal-footer">
										<button type="button" class="btn btn-secondary"
												data-dismiss="modal">لا</button>
										<button type="submit"
												class="btn btn-danger">نعم , تأكيد</button>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
                @endforeach

	</table>
</div>












<!--add-->
<form action="{{ route('Patient.store') }}" method="post">
    @csrf
    @method('POST')
         <div class="modal fade" id="kt_modal_new_target" tabindex="-1" aria-hidden="true">
			<!--begin::Modal dialog-->
			<div class="modal-dialog modal-dialog-centered mw-700px">
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
                            <h1 class="mb-3">اضافة مريض جديد</h1>
                            <!--end::Title-->
                            <!--begin::Description-->
                            <div class="text-muted fw-semibold fs-5">اذا لم يكن التخصص موجود فيمكنك اضافته من
                            <a href="#" class="fw-bold link-primary">هنا</a>.</div>
                            <!--end::Description-->
                        </div>
                        <!--end::Heading-->
							<!--begin::Input group-->
							<div class="d-flex flex-column mb-8 fv-row">
								<!--begin::Label-->
								<label class="d-flex align-items-center fs-6 fw-semibold mb-2">
									<span class="required">اسم المريض</span>
									<i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Specify a target name for future usage and reference"></i>
								</label>
								<!--end::Label-->
								<input type="text" class="form-control form-control-solid" placeholder="Enter Target Title" name="patient_name" />
							</div>
							<!--end::Input group-->
							<!--begin::Input group-->
							<div class="row g-9 mb-8">

								<!--begin::Col-->
								<div class="col-md-6 fv-row">

									<label class="required fs-6 fw-semibold mb-2">رقم هوية المريض</label>
									<!--begin::Input-->
									<div class="position-relative d-flex align-items-center">
										<!--begin::Icon-->
										<!--begin::Svg Icon | path: icons/duotune/general/gen014.svg-->

										</span>
										<!--end::Svg Icon-->
										<!--end::Icon-->
										<!--begin::Datepicker-->

                                        <input type="text" class="form-control form-control-solid" placeholder="Enter Target Title" name="patient_id" />
										<!--end::Datepicker-->
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
									<label class="required fs-6 fw-semibold">فصيلة دم المريض</label><br>
								</div>
								<!--end::Label-->
								<!--begin::Switch-->
                                <select class="form-select form-select-solid" name="patient_blood_type">
                                    <option value="A+">A+</option>
                                    <option value="A*">A-</option>
                                    <option value="B+">B+</option>
                                    <option value="B-">B-</option>
                                    <option value="AB+">AB+</option>
                                    <option value="AB-">AB-</option>
                                    <option value="O+">O+</option>
                                    <option value="O-">O-</option>
                                </select>
                            	<!--end::Switch-->
							</div>
                            <div class="col flex-stack mb-8">
								<!--begin::Label-->
								<div class="me-5">
									<label class="required fs-6 fw-semibold">ديانة المريض</label><br>
								</div>
								<!--end::Label-->
								<!--begin::Switch-->
								<input type="text" class="form-control form-control-solid" name="patient_religion">
								<!--end::Switch-->
							</div>
                        </div>
							<!--end::Input group-->
							<!--begin::Input group-->
                            <div class="row">
                                <div class="col flex-stack mb-8">
                                    <!--begin::Label-->
                                    <div class="me-5">
                                        <label class="required fs-6 fw-semibold">جنس المريض</label><br>
                                    </div>
                                    <!--end::Label-->
                                    <!--begin::Switch-->
                                    <select class="form-select form-select-solid" name="patient_gender">
                                        <option>ذكر</option>
                                        <option>انثى</option>
                                    </select>
                                    <!--end::Switch-->
                                </div>
                                <div class="col flex-stack mb-8">
                                    <!--begin::Label-->
                                    <div class="me-5">
                                        <label class="required fs-6 fw-semibold">المواد المتحسسة</label><br>
                                    </div>
                                    <!--end::Label-->
                                    <!--begin::Switch-->
                                    <select class="form-select form-select-solid" name="patient_allergy">
                                        <option value="غاز">غاز</option>
                                        <option value="هواء">هواء</option>
                                    </select>
                                    <!--end::Switch-->
                                </div>

                            </div>
                            <div class="row">
                                <div class="col flex-stack mb-8">
                                    <!--begin::Label-->
                                    <div class="me-5">
                                        <label class="required fs-6 fw-semibold">تاريخ ميلاد المريض</label><br>
                                    </div>
                                    <!--end::Label-->
                                    <!--begin::Switch-->
                                    <input type="date" class="form-control form-control-solid" name="patient_birthday">
                                    <!--end::Switch-->
                                </div>
                                <div class="col flex-stack mb-8">
                                    <!--begin::Label-->
                                    <div class="me-5">

                                        <label class="required fs-6 fw-semibold">وقت وصول المريض</label><br>
                                    </div>
                                    <!--end::Label-->
                                    <!--begin::Switch-->
                                    <input type="date" class="form-control form-control-solid" name="patient_arrival_time">

                                    <!--end::Switch-->
                                </div>

                            </div>
							<!--end::Input group-->
                            <div class="d-flex flex-column mb-8">
								<label class="fs-6 fw-semibold mb-2">سبب زيارة قسم الاستقبال و الطوارئ</label>
								<textarea class="form-control form-control-solid" rows="3" name="reason_for_visit" placeholder="Type Target Details"></textarea>
							</div>

							<!--begin::Actions-->
							<div class="text-center">
								<button type="reset" id="kt_modal_new_target_cancel" class="btn btn-light me-3">Cancel</button>
								<button type="submit" id="" class="btn btn-primary">
									<span class="">Submit</span>
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
