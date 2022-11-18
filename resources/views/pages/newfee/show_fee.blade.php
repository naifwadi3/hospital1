@extends('layout.print')
@section('css')

@section('tit')
الفواتير
@endsection

@section('co')





<div style="padding: 1cm">

<div class="card-body">
    <div class="card-header d-flex">
        <h2>رقم الايصال {{ $invoice->invoice_number2 }}</h2>
    </div>
                    <div class="table-responsive">
                        <table class="table">
                            <tr>
                                <th>اسم المريض</th>
                                <td>{{ $invoice->Patients->patient_name }}</td>
                                <th>البريد الالكتروني</th>
                                <td>{{ $invoice->patient_email }}</td>
                            </tr>
                            <tr>
                                <th>رقم هاتف المريض</th>
                                <td>{{ $invoice->patient_mobile }}</td>
                                <th>رقم الوصل</th>
                                <td>{{ $invoice->invoice_number }}</td>
                            </tr>
                            <tr>
                                <th>رقم الوصل</th>
                                <td>{{ $invoice->invoice_number2 }}</td>
                                <th>تاريخ الوصل</th>
                                <td>{{ $invoice->invoice_date }}</td>
                            </tr>
                        </table>

                        <h3>تفاصيل الدفع</h3>

                        <table class="table">
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
                            @foreach($invoice->details as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->product_name }}</td>
                                <td>{{ $item->unit }}</td>
                                <td>{{ $item->quantity }}</td>
                                <td>{{ $item->unit_price }}</td>
                                <td>{{ $item->row_sub_total }}</td>
                            </tr>
                            @endforeach
                            </tbody>
                            <tfoot>
                            <tr>
                                <td colspan="3"></td>
                                <th colspan="2">المجموع الفرعي</th>
                                <td>{{ $invoice->sub_total }}</td>
                            </tr>
                            <tr>
                                <td colspan="3"></td>
                                <th colspan="2">نسبه الخصم</th>
                                <td>{{ $invoice->discountResult() }}</td>
                            </tr>
                            <tr>
                                <td colspan="3"></td>
                                <th colspan="2">قيمة الضريبة المضافة</th>
                                <td>{{ $invoice->vat_value }}</td>
                            </tr>
                            <tr>
                                <td colspan="3"></td>
                                <th colspan="2">الشحن</th>
                                <td>{{ $invoice->shippint }}</td>
                            </tr>
                            <tr>
                                <td colspan="3"></td>
                                <th colspan="2">المجموع النهائي</th>
                                <td>{{ $invoice->total_due }}</td>
                            </tr>

                            </tfoot>
                        </table>
                    </div>

                    <div class="row">
                        <div class="col-12 text-center">
                            <a href="{{ route('pr_invoice', $invoice->id) }}" class="btn btn-primary btn-sm ml-auto" style="margin: 0.2cm"><i class="fa fa-print"></i>طباعة</a>
                            <a href="{{ route('pd_invoice', $invoice->id) }}" class="btn btn-secondary btn-sm ml-auto" style="margin: 0.2cm"><i class="fa fa-file-pdf"></i>تحويل الى صيغة PDF</a>
                            <a href="#" class="btn btn-success btn-sm ml-auto" style="margin: 0.2cm"><i class="fa fa-envelope"></i> ارسال الى الايميل</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


</div>












@endsection

@section('js')

@endsection
