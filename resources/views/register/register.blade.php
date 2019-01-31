@extends('base')
@section('title','register')
@section('content')
    <div dir="@if ( config('app.locale') == 'ar'){{ 'rtl' }}@endif">
    <h1 class="text-center">@lang('form.register')</h1>
    {!! Form::open(['action' => 'DriverController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
    <div class="form-group @if ( config('app.locale') == 'ar') {{ 'text-right' }} @endif">
        {{Form::label('first_name', trans('form.first_name'))}}
        {{Form::text('first_name', '', ['class' => 'form-control', 'placeholder' => trans('form.first_name') ,'required' => 'required'])}}
    </div>
    <div class="form-group @if ( config('app.locale') == 'ar') {{ 'text-right' }} @endif">
        {{Form::label('last_name', trans('form.last_name'))}}
        {{Form::text('last_name', '', ['class' => 'form-control', 'placeholder' => trans('form.last_name'),'required' => 'required'])}}
    </div>
    <div class="form-group @if ( config('app.locale') == 'ar') {{ 'text-right' }} @endif">
        {{Form::label('mobile_number', trans('form.mobile_number'))}}
        {{Form::text('mobile_number', '', ['class' => 'form-control', 'placeholder' => trans('form.mobile_number'),'required' => 'required', 'pattern' => '05[0-9]{8}', 'title' => 'The phone number should be in the form 05xxxxxxxx'])}}
    </div>
    <div class="form-group @if ( config('app.locale') == 'ar') {{ 'text-right' }} @endif">
        {{Form::label('nationality', trans('form.nationality'))}}
        {{Form::select('nationality',array('ksa' => trans('form.ksa'), 'egy' => trans('form.egy')),null, ['class' => 'form-control','required' => 'required'])}}
    </div>
    <div class="form-group @if ( config('app.locale') == 'ar') {{ 'text-right' }} @endif">
        {{Form::label('city', trans('form.city'))}}
        {{Form::select('city',array('ruh' => trans('form.ruh'), 'jed' => trans('form.jed')),null, ['class' => 'form-control','required' => 'required'])}}
    </div>
    <div class="form-group @if ( config('app.locale') == 'ar') {{ 'text-right' }} @endif">
        {{Form::label('referall', trans('form.referall'))}}
        {{Form::text('referall', '', ['class' => 'form-control', 'placeholder' => trans('form.referall')])}}
    </div>
    <div class="form-group @if ( config('app.locale') == 'ar') {{ 'text-right' }} @endif">
        {{Form::label('iban', trans('form.iban'))}}
        {{Form::text('iban', '', ['class' => 'form-control', 'placeholder' => trans('form.iban'),'required' => 'required', 'pattern' => '[0-9]{24}', 'title' => '24 digits'])}}
    </div>
    <div class="form-group @if ( config('app.locale') == 'ar') {{ 'text-right' }} @endif">
        {{Form::label('National_id', trans('form.National_id'))}}
        {{Form::text('National_id', '', ['class' => 'form-control', 'placeholder' => trans('form.National_id'),'required' => 'required', 'pattern' => '[0-9]{10}', 'title' => '10 digits'])}}
    </div>
    <div class="form-group @if ( config('app.locale') == 'ar') {{ 'text-right' }} @endif">
        {{Form::label('vehicule_type', trans('form.vehicule_type'))}}
        {{Form::select('vehicule_type',array('car' => trans('form.car'), 'bike' => trans('form.bike')),null, ['class' => 'form-control','required' => 'required'])}}
    </div>
    <div class="form-group @if ( config('app.locale') == 'ar') {{ 'text-right' }} @endif">
        {{Form::label('national_card',trans('form.national_card'))}}
        {{Form::file('national_card', ['class' => 'form-control','required' => 'required'])}}
    </div>
    <div class="form-group @if ( config('app.locale') == 'ar') {{ 'text-right' }} @endif">
        {{Form::label('driving_licence_card', trans('form.driving_licence_card'))}}
        {{Form::file('driving_licence_card', ['class' => 'form-control','required' => 'required'])}}
    </div>
    <div class="form-group @if ( config('app.locale') == 'ar') {{ 'text-right' }} @endif">
        {{Form::label('car_registration_card', trans('form.car_registration_card'))}}
        {{Form::file('car_registration_card', ['class' => 'form-control','required' => 'required'])}}
    </div>
    <div class="form-group @if ( config('app.locale') == 'ar') {{ 'text-right' }} @endif">
        {{Form::label('driving_authorizing', trans('form.driving_authorizing'))}}
        {{Form::file('driving_authorizing', ['class' => 'form-control'])}}
    </div>
    <div class="form-group @if ( config('app.locale') == 'ar') {{ 'text-right' }} @endif">
        {{Form::label('bank_account_card', trans('form.bank_account_card'))}}
        {{Form::file('bank_account_card', ['class' => 'form-control'])}}
    </div>
        <p class="@if ( config('app.locale') == 'ar'){{ 'text-right' }}@endif">@lang('form.required')</p>

        {{Form::submit(trans('form.Submit'), ['class'=>'btn btn-primary btn-lg btn-block'])}}
        {!! Form::close() !!}
    </div>
@endsection