@extends('errors::layout')

@section('title', __('Forbidden'))
@section('code', '403')
@section('message', $exception->getMessage() ?: __('You do not have permission to view this page.'))
