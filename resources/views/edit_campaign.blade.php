@extends('layouts.base')

@section('css')
    <link rel='stylesheet' href='/css/shorten_result.css' />
@endsection

@section('content')
    <h3>Edit Campaign</h3>

    <form method='POST' action='/update/campaign/{{$campaign->id}}' role='form'>

        <div class="form-group">
            <label for="name">Name</label>
            <input type='text' autocomplete="off" class='form-control' name='name'  value="{{$campaign->name}}"/>
        </div>
        <div class="form-group">
            <label for="name">Value</label>
            <input type='text' autocomplete="off" class='form-control' name='value' value="{{$campaign->value}}"/>

        </div>

        <input type='submit' class='btn btn-info' value='Update Campaign'/>
        <input type="hidden" name='_token' value='{{csrf_token()}}'/>
    </form>
@endsection

@section('js')
    <script src='/js/shorten_result.js'></script>
@endsection
