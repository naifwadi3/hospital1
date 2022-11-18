<?php

namespace App\Http\Livewire\Operating;

use App\Models\doctors;
use App\Models\nurss;
use App\Models\Operating_room_reservation;
use App\Models\Patients;
use Livewire\Component;

class Operating extends Component
{
    public $successMessage = '';

    public $catchError,$updateMode = false ,$photos,$show_table = true;

    public $currentStep=1 ,
    $patient_id,
    $facilities_name,
    $facilities_phone,
    $operating_room_number,
    $recovery_room_number,
    $booking_date,
    $enter_time,
    $out_time,
    $Operation_type,
    $doctor_id_1,
    $doctor_id_2,
    $doctor_id_3,
    $doctor_id_4,
    $nurss_name_1,
    $nurss_name_2,
    $nurss_name_3,
    $nurss_name_4;

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName, [
            'patient_id' => 'required',
            'facilities_name' => 'required',
            'facilities_phone' => 'required',
            'operating_room_number' => 'required',
            'recovery_room_number' => 'required',
            'booking_date' => 'required',
            'enter_time' => 'required',
            'out_time' => 'required',
            'Operation_type' => 'required',
        ]);
    }

    public function render()
    {
        $doctors=doctors::all();
        $nurs=nurss::all();
        $patient=Patients::all();
        $op=Operating_room_reservation::all();
        return view('livewire.operating.operating',compact('doctors','nurs','patient','op'));
    }
    public function showformadd(){
        $this->show_table = false;
    }

    public function firstStepSubmit()
    {
        $this->validate([
            'patient_id' => 'required',
            'facilities_name' => 'required',
            'facilities_phone' => 'required',
            'operating_room_number' => 'required',
            'recovery_room_number' => 'required',
            'booking_date' => 'required',
            'enter_time' => 'required',
            'out_time' => 'required',
            'Operation_type' => 'required',

        ]);

        $this->currentStep = 2;
    }

    public function secondStepSubmit()
    {
        $this->validate([
            'doctor_id_1'=>'required',
            'doctor_id_2'=>'required',
            'doctor_id_3'=>'required',
            'doctor_id_4'=>'required',

        ]);


        $this->currentStep = 3;
    }
    public function submitForm(){


            $operating = new Operating_room_reservation();
            // Father_INPUTS
            $operating->patient_id = $this->patient_id;
            $operating->facilities_name = $this->facilities_name;
            $operating->facilities_phone = $this->facilities_phone;
            $operating->Operation_type = $this->Operation_type;
            $operating->operating_room_number = $this->operating_room_number;
            $operating->recovery_room_number = $this->recovery_room_number;
            $operating->booking_date = $this->booking_date;
            $operating->enter_time = $this->enter_time;
            $operating->out_time = $this->out_time;
            // $operating->doctor_of_out = $this->doctor_of_out;
            $operating->doctor_id_1 = $this->doctor_id_1;
            $operating->doctor_id_2 = $this->doctor_id_2;
            $operating->doctor_id_3 = $this->doctor_id_3;
            $operating->doctor_id_4 = $this->doctor_id_4;
            $operating->nurss_name_1 = $this->nurss_name_1;
            $operating->nurss_name_2 = $this->nurss_name_2;
            $operating->nurss_name_3 = $this->nurss_name_3;
            $operating->nurss_name_4 = $this->nurss_name_4;
            $operating->save();
            flash()->addSuccess('تم الحفظ بنجاح');
            $this->clearForm();
            $this->currentStep = 1;


            // $operating->Religion4Father_id = $this->Re4igion_Father_id;
            // $operating->Address_4ather = $this->Addres4_Father;4
            // Mother_INPUTS
            // $operating->Name_Mother = ['en' => $this->Name_Mother_en, 'ar' => $this->Name_Mother];
            // $operating->National_ID_Mother = $this->National_ID_Mother;
            // $operating->Passport_ID_Mother = $this->Passport_ID_Mother;
            // $operating->Phone_Mother = $this->Phone_Mother;
            // $operating->Job_Mother = ['en' => $this->Job_Mother_en, 'ar' => $this->Job_Mother];
            // $operating->Passport_ID_Mother = $this->Passport_ID_Mother;
            // $operating->Nationality_Mother_id = $this->Nationality_Mother_id;
            // $operating->Blood_Type_Mother_id = $this->Blood_Type_Mother_id;
            // $operating->Religion_Mother_id = $this->Religion_Mother_id;
            // $operating->Address_Mother = $this->Address_Mother;
        }

        public function edit($id){

            $this->show_table = false;
            $this->updateMode = true;
            $operating = Operating_room_reservation::where('id',$id)->firstOrFail();
            $this->operating = $id;
            $this->patient_id =  $operating->patient_id;
            $this->facilities_name = $operating->facilities_name;
            $this->facilities_phone = $operating->facilities_phone;
            $this->Operation_type= $operating->Operation_type;
            $this->operating_room_number = $operating->operating_room_number;
            $this->recovery_room_number =$operating->recovery_room_number ;
            $this->booking_date = $operating->booking_date;
            $this->enter_time = $operating->enter_time;
            $this->out_time = $operating->out_time;
            $this->doctor_of_out = $operating->doctor_of_out;
            $this->doctor_id_1 = $operating->doctor_id_1;
            $this->doctor_id_2 = $operating->doctor_id_2;
            $this->doctor_id_3 = $operating->doctor_id_3;
            $this->doctor_id_4 = $operating->doctor_id_4;
            $this->nurss_name_1 = $operating->nurss_name_1;
            $this->nurss_name_2 = $operating->nurss_name_2;
            $this->nurss_name_3 = $operating->nurss_name_3;
            $this->nurss_name_4 = $operating->nurss_name_4;

        }

        public function firstStepSubmit_edit()
        {
            $this->updateMode = true;
            $this->currentStep = 2;

        }

        //secondStepSubmit_edit
        public function secondStepSubmit_edit()
        {
            $this->updateMode = true;
            $this->currentStep = 3;

        }

        public function submitForm_edit(){

            if ($this->operating){
                $parent = Operating_room_reservation::find($this->operating);
                $parent->update([
                    'patient_id' => $this->patient_id,
                    'facilities_name' => $this->facilities_name,
                    'facilities_phone' => $this->facilities_phone,
                    'operating_room_number' => $this->operating_room_number,
                    'recovery_room_number' => $this->recovery_room_number,
                    'booking_date' => $this->booking_date,
                    'enter_time' => $this->enter_time,
                    'out_time' => $this->out_time,
                    'doctor_of_out' => $this->doctor_of_out,
                    'doctor_id_1' => $this->doctor_id_1,
                    'doctor_id_2' => $this->doctor_id_2,
                    'doctor_id_3' => $this->doctor_id_3,
                    'doctor_id_4' => $this->doctor_id_4,
                    'nurss_name_1' => $this->nurss_name_1,
                    'nurss_name_2' => $this->nurss_name_2,
                    'nurss_name_3' => $this->nurss_name_3,
                    'nurss_name_4' => $this->nurss_name_4,

                ]);

            }

            return redirect()->to('/add_operating');
        }


    public function clearForm(){

        $this->patient_id = '';
        $this->facilities_name = '';
        $this->facilities_phone = '';
        $this->operating_room_number = '';
        $this->recovery_room_number ='' ;
        $this->booking_date = '';
        $this->enter_time = '';
        $this->out_time = '';
        $this->doctor_of_out = '';
        $this->doctor_id_1 = '';
        $this->doctor_id_2 = '';
        $this->doctor_id_3 = '';
        $this->doctor_id_4 = '';
        $this->nurss_name_1 = '';
        $this->nurss_name_2 = '';
        $this->nurss_name_3 = '';
        $this->nurss_name_4 = '';

    }

    public function delete($id){
        Operating_room_reservation::findOrFail($id)->delete();
        return redirect()->to('/add_operating');
    }
}
