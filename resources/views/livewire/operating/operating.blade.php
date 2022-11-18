<div>
    @if (!empty($successMessage))
    <div class="alert alert-success" id="success-alert">
        <button type="button" class="close" data-dismiss="alert">x</button>
        {{ $successMessage }}
    </div>
@endif


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


<div style="padding-left: 1cm">
    <button type="button" class="btn btn-primary" wire:click="showformadd" data-bs-toggle="modal" data-bs-target="#kt_modal_new_target">
        حجز موعد موعد عمليه <i class="bi bi-plus"></i>
    </button>
</div>
<div style="padding: 1cm">

<div class="table-responsive">
    <table id="kt_datatable_dom_positioning" class="table table-striped table-row-bordered gy-5 gs-7 border rounded left">
		<thead>
            <tr class="fw-bold fs-6 text-gray-800 px-7">
				<th><input name="select_all" id="example-select-all" type="checkbox" onclick="CheckAll('box1', this)" /></th>
				<th scope="min-w-200px">#</th>
                <th scope="min-w-200px">اسم الطبيب</th>
                <th scope="min-w-200px">اسم المريض</th>
                <th scope="min-w-200px"> رقم هاتف المريض</th>
                <th scope="min-w-200px">تاريخ العملية</th>
                <th scope="min-w-200px">procesor</th>
		</thead>
		<tbody>

@php
	$i=0;
@endphp
@foreach ($op as $op )

				<tr>
					<?php $i++; ?>
					<td><input type="checkbox"  value="" class="box1" ></td>
					<td>{{ $i }}</td>
					<td>{{ $op->doctors->name }}</td>
					<td>{{ $op->Patients->patient_name }}</td>
					<td>{{ $op->Patients->patient_phone }}</td>
					<td>{{ $op->booking_date }}</td>
					<td>

                        <button wire:click="edit({{ $op->id }})" title="{{ trans('Grades_trans.Edit') }}" data-bs-toggle="modal" data-bs-target="#kt_modal_new_target"
                            class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></button>
                    <button type="button" class="btn btn-danger btn-sm" wire:click="delete({{ $op->id }})" title="{{ trans('Grades_trans.Delete') }}"><i class="fa fa-trash"></i></button>


					</td>
				</tr>
                @endforeach


	</table>
</div>

</div>


































<div class="row">

<div wire:ignore.self class="modal fade" id="kt_modal_new_target" tabindex="-1" role="dialog" aria-labelledby="StudentModalLabel" aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog modal-dialog-centered mw-1000px mw-1000 mw-1000">
        <div class="modal-content rounded">
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
                <h1 class="mb-3">حجز موعد جديد للعملية</h1>
                <!--end::Title-->
                <!--begin::Description-->
                <div class="text-muted fw-semibold fs-5">نتمنى للمريض الشفاء العاجل باذن الله
                <!--end::Description-->
            </div>
            <br>
            <div class="col">

<div class="stepper stepper-pills" id="kt_stepper_example_basic">
    <div class="stepper-nav  ">
        <div class="stepper-item mx-8 my-4 current" data-kt-stepper-element="nav">
            <div class="stepper-item mx-8 my-4 current" data-kt-stepper-element="nav">

                <div class="row">
                 <h4 class="stepper-title">
                     الخطوة الاولى
                 </h4><br>
              <div class="stepper">
                معلومات المريض و معلومات عامه
              </div>
          </div>
          <a type="button" wire:click="firstStepSubmit" data-bs-toggle="modal" data-bs-target="#kt_modal_new_target"
                class="btn btn-circle {{ $currentStep != 1 ? 'btn btn-outline btn-outline me-2 mb-2' : 'stepper-icon w-40px h-40px' }}"
               >1</a>
         </div>




        <div class="stepper-item mx-8 my-4 current" data-kt-stepper-element="nav">
           <div class="row">
                <h4 class="stepper-title">
                 الخطوة الثانية
             </h4><br>
             <div class="stepper">
                 معلومات الاطباء
             </div>
         </div>
         <a href="#step-2" type="button"
         class="btn btn-circle {{ $currentStep != 2 ? 'btn btn-outline btn-outline me-2 mb-2' : 'stepper-icon w-40px h-40px' }}"
        >2</a>
    </div>
    <div class="row">
        <h4 class="stepper-title">
         الخطوة الثالثة
     </h4>
     <br>
     <div class="stepper">
        معلومات الممرضين
     </div>
 </div>
 <a href="#step-3" type="button" disabled="disabled"
 class="btn btn-circle {{ $currentStep != 3 ? 'btn btn-outline btn-outline me-2 mb-2' : 'stepper-icon w-40px h-40px' }}">3</a>
</div>



    </div>
</div>

@include('livewire.operating.doctor_form')
@include('livewire.operating.Patient_form')
@if($currentStep != 3)
    <div style="display: none" class="row setup-content" id="step-3">
        @endif

                    <div style="padding: 1cm">
                    <div class="col-xs-12">
                    <div class="col-md-12">
                    <br>



                    <div class="row">
                    <div class="col">
                    <div class="form-floating mb-3">
                    <select  wire:model="nurss_name_1" class="form-select form-select-solid">
                        @foreach ($nurs as $nur)
                            <option value="{{ $nur->id }}">{{ $nur->name }}</option>
                        @endforeach
                    </select>
                         <label for="floatingInput" >اسم الممرض المساعد</label>
                        </div>
                        @error('nurss_name_1')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col">
                    <div class="form-floating mb-3">
                    <select  wire:model="nurss_name_2" class="form-select form-select-solid">
                        @foreach ($nurs as $nur)
                            <option value="{{ $nur->id }}">{{ $nur->name }}</option>
                        @endforeach
                    </select>
                        <label for="floatingInput" >اسم الممرض المساعد</label>
                        </div>
                        @error('nurss_name_2')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    </div>

                    <br>
                    <div class="row">
                    <div class="col">
                    <div class="form-floating mb-3">
                    <select  wire:model="nurss_name_3" class="form-select form-select-solid">
                        @foreach ($nurs as $nur)
                            <option value="{{ $nur->id }}">{{ $nur->name }}</option>
                        @endforeach
                    </select>
                        <label for="floatingInput" >اسم الممرض المساعد</label>
                        </div>
                        @error('nurss_name_3')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col">
                    <div class="form-floating mb-3">
                    <select  wire:model="nurss_name_4" class="form-select form-select-solid">
                        @foreach ($nurs as $nur)
                            <option value="{{ $nur->id }}">{{ $nur->name }}</option>
                        @endforeach
                    </select>
                        <label for="floatingInput" >اسم الممرض المساعد</label>
                        </div>
                        @error('nurss_name_4')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    </div>

                    <br>
                    <br>
                    <br>

                    @if($updateMode)

                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#kt_modal_new_target"  wire:click="submitForm_edit"
                          >التالي
                    </button>
                    @else
                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#kt_modal_new_target"  wire:click="submitForm"
                          >التالي
                    </button>

                    @endif


                    </div>
                    </div>
                    </div>
                    </div>


        </div>
    </div>
</div>
</div></div></div>

























</div>
