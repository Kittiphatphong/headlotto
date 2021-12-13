@extends('layouts.newApp')
@section('title','Currencies')

@section('header')
    <div class="d-flex align-items-baseline flex-wrap mr-5">
        <div class="d-flex align-items-center flex-wrap mr-1">
            <h5 class="text-dark font-weight-bold my-1 mr-5">@lang('MONEY')</h5>
            <!--begin::Breadcrumb-->
            <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                <li class="breadcrumb-item">
                    <a href="{{route('currency.index')}}" class="text-muted">@lang('Currencies')</a>
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
        <button class="btn btn-light-primary font-weight-bolder btn-sm" data-toggle="modal" data-target="#exampleModalCenter"><i class="fas fa-layer-group"></i> New Exchange Rate</button>
        <!--end::Actions-->

    </div>
@endsection


@section('content')



    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
                   <div class="bg-white p-4 mb-4 shadow-sm d-flex justify-content-between">
                <h3 class=" text-primary font-weight-bolder  "><i class="fas fa-money-bill fa-lg mr-2"></i>Edit Currencies ({{$list_currencies->name}})</h3>
                       <h3 class=" text-primary font-weight-bolder  ">Rate now:
                       @if($list_currencies->exchange_rates->count()>0)
                           {{number_format($list_currencies->exchange_rates->last()->rate,2)}}
                           @else
                           <span class="text-danger">N/A</span>
                           @endif
                       </h3>
                   </div>
                       <form method="post" action="{{route('currency.update',$list_currencies->id)}}">
                    @csrf
                    @method('PATCH')
                    <h5 class="text-primary">Currency</h5>
                    <div class="border p-4">
                        <div class="form-group">
                            <label>Currency name</label>
                            <input type="text" class="form-control" name="name" value="{{old('name',$list_currencies->name)}}" >
                        </div>

                        <div class="form-group mt-4">
                            <button class="btn btn-block btn-primary">SUBMIT</button>
                        </div>
                    </div>
                </form>

                <h5 class="text-primary mt-4">Exchange Rate</h5>
                <div class="table-responsive">
                    <table class="table table-bordered table-hover table-checkable" id="kt_datatable" style="margin-top: 13px !important">
                        <thead>
                        <tr>

                            <th>ID</th>
                            <th>RATE</th>
                            <th>UPDATED AT</th>
                            <th>DELETE</th>

                        </tr>
                        </thead>
                        <tbody>
                        @foreach($list_currencies->exchange_rates as $item)
                            <tr>
                                <td>{{$item->id}}</td>
                                <td>{{number_format($item->rate,2)}}</td>
                                <td>{{$item->updated_at}}</td>
                                <td>
                                    <div class="d-flex justify-content-start m-0">
                                        <form action="{{route('exchange-rate.destroy',$item->id)}}" method="post" class="delete{{$item->id}}">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class=" btn btn-link delete_button" data-id="{{$item->id}}"><i class="fas fa-trash text-danger"></i></button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>



    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered " role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">New Currency</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{route('exchange-rate.store')}}" method="post">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Rate</label>
                            <input type="text" name="rate" class="form-control money" id="kt_rate_input">
                        </div>
                        <input type="hidden" value="{{$list_currencies->id}}" name="currency_id">

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
