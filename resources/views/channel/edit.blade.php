@extends('layouts.master')

@section('content')
    <div class="center" style="margin: 0 auto; width: 70%">
        <div class="card">
            <div class="card-header">{{ __('Edit Channel') }}</div>

            <div class="card-body">
                <livewire:channel.edit-channel :channel='$channel' />
            </div>
        </div>
    </div>
@endsection
