@extends('layout.dashboard')
@section('tit')
Operating
@endsection
@section('css')
@livewireStyles
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<div  style="padding: 1cm">
@section('co')
</div>



@livewire('operating.operating')








@endsection
@section('js')
@livewireScripts
@endsection
