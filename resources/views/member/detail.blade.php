@extends('layouts.app')
@section('content')
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-body p-2 ">
                    <div class="d-flex align-items-center justify-content-center mb-3">
                        <img
                            style="width:35px;"
                            class="img-fluid d-inline-flex mr-2"
                            src="{{ asset('img/blue-check-mark.png') }}"
                            alt=""
                        >
                        <span style="font-size:1.5rem" class="font-weight-bold">
                            @lang('Registered')
                        </span>
                    </div>
                    <div class="d-flex justify-content-between">
                        <div class="d-flex">
                            <img
                                style="width:150px;height:200px;"
                                class="img-fluid img-thumbnail"
                                src="{{ $user->photo_link }}"
                            >
                            <div class="mx-2">
                                <p class="h2">{{ $user->name }}</p>
                                <p class="h5">{{ $user->member_type }}</p>
                                <p class="h5">{{ $user->province->name }}</p>
                                <p class="h6">Peminatan/Keahlian:</p>
                                <ol class="h6" style="margin-left:-24px">
                                    <li>{{ $user->firstExpertise?->name }}</li>
                                    <li>{{ $user->secondExpertise?->name }}</li>
                                </ol>
                            </div>
                        </div>
                        <div class="d-flex align-items-center">
                            <a
                                href="{{ route('find-member', [
                                    'search' => $user->name,
                                    'province' => $user->province_id,
                                ]) }}"
                                class="btn btn-info"
                                target="_blank"
                            >
                                <i class="fas fa-info-circle"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

