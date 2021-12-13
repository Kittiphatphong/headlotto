@extends('layouts.newApp')
@section('title','Seller')

@section('header')
    <div class="d-flex align-items-baseline flex-wrap mr-5">
        <div class="d-flex align-items-center flex-wrap mr-1">
            <h5 class="text-dark font-weight-bold my-1 mr-5">@lang('Seller')</h5>
            <!--begin::Breadcrumb-->
            <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                <li class="breadcrumb-item">
                    <a href="{{route('sell.index')}}" class="text-muted">@lang('Seller')</a>
                </li>
                {{--            <li class="breadcrumb-item">--}}
                {{--                <a href="" class="text-muted">Bill 3/40</a>--}}
                {{--            </li>--}}
            </ul>
            <!--end::Breadcrumb-->
        </div>
    </div>
    <div class="d-flex align-items-center">
        <!--begin::Actions-->

{{--        <button class="btn btn-light-primary font-weight-bolder btn-sm" data-toggle="modal" data-target="#exampleModalCenter"><i class="fas fa-layer-group"></i> @lang('New Seller')</button>--}}

{{--        <!--end::Actions-->--}}

    </div>
@endsection


@section('content')



    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">

                <h3 class="bg-white text-primary font-weight-bolder  p-4 mb-4 shadow-sm"><i class="fas fa-money-bill fa-lg mr-2"></i>@lang('Sell') </h3>
<form method="post" action="{{route('sell.store')}}">
    @csrf
<div class="form-group">
    <label>@lang('Draw')</label>
    <input type="number" name="draw" class="form-control" required>
</div>
<hr>
                @foreach($sellers as $seller)
                <div class="row  py-2">
                    <div class="form-group col-4">
                        <label>@lang('Seller Id')</label>
                        <input type="number" value="{{$seller->seller_id}}" class="form-control" disabled>
                        <input type="hidden" value="{{$seller->id}}" name="seller_id[]">
                    </div>
                    <div class="form-group col-8">
                        <label>@lang('Seller Id')</label>
                        <input type="text" name="amount[]" class="form-control" id="money" required>
                    </div>
                </div>
                @endforeach

    <button type="submit" class="btn btn-primary btn-block">@lang('Submit')</button>
</form>
            </div>
        </div>
    </div>




@endsection
