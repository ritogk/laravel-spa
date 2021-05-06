@extends('layouts.content')

@section('content-header')
    <h3>下記の注意事項をご確認ください。</h3>
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="row">
                <label>注意事項</label>
            </div>

            <form action="" method="POST">
                {{ csrf_field() }}
                <div class="mt-2">
                    <input type="checkbox" name="agree" id="agree" value="1">
                    <label for="agree">注意事項に同意する</label>
                </div>
                <div class="row mt-2">
                    <button type="submit" class="btn btn-success">申込する</button>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('js')
    <script src="{{ mix('js/agree.js') }}" defer></script>
@endsection

@section('css')
@endsection
