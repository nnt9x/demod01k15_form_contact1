@extends('layout.master')
@section('title','Liên hệ')

@section('content')
    <div class="grid grid-cols-3 gap-10">
        <div class="col-span-1">
            <p class="text-xl mb-3"> Thêm liên hệ</p>
            <livewire:form-create-contact/>
        </div>
        <div class="col-span-2">
            {{--            Chua bang --}}
            <p class="text-xl mb-3">Bảng liên hệ</p>
            <livewire:table-contact/>
        </div>
    </div>

@endsection
