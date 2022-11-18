@extends('layout.dashboard')
@section('css')

@section('tit')
الفواتير
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

<a href="#">روح ةين مابد يا كبير</a>
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
                <th scope="col">اسم الفاتورة</th>
                <th scope="col">المبلغ</th>
                <th scope="col">العمليات</th>
		</thead>
		<tbody>

@php
	$i=0;
@endphp
@foreach ( $fee as $fees )

				<tr>
					<?php $i++; ?>

					<td><input type="checkbox"  value="" class="box1" ></td>
					<td>{{ $i }}</td>
					<td>{{ $fees->name }}</td>
					<td>{{ $fees->amount }}</td>
					<td>
						<button type="button" class="btn btn-info btn-xl" data-bs-toggle="modal"
							data-bs-target="#edit{{ $fees->id }}"
							title="تعديل"><i class="fa fa-edit"></i></button>
						<button type="button" class="btn btn-danger btn-xl" data-bs-toggle="modal"
							data-bs-target="#delete{{ $fees->id }}"
							title="حذف"><i
								class="fa fa-trash"></i></button>
                                <button type="button" class="btn btn-danger btn-xl" data-bs-toggle="modal"
							data-bs-target="#show"
							title="عرض"><i class="fa-solid fa-eye"></i></button>
					</td>

				</tr>


				<!-- edit_modal_Grade -->

                    <div  class="row">
                <div class="modal fade" id="edit{{ $fees->id }}" tabindex="-1" aria-hidden="true">
                            <!--begin::Modal dialog-->
                            <div class="modal-dialog mw-950px">
                                <!--begin::Modal content-->
                                <div class="modal-content">
                                    <form action="{{ route('fee.update',$fees->id) }}" method="post">
                                        @csrf
                                        @method('PUT')
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
                                    <div class="mb-13 text-center">
                                        <!--begin::Title-->
                                        <h1 class="mb-3">إضافة ممرض جديد</h1>
                                        <!--end::Title-->
                                        <!--begin::Description-->
                                        <div class="text-muted fw-semibold fs-5">اذا لم يكن التخصص موجود فيمكنك اضافته من
                                        <a href="#" class="fw-bold link-primary">هنا</a>.</div>
                                        <!--end::Description-->
                                    </div>
                                    <!--begin::Repeater-->
                                    <div class="row">
                                    <div class="col">
                                        <div class="col-md-3">
                                            <label class="form-label">Name:</label>
                                            <input type="text" class="form-control mb-2 mb-md-0" value="{{ $fees->name }}" placeholder="Enter full name" name="name"/>
                                        </div>
                                        <!--begin::Dialer-->
                                <div class="input-group w-md-300px"
                                data-kt-dialer="true"
                                data-kt-dialer-min="1000"
                                data-kt-dialer-max="50000"
                                data-kt-dialer-step="1000"
                                data-kt-dialer-prefix="$">

                                <!--begin::Decrease control-->
                                <button class="btn btn-icon btn-outline btn-active-color-primary" type="button" data-kt-dialer-control="decrease">
                                    <i class="bi bi-dash fs-1"></i>
                                </button>
                                <!--end::Decrease control-->

                                <!--begin::Input control-->
                                <input type="text" class="form-control"   data-kt-dialer-control="input" value="{{ $fees->amount }}" name="amount"/>
                                <!--end::Input control-->

                                <!--begin::Increase control-->
                                <button class="btn btn-icon btn-outline btn-active-color-primary" type="button" data-kt-dialer-control="increase">
                                    <i class="bi bi-plus fs-1"></i>
                                </button>
                                <!--end::Increase control-->
                                </div>
                                <!--end::Dialer-->
                                                    </div></div>

                    <div class="text-center" style="padding-bottom: 1cm">
                        <button type="reset" id="kt_modal_new_target_cancel" class="btn btn-light me-3">Cancel</button>
                        <button type="submit" id="" class="btn btn-primary">
                            <span class="">Submit</span>
                            <span class="indicator-progress">Please wait...
                            <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                        </button>
                    </div>
                    <!--end::Form group-->
                </div>
                <!--end::Repeater-->
                <!--end::Repeater-->
                <!--end::Repeater-->

            </form>

                                </div></div></div>
                                            <!--end::Actions-->
                                            <div class="modal fade" id="delete{{ $fees->id }}" tabindex="-1" role="dialog"
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
                                                           <form action="{{ route('fee.destroy',$fees->id) }}"
                                                                 method="post">
                                                               {{ method_field('DELETE') }}
                                                               @csrf
                                                               هل تريد حذف المريض :
                                                               <input id="id" type="text" name="id" class="form-control"
                                                                      value="{{ $fees->name }}">
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
</div>

</div>










<form action="{{ route('fee.store') }}" method="post">
    @csrf
    @method('POST')
    <div  class="row">
<div class="modal fade" id="kt_modal_new_target" tabindex="-1" aria-hidden="true">
			<!--begin::Modal dialog-->
			<div class="modal-dialog mw-950px">
				<!--begin::Modal content-->
				<div class="modal-content">
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
                    <div class="mb-13 text-center">
                        <!--begin::Title-->
                        <h1 class="mb-3">إضافة ممرض جديد</h1>
                        <!--end::Title-->
                        <!--begin::Description-->
                        <div class="text-muted fw-semibold fs-5">اذا لم يكن التخصص موجود فيمكنك اضافته من
                        <a href="#" class="fw-bold link-primary">هنا</a>.</div>
                        <!--end::Description-->
                    </div>
					<!--begin::Repeater-->
                    <div class="row">
                    <div class="col">
                        <div class="col-md-3">
                            <label class="form-label">Name:</label>
                            <input type="text" class="form-control mb-2 mb-md-0" placeholder="Enter full name" name="name"/>
                        </div>
                        <!--begin::Dialer-->
                <div class="input-group w-md-300px"
                data-kt-dialer="true"
                data-kt-dialer-min="1000"
                data-kt-dialer-max="50000"
                data-kt-dialer-step="1000"
                data-kt-dialer-prefix="$">

                <!--begin::Decrease control-->
                <button class="btn btn-icon btn-outline btn-active-color-primary" type="button" data-kt-dialer-control="decrease">
                    <i class="bi bi-dash fs-1"></i>
                </button>
                <!--end::Decrease control-->

                <!--begin::Input control-->
                <input type="text" class="form-control"   data-kt-dialer-control="input" name="amount"/>
                <!--end::Input control-->

                <!--begin::Increase control-->
                <button class="btn btn-icon btn-outline btn-active-color-primary" type="button" data-kt-dialer-control="increase">
                    <i class="bi bi-plus fs-1"></i>
                </button>
                <!--end::Increase control-->
                </div>
                <!--end::Dialer-->
                                    </div></div>

    <div class="text-center" style="padding-bottom: 1cm">
        <button type="reset" id="kt_modal_new_target_cancel" class="btn btn-light me-3">Cancel</button>
        <button type="submit" id="" class="btn btn-primary">
            <span class="">Submit</span>
            <span class="indicator-progress">Please wait...
            <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
        </button>
    </div>
    <!--end::Form group-->
</div>
<!--end::Repeater-->
<!--end::Repeater-->
<!--end::Repeater-->


                </div></div>
							<!--end::Actions-->
                        </form>

						<!--end:Form-->





@endsection
@section('js')

@endsection
