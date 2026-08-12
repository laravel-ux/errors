@extends('errors::layout')

@section('title', __('Something Went Wrong'))
@section('code', $exception->getStatusCode())
@section('message', $exception->getMessage() ?: __('The request could not be completed.'))
