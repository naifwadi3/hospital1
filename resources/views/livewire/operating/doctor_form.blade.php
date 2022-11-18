@if($currentStep != 2)
    <div style="display: none" class="row setup-content" id="step-1">
        @endif
<div style="padding: 1cm">
        <div class="col-xs-12">
            <div class="col-md-12">
                <br>
                <div class="row">
                    <div class="col">
                        <div class="form-floating mb-3">
                            <select  wire:model="doctor_id_1" class="form-select form-select-solid">
                                @foreach ($doctors as $doctor)
                                <option value="{{ $doctor->id }}">{{ $doctor->name }}</option>
                                @endforeach
                            </select>
                        <label for="floatingSelect1" >اسم الطبيب (الاساسي)</label>
                        </div>
                        @error('doctor_id_1')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col">
                        <div class="form-floating mb-3">
                            <select  wire:model="doctor_id_2" class="form-select form-select-solid">
                                @foreach ($doctors as $doctor)
                                <option value="{{ $doctor->id }}">{{ $doctor->name }}</option>
                                @endforeach
                            </select>
                               <label for="floatingSelect2" >اسم الطبيب (الاساسي)</label>
                        </div>
                        @error('doctor_id_2')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <br>
                <div class="row">
                    <div class="col">
                        <div class="form-floating mb-3">
                            <select  wire:model="doctor_id_3" class="form-select form-select-solid">
                                @foreach ($doctors as $doctor)
                                <option value="{{ $doctor->id }}">{{ $doctor->name }}</option>
                                @endforeach
                            </select>
                           <label for="floatingSelect3" >اسم الطبيب (الاساسي)</label>
                        </div>
                        @error('doctor_id_3')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col">
                        <div class="form-floating mb-3">
                            <select  wire:model="doctor_id_4" class="form-select form-select-solid">
                                @foreach ($doctors as $doctor)
                                <option value="{{ $doctor->id }}">{{ $doctor->name }}</option>
                                @endforeach
                            </select>
                    <label for="floatingSelect4" >اسم الطبيب (الاساسي)</label>
                        </div>
                        @error('doctor_id_4')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <br>
                <br>







<br>
       {{-- <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#kt_modal_new_target"  wire:click="secondStepSubmit"
      >التالي
</button> --}}


            @if($updateMode)

            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#kt_modal_new_target"  wire:click="secondStepSubmit_edit"
            >التالي
            </button>
            @else
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#kt_modal_new_target"  wire:click="secondStepSubmit"
            >التالي
            </button>

            @endif




            </div>
        </div>
    </div>
</div>
