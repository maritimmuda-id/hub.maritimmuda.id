@extends('layouts.panel')
@section('content')
    <div class="card">
        <div class="card-header">
            Member
        </div>

        <div class="card-body">
            <form class="row">
                <div class="col-md-3">
                    <x-form-input
                        name="search"
                        :placeholder="trans('member.search-label')"
                        :value="request()->query('search')"
                    />
                </div>
                <div class="col-md-3">
                    <x-form-select name="province">
                        <option value="" disabled>{!! trans('member.province-label') !!}</option>
                        <option value="">{!! trans('member.province-placeholder') !!}</option>
                        @foreach ($provinces as $provinceId => $provinceName)
                            <option
                                value="{{ $provinceId }}"
                                {{ request()->query('province') == $provinceId ? 'selected' : '' }}
                            >
                                {{ $provinceName }}
                            </option>
                        @endforeach
                    </x-form-select>
                </div>
                <div class="col-md-3">
                    <x-form-select name="expertise">
                        <option value="" disabled>{!! trans('member.expertise-label') !!}</option>
                        <option value="">{!! trans('member.expertise-placeholder') !!}</option>
                        @foreach ($expertises as $expertiseId => $expertiseName)
                            <option
                                value="{{ $expertiseId }}"
                                {{ request()->query('expertise') == $expertiseId ? 'selected' : '' }}
                            >
                                {{ $expertiseName }}
                            </option>
                        @endforeach
                    </x-form-select>
                </div>
                <div class="col-md-3">
                    <button type="submit" class="btn btn-primary">
                        {{ trans('member.filter-button-label') }}
                    </button>
                </div>
            </form>
            <div class="row">
                @forelse ($users as $item)
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-body p-2 d-flex">
                                <img style="height:100px" class="img-fluid img-thumbnail" src="{{ $item->photo_thumb_link }}">
                                <div class="mx-2">
                                    <h3>{{ $item->name }}</h3>
                                    <strong class="d-block">{{ $item->province->name }}</strong>
                                    <small class="d-block">{{ $item->firstExpertise?->name }}</small>
                                    <small class="d-block">{{ $item->secondExpertise?->name }}</small>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-md-12">
                        <h4>@lang('member.no-results-text')</h4>
                    </div>
                @endforelse
            </div>
            <div class="row">
                <div class="col-md-12">
                    {!! $users?->links() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
