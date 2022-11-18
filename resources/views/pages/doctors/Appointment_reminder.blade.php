@extends('layout.dashboard')
@section('css')

@section('tit')
حجز موعد مراجعة
@endsection
<div style="padding: 1cm">
@section('co')





<form action="{{ route('sms') }}" method="post">
    @csrf
    @method('POST')
    <div style="padding: 2cm" class="row">
    <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">ادخل رثم الهاتف</label>
        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="phone number" name="phone_number">
      </div>
      <div class="mb-3">
        <label for="exampleFormControlTextarea1" class="form-label">مخصوص الرسالة</label>
        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="massege"></textarea>
      </div>
      <div class="col-auto">
        <button type="submit" class="btn btn-primary mb-3">ارسال</button>
      </div>
    </div>
</form>



<div class="container">
    <div class="row" style="margin-top:45px">
       <div class="col-md-4 offset-md-4">
       <h4>Send Email via PHPMailer in Laravel 8</h4><hr>
       <form action="{{ route('sendmail') }}" method="post">
          @csrf
          <div class="form-group">
             <label for="">Name</label>
             <input type="text" class="form-control" name="name" placeholder="Enter your name">
          </div>
          <div class="form-group">
             <label for="">Email</label>
             <input type="text" class="form-control" name="email" placeholder="Enter your email">
          </div>
          <div class="form-group">
             <label for="">Subject</label>
             <input type="text" class="form-control" name="subject" placeholder="Enter subject">
          </div>
          <div class="form-group">
            <textarea name="message" cols="4" rows="4" class="form-control" placeholder="Message here...."></textarea>
          </div>
          <button type="submit" class="btn btn-block btn-success">Send Email</button>
       </form>
       </div>
    </div>
 </div>


{{-- 
 <script>
    $(document).ready(function () {
        $('select[name="Patient_id"]').on('change', function () {
            var Grade_id = $(this).val();
            if (Grade_id) {
                $.ajax({
                    url: "{{ URL::to('Patient') }}/" + Grade_id,
                    type: "GET",
                    dataType: "json",
                    success: function (data) {
                        $('select[name="Class_id"]').empty();
                        $.each(data, function (key, value) {
                            $('select[name="Class_id"]').append('<option value="' + key + '">' + value + '</option>');
                        });
                    },
                });
            } else {
                console.log('AJAX load did not work');
            }
        });
    });
</script> --}}
@endsection
@section('js')

@endsection
