@extends('layouts.app')

@section('app-content-header')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6">
                <h3 class="mb-0">Platforms</h3>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-end">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">
                        Platforms
                    </li>
                </ol>
            </div>
        </div>
    </div>
@endsection


@section('content')
    <livewire:platform.platform-index />
@endsection
