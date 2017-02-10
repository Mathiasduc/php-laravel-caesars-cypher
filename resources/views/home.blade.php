@extends('layout')

@component('components.newMessageForm')
@endcomponent

@component('components.messagesBoard', ['messages'=>$messages])
@endcomponent