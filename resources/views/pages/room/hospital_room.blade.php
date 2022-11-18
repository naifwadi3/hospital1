@extends('layout.dashboard')
@section('css')

@section('tit')
Room
@endsection

@section('co')





 @can('اضافة غرفة جديدة')
 <div>
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#kt_modal_new_target">
        اضافة غرفة جديد <i class="bi bi-plus"></i>
    </button>
</div>
@endcan

<div>
    @if ($errors->any())
    <div class="alert alert-danger alert-dismissible fade show">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>

    </div>
    @endif
</div>

<div class="table-responsive">
    <table id="kt_datatable_dom_positioning" class="table table-striped table-row-bordered gy-5 gs-7 border rounded">
		<thead>
            <tr class="fw-bold fs-6 text-gray-800 px-7">
				<th><input name="select_all" id="example-select-all" type="checkbox" onclick="CheckAll('box1', this)" /></th>
				<th scope="col">#</th>
                <th scope="col">اسم الغرفة</th>
                <th scope="col">رقم الغرفة</th>
                <th scope="col">حالة الغرفة</th>
                <th scope="col">نوع الغرفة</th>
                <th scope="col">سعر الغرفة</th>
                <th scope="col">procesor</th>
		</thead>
		<tbody>

@php
	$i=0;
@endphp
@foreach ($room as $rooms)

				<tr>
					<?php $i++; ?>

					<td><input type="checkbox"  value="" class="box1" ></td>
					<td>{{ $i }}</td>
					<td>{{ $rooms->room_name }}</td>
					<td>{{ $rooms->room_id }}</td>
					<td>{{ $rooms->room_type }}</td>
					<td>{{ $rooms->Special_room }}</td>

					<td>{{ $rooms->room_price }}</td>

					<td>
                        @can('تعديل غرفة')
						<button type="button" class="btn btn-info btn-sm" data-bs-toggle="modal"
							data-bs-target="#edit{{ $rooms->id }}"
							title="تعديل"><i class="fa fa-edit"></i></button>
                            @endcan

                            @can('حذف غرفة')
						<button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal"
							data-bs-target="#delete{{ $rooms->id }}"
							title="حذف"><i
								class="fa fa-trash"></i></button>
                                @endcan

					</td>


                </tr>






				<!-- edit_modal_Grade -->


                <div class="modal fade" id="edit{{ $rooms->id }}" tabindex="-1" aria-hidden="true">
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
                                    <form action="{{ route('room.update',$rooms->id) }}" method="post">
                                        @csrf
                                        @method('PUT')
                                    <!--begin::Modal header-->
                                    <!--begin::Modal body-->
                                    <div class="modal-body scroll-y px-10 px-lg-15 pt-0 pb-15">
                                        <!--begin:Form-->
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
                                                <input type="text" class="form-control form-control-solid" placeholder="Enter Target Title" name="room_name"  value="{{ $rooms->room_name }}"/>
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
                                                        <input type="text" class="form-control form-control-solid"  name="room_id" value="{{ $rooms->room_id }}"/>
                                                        <!--end::Datepicker-->
                                                    </div>
                                                    <!--end::Input-->
                                                </div>
                                                <div class="col-md-6 fv-row">
                                                    <label class="required fs-6 fw-semibold mb-2">سعر الغرفة</label>
                                                    <!--begin::Input-->
                                                    <div class="position-relative d-flex align-items-center">
                                                        <!--begin::Icon-->
                                                        <!--begin::Svg Icon | path: icons/duotune/general/gen014.svg-->

                                                        </span>
                                                        <!--end::Svg Icon-->
                                                        <!--end::Icon-->
                                                        <!--begin::Datepicker-->
                                                        <input type="text" class="form-control form-control-solid"  name="room_price" value="{{ $rooms->room_price }}"" />
                                                        <!--end::Datepicker-->
                                                    </div>
                                                    <!--end::Input-->
                                                </div>
                                                <!--end::Col-->
                                                <!--begin::Col-->
                                                <div class="col-md-6 fv-row">
                                                    <label class="required fs-6 fw-semibold mb-2">اسم القسم</label>
                                                    <select class="form-select form-select-solid" data-control="select2" data-hide-search="true" data-placeholder="Select a Team Member" name="section_id" value="{{ $rooms->section_id }}"">
                                                        @foreach ($sectoion as $section )
                                                        <option value="{{ $section->id }}">
                                                            {{ $section->section_name }}
                                                        </option>
                                                        @endforeach
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
                                                    <input class="form-check-input" type="checkbox"  checked="checked" name="room_type" value="{{ $rooms->room_type }}"/>
                                                    <span class="form-check-label fw-semibold text-muted">{{ $rooms->room_type }} 	</span>
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
                                                            <input class="form-check-input h-20px w-20px" type="checkbox" name="Special_room" value="{{ $rooms->Special_room }}"" checked="checked" />
                                                            <span class="form-check-label fw-semibold">خاصة</span>
                                                        </label>
                                                        <!--end::Checkbox-->
                                                        <!--begin::Checkbox-->
                                                        <label class="form-check form-check-custom form-check-solid">
                                                            <input class="form-check-input h-20px w-20px" type="checkbox" name="Special_room"  value="{{ $rooms->Special_room }}"/>
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
                                                <textarea class="form-control form-control-solid" rows="3" name="note"  placeholder="Type Target Details">{{ $rooms->note }}</textarea>
                                            </div>
                                            <!--begin::Actions-->
                                            <div class="text-center">
                                                <button type="reset" id="kt_modal_new_target_cancel" class="btn btn-light me-3" data-bs-dismiss="modal">Cancel</button>
                                                <button type="submit"  class="btn btn-primary" >
                                                    save
                                                </button>
                                            </div>
                                        </form>

                                            <!--end::Actions-->

                                        <!--end:Form-->
                                    </div>
                                    <!--end::Modal body-->

                                </div>
                                <!--end::Modal content-->
                            </div>
                            <!--end::Modal dialog-->
                        </div>



                        <div class="modal fade" id="delete{{ $rooms->id }}" tabindex="-1" role="dialog"
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
                                       <form action="{{ route('room.destroy',$rooms->id) }}"
                                             method="post">
                                           @csrf
                                           @method('DELETE')
                                           هل أنت متاكد من حذف
                                           <h5 id="id" type="text" name="room_name" class="form-control"
                                                  value="{{ $rooms->room_name }}">{{ $rooms->room_name }}</h5>
                                           <div class="modal-footer">
                                               <input id="id" type="hidden" name="room_id" class="form-control"
                                                  value="{{ $rooms->room_id }}">
                                           <div class="modal-footer">
                                               <button type="button" class=""
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










<form action="{{ route('room.store') }}" method="post">
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
								<input type="text" class="form-control form-control-solid"  name="room_name" />
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
                                        <input type="text" class="form-control form-control-solid"  name="room_id" />
										<!--end::Datepicker-->
									</div>
									<!--end::Input-->
								</div>
                                <div class="col-md-6 fv-row">
									<label class="required fs-6 fw-semibold mb-2">سعر الغرفة</label>
									<!--begin::Input-->
									<div class="position-relative d-flex align-items-center">
										<!--begin::Icon-->
										<!--begin::Svg Icon | path: icons/duotune/general/gen014.svg-->

										</span>
										<!--end::Svg Icon-->
										<!--end::Icon-->
										<!--begin::Datepicker-->
                                        <input type="text" class="form-control form-control-solid" placeholder="Enter Target Title" name="room_price" />
										<!--end::Datepicker-->
									</div>
									<!--end::Input-->
								</div>
								<!--end::Col-->
                                <!--begin::Col-->
								<div class="col-md-6 fv-row">
									<label class="required fs-6 fw-semibold mb-2">اسم القسم</label>
									<select class="form-select form-select-solid" data-control="select2" data-hide-search="true" data-placeholder="Select a Team Member" name="section_id">
                                        @foreach ($sectoion as $section )
                                        <option value="{{ $section->id }}">
                                            {{ $section->section_name }}
                                        </option>
                                        @endforeach
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
									<input class="form-check-input" type="checkbox" value="محجوزة" checked="checked" name="room_type" />
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
											<input class="form-check-input h-20px w-20px" type="checkbox" name="Special_room" value="حاصة" checked="checked" />
											<span class="form-check-label fw-semibold">خاصة</span>
										</label>
										<!--end::Checkbox-->
										<!--begin::Checkbox-->
										<label class="form-check form-check-custom form-check-solid">
											<input class="form-check-input h-20px w-20px" type="checkbox" name="Special_room" value="عامه" />
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
								<textarea class="form-control form-control-solid" rows="3" name="note" placeholder="Type Target Details"></textarea>
							</div>
							<!--begin::Actions-->
							<div class="text-center">
								<button type="reset" id="kt_modal_new_target_cancel" class="btn btn-light me-3" data-bs-dismiss="modal">Cancel</button>
								<button type="submit"  class="btn btn-primary" >
									<span class="indicator-label">Submit</span>
									<span class="indicator-progress">Please wait...
								</button>
							</div>
							<!--end::Actions-->

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
