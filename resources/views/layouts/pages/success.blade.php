@extends('layouts.default')
@section('content')
    @if(\Illuminate\Support\Facades\Session::has('flash_message'))
        <div class="alert alert-success">
            <span class="glyphicon glyphicon-ok-circle"></span>
            <em>{!! session('flash_message') !!}</em>
            <em>{{ $message }}</em>
        </div>
    @endif

@stop
