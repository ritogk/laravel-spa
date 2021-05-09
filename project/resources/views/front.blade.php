@extends('layouts.front')

@section('content-header')
    <h3>下記の注意事項をご確認ください。</h3>
@endsection

@section('content')
    <front></front>
@endsection

@section('css')
    <link href="{{ mix('css/front.css') }}" rel="stylesheet">
@endsection

@section('js')
    <script src="{{ mix('js/front.js') }}" defer></script>
@endsection
