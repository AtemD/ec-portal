@extends('layouts.app')

@section('app-content-header')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6">
                <h3 class="mb-0">{{ $client->name }}</h3>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-end">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('client.index') }}">Clients</a></li>
                    <li class="breadcrumb-item active" aria-current="page">
                        {{ $client->name }}
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">
                        Show
                    </li>
                </ol>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row row-cols-1 row-cols-md-2 g-4">
            <div class="col">
                <livewire:client.client-profile :client="$client" />
            </div>
            <div class="col">
                <livewire:client.contact.contact-index :client="$client" />
            </div>
            <div class="col">
                <livewire:client.platform.platform-index :client="$client" />
            </div>
            <div class="col">
                <livewire:client.site.site-index :client="$client" />
            </div>
        </div>
    </div>
@endsection
