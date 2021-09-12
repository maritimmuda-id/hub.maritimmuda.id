@extends('layouts.panel')
@section('content')
    <div class="card">
        <div class="card-header">
            Member
        </div>

        <div class="card-body">
            @foreach ($users as $item)
                <div class="card my-3">
                    <div class="card-body p-2 d-flex">
                        <img class="img-fluid img-thumbnail" src="{{ $item->photo_thumb_link }}">
                        <div>
                            <h3>{{ $item->name }}</h3>
                            <div>{{ $item->province->name }}</div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
