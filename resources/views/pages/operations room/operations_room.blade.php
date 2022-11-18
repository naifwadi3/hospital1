@extends('layout.dashboard')
@section('css')

@section('tit')
Operations Room
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


@can('حجز موعد عمليه')
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#kt_modal_new_target">
        حجز موعد عملية جديدة <i class="bi bi-plus"></i>
    </button>
@endcan

<div class="table-responsive">
    <table id="kt_datatable_dom_positioning" class="table table-striped table-row-bordered gy-5 gs-7 border rounded">
		<thead>
            <tr class="fw-bold fs-6 text-gray-800 px-7">
				<th><input name="select_all" id="example-select-all" type="checkbox" onclick="CheckAll('box1', this)" /></th>
				<th scope="col">#</th>
                <th scope="col">اسم المريض</th>
                <th scope="col">رقم هاتف المريض</th>
                <th scope="col">حالة الغرفة</th>
                <th scope="col">نوع العملية</th>
                <th scope="col">تكلفة العملية</th>
                <th scope="col">procesor</th>
		</thead>
		<tbody>

@php
	$i=0;
@endphp
				<tr>
					<?php $i++; ?>
					<td><input type="checkbox"  value="" class="box1" ></td>
					<td>{{ $i }}</td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>

					<td></td>

					<td>
                        @can('تعديل عمليه')
						<button type="button" class="btn btn-info btn-sm" data-bs-toggle="modal"
							data-bs-target="#edit"
							title="{{ trans('Grades_trans.Edit') }}"><i class="fa fa-edit"></i></button>
                            @endcan

                            @can('حذف عمليه')
						<button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal"
							data-bs-target="#delete"
							title="{{ trans('Grades_trans.Delete') }}"><i
								class="fa fa-trash"></i></button>
                                @endcan

                                @can('عرض عمليه')
                                <button type="button" class="btn btn-danger btn-xl" data-bs-toggle="modal"
							data-bs-target="#show"
							title="عرض"><i class="fa-solid fa-eye"></i></button>
                            @endcan
					</td>
				</tr>

				<!-- edit_modal_Grade -->
				<div class="modal fade" id="edit" tabindex="-1" role="dialog"
					 aria-labelledby="exampleModalLabel" aria-hidden="true">
					<div class="modal-dialog" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
									id="exampleModalLabel">
									{{ trans('My_Classes_trans.edit_class') }}
								</h5>
								<button type="button" class="close" data-dismiss="modal"
										aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<div class="modal-body">
								<!-- edit_form -->
								<form action="" method="post">
									{{ method_field('POST') }}
									@csrf
									<div class="row">
										<div class="col">
											<label for="Name"
												   class="mr-sm-2">{{ trans('My_Classes_trans.Name_class') }}
												:</label>
											<input id="Name" type="text" name="Name_class"
												   class="form-control"
												   value=""
												   required>
											<input id="id" type="hidden" name="id" class="form-control"
												   value="">
										</div>
										<div class="col">
											<label for="Name_en"
												   class="mr-sm-2">{{ trans('My_Classes_trans.Name_class_en') }}
												:</label>
											<input type="text" class="form-control"
												   value=""
												   name="Name_class_en" required>
										</div>
									</div><br>
									<div class="form-group">
										<label
											for="exampleFormControlTextarea1">{{ trans('My_Classes_trans.Name_Grade') }}
											:</label>
										<select class="form-control form-control-lg"
												id="exampleFormControlSelect1" name="Grade_id">
											<option value="">

											</option>

										</select>

									</div>
									<br><br>

									<div class="modal-footer">
										<button type="button" class="btn btn-secondary"
												data-dismiss="modal">{{ trans('Grades_trans.Close') }}</button>
										<button type="submit"
												class="btn btn-success">{{ trans('Grades_trans.submit') }}</button>
									</div>
								</form>

							</div>
						</div>
					</div>
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

	</table>
</div>














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
                            <h1 class="mb-3">إضافة غرفة جديدة</h1>
                            <!--end::Title-->
                            <!--begin::Description-->
                            <div class="text-muted fw-semibold fs-5">اذا لم يكن هنالك قسم يمكنك اضافة القسم من
                            <a href="#" class="fw-bold link-primary">هنا</a>.</div>
                            <!--end::Description-->
                        </div>
                        <!--end::Heading-->
							<!--begin::Input group-->
							<div class="d-flex flex-column mb-8 fv-row">
								<!--begin::Label-->
								<label class="d-flex align-items-center fs-6 fw-semibold mb-2">
									<span class="required">اسم الغرفة</span>
									<i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Specify a target name for future usage and reference"></i>
								</label>
								<!--end::Label-->
								<input type="text" class="form-control form-control-solid" placeholder="Enter Target Title" name="target_title" />
							</div>
							<!--end::Input group-->
							<!--begin::Input group-->
							<div class="row g-9 mb-8">

								<!--begin::Col-->
								<div class="col-md-6 fv-row">
									<label class="required fs-6 fw-semibold mb-2">رقم الغرفة</label>
									<!--begin::Input-->
									<div class="position-relative d-flex align-items-center">
										<!--begin::Icon-->
										<!--begin::Svg Icon | path: icons/duotune/general/gen014.svg-->

										</span>
										<!--end::Svg Icon-->
										<!--end::Icon-->
										<!--begin::Datepicker-->
                                        <input type="text" class="form-control form-control-solid" placeholder="Enter Target Title" name="target_title" />
										<!--end::Datepicker-->
									</div>
									<!--end::Input-->
								</div>
								<!--end::Col-->
                                <!--begin::Col-->
								<div class="col-md-6 fv-row">
									<label class="required fs-6 fw-semibold mb-2">اسم القسم</label>
									<select class="form-select form-select-solid" data-control="select2" data-hide-search="true" data-placeholder="Select a Team Member" name="target_assign">
										<option value="">Select user...</option>
										<option value="1">Karina Clark</option>
										<option value="2">Robert Doe</option>
										<option value="3">Niel Owen</option>
										<option value="4">Olivia Wild</option>
										<option value="5">Sean Bean</option>
									</select>
								</div>
								<!--end::Col-->
							</div>
							<!--end::Input group-->
							<!--begin::Input group-->

							<!--end::Input group-->

							<!--begin::Input group-->
							<div class="d-flex flex-stack mb-8">
								<!--begin::Label-->
								<div class="me-5">
									<label class="fs-6 fw-semibold">هل الغرفة محجوزة ام لا</label>
									<div class="fs-7 fw-semibold text-muted">اذا كنت تريد حجز الغرفة قم بالاختيار</div>
								</div>
								<!--end::Label-->
								<!--begin::Switch-->
								<label class="form-check form-switch form-check-custom form-check-solid">
									<input class="form-check-input" type="checkbox" value="1" checked="checked" />
									<span class="form-check-label fw-semibold text-muted">محجوزة 	</span>
								</label>
								<!--end::Switch-->
							</div>
							<!--end::Input group-->
							<!--begin::Input group-->
							<div class="mb-15 fv-row">
								<!--begin::Wrapper-->
								<div class="d-flex flex-stack">
									<!--begin::Label-->
									<div class="fw-semibold me-5">
										<label class="fs-6">هل الغرفة خاصة</label>
										<div class="fs-7 text-muted">اختر اذا كانت الغرفة خاصة او عامة</div>
									</div>
									<!--end::Label-->
									<!--begin::Checkboxes-->
									<div class="d-flex align-items-center">
										<!--begin::Checkbox-->
										<label class="form-check form-check-custom form-check-solid me-10">
											<input class="form-check-input h-20px w-20px" type="checkbox" name="communication[]" value="email" checked="checked" />
											<span class="form-check-label fw-semibold">خاصة</span>
										</label>
										<!--end::Checkbox-->
										<!--begin::Checkbox-->
										<label class="form-check form-check-custom form-check-solid">
											<input class="form-check-input h-20px w-20px" type="checkbox" name="communication[]" value="phone" />
											<span class="form-check-label fw-semibold">عامه</span>
										</label>
										<!--end::Checkbox-->
									</div>
									<!--end::Checkboxes-->
								</div>
								<!--end::Wrapper-->
							</div>
							<!--end::Input group-->
                            <div class="d-flex flex-column mb-8">
								<label class="fs-6 fw-semibold mb-2">اضافة ملاحظات</label>
								<textarea class="form-control form-control-solid" rows="3" name="target_details" placeholder="Type Target Details"></textarea>
							</div>
							<!--begin::Actions-->
							<div class="text-center">
								<button type="reset" id="kt_modal_new_target_cancel" class="btn btn-light me-3">Cancel</button>
								<button type="submit" id="kt_modal_new_target_submit" class="btn btn-primary">
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
