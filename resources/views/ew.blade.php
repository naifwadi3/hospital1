@extends('layout.dashboard')
@section('css')



@section('co')

<div style="padding: 1cm">
    <div style="padding-left: 1cm">
        <button type="button" class="btn btn-primary"><a style="text-decoration: none;color:white" href="" >إضافة ممرض جديد </a><i class="bi bi-plus"></i></button>
    </div>

    <div style="padding: 1cm">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        </div>

                    <div class="card-body">
                        <form action="#" method="post" class="form">
                            @csrf
                            <div class="row">
                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="customer_name">اسم المريض</label>
                                        <select class="form-select form-select-solid" data-control="select2" data-hide-search="true" data-placeholder="Select a Team Member" name="patient_id">

                                        </select>
                                        @error('customer_name')<span class="help-block text-danger">{{ $message }}</span>@enderror
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="customer_email">ايميل المريض</label>
                                        <input type="email" name="customer_email" class="form-control">
                                        @error('customer_email')<span class="help-block text-danger">{{ $message }}</span>@enderror
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="customer_mobile">رقم هاتف المريض</label>
                                        <input type="text" name="customer_mobile" class="form-control">
                                        @error('customer_mobile')<span class="help-block text-danger">{{ $message }}</span>@enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="company_name">رقم العملية</label>
                                        <input type="text" name="company_name" class="form-control">
                                        @error('company_name')<span class="help-block text-danger">{{ $message }}</span>@enderror
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="invoice_number">رقم اي حاجة</label>
                                        <input type="text" name="invoice_number" class="form-control">
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
                                            <input type="text" name="product_name[0]" id="product_name" class="product_name form-control">
                                            @error('product_name')<span class="help-block text-danger">{{ $message }}</span>@enderror
                                        </td>
                                        <td>
                                            <select name="unit[0]" id="unit" class="unit form-control">
                                                <option></option>
                                                <option value="piece">{{ __('Frontend/frontend.piece') }}</option>
                                                <option value="g">{{ __('Frontend/frontend.gram') }}</option>
                                                <option value="kg">{{ __('Frontend/frontend.kilo_gram') }}</option>
                                            </select>
                                            @error('unit')<span class="help-block text-danger">{{ $message }}</span>@enderror
                                        </td>
                                        <td>
                                            <input type="number" name="quantity[0]" step="0.01" id="quantity" class="quantity form-control">
                                            @error('quantity')<span class="help-block text-danger">{{ $message }}</span>@enderror
                                        </td>
                                        <td>
                                            <input type="number" name="unit_price[0]" step="0.01" id="unit_price" class="unit_price form-control">
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


    </div>

    </div>







@section('js')
@endsection

@endsection
