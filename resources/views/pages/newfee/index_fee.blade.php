@extends('layout.dashboard')
@section('css')

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




    <div style="padding-left: 1cm">
        <button type="button" class="btn btn-primary"><a style="text-decoration: none;color:white" href="{{ route('invoices_man.create') }}" >إضافة ممرض جديد </a><i class="bi bi-plus"></i></button>
    </div>

    <div style="padding: 1cm">
    <div class="table-responsive">
        <table id="kt_datatable_dom_positioning" class="table table-striped table-row-bordered gy-5 gs-7 border rounded">
            <thead>
                <tr class="fw-bold fs-6 text-gray-800 px-7">
                    <th><input name="select_all" id="example-select-all" type="checkbox" onclick="CheckAll('box1', this)" /></th>
                    <th scope="col">#</th>
                    <th scope="col">اسم المريض</th>
                    <th scope="col">تاريخ الفاتورة</th>
                    <th scope="col">الاجمالي المستحق</th>
                    <th scope="col">العمليات</th>
            </thead>
            <tbody>

    @php
        $i=0;
    @endphp
    @foreach ( $invoices as $invoice )

                    <tr>
                        <?php $i++; ?>

                        <td><input type="checkbox"  value="" class="box1" ></td>
                        <td>{{ $i }}</td>
                        <td>{{ $invoice->Patients->patient_id }}</td>
                        <td>{{ $invoice->invoice_date }}</td>
                        <td>{{ $invoice->total_due }}</td>
                        <td>
                            <button type="button" class="btn btn-info btn-xl" data-bs-toggle="modal"
                                data-bs-target="#edit{{ $invoice->id }}"
                                title="تعديل"><i class="fa fa-edit"></i></button>
                            <button type="button" class="btn btn-danger btn-xl" data-bs-toggle="modal"
                                data-bs-target="#delete{{ $invoice->id }}"
                                title="حذف"><i
                                    class="fa fa-trash"></i></button>
                                    <button type="button" class="btn btn-danger btn-xl" data-bs-toggle="modal"
                                data-bs-target="#show"
                                title="عرض"><i class="fa-solid fa-eye"></i></button>
                        </td>

                    </tr>


                    <!-- edit_modal_Grade -->

                    @endforeach

        </table>
    </div>
    </div>





@endsection
@section('js')

@endsection
