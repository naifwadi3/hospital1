@extends('layout.dashboard')
@section('css')


<div style="padding: 1cm">

@section('co')

@if ($errors->any())
<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close" >
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif



<div style="padding-left: 1cm" class="card">
    <div class="card">

        <div>
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#kt_modal_2">
        اضافة قسم جديد <i class="bi bi-plus"></i>
    </button>
</div>

</div>

    <div class="col-md-12 mb-30" style="padding: 2cm">
        <div class="table-responsive">
            <table id="kt_datatable_dom_positioning" class="table table-striped table-row-bordered gy-5 gs-7 border rounded">
                <thead>
        <tr class="fw-bold fs-6 text-gray-800 px-7">
                <th scope="col">#</th>
                <th scope="col">رقم الصنف</th>
                <th scope="col">اسم الصنف</th>
                <th scope="col">اسم القسم</th>
                <th scope="col">العمليات</th>
              </tr>
            </thead>
            <tbody>
                @php
                    $i=1;
                @endphp
                @foreach ($store as $stores)

              <tr>
                <th>{{ $i++ }}</th>
                <td>{{ $stores->class_id }}</td>
                <td>{{ $stores->class_name }}</td>
                <td>{{ $stores->section_name }}</td>
                <td>
                    <button type="button" class="btn btn-info btn-sm" data-bs-toggle="modal"
                        data-bs-target="#edit{{ $stores->id }}"
                        title="{{ trans('Grades_trans.Edit') }}"><i class="fa fa-edit"></i></button>
                    <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal"
                        data-bs-target="#delete{{ $stores->id }}"
                        title="{{ trans('Grades_trans.Delete') }}"><i
                            class="fa fa-trash"></i></button>
                </td>
                </tr>





                <div class="modal fade" tabindex="-1" id="edit{{ $stores->id }}">
                    <div class="modal-dialog modal-lg">
                        <br><br><br><br>
                        <div class="modal-content rounded">
                            <div class="modal-header">
                                <h3 class="modal-title" >اضافة صنف</h3>

                                <!--begin::Close-->

                                <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
                                    <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
                                    width="30" height="30"
                                    viewBox="0 0 30 30"
                                    style=" fill:#1A1A1A;">    <path d="M 7 4 C 6.744125 4 6.4879687 4.0974687 6.2929688 4.2929688 L 4.2929688 6.2929688 C 3.9019687 6.6839688 3.9019687 7.3170313 4.2929688 7.7070312 L 11.585938 15 L 4.2929688 22.292969 C 3.9019687 22.683969 3.9019687 23.317031 4.2929688 23.707031 L 6.2929688 25.707031 C 6.6839688 26.098031 7.3170313 26.098031 7.7070312 25.707031 L 15 18.414062 L 22.292969 25.707031 C 22.682969 26.098031 23.317031 26.098031 23.707031 25.707031 L 25.707031 23.707031 C 26.098031 23.316031 26.098031 22.682969 25.707031 22.292969 L 18.414062 15 L 25.707031 7.7070312 C 26.098031 7.3170312 26.098031 6.6829688 25.707031 6.2929688 L 23.707031 4.2929688 C 23.316031 3.9019687 22.682969 3.9019687 22.292969 4.2929688 L 15 11.585938 L 7.7070312 4.2929688 C 7.5115312 4.0974687 7.255875 4 7 4 z"></path></svg>                </div>
                                <!--end::Close-->
                            </div>
                            <form action="{{ route('stores.update',$stores->id) }}" method="post">
                                @csrf
                                @method('PUT')
                            <br><br>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col">
                                        <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                                            <span class="required">رقم الصنف</span>
                                            <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" aria-label="Specify a target name for future usage and reference" data-kt-initialized="1"></i>
                                        </label>
                                        <!--end::Label-->
                                        <input type="text" class="form-control form-control-solid" placeholder="Enter Target Title" name="class_id" value="{{ $stores->class_id }}">
                                    <div class="fv-plugins-message-container invalid-feedback"></div>
                                    </div>
                                    <div class="col">
                                        <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                                            <span class="required">اسم الصنف</span>
                                            <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" aria-label="Specify a target name for future usage and reference" data-kt-initialized="1"></i>
                                        </label>
                                        <!--end::Label-->
                                        <input type="text" class="form-control form-control-solid" placeholder="Enter Target Title" name="class_name" value="{{ $stores->class_name }}">
                                    <div class="fv-plugins-message-container invalid-feedback"></div>
                                    </div>

                                    <div class="col">
                                        <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                                            <span class="required">اسم القسم</span>
                                            <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" aria-label="Specify a target name for future usage and reference" data-kt-initialized="1"></i>
                                        </label>
                                        <!--end::Label-->
                                        <input type="text" class="form-control form-control-solid" placeholder="Enter Target Title" name="section_name" value="{{ $stores->section_name }}">
                                    <div class="fv-plugins-message-container invalid-feedback"></div>
                                    </div>
                                    </div>
                                    <br>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save changes</button>
                            </div>
                        </div>
                    </form>

                    </div>
                </div>

                </div>




                <div class="modal fade" id="delete{{ $stores->id }}" tabindex="-1" role="dialog"
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
								<form action="{{ route('stores.destroy',$stores->id) }}"
									  method="post">
									{{ method_field('DELETE') }}
									@csrf
									هل أنت متاكد من حذف
									<h5 id="id" type="text" name="stores_name" class="form-control"
										   value="{{ $stores->stores_name }}">{{ $stores->stores_name }}</h5>
									<div class="modal-footer">
                                        <input id="id" type="hidden" name="stores_number" class="form-control"
										   value="{{ $stores->stores_number }}">
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

<form action="{{ route('stores.store') }}" method="post">
    @csrf
    @method('POST')


<div class="modal fade" tabindex="-1" id="kt_modal_2">
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
            <br><br>
            <div class="modal-body">
                <div class="row">
                    <div class="col">
                        <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                            <span class="required">رقم الصنف</span>
                            <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" aria-label="Specify a target name for future usage and reference" data-kt-initialized="1"></i>
                        </label>
                        <!--end::Label-->
                        <input type="text" class="form-control form-control-solid" placeholder="Enter Target Title" name="class_id" value="">
                    <div class="fv-plugins-message-container invalid-feedback"></div>
                    </div>
                    <div class="col">
                        <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                            <span class="required">اسم الصنف</span>
                            <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" aria-label="Specify a target name for future usage and reference" data-kt-initialized="1"></i>
                        </label>
                        <!--end::Label-->
                        <input type="text" class="form-control form-control-solid" placeholder="Enter Target Title" name="class_name" value="">
                    <div class="fv-plugins-message-container invalid-feedback"></div>
                    </div>
                    <div class="col">
                        <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                            <span class="required">اسم القسم</span>
                            <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" aria-label="Specify a target name for future usage and reference" data-kt-initialized="1"></i>
                        </label>
                        <!--end::Label-->
                        <input type="text" class="form-control form-control-solid" placeholder="Enter Target Title" name="section_name" value="">
                    <div class="fv-plugins-message-container invalid-feedback"></div>
                    </div>
                    </div>
                    <br>

            <div class="modal-footer">
                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>

</div>

</form>

</div>
</div>
</div>



@endsection
@section('js')

@endsection
