@extends('layouts.panel')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">{{ trans('verify-email.title') }}</div>

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
            </div>
        </div>
    </div>
@endsection
