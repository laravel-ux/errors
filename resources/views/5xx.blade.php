@extends('errors::layout')

@section('title', __('Server Error'))
@section('code', $exception->getStatusCode())
@section('message', __('Something went wrong while processing your request.'))
