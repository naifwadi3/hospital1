@extends('layout.dashboard')
@section('css')

@section('tit')

@endsection

@section('co')








<div class="card card-p-0 card-flush">
    <div class="card-header align-items-center py-5 gap-2 gap-md-5">
     <div class="card-title">
      <!--begin::Search-->
      <div class="d-flex align-items-center position-relative my-1">
       <span class="svg-icon svg-icon-1 position-initial" >search</span>
       <input type="text" data-kt-filter="search" class="form-control form-control-solid w-250px" placeholder="Search Report" />
      </div>

      <!--end::Search-->
      <!--begin::Export buttons-->
      <div id="kt_datatable_example_1_export" class="d-none"></div>
      <!--end::Export buttons-->
     </div>
     <div class="card-toolbar flex-row-fluid justify-content-end gap-5">
      <!--begin::Export dropdown-->
      <button type="button" class="btn btn-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
       <span class="svg-icon svg-icon-1 position-absolute ms-4">...</span>
       اضافة او تصدير<i class="fa-solid fa-file-arrow-down" style="padding: 5px"></i>
      </button>
      <!--begin::Menu-->
      <div id="kt_datatable_example_export_menu" class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-200px py-4" data-kt-menu="true">
       <!--begin::Menu item-->
       <div class="menu-item px-3">
        <a href="#" class="menu-link px-3" data-bs-toggle="modal" data-bs-target="#kt_modal_new_target" style="font-size:18px;color:rgb(59, 59, 150)">
        اضافة بينات
        <i class="bi bi-plus" style="padding-right: 2cm;size:10px"></i></a>
       </div>

       <div class="menu-item px-3">
        <a href="#" class="menu-link px-3" data-kt-export="copy">
        نسخ الجدول
        </a>
       </div>
       <!--end::Menu item-->
       <!--begin::Menu item-->
       <div class="menu-item px-3">
        <a href="#" class="menu-link px-3" data-kt-export="excel">
        تصدير للاكسل
        </a>
       </div>
       <!--end::Menu item-->
       <!--begin::Menu item-->
       <div class="menu-item px-3">
        <a href="#" class="menu-link px-3" data-kt-export="csv">
        تصدير csv
        </a>
       </div>
       <!--end::Menu item-->
       <!--begin::Menu item-->
       <div class="menu-item px-3">
        <a href="#" class="menu-link px-3" data-kt-export="pdf">
        تصدير ملف PDF
        </a>
       </div>
       <!--end::Menu item-->
      </div>
      <!--end::Menu-->
      <!--end::Export dropdown-->

      <!--begin::Hide default export buttons-->
      <div id="kt_datatable_example_buttons" class="d-none"></div>
    </div>
</div>
      <!--end::Hide default export buttons->

    <div class="card-body">
     <table class="table align-middle border rounded table-row-dashed fs-6 g-5" id="kt_datatable_example">
      <thead>
       <--begin::Table row-->
       <div class="card-body">
        <table class="table table-striped table-row-bordered gy-5 gs-7 border rounded" id="kt_datatable_example">
         <thead>
       <tr class="text-start text-gray-400 fw-bold fs-7 text-uppercase">
        <th class="min-w-100px">اسم الموظف</th>
        <th class="min-w-100px">نوع الوظيفة</th>
        <th class="min-w-100px">فترة العمل</th>
        <th class="min-w-100px">من الساعة</th>
        <th class="text-end min-w-75px">حتى الساعة</th>
        <th class="text-end min-w-75px">ملاحظة</th>
        <th class="text-end min-w-100px pe-5">العمليات</th>
       </tr>
       <!--end::Table row-->
      </thead>
      @foreach ($day_work as $doctor)
      <tbody class="fw-semibold text-gray-600">
       <tr class="odd">
        <td>
         <a href="#" class="text-dark text-hover-primary">{{ $doctor->doctors->name }}</a>
        </td>
        <td>
         <a href="#" class="text-dark text-hover-primary">{{ $doctor->nurs->name }}</a>
        </td>
        <td>
         <div class="badge badge-light-success">{{ $doctor->status }}</div>
        </td>
        <td data-order="2022-03-10T14:40:00+05:00">{{ $doctor->start_time }}</td>

        <td class="text-end pe-0">{{ $doctor->end_time }}</td>

        <td class="text-end pe-0">{{ $doctor->note }}</td>

        <td class="text-end">

            <button type="button" class="btn btn-info btn-xl" data-bs-toggle="modal"
            data-target="#edit{{ $doctor->id }}"
            title="edit"><i class="fa fa-edit"></i></button>

            <button type="button" class="btn btn-danger btn-xl" data-bs-toggle="modal"
            data-target="#delete{{ $doctor->id }}"
            title="delete"><i
            class="fa fa-trash"></i></button>

            <button type="button" class="btn btn-danger btn-xl" data-bs-toggle="modal"
            data-target="#show"
            title="show"><i class="fa-solid fa-eye"></i></button>

        </td>
       </tr>
      </tbody>
      @endforeach
     </table>
    </div>
   </div>





   <form action="{{ route('day_work_store') }}" method="post">
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
                            <h1 class="mb-3">جدول العمل اليوم</h1>
                            <!--end::Title-->
                            <!--begin::Description-->
                            <div class="text-muted fw-semibold fs-5">اذا لم يكن التخصص موجود فيمكنك اضافته من
                            <a href="#" class="fw-bold link-primary">هنا</a>.</div>
                            <!--end::Description-->
                        </div>
                        <!--end::Heading-->
							<!--begin::Input group-->

							<div class="row">
                            <div class="col">
								<!--begin::Label-->
								<label class="d-flex align-items-center fs-6 fw-semibold mb-2">
									<span class="required">اسم الممرض</span>
									<i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Specify a target name for future usage and reference"></i>
								</label>
								<!--end::Label-->
                                <select class="form-select form-select-solid"  data-hide-search="true" data-placeholder="Select a Team Member" name="worker_id" >
                                    {{-- @foreach ($doctor as $doctor)
                                    <option value="{{ $doctor->id }}">{{ $doctor->name }}</option>
                                    @endforeach
                                    @foreach ($nurs as $nurs)
                                    <option value="{{ $nurs->id }}">{{ $nurs->name }}</option>
                                    @endforeach --}}
                                </select>
                            	</div>
							<!--end::Input group-->
							<!--begin::Input group-->

								<!--begin::Col-->
								<div class="col">

									<label class="required fs-6 fw-semibold mb-2">فترة العمل</label>
									<!--begin::Input-->
									<div class="position-relative d-flex align-items-center">
										<!--begin::Icon-->
										<!--begin::Svg Icon | path: icons/duotune/general/gen014.svg-->

										</span>
										<!--end::Svg Icon-->
										<!--end::Icon-->
										<!--begin::Datepicker-->

                                        <select class="form-select form-select-solid" data-control="select2" data-hide-search="true" data-placeholder="Select a Team Member" name="status">
                                            <option value="صباحي">صباحي</option>
                                            <option value="مسائي">مسائي</option>
                                        </select>
                                            <!--end::Datepicker-->
									</div>
									<!--end::Input-->
								</div>
                            </div>
								<!--end::Col-->
                                <!--begin::Col-->
                                <div class="row">
								<div class="col-md-6 fv-row">
									<label class="required fs-6 fw-semibold mb-2">نوع الوظيفة</label>
									<select class="form-select form-select-solid" data-control="select2" data-hide-search="true" data-placeholder="Select a Team Member" name="the_work">
                                        <option value="طبيب">طبيب</option>
                                        <option value="ممرض">ممرض</option>
                                        <option value="اداري">اداري</option>

									</select>
								</div>
                                <div class="col flex-stack mb-8">
                                    <!--begin::Label-->
                                    <div class="me-5">
                                        <label class="required fs-6 fw-semibold">رقم هاتف الممرض</label><br>
                                    </div>
                                    <!--end::Label-->
                                    <!--begin::Switch-->
                                    <input type="text" class="form-control form-control-solid" name="nurs_phone">
                                    <!--end::Switch-->
                                </div>
                            </div>

								<!--end::Col-->
							<!--end::Input group-->
							<!--begin::Input group-->
                            <div class="row">

                                <div class="col flex-stack mb-8">
                                    <!--begin::Label-->
                                    <div class="me-5">
                                        <label class="required fs-6 fw-semibold">يبدأ الدوام من الساعة :</label><br>
                                    </div>
                                    <!--end::Label-->
                                    <!--begin::Switch-->
                                    <input type="date" class="form-control form-control-solid" name="start_time">
                                    <!--end::Switch-->
                                </div>

                                <div class="col flex-stack mb-8">
                                    <!--begin::Label-->
                                    <div class="me-5">

                                        <label class="required fs-6 fw-semibold">حتى الساعة :</label><br>
                                    </div>
                                    <!--end::Label-->
                                    <!--begin::Switch-->
                                    <input type="date" class="form-control form-control-solid" name="end_time">

                                    <!--end::Switch-->
                                </div>
                            </div>

							<!--end::Input group-->
                            <div class="d-flex flex-column mb-8">
								<label class="fs-6 fw-semibold mb-2">اضافة ملاحظات</label>
								<textarea class="form-control form-control-solid" rows="3" name="note" placeholder="Type Target Details"></textarea>
							</div>
                            <div class="text-center">
								<button type="reset" id="kt_modal_new_target_cancel" class="btn btn-light me-3">Cancel</button>
								<button type="submit" id="" class="btn btn-primary">
									<span class="indicator-label">Submit</span>
									<span class="indicator-progress">Please wait...
									<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
								</button>
							</div>


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
