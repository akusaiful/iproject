@extends('errors::minimal')

@section('title', __('Forbidden | Alamak'))
@section('code', '403')
@section('message', __($exception->getMessage() ?: 'Forbidden'))

