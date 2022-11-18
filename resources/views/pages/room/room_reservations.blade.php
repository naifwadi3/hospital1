@extends('layout.dashboard')
@section('css')

@section('tit')
حجز غرفة
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




    @can('حجز غرفة جديدة')
    <div>
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#kt_modal_new_target">
        حجز غرفة جديدة <i class="bi bi-plus"></i>
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
                <th scope="col">رقم الغرفة</th>
                <th scope="col">تاريخ الحجز</th>
                <th scope="col">تاريخ انتهاء الحجز</th>
                <th scope="col">سعر الغرفة</th>
                <th scope="col">العمليات</th>
		</thead>
		<tbody>

@php
	$i=0;
@endphp
@foreach ($reservations as $reservations)

				<tr>
					<?php $i++; ?>

					<td><input type="checkbox"  value="" class="box1" ></td>
					<td>{{ $i }}</td>
					<td>{{ $reservations->Patient_id }}</td>
					<td>{{ $reservations->room_id }}</td>
					<td>{{ $reservations->booking_date }}</td>
					<td>{{ $reservations->Exit_date }}</td>

					<td>{{ $reservations->did_pay }}</td>

					<td>
                        @can('تعديل حجز غرفة جديدة')
						<button type="button" class="btn btn-info btn-sm" data-bs-toggle="modal"
							data-bs-target="#edit{{ $reservations->id }}"
							title="{{ trans('Grades_trans.Edit') }}"><i class="fa fa-edit"></i>
                        </button>
                            @endcan

                            @can('حذف حجز غرفة جديدة')
						<button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal"
							data-bs-target="#delete{{ $reservations->id }}"
							title="{{ trans('Grades_trans.Delete') }}"><i
								class="fa fa-trash"></i></button>
                                @endcan

					</td>

				</tr>


				<!-- edit_modal_Grade -->

                <div class="modal fade" tabindex="-1" id="edit{{ $reservations->id }}">
                    <!--begin::Modal dialog-->
                    <div class="modal-dialog modal-dialog-centered mw-700px">
                        <!--begin::Modal content-->
                        <div class="modal-content rounded">
                            <form action="{{ route('room_reservations.update',$reservations->id) }}" method="post">
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
                                    <h1 class="mb-3">حجز غرفة جديدة</h1>
                                    <!--end::Title-->
                                    <!--begin::Description-->
                                    <div class="text-muted fw-semibold fs-5">اذا لم يكن المريض مسجيل فيمكنك تسجيله من
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
                                        <input type="text" class="form-control form-control-solid" placeholder="Enter Target Title" name="Patient_id" value="{{ $reservations->Patient_id }}"/>
                                    </div>
                                    <!--end::Input group-->
                                    <!--begin::Input group-->
                                    <div class="row g-9 mb-8">

                                        <!--begin::Col-->
                                        <div class="col-md-6 fv-row">

                                            <label class="required fs-6 fw-semibold mb-2">اسم الغرفة</label>
                                            <!--begin::Input-->
                                            <div class="position-relative d-flex align-items-center">
                                                <!--begin::Icon-->
                                                <!--begin::Svg Icon | path: icons/duotune/general/gen014.svg-->

                                                </span>
                                                <!--end::Svg Icon-->
                                                <!--end::Icon-->
                                                <!--begin::Datepicker-->

                                                <input type="text" class="form-control form-control-solid" placeholder="Enter Target Title" name="room_id" value="{{ $reservations->room_id }}"/>
                                                <!--end::Datepicker-->
                                            </div>
                                            <!--end::Input-->
                                        </div>
                                        <!--end::Col-->
                                        <!--begin::Col-->
                                        <div class="col-md-6 fv-row">
                                            <label class="required fs-6 fw-semibold mb-2">رقم الغرفة</label>
                                            <select class="form-select form-select-solid" data-control="select2" data-hide-search="true" data-placeholder="Select a Team Member"  >
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
                                    <div class="row">
                                    <div class="col flex-stack mb-8">
                                        <!--begin::Label-->
                                        <div class="me-5">
                                            <label class="required fs-6 fw-semibold">تاريخ الحجز</label><br>
                                        </div>
                                        <!--end::Label-->
                                        <!--begin::Switch-->
                                        <input type="date" class="form-control form-control-solid" name="booking_date" value="{{ $reservations->booking_date }}">
                                        <!--end::Switch-->
                                    </div>
                                    <div class="col flex-stack mb-8">
                                        <!--begin::Label-->
                                        <div class="me-5">
                                            <label class="required fs-6 fw-semibold">تاريخ انتهاء الحجز</label><br>
                                        </div>
                                        <!--end::Label-->
                                        <!--begin::Switch-->
                                        <input type="date" class="form-control form-control-solid" name="Exit_date" value="{{ $reservations->Exit_date }}">
                                        <!--end::Switch-->
                                    </div>
                                </div>
                                    <!--end::Input group-->
                                    <!--begin::Input group-->
                                    <div class="row">
                                        <div class="col flex-stack mb-8">
                                            <!--begin::Label-->
                                            <div class="me-5">
                                                <label class="required fs-6 fw-semibold">هل قام بالدفع</label><br>
                                            </div>
                                            <!--end::Label-->
                                            <!--begin::Switch-->
                                            <select class="form-select form-select-solid" name="did_pay" value="{{ $reservations->did_pay }}">
                                                <option value="نعم">نعم</option>
                                                <option value="لا">لا</option>
                                                <option value="لا يلزم">لا يلزم</option>
                                            </select>
                                            <!--end::Switch-->
                                        </div>

                                    </div>


                                    <!--begin::Actions-->
                                    <div class="text-center">
                                        <button type="reset" id="kt_modal_new_target_cancel" class="btn btn-light me-3">Cancel</button>
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


                </form>
            </div>
            <!--end::Modal content-->
        </div>
        <!--end::Modal dialog-->
    </div>

				<!-- delete_modal_Grade -->
				<div class="modal fade" id="delete{{ $reservations->id }}" tabindex="-1" role="dialog"
					 aria-labelledby="exampleModalLabel" aria-hidden="true">
					<div class="modal-dialog" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
									id="exampleModalLabel">
									هل تريد الغاء الحجز
								</h5>
								<button type="button" class="close" data-dismiss="modal"
										aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<div class="modal-body">
								<form action="{{ route('room_reservations.destroy',$reservations->id) }}"
									  method="post">
									{{ method_field('DELETE') }}
									@csrf
									هل تريد الغاء الحجز
									<input id="id" type="text" name="id" class="form-control"
										   value="{{ $reservations->Patient_id }}">
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












<form action="{{ route('room_reservations.store') }}" method="post">
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
                    <h1 class="mb-3">حجز غرفة جديدة</h1>
                    <!--end::Title-->
                    <!--begin::Description-->
                    <div class="text-muted fw-semibold fs-5">اذا لم يكن المريض مسجيل فيمكنك تسجيله من
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
                        <input type="text" class="form-control form-control-solid" placeholder="Enter Target Title" name="Patient_id" />
                    </div>
                    <!--end::Input group-->
                    <!--begin::Input group-->
                    <div class="row g-9 mb-8">

                        <!--begin::Col-->
                        <div class="col-md-6 fv-row">

                            <label class="required fs-6 fw-semibold mb-2">اسم الغرفة</label>
                            <!--begin::Input-->
                            <div class="position-relative d-flex align-items-center">
                                <!--begin::Icon-->
                                <!--begin::Svg Icon | path: icons/duotune/general/gen014.svg-->

                                </span>
                                <!--end::Svg Icon-->
                                <!--end::Icon-->
                                <!--begin::Datepicker-->

                                <input type="text" class="form-control form-control-solid" placeholder="Enter Target Title" name="room_id" />
                                <!--end::Datepicker-->
                            </div>
                            <!--end::Input-->
                        </div>
                        <!--end::Col-->
                        <!--begin::Col-->
                        <div class="col-md-6 fv-row">
                            <label class="required fs-6 fw-semibold mb-2">رقم الغرفة</label>
                            <select class="form-select form-select-solid" data-control="select2" data-hide-search="true" data-placeholder="Select a Team Member" >
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
                    <div class="row">
                    <div class="col flex-stack mb-8">
                        <!--begin::Label-->
                        <div class="me-5">
                            <label class="required fs-6 fw-semibold">تاريخ الحجز</label><br>
                        </div>
                        <!--end::Label-->
                        <!--begin::Switch-->
                        <input type="date" class="form-control form-control-solid" name="booking_date">
                        <!--end::Switch-->
                    </div>
                    <div class="col flex-stack mb-8">
                        <!--begin::Label-->
                        <div class="me-5">
                            <label class="required fs-6 fw-semibold">تاريخ انتهاء الحجز</label><br>
                        </div>
                        <!--end::Label-->
                        <!--begin::Switch-->
                        <input type="date" class="form-control form-control-solid" name="Exit_date">
                        <!--end::Switch-->
                    </div>
                </div>
                    <!--end::Input group-->
                    <!--begin::Input group-->
                    <div class="row">
                        <div class="col flex-stack mb-8">
                            <!--begin::Label-->
                            <div class="me-5">
                                <label class="required fs-6 fw-semibold">هل قام بالدفع</label><br>
                            </div>
                            <!--end::Label-->
                            <!--begin::Switch-->
                            <select class="form-select form-select-solid" name="did_pay">
                                <option value="نعم">نعم</option>
                                <option value="لا">لا</option>
                                <option value="لا يلزم">لا يلزم</option>
                            </select>
                            <!--end::Switch-->
                        </div>

                    </div>


                    <!--begin::Actions-->
                    <div class="text-center">
                        <button type="reset" id="kt_modal_new_target_cancel" class="btn btn-light me-3">Cancel</button>
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
