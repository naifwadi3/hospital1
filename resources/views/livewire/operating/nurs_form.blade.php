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

                    {{-- <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#kt_modal_new_target"  wire:click="secondStepSubmit"
                    >التالي
              </button> --}}



              @if($updateMode)

              <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#kt_modal_new_target"  wire:click="submitForm_edit"
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
