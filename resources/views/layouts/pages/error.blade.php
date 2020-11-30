@extends('layouts.default')
@section('content')
    @if(isset($errors) && count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
            {{ $message }}
        </div>
    @endif

@stop
