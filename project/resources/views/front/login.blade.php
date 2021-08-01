@extends('layouts.login')

@section('content-header')
    <h3>下記の注意事項をご確認ください。</h3>
@endsection

@section('content')
    <login></login>
@endsection

@section('css')
    <link href="{{ mix('css/front/login.css') }}" rel="stylesheet">
@endsection

@section('js')
    <script src="{{ mix('js/front/login.js') }}" defer></script>
@endsection
