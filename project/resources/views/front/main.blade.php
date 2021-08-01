@extends('layouts.front')

@section('content-header')
    <h3>下記の注意事項をご確認ください。</h3>
@endsection

@section('content')
    <app></app>
@endsection

@section('css')
    <link href="{{ mix('css/front/main.css') }}" rel="stylesheet">
@endsection

@section('js')
    <script src="{{ mix('js/front/main.js') }}" defer></script>
@endsection
