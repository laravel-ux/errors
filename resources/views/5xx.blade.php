@extends('errors::layout')

@section('title', __('Something Went Wrong'))
@section('code', $exception->getStatusCode())
@section('message', __('The request could not be completed.'))
