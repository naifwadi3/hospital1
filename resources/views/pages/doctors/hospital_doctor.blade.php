@extends('layout.dashboard')
@section('css')

@section('tit')
قائمة الاطباء
@endsection

@section('co')


@if ($errors->any())
<div class="alert alert-danger" role="alert">
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
    <button type="button" class="close " data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif


<br>
<div class="app-content flex-column-fluid">

@can('اضافة طبيب جديد')
    <button type="button" class="btn btn-primary app-content flex-column-fluid" data-bs-toggle="modal" data-bs-target="#kt_modal_new_target">
        إضافة طبيب جديد <i class="bi bi-plus"></i>
    </button>
@endcan
<br>

<div class="table-responsive">
    <table id="kt_datatable_dom_positioning" class="table table-striped table-row-bordered gy-5 gs-7 border rounded">
		<thead>
            <tr class="fw-bold fs-6 text-gray-800 px-7">
				<th><input name="select_all" id="example-select-all" type="checkbox" onclick="CheckAll('box1', this)" /></th>
				<th scope="col">#</th>
                <th scope="col">اسم الطبيب</th>
                <th scope="col">رقم الهوية</th>
                <th scope="col">تخصص الدكتور</th>
                <th scope="col">رقم الهاتف</th>
                <th scope="col">الايميل</th>
                <th scope="col">procesor</th>
		</thead>
		<tbody>

                        @php
                            $i=0;
                        @endphp


                            @foreach ($doctors as $doctor)

                            <tr>
                            <?php $i++; ?>
                            <td><input type="checkbox"  value="" class="box1" ></td>
                            <td>{{ $i }}</td>
                            <td class="d-flex align-items-center">
                            <!--begin:: Avatar -->
                            <div class="symbol symbol-circle symbol-50px overflow-hidden me-3">

                            <div class="symbol-label">
                                {{-- <img src="{{ Storage::url("app/attachments/doctors/$doctor->name/$doctor->photos") }}" alt="Emma Smith" class="w-100"/> --}}

                                <img src='{{ asset("attachments/doctors/$doctor->name/$doctor->photos") }}' alt="Emma Smith" class="w-100">
                            </div>
                            </div>
                            <!--end::Avatar-->
                            <!--begin::User details-->
                            <div class="d-flex flex-column">
                            <a href="/metronic8/demo1/../demo1/apps/user-management/users/view.html" class="text-gray-800 text-hover-primary mb-1">{{ $doctor->name }}</a>
                            <span>{{ $doctor->email }}</span>
                            </div>
                            <!--begin::User details-->
                            </td>
                            <td>{{ $doctor->doctor_id }}</td>
                            <td>{{ $doctor->specialty->Specialties_name }}</td>
                            <td>{{ $doctor->doctor_phone }}</td>
                            <td>{{ $doctor->email }}</td>

                            <td>
                                @can('تعديل طبيب ')
                            <button type="button" class="btn btn-info btn-xl" data-bs-toggle="modal"
                            data-target="#edit{{ $doctor->id }}"
                            title="edit"><i class="fa fa-edit"></i></button>
                            @endcan

                            @can('حذف طبيب ')
                            <button type="button" class="btn btn-danger btn-xl" data-bs-toggle="modal"
                            data-target="#delete{{ $doctor->id }}"
                            title="delete"><i
                            class="fa fa-trash"></i></button>
                            @endcan

                            @can('عرض طبيب ')
                            <button type="button" class="btn btn-danger btn-xl" data-bs-toggle="modal"
                            data-target="#show"
                            title="show"><i class="fa-solid fa-eye"></i></button>

                            @endcan

                            </td>

                            </tr>





				<!-- edit_modal_Grade -->

                 <div class="modal fade" id="edit{{ $doctor->id }}" tabindex="-1" aria-hidden="true">
                            <!--begin::Modal dialog-->
                            <div class="modal-dialog modal-dialog-centered mw-650px">
                                <!--begin::Modal content-->
                                <div class="modal-content rounded">
                                    <form action="{{ route('doctor.update',$doctor->id) }}" method="post" autocomplete="off"  enctype="multipart/form-data">
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
                                            <h1 class="mb-3">تعديل بينات الطبيب </h1>
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
                                                    <span class="required">اسم الطبيب</span>
                                                    <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Specify a target name for future usage and reference"></i>
                                                </label>
                                                <!--end::Label-->
                                                <input type="text" class="form-control form-control-solid" placeholder="Enter Target Title" name="name" value="{{ $doctor->name }}"/>
                                            </div>
                                            <!--end::Input group-->
                                            <!--begin::Input group-->
                                            <div class="row g-9 mb-8">

                                                <!--begin::Col-->
                                                <div class="col-md-6 fv-row">

                                                    <label class="required fs-6 fw-semibold mb-2">رقم هوية الطبيب</label>
                                                    <!--begin::Input-->
                                                    <div class="position-relative d-flex align-items-center">
                                                        <!--begin::Icon-->
                                                        <!--begin::Svg Icon | path: icons/duotune/general/gen014.svg-->

                                                        </span>
                                                        <!--end::Svg Icon-->
                                                        <!--end::Icon-->
                                                        <!--begin::Datepicker-->

                                                        <input type="text" class="form-control form-control-solid" placeholder="Enter Target Title" name="doctor_id" value="{{ $doctor->doctor_id }}" />
                                                        <!--end::Datepicker-->
                                                    </div>
                                                    <!--end::Input-->
                                                </div>
                                                <!--end::Col-->
                                                <!--begin::Col-->
                                                <div class="col-md-6 fv-row">
                                                    <label class="required fs-6 fw-semibold mb-2">تخصص الطبيب</label>
                                                    <select class="form-select form-select-solid" data-control="select2" data-hide-search="true" data-placeholder="Select a Team Member" name="doctor_specialty" value="{{ $doctor->doctor_specialty }}">
                                                        @foreach ($doctor_specialty as $specialty)
                                                        <option value="{{ $specialty->id }}">{{ $specialty->Specialties_name }}</option>
                                                        @endforeach
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
                                                    <label class="required fs-6 fw-semibold">رقم هاتف الطبيب</label><br>
                                                </div>
                                                <!--end::Label-->
                                                <!--begin::Switch-->
                                                <input type="text" class="form-control form-control-solid" name="doctor_phone" value="{{ $doctor->doctor_phone }}">
                                                <!--end::Switch-->
                                            </div>
                                            <div class="col flex-stack mb-8">
                                                <!--begin::Label-->
                                                <div class="me-5">
                                                    <label class="required fs-6 fw-semibold">ايميل الطبيب</label><br>
                                                </div>
                                                <!--end::Label-->
                                                <!--begin::Switch-->
                                                <input type="text" class="form-control form-control-solid" name="email" value="{{ $doctor->email }}">
                                                <!--end::Switch-->
                                            </div>
                                        </div>
                                            <!--end::Input group-->
                                            <!--begin::Input group-->
                                            <div class="row">
                                                <div class="col flex-stack mb-8">
                                                    <!--begin::Label-->
                                                    <div class="me-5">
                                                        <label class="required fs-6 fw-semibold">جنس الطبيب</label><br>
                                                    </div>
                                                    <!--end::Label-->
                                                    <!--begin::Switch-->
                                                    <select class="form-select form-select-solid" name="doctor_gender" value="{{ $doctor->doctor_gender }}">
                                                        <option value="ذكر">ذكر</option>
                                                        <option value="انثى">انثى</option>
                                                    </select>
                                                    <!--end::Switch-->
                                                </div>
                                                <div class="col flex-stack mb-8">
                                                    <!--begin::Label-->
                                                    <div class="me-5">
                                                        <label class="required form-control">تاريخ ميلاد الطبيب</label><br>
                                                    </div>
                                                    <!--end::Label-->
                                                    <!--begin::Switch-->
                                                    <input type="date" class="form-control form-control-solid" name="doctor_birthday" value="{{ $doctor->doctor_birthday }}">
                                                    <!--end::Switch-->
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col flex-stack mb-8">
                                                    <!--begin::Label-->
                                                    <div class="me-5">

                                                        <label class="required fs-6 fw-semibold">تاريخ بدء العقد</label><br>
                                                    </div>
                                                    <!--end::Label-->
                                                    <!--begin::Switch-->
                                                    <input type="date" class="form-control form-control-solid" name="Date_of_contract" value="{{ $doctor->Date_of_contract }}">

                                                    <!--end::Switch-->
                                                </div>
                                                <div class="col flex-stack mb-8">
                                                    <!--begin::Label-->
                                                    <div class="me-5">
                                                        <label class="required fs-6 fw-semibold">تاريخ انتهاء العقد</label><br>
                                                    </div>
                                                    <!--end::Label-->
                                                    <!--begin::Switch-->
                                                    <input type="date" class="form-control form-control-solid" name="Contract_expiry_date" value="{{ $doctor->Contract_expiry_date }}">
                                                    <!--end::Switch-->
                                                </div>
                                            </div>
                                            <!--end::Input group-->
                                            <div class="d-flex flex-column mb-8">
                                                <label class="fs-6 fw-semibold mb-2">اضافة ملاحظات</label>
                                                <textarea class="form-control form-control-solid" rows="3" name="note" >{{ $doctor->note }}</textarea>
                                            </div>
                                            <!--begin::Image input-->
                                    <div class="image-input image-input-empty" data-kt-image-input="true" style="background-image: url(/assets/media/svg/avatars/blank.svg)">
                                        <!--begin::Image preview wrapper-->
                                        <div class="image-input-wrapper w-125px h-125px"></div>
                                        <!--end::Image preview wrapper-->

                                        <!--begin::Edit button-->
                                        <label class="btn btn-icon btn-circle btn-color-muted btn-active-color-primary w-25px h-25px bg-body shadow"
                                        data-kt-image-input-action="change"
                                        data-bs-toggle="tooltip"
                                        data-bs-dismiss="click"
                                        title="Change avatar">
                                            <i class="bi bi-pencil-fill fs-7"></i>

                                            <!--begin::Inputs-->
                                            <input type="file"  accept="image/*" name="photos[]" multiple>
                                            <input type="hidden" name="" >
                                            <!--end::Inputs-->
                                        </label>
                                        <!--end::Edit button-->

                                        <!--begin::Cancel button-->
                                        <span class="btn btn-icon btn-circle btn-color-muted btn-active-color-primary w-25px h-25px bg-body shadow"
                                        data-kt-image-input-action="cancel"
                                        data-bs-toggle="tooltip"
                                        data-bs-dismiss="click"
                                        title="Cancel avatar">
                                            <i class="bi bi-x fs-2"></i>
                                        </span>
                                        <!--end::Cancel button-->

                                        <!--begin::Remove button-->
                                        <span class="btn btn-icon btn-circle btn-color-muted btn-active-color-primary w-25px h-25px bg-body shadow"
                                        data-kt-image-input-action="remove"
                                        data-bs-toggle="tooltip"
                                        data-bs-dismiss="click"
                                        title="Remove avatar">
                                            <i class="bi bi-x fs-2"></i>
                                        </span>
                                        <!--end::Remove button-->
                                    </div>
                                    <!--end::Image input-->
                                            <!--begin::Actions-->
                                            <div class="text-center">
                                                <button type="reset" data-dismiss="modal" class="btn btn-light me-3">Cancel</button>
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

                    </form>
                </div>
                <!--end::Modal content-->
            </div>
            <!--end::Modal dialog-->
        </div>
				<!-- end_edit_modal_Grade -->


				<!-- delete_modal_Grade -->
				<div class="modal fade" id="delete{{ $doctor->id }}" tabindex="-1" role="dialog"
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
								<form action="{{ route('doctor.destroy',$doctor->id) }}"  method="post">
									{{ method_field('DELETE') }}
									@csrf
									هل تريد حذف الطبيب :
									<input id="id" type="hidden" name="id" class="form-control"
										   value="">
                                           <input id="id" type="twxt" name="id" class="form-control"
										   value="{{ $doctor->name }}">
									<div class="modal-footer">
										<button type="button" class="btn btn-secondary"
												data-dismiss="modal">لا</button>
										<button type="submit"
												class="btn btn-danger">نعم , متأكد</button>
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

				<!-- end_delete_modal_Grade -->
















<form action="{{ route('doctor.store') }}" method="post" autocomplete="off" enctype="multipart/form-data">
    @csrf
    @method('POST')
    <div class="modal fade" id="kt_modal_new_target" tabindex="-1" aria-modal="true" >
        <!--begin::Modal dialog-->
        <div class="modal-dialog modal-dialog-centered mw-700px">
    <div class="modal-content">
        <!--begin::Modal header-->
        <div class="modal-header">
            <!--begin::Modal title-->
            <h2 class="fw-bold">اضافة طبيب جديد</h2>
            <!--end::Modal title-->
            <!--begin::Close-->
            <div class="btn btn-icon btn-sm btn-active-icon-primary" data-kt-users-modal-action="close">
                <!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
                <span class="svg-icon svg-icon-1">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="currentColor"></rect>
                        <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="currentColor"></rect>
                    </svg>
                </span>
                <!--end::Svg Icon-->
            </div>
            <!--end::Close-->
        </div>
        <!--end::Modal header-->
        <!--begin::Modal body-->
        <div class="modal-body scroll-y mx-5 mx-xl-15 my-7">
            <!--begin::Form-->
            <form id="kt_modal_add_user_form" class="form fv-plugins-bootstrap5 fv-plugins-framework" action="#">
                <!--begin::Scroll-->
                <div class="d-flex flex-column scroll-y me-n7 pe-7" id="kt_modal_add_user_scroll" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_modal_add_user_header" data-kt-scroll-wrappers="#kt_modal_add_user_scroll" data-kt-scroll-offset="300px" style="max-height: 280px;">
                    <!--begin::Input group-->
                    <!--begin::Image input-->
                    <div class="row" style="padding: 1cm">
                        <div class="col">
                            <!--begin::Label-->
                            <label class="required fw-semibold fs-6 mb-2">اسم الطبيب</label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <input type="text" name="name" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="  اسم الطبيب" >
                            <!--end::Input-->
                        <div class="fv-plugins-message-container invalid-feedback"></div>
                    </div>
                    <div class="col">
 <!--begin::Image input-->
 <div class="image-input image-input-circle" data-kt-image-input="true" style="background-image: url(/assets/media/svg/avatars/blank.svg)">
    <!--begin::Image preview wrapper-->
    <div class="image-input-wrapper w-125px h-125px" style="background-image: url(https://cdn.pixabay.com/photo/2017/11/10/05/24/add-2935429_960_720.png)"></div>
    <!--end::Image preview wrapper-->

    <!--begin::Edit button-->
    <label class="btn btn-icon btn-circle btn-color-muted btn-active-color-primary w-25px h-25px bg-body shadow"
       data-kt-image-input-action="change"
       data-bs-toggle="tooltip"
       data-bs-dismiss="click"
       title="Change avatar">
        <i class="bi bi-pencil-fill fs-7"></i>

        <!--begin::Inputs-->
        <input type="file" name="photos" accept=".png, .jpg, .jpeg" />
        <input type="hidden" name="avatar_remove" />
        <!--end::Inputs-->
    </label>
    <!--end::Edit button-->

    <!--begin::Cancel button-->
    <span class="btn btn-icon btn-circle btn-color-muted btn-active-color-primary w-25px h-25px bg-body shadow"
       data-kt-image-input-action="cancel"
       data-bs-toggle="tooltip"
       data-bs-dismiss="click"
       title="Cancel avatar">
        <i class="bi bi-x fs-2"></i>
    </span>
    <!--end::Cancel button-->

    <!--begin::Remove button-->
    <span class="btn btn-icon btn-circle btn-color-muted btn-active-color-primary w-25px h-25px bg-body shadow"
       data-kt-image-input-action="remove"
       data-bs-toggle="tooltip"
       data-bs-dismiss="click"
       title="Remove avatar">
        <i class="bi bi-x fs-2"></i>
    </span>
    <!--end::Remove button-->
</div>
<!--end::Image input-->
</div>
<!--end::Image input-->
                    <!--end::Input group-->
                    <!--begin::Input group-->

            </div>
                    <!--end::Input group-->
                    <!--begin::Input group-->
                    <div class="fv-row mb-7 fv-plugins-icon-container">
                        <!--begin::Label-->
                        <label class="required fw-semibold fs-6 mb-2">ايميل</label>
                        <!--end::Label-->
                        <!--begin::Input-->
                        <input type="email" name="email" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="example@domain.com" value="smith@kpmg.com">
                        <!--end::Input-->
                    <div class="fv-plugins-message-container invalid-feedback"></div></div>
                    <!--end::Input group-->
                    <!--begin::Input group-->
                    <div class="mb-7">
                        <!--begin::Label-->
                        <div class="row g-9 mb-8">

    <!--begin::Col-->
    <div class="col-md-6 fv-row">

    <label class="required fs-6 fw-semibold mb-2">رقم هوية الطبيب</label>
    <!--begin::Input-->
    <div class="position-relative d-flex align-items-center">
    <!--begin::Icon-->
    <!--begin::Svg Icon | path: icons/duotune/general/gen014.svg-->

    </span>
    <!--end::Svg Icon-->
    <!--end::Icon-->
    <!--begin::Datepicker-->

    <input type="text" class="form-control form-control-solid" placeholder="Enter Target Title" name="doctor_id" placeholder="  رقم هوية الطبيب" />
    <!--end::Datepicker-->
    </div>
    <!--end::Input-->
    </div>
    <!--end::Col-->
    <!--begin::Col-->
    <div class="col-md-6 fv-row">
    <label class="required fs-6 fw-semibold mb-2">تخصص الطبيب</label>
    <select class="form-select form-select-solid" data-control="select2" data-hide-search="true" data-placeholder="تخصص الدكتور" name="doctor_specialty">
    @foreach ($doctor_specialty as $specialty)
    <option value="{{ $specialty->id }}">{{ $specialty->Specialties_name }}</option>
    @endforeach
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
    <label class="required fs-6 fw-semibold">رقم هاتف الطبيب</label><br>
    </div>
    <!--end::Label-->
    <!--begin::Switch-->
    <input type="text" class="form-control form-control-solid" name="doctor_phone" placeholder="  رقم هاتف الطبيب">
    <!--end::Switch-->
    </div>
    <div class="col flex-stack mb-8">
    <!--begin::Label-->
    <div class="me-5">
    <label class="required fs-6 fw-semibold">ايميل الطبيب</label><br>
    </div>
    <!--end::Label-->
    <!--begin::Switch-->
    <input type="text" class="form-control form-control-solid" name="email" placeholder="  ايميل الطبيب">
    <!--end::Switch-->
    </div>
    </div>
    <!--end::Input group-->
    <!--begin::Input group-->
    <div class="row">
    <div class="col flex-stack mb-8">
    <!--begin::Label-->
    <div class="me-5">
    <label class="required fs-6 fw-semibold">جنس الطبيب</label><br>
    </div>
    <!--end::Label-->
    <!--begin::Switch-->
    <select class="form-select form-select-solid" name="doctor_gender">
    <option value="ذكر">ذكر</option>
    <option value="انثى">انثى</option>
    </select>
    <!--end::Switch-->
    </div>
    <div class="col flex-stack mb-8">
    <!--begin::Label-->
    <div class="me-5">
    <label class="required fs-6 fw-semibold">تاريخ ميلاد الطبيب</label><br>
    </div>
    <!--end::Label-->
    <!--begin::Switch-->
    <input type="date" class="form-control form-control-solid" name="doctor_birthday">
    <!--end::Switch-->
    </div>
    </div>
    <div class="row">
    <div class="col flex-stack mb-8">
    <!--begin::Label-->
    <div class="me-5">

    <label class="required fs-6 fw-semibold">تاريخ بدء العقد</label><br>
    </div>
    <!--end::Label-->
    <!--begin::Switch-->
    <input type="date" class="form-control form-control-solid" name="Date_of_contract">

    <!--end::Switch-->
    </div>
    <div class="col flex-stack mb-8">
    <!--begin::Label-->
    <div class="me-5">
    <label class="required fs-6 fw-semibold">تاريخ انتهاء العقد</label><br>
    </div>
    <!--end::Label-->
    <!--begin::Switch-->
    <input type="date" class="form-control form-control-solid" name="Contract_expiry_date">
    <!--end::Switch-->
    </div>
    </div>
    <!--end::Input group-->
    <div class="d-flex flex-column mb-8">
    <label class="fs-6 fw-semibold mb-2">اضافة ملاحظات</label>
    <textarea class="form-control form-control-solid" rows="3" name="note" placeholder="اضافة ملاحظات"></textarea>
    </div>
    <!--begin::Image input-->
    <h3>اضافة cv</h3>

 <div class="image-input image-input-empty" data-kt-image-input="true" style="background-image: url(/assets/media/svg/avatars/blank.svg)">
    <!--begin::Image preview wrapper-->
    <div class="image-input-wrapper w-125px h-125px"></div>
    <!--end::Image preview wrapper-->
    <!--begin::Edit button-->
    <label class="btn btn-icon btn-circle btn-color-muted btn-active-color-primary w-25px h-25px bg-body shadow"
       data-kt-image-input-action="change"
       data-bs-toggle="tooltip"
       data-bs-dismiss="click"
       title="Change avatar">
        <i class="bi bi-pencil-fill fs-7"></i>

        <!--begin::Inputs-->
        <input type="file" name="cv" accept=".png, .jpg, .jpeg" multiple/>
        <input type="hidden" name="" />
        <!--end::Inputs-->
    </label>
    <!--end::Edit button-->

    <!--begin::Cancel button-->
    <span class="btn btn-icon btn-circle btn-color-muted btn-active-color-primary w-25px h-25px bg-body shadow"
       data-kt-image-input-action="cancel"
       data-bs-toggle="tooltip"
       data-bs-dismiss="click"
       title="Cancel avatar">
        <i class="bi bi-x fs-2"></i>
    </span>
    <!--end::Cancel button-->

    <!--begin::Remove button-->
    <span class="btn btn-icon btn-circle btn-color-muted btn-active-color-primary w-25px h-25px bg-body shadow"
       data-kt-image-input-action="remove"
       data-bs-toggle="tooltip"
       data-bs-dismiss="click"
       title="Remove avatar">
        <i class="bi bi-x fs-2"></i>
    </span>
    <!--end::Remove button-->
</div>
<!--end::Image input-->
                            <!--end::Radio-->
                        </div>
                        <!--end::Input row-->
                        <!--end::Roles-->
                    </div>
                    <!--end::Input group-->
                </div>
                <!--end::Scroll-->
                <!--begin::Actions-->
                <div class="text-center" style="padding: 0.5cm">
                    <button type="reset" class="btn btn-light me-3">Discard</button>
                    <button type="submit" class="btn btn-primary" data-kt-users-modal-action="submit">
                        <span class="indicator-label">Submit</span>
                        <span class="indicator-progress">Please wait...
                        <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                    </button>
                </div>
                <!--end::Actions-->

            <!--end::Form-->
        </div>
        <!--end::Modal body-->
    </div>
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
{{-- <script>
    var myDropzone = new Dropzone("#kt_dropzonejs_example_1", {
    url: "", // Set the url for your upload script location
    paramName: "file", // The name that will be used to transfer the file
    maxFiles: 10,
    maxFilesize: 10, // MB
    addRemoveLinks: true,
    accept: function(file, done) {
        if (file.name == "wow.jpg") {
            done("Naha, you don't.");
        } else {
            done();
        }
    }
});
</script> --}}
