@extends('layouts.admin')

@section('content')
    <app></app>
@endsection

@section('css')
    <link href="{{ mix('css/admin/main.css') }}" rel="stylesheet">
@stop

@section('js')
    <script src="{{ mix('js/admin/main.js') }}" defer></script>
@stop
