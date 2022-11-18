@extends('layout.print')
@section('css')

@section('tit')
الفواتير
@endsection

@section('co')





<div class="row justify-content-center">
    <div class="col-12">
        <div class="card">
            <div class="card-header d-flex">
                <h2>رقم الايصال{{  $invoice->invoice_number}}</h2>
            </div>

            <div class="card-body">
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
                            <td width="5%">{{ $loop->iteration }}</td>
                            <td width="35%">{{ $item->product_name }}</td>
                            <td width="10%">{{ $item->unitText() }}</td>
                            <td width="10%">{{ $item->quantity }}</td>
                            <td width="10%">{{ $item->unit_price }}</td>
                            <td>{{ $item->row_sub_total }}</td>
                        </tr>
                        @endforeach
                        </tbody>
                        <tfoot>
                        <tr>
                            <td colspan="3"></td>
                            <th colspan="2">{{ __('Frontend/frontend.sub_total') }}</th>
                            <td>{{ $invoice->sub_total }}</td>
                        </tr>
                        <tr>
                            <td colspan="3"></td>
                            <th colspan="2">{{ __('Frontend/frontend.discount') }}</th>
                            <td>{{ $invoice->discountResult() }}</td>
                        </tr>
                        <tr>
                            <td colspan="3"></td>
                            <th colspan="2">{{ __('Frontend/frontend.vat') }}</th>
                            <td>{{ $invoice->vat_value }}</td>
                        </tr>
                        <tr>
                            <td colspan="3"></td>
                            <th colspan="2">{{ __('Frontend/frontend.shipping') }}</th>
                            <td>{{ $invoice->shippint }}</td>
                        </tr>
                        <tr>
                            <td colspan="3"></td>
                            <th colspan="2">{{ __('Frontend/frontend.total_due') }}</th>
                            <td>{{ $invoice->total_due }}</td>
                        </tr>

                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
</div>












@endsection

@section('js')
<script>
    window.print();
</script>
@endsection
