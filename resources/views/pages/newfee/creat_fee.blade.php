@extends('layout.dashboard')
@section('css')
<link rel="stylesheet" href="{{ asset('frontend/css/pickadate/classic.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/pickadate/classic.date.css') }}">
    @if(config('app.locale') == 'ar')
        <link rel="stylesheet" href="{{ asset('frontend/css/pickadate/rtl.css') }}">
    @endif
    <style>
        form.form label.error, label.error {
            color: red;
            font-style: italic;
        }
    </style>
@endsection

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

<div style="padding: 1.5cm;padding-left:3cm;padding-right:3cm">
<div class="row justify-content-center">
    <div class="col-12">


            <div class="card-body">
                <form action="{{ route('st_invoice') }}" method="post" class="form">
                    @csrf
                    <div class="row">
                        <div class="col-4">
                            <div class="form-group">
                                <label for="patient_id">اسم المريض</label>
                                <select class="form-select form-select-solid" data-control="select2" data-hide-search="true" data-placeholder="Select a Team Member" name="patient_id">
                                    @foreach ($patient as $patients)
                                    <option value="{{ $patients->id }}">{{ $patients->patient_name }}</option>
                                    @endforeach
                                </select>
                                @error('patient_id')<span class="help-block text-danger">{{ $message }}</span>@enderror
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <label for="patient_email">ايميل المريض</label>
                                <input type="email" name="patient_email" class="form-control">
                                @error('patient_email')<span class="help-block text-danger">{{ $message }}</span>@enderror
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <label for="customer_mobile">رقم هاتف المريض</label>
                                <input type="text" name="patient_mobile" class="form-control">
                                @error('patient_mobile')<span class="help-block text-danger">{{ $message }}</span>@enderror
                            </div>
                        </div>
                    </div>
                    <br><br>
                    <div class="row">
                        <div class="col-4">
                            <div class="form-group">
                                <label for="company_name">رقم العملية</label>
                                <input type="text" name="invoice_number" class="form-control">
                                @error('company_name')<span class="help-block text-danger">{{ $message }}</span>@enderror
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <label for="invoice_number">رقم اي حاجة</label>
                                <input type="text" name="invoice_number2" class="form-control">
                                @error('invoice_number')<span class="help-block text-danger">{{ $message }}</span>@enderror
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <label for="invoice_date">تاريخ الدفع</label>
                                <input type="text" name="invoice_date" class="form-control pickdate">
                                @error('invoice_date')<span class="help-block text-danger">{{ $message }}</span>@enderror
                            </div>
                        </div>
                    </div>
                    <br>

                    <div class="table-responsive">
                        <table class="table" id="invoice_details">
                            <thead>
                            <tr>
                                <th></th>
                                <th>اسم المنتج</th>
                                <th>النوع</th>
                                <th>الكمية</th>
                                <th>السعر</th>
                                <th>المجموع</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr class="cloning_row" id="0">
                                <td>#</td>
                                <td>

                                    <select name="product_name[0]" id="product_name" class="product_name form-control" onchange="console.log($(this).val())">
                                        @foreach ($fees as $fee )
                                        <option value="{{ $fee->id }}">{{ $fee->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('product_name')<span class="help-block text-danger">{{ $message }}</span>@enderror

                                </td>
                                <td>
                                    <select name="unit[0]" id="unit" class="unit form-control">
                                        <option></option>
                                        <option value="عدد الليالي">عدد الليالي</option>
                                        <option value="حبة">حبة</option>
                                        <option value="كميات اخرى">كميات اخرى</option>
                                    </select>
                                    @error('unit')<span class="help-block text-danger">{{ $message }}</span>@enderror
                                </td>
                                <td>
                                    <input type="number" name="quantity[0]" step="0.01" id="quantity" class="quantity form-control">
                                    @error('quantity')<span class="help-block text-danger">{{ $message }}</span>@enderror
                                </td>
                                <td>
                                    {{-- <select name="Grade_id" class="btn btn-outline-success" id=""
                                    onchange="console.log($(this).val())">
                                <!--placeholder-->
                                <option value="" selected
                                        disabled>{{ trans('Sections_trans.Select_Grade') }}
                                </option>
                                @foreach ($list_Grades as $list_Grade)
                                    <option value="{{ $list_Grade->id }}"> {{ $list_Grade->Name }}
                                    </option>
                                @endforeach --}}
                            {{-- </select> --}}


                                    <input type="number" name="unit_price[0]" step="0.01" id="unit_price" class="unit_price form-control" >
                                    {{-- <select name="unit_price[0]" step="0.01" id="unit_price" class="unit_price form-control" readonly>

                                    </select> --}}
                                    @error('unit_price')<span class="help-block text-danger">{{ $message }}</span>@enderror
                                </td>
                                <td>
                                    <input type="number" step="0.01" name="row_sub_total[0]" id="row_sub_total" class="row_sub_total form-control" readonly="readonly">
                                    @error('row_sub_total')<span class="help-block text-danger">{{ $message }}</span>@enderror
                                </td>
                            </tr>
                            </tbody>

                            <tfoot>
                            <tr>
                                <td colspan="6">
                                    <button type="button" class="btn_add btn btn-primary">اضافة المزيد</button>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="3"></td>
                                <td colspan="2">المجموع</td>
                                <td><input type="number" step="0.01" name="sub_total" id="sub_total" class="sub_total form-control" readonly="readonly"></td>
                            </tr>
                            <tr>
                                <td colspan="3"></td>
                                <td colspan="2">نسبه الخصم</td>
                                <td>
                                    <div class="input-group mb-3">
                                        <select name="discount_type" id="discount_type" class="discount_type custom-select">
                                            <option value="fixed">شيكل</option>
                                            <option value="percentage">دولار</option>
                                        </select>
                                        <div class="input-group-append">
                                            <input type="number" step="0.01" name="discount_value" id="discount_value" class="discount_value form-control" value="0.00">
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="3"></td>
                                <td colspan="2">ضريبة القيمة المضافة</td>
                                <td><input type="number" step="0.01" name="vat_value" id="vat_value" class="vat_value form-control" readonly="readonly"></td>
                            </tr>
                            <tr>
                                <td colspan="3"></td>
                                <td colspan="2">الشحن</td>
                                <td><input type="number" step="0.01" name="shipping" id="shipping" class="shipping form-control"></td>
                            </tr>
                            <tr>
                                <td colspan="3"></td>
                                <td colspan="2">الاجمالي المستحق</td>
                                <td><input type="number" step="0.01" name="total_due" id="total_due" class="total_due form-control" readonly></td>
                            </tr>
                            </tfoot>
                        </table>
                    </div>

                    <div class="text-right pt-3">
                        <button type="submit" name="save" class="btn btn-primary">حفظ الفاتورة</button>
                    </div>
                </form>
            </div>
    </div>
</div>
</div>







@section('js')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>


{{-- <script type="text/javascript">
	$(document).ready(function(){

		$(document).on('change','.product_name',function(){
			// console.log("hmm its change");

			var cat_id=$(this).val();
			// console.log(cat_id);
			var div=$(this).parent();

			var op=" ";

			$.ajax({
				type:'get',
				url:'{!!URL::to('findProductName')!!}',
				data:{'id':cat_id},
				success:function(data){
					//console.log('success');

					//console.log(data);

					//console.log(data.length);
					op+='<option value="0" selected disabled>chose product</option>';
					for(var i=0;i<data.length;i++){
					op+='<option value="'+data[i].id+'">'+data[i].productname+'</option>';
				   }

				   div.find('.productname').html(" ");
				   div.find('.productname').append(op);
				},
				error:function(){

				}
			});
		});

		$(document).on('change','.productname',function () {
			var prod_id=$(this).val();

			var a=$(this).parent();
			console.log(prod_id);
			var op="";
			$.ajax({
				type:'get',
				url:'{!!URL::to('get_fee')!!}',
				data:{'id':prod_id},
				dataType:'json',//return data will be json
				success:function(data){
					console.log("price");
					console.log(data.price);

					// here price is coloumn name in products table data.coln name

					a.find('.prod_price').val(data.price);

				},
				error:function(){

				}
			});


		});

	});
</script> --}}






<script src="{{ asset('frontend/js/form_validation/jquery.form.js') }}"></script>
<script src="{{ asset('frontend/js/form_validation/jquery.validate.min.js') }}"></script>
<script src="{{ asset('frontend/js/form_validation/additional-methods.min.js') }}"></script>
<script src="{{ asset('frontend/js/pickadate/picker.js') }}"></script>
<script src="{{ asset('frontend/js/pickadate/picker.date.js') }}"></script>
@if(config('app.locale') == 'ar')
    <script src="{{ asset('frontend/js/form_validation/messages_ar.js') }}"></script>
    <script src="{{ asset('frontend/js/pickadate/ar.js') }}"></script>
@endif
<script src="{{ asset('frontend/js/custom.js') }}"></script>

<script>
    $(document).ready(function () {
        $('select[name="product_name"]').on('change', function () {
            var product_name = $(this).val();
            if (product_name) {
                $.ajax({
                    url: "{{ URL::to('get_fee') }}/" + product_name,
                    type: "GET",
                    dataType: "json",
                    success: function (data) {
                        $('select[name="Classroom_id"]').empty();
                        $('select[name="Classroom_id"]').append('<option selected disabled >{{trans('Parent_trans.Choose')}}...</option>');
                        $.each(data, function (key, value) {
                            $('select[name="Classroom_id"]').append('<option value="' + key + '">' + value + '</option>');
                        });

                    },
                });
            }

            else {
                console.log('AJAX load did not work');
            }
        });
    });
</script>

@endsection







@endsection



