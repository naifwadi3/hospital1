@extends('layout.dashboard')
@section('css')

@section('tit')
إيصال قبض
@endsection
<div style="padding: 1cm">
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


<div style="padding: 1cm">
<div style="padding-left: 1cm">
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#kt_modal_new_target">
        إضافة ممرض جديد <i class="bi bi-plus"></i>
    </button>
</div>

<div style="padding: 1cm">
<div class="table-responsive">
	<table id="datatable" class="table table-row-dashed table-row-gray-300 align-middle gs-0 gy-4" data-page-length="50"
		style="text-align: center">
		<thead>
            <tr class="fw-bold fs-6 text-gray-800 px-7">
				<th><input name="select_all" id="example-select-all" type="checkbox" onclick="CheckAll('box1', this)" /></th>
				<th scope="col">#</th>
                <th scope="col">اسم المريض</th>
                <th scope="col">رقم الايصال</th>
                <th scope="col">سبب المبلغ</th>
                <th scope="col">المبلغ المدفوع</th>
                <th scope="col">المبلغ المتبقي</th>
                <th scope="col">تاريخ الايصال</th>
                <th scope="col">العمليات</th>
		</thead>
		<tbody>

@php
	$i=0;
@endphp
@foreach ( $receipt as $receipts )

				<tr>
					<?php $i++; ?>

					<td><input type="checkbox"  value="" class="box1" ></td>
					<td>{{ $i }}</td>
					<td>{{ $receipts->Patients->patient_name }}</td>
					<td>{{ $receipts->receipt_number }}</td>
					<td>{{ $receipts->fee->name }}</td>
					<td>{{ $receipts->amount_paid }}</td>
					<td>{{ $receipts->remaining_amount }}</td>
					<td>{{ $receipts->Date_of_receipt }}</td>
					<td>
						<button type="button" class="btn btn-info btn-xl" data-bs-toggle="modal"
							data-bs-target="#edit{{ $receipts->id }}"
							title="تعديل"><i class="fa fa-edit"></i></button>
						<button type="button" class="btn btn-danger btn-xl" data-bs-toggle="modal"
							data-bs-target="#delete{{ $receipts->id }}"
							title="حذف"><i
								class="fa fa-trash"></i></button>
                                <button type="button" class="btn btn-danger btn-xl" data-bs-toggle="modal"
							data-bs-target="#show"
							title="عرض"><i class="fa-solid fa-eye"></i></button>
					</td>

				</tr>


				<!-- edit_modal_Grade -->

                 <div class="modal fade" id="edit{{ $receipts->id }}" tabindex="-1" aria-hidden="true">
                            <!--begin::Modal dialog-->
                            <div class="modal-dialog modal-dialog-centered mw-650px">
                                <!--begin::Modal content-->
                                <div class="modal-content rounded">
                                    <form action="{{ route('receipt.update',$receipts->id) }}" method="post"  enctype="multipart/form-data">
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
                                            <h1 class="mb-3">ايصال قبض جديد</h1>
                                            <!--end::Title-->
                                            <!--begin::Description-->
                                            <div class="text-muted fw-semibold fs-5">تأكد من ادخال المعلومات بشكل صحيح
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
                                                <select class="form-select form-select-solid" data-control="select2" data-hide-search="true" data-placeholder="Select a Team Member" name="patient_id">
                                                    @foreach ($patient as $patients)
                                                    <option value="{{ $patients->id }}" {{$patients->id == $receipts->patient_id ?'selected':''}}>{{ $patients->patient_name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <!--end::Input group-->
                                            <!--begin::Input group-->
                                            <div class="row g-9 mb-8">

                                                <!--begin::Col-->
                                                <div class="col-md-6 fv-row">

                                                    <label class="required fs-6 fw-semibold mb-2">رقم الايصال</label>
                                                    <!--begin::Input-->
                                                    <div class="position-relative d-flex align-items-center">
                                                        </span>

                                                        <input type="text" class="form-control form-control-solid" placeholder="Enter Target Title" name="receipt_number" value="{{ $receipts->receipt_number }}"/>
                                                        <!--end::Datepicker-->
                                                    </div>
                                                    <!--end::Input-->
                                                </div>
                                                <!--end::Col-->
                                                <!--begin::Col-->
                                                <div class="col-md-6 fv-row">
                                                    <label class="required fs-6 fw-semibold mb-2">سبب المبلغ</label>
                                                    <select class="form-select form-select-solid" data-control="select2" data-hide-search="true" data-placeholder="Select a Team Member" name="reason_amount">
                                                        @foreach ($fee as $fees)
                                                        <option value="{{ $fees->id }}" {{$fees->id == $receipts->reason_amount ?'selected':''}}>{{ $fees->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <!--end::Col-->
                                            </div>
                                            <!--end::Input group-->


                                            <!--begin::Input group-->
                                            <div class="row">
                                            <div class="col flex-stack mb-8">
                                                <!--begin::Label-->
                                                <div class="me-5">
                                                    <label class="required fs-6 fw-semibold">المبلغ المدفوع</label><br>
                                                </div>
                                                <!--end::Label-->
                                                <!--begin::Switch-->
                                                <input type="text" class="form-control form-control-solid" name="amount_paid" value="{{ $receipts->amount_paid }}">
                                                <!--end::Switch-->
                                            </div>
                                            <div class="col flex-stack mb-8">
                                                <!--begin::Label-->
                                                <div class="me-5">
                                                    <label class="required fs-6 fw-semibold">المبلغ المتبقي</label><br>
                                                </div>
                                                <!--end::Label-->
                                                <!--begin::Switch-->
                                                <input type="text" class="form-control form-control-solid" name="remaining_amount" value="{{ $receipts->remaining_amount }}">
                                                <!--end::Switch-->
                                            </div>

                                            <!--end::Input group-->
                                            <!--begin::Input group-->
                                            <div class="col">

                                                <div class="col flex-stack mb-8">
                                                    <!--begin::Label-->
                                                    <div class="me-5">
                                                        <label class="required fs-6 fw-semibold">تاريخ الايصال</label><br>
                                                    </div>
                                                    <!--end::Label-->
                                                    <!--begin::Switch-->
                                                    <input type="date" class="form-control form-control-solid" name="Date_of_receipt" value="{{ $receipts->Date_of_receipt }}">
                                                    <!--end::Switch-->
                                                </div>
                                            </div>
                                        </div>
                                            <!--end::Input group-->
                                            <div class="d-flex flex-column mb-8">
                                                <label class="fs-6 fw-semibold mb-2">اضافة ملاحظات</label>
                                                <textarea class="form-control form-control-solid" rows="3" name="note" placeholder="Type Target Details">{{ $receipts->note }}</textarea>
                                            </div>
                                            <!--begin::Image input-->

                                    <!--end::Image input-->
                                            <!--begin::Actions-->
                                            <div class="text-center">
                                                <button type="reset" id="kt_modal_new_target_cancel" data-bs-dismiss="modal" class="btn btn-light me-3">Cancel</button>
                                                <button type="submit" id="" class="btn btn-primary">
                                                    <span class="submit">Submit</span>
                                                    <span class="indicator-progress">Please wait...
                                                </button>
                                            </div>

                                            <!--end::Actions-->
                                        </form>
                                        <!--end:Form-->
                                    </div>
                                </form>
                                    <!--end::Modal body-->
                                </div>
                                <!--end::Modal content-->
                            </div>
                            <!--end::Modal dialog-->
                        </div>

                        <div class="modal fade" id="delete{{ $receipts->id }}" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                           <div class="modal-dialog" role="document">
                               <div class="modal-content">
                                   <div class="modal-header">
                                       <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                           id="exampleModalLabel">
                                           هل خرج المريض من قسم الطوارئ
                                       </h5>
                                       <button type="button" class="close" data-dismiss="modal"
                                               aria-label="Close">
                                           <span aria-hidden="true">&times;</span>
                                       </button>
                                   </div>
                                   <div class="modal-body">
                                       <form action="{{ route('receipt.destroy',$receipts->id) }}"
                                             method="post">
                                           {{ method_field('DELETE') }}
                                           @csrf
                                           هل خرج المريض من قسم الطوارئ
                                           <input id="id" type="text" name="id" class="form-control"
                                                  value="{{ $receipts->patient_name }}">
                                           <div class="modal-footer">
                                               <button type="button" class="btn btn-secondary"
                                                       data-dismiss="modal">لا</button>
                                               <button type="submit"
                                                       class="btn btn-danger">نعم , لقد خرج</button>
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




<form action="{{ route('receipt.store') }}" method="post" autocomplete="off"  enctype="multipart/form-data">
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
                            <h1 class="mb-3">ايصال قبض جديد</h1>
                            <!--end::Title-->
                            <!--begin::Description-->
                            <div class="text-muted fw-semibold fs-5">تأكد من ادخال المعلومات بشكل صحيح
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
                                <select class="form-select form-select-solid" data-control="select2" data-hide-search="true" data-placeholder="Select a Team Member" name="patient_id">
                                    @foreach ($patient as $patients)
                                    <option value="{{ $patients->id }}">{{ $patients->patient_name }}</option>
                                    @endforeach
                                </select>
                            </div>
							<!--end::Input group-->
							<!--begin::Input group-->
							<div class="row g-9 mb-8">

								<!--begin::Col-->
								<div class="col-md-6 fv-row">

									<label class="required fs-6 fw-semibold mb-2">رقم الايصال</label>
									<!--begin::Input-->
									<div class="position-relative d-flex align-items-center">
										</span>

                                        <input type="text" class="form-control form-control-solid" placeholder="Enter Target Title" name="receipt_number" />
										<!--end::Datepicker-->
									</div>
									<!--end::Input-->
								</div>
								<!--end::Col-->
                                <!--begin::Col-->
								<div class="col-md-6 fv-row">
									<label class="required fs-6 fw-semibold mb-2">سبب المبلغ</label>
									<select class="form-select form-select-solid" data-control="select2" data-hide-search="true" data-placeholder="Select a Team Member" name="reason_amount">
                                        @foreach ($fee as $fees)
										<option value="{{ $fees->id }}">{{ $fees->name }}</option>
                                        @endforeach
									</select>
								</div>
								<!--end::Col-->
							</div>
							<!--end::Input group-->


							<!--begin::Input group-->
                            <div class="row">
							<div class="col flex-stack mb-8">
								<!--begin::Label-->
								<div class="me-5">
									<label class="required fs-6 fw-semibold">المبلغ المدفوع</label><br>
								</div>
								<!--end::Label-->
								<!--begin::Switch-->
								<input type="text" class="form-control form-control-solid" name="amount_paid">
								<!--end::Switch-->
							</div>
                            <div class="col flex-stack mb-8">
								<!--begin::Label-->
								<div class="me-5">
									<label class="required fs-6 fw-semibold">المبلغ المتبقي</label><br>
								</div>
								<!--end::Label-->
								<!--begin::Switch-->
								<input type="text" class="form-control form-control-solid" name="remaining_amount">
								<!--end::Switch-->
							</div>

							<!--end::Input group-->
							<!--begin::Input group-->
                            <div class="col">

                                <div class="col flex-stack mb-8">
                                    <!--begin::Label-->
                                    <div class="me-5">
                                        <label class="required fs-6 fw-semibold">تاريخ الايصال</label><br>
                                    </div>
                                    <!--end::Label-->
                                    <!--begin::Switch-->
                                    <input type="date" class="form-control form-control-solid" name="Date_of_receipt">
                                    <!--end::Switch-->
                                </div>
                            </div>
                        </div>
							<!--end::Input group-->
                            <div class="d-flex flex-column mb-8">
								<label class="fs-6 fw-semibold mb-2">اضافة ملاحظات</label>
								<textarea class="form-control form-control-solid" rows="3" name="note" placeholder="Type Target Details"></textarea>
							</div>
                            <!--begin::Image input-->

                    <!--end::Image input-->
							<!--begin::Actions-->
							<div class="text-center">
								<button type="reset" id="kt_modal_new_target_cancel" data-bs-dismiss="modal" class="btn btn-light me-3">Cancel</button>
								<button type="submit" id="" class="btn btn-primary">
									<span class="submit">Submit</span>
									<span class="indicator-progress">Please wait...
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




@section('js')
@endsection
@endsection
