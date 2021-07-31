@extends('layouts.admin')

@section('content')
    <admin></admin>
@endsection

@section('css')
    <link href="{{ mix('css/admin.css') }}" rel="stylesheet">
@stop

@section('js')
    <script src="{{ mix('js/admin.js') }}" defer></script>
@stop
