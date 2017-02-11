@extends('layout')

@section('content')
@component('components.newMessageForm')
@endcomponent

@component('components.messagesBoard', ['messages'=>$messages])
@endcomponent

@endsection