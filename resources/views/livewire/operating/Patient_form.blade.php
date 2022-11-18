@if($currentStep != 1)
    <div style="display: none" class="row setup-content" id="step-3">
        @endif
<div style="padding: 1cm">
        <div class="col-xs-12">
            <div class="col-md-12">
                <br>
                <div class="row">
                    <div class="col">
                        <div class="form-floating mb-3">
                        <select  wire:model="patient_id" class="form-select form-select-solid" id="floatingSelect" aria-label="Floating label select example">
                            @foreach ($patient as $patient)
                            <option value="{{ $patient->id }}">{{ $patient->patient_name }}</option>
                            @endforeach
                        </select>
                        <label for="floatingSelect" >اسم المريض</label>
                        </div>
                        @error('patient_id')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col">
                        <div class="form-floating mb-3">
                        <input type="text" wire:model="Operation_type"  class="form-control" id="floatingInput1" placeholder="name@example.com">
                        <label for="floatingInput1" >نوع العملية الجراحية</label>
                        </div>
                        @error('Operation_type')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <br>
                <div class="row">
                    <div class="col">
                        <div class="form-floating mb-3">
                        <input type="text" wire:model="facilities_name"  class="form-control" id="floatingInput2" placeholder="name@example.com">
                        <label for="floatingInput2" >اسم مرافق المريض</label>
                        </div>
                        @error('facilities_name')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col">
                        <div class="form-floating mb-3">
                        <input type="text" wire:model="facilities_phone"  class="form-control" id="floatingInput3" placeholder="name@example.com">
                        <label for="floatingInput3" >رقم هاتف مرافق المريض</label>
                        </div>
                        @error('facilities_phone')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                </div>

                <br>
                <br>
                <div class="row">
                    <div class="col">
                        <div class="form-floating mb-3">
                        <input type="text" wire:model="operating_room_number"  class="form-control" id="floatingInput4" placeholder="name@example.com">
                        <label for="floatingInput4" >رقم غرفة العمليات</label>
                        </div>
                        @error('operating_room_number')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col">
                        <div class="form-floating mb-3">
                        <input type="text" wire:model="recovery_room_number"  class="form-control" id="floatingInput5" placeholder="name@example.com">
                        <label for="floatingInput5" >رقم غرفة الانعاش </label>

                        </div>
                        @error('recovery_room_number')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col">
                        <div class="form-floating mb-3">
                        <input type="date" wire:model="booking_date"  class="form-control" id="floatingInput6" placeholder="name@example.com">
                        <label for="floatingInput6" >تاريخ حجز العملية</label>
                        </div>
                        @error('booking_date')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>


                </div>
                <div class="row">
                    <div class="col">
                        <div class="form-floating mb-3">
                        <input type="date" wire:model="enter_time"  class="form-control" id="floatingInput7" placeholder="name@example.com">
                        <label for="floatingInput7" >وقت دخول المريض</label>
                        </div>
                        @error('enter_time')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col">
                        <div class="form-floating mb-3">
                        <input type="date" wire:model="out_time"  class="form-control" id="floatingInput8" placeholder="name@example.com">
                        <label for="floatingInput8" >وقت خروج المريض</label>
                        </div>
                        @error('out_time')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>


                </div>
                </div>






<br>
       {{-- <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#kt_modal_new_target"  wire:click="firstStepSubmit_edit"
      >التالي
</button> --}}


        @if($updateMode)
        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#kt_modal_new_target"  wire:click="firstStepSubmit_edit"
        >التالي
        </button>
      @else
      <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#kt_modal_new_target"  wire:click="firstStepSubmit"
      >التالي
        </button>

        @endif

            </div>
        </div>
    </div>
</div>
