@extends('layouts.panel')
@section('content')
    <div class="card p-3 m-4" style="border: none;">
        <div class="card-header" style="border: none;">
                <h4 class="d-inline pb-3">
                    <b>{{ trans('verify-email.title') }}</b>
                </h4>
            </div>


            <div class="card-body">
            @if (session('status') == 'verification-link-sent')
                <div class="alert alert-success" role="alert">
                    {!! trans('verify-email.successfully-resend-email-verification') !!}
                </div>
            @endif

            {{ trans('verify-email.notice_1') }}
            {{ trans('verify-email.notice_2') }},
            <x-form class="d-inline" :action="route('verification.send')">
                <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ trans('verify-email.notice_3') }}</button>.
            </x-form>
        </div>
    </div>
    <div class="d-flex justify-content-center">
        <img class="img-fluid" src="{{ asset('/img/logo-300.png') }}" style="width:35%;" alt="">
    </div>
@endsection
