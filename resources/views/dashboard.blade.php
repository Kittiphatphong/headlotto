@extends('layouts.newApp')
@section('title','Dashboard')

@section('header')


    <div class="d-flex align-items-baseline flex-wrap mr-5">

        <h5 class="text-dark font-weight-bold my-1 mr-5">DASHBOARD</h5>
        <!--begin::Breadcrumb-->
        <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
            <li class="breadcrumb-item">
                <a href="{{route('dashboard')}}" class="text-muted">Dashboard</a>
            </li>

        </ul>
        <!--end::Breadcrumb-->
    </div>


@endsection


@section('content')
@foreach($sellers as $seller)

    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">

        <div class="d-flex flex-column-fluid">
            <!--begin::Container-->
            <div class="container">
                <!-- begin::Card-->
                <div class="card card-custom overflow-hidden">
                    <div class="card-body p-0">
                        <!-- begin: Invoice-->
                        <!-- begin: Invoice header-->
                        <div class="row justify-content-center bgi-size-cover bgi-no-repeat py-8 px-8 py-md-27 px-md-0" style="background-image: url(assets/media/bg/bg-8.jpg);">
                            <div class="col-md-9">
                                <div class="d-flex justify-content-between pb-10 pb-md-20 flex-column flex-md-row">
                                    <h1 class="display-4 text-white font-weight-boldest mb-10">ໃບ​ຮັບ​ເງີນ</h1>

                                    <div class="d-flex flex-column align-items-md-end px-0">
                                        <!--begin::Logo-->
                                        <div class="row">
                                            <a href="#" class="mb-5 mr-4">
                                                <img src="assets/media/logos/lotto.png" alt="" width="60px"/>
                                            </a>
                                            <a href="#" class="mb-5">
                                                <img src="assets/media/logos/yellow.png" alt="" width="60px"/>
                                            </a></div>

                                        <!--end::Logo-->
                                        <h6 class="text-white d-flex flex-column align-items-md-end opacity-70">
															<span>ບ້ານໂພນ​ຕ້ອງ​ສະ​ຫາດ,​ເມືອງ​ຈັນ​ທະ​ບູ​ລີ, ນະ​ຄອນ​ຫຼວງ​ວຽງ​ຈັນ</span>
															<span>ໂທ​:8899</span>
														</h6>
                                    </div>
                                </div>
                                <div class="border-bottom w-100 opacity-20"></div>
                                <div class="d-flex justify-content-between text-white pt-6">

                                    <div class="d-flex flex-column flex-root">
                                        <h4 class="font-weight-bolde mb-2r">ເວ​ລາ</h4>
                                        <h4 class="opacity-70">{{$seller->sells->last()->created_at}}</h4>
                                    </div>
                                    <div class="d-flex flex-column flex-root">
                                        <h4 class="font-weight-bolder mb-2">ເລກ​ທີ</h4>
                                        <h4 class="opacity-70">jk {{$seller->sells->last()->id}}</h4>
                                    </div>
                                    <div class="d-flex flex-column flex-root">ງວດ</span>
                                        <h4 class="opacity-70">{{$seller->sells->last()->draw}}</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end: Invoice header-->
                        <!-- begin: Invoice body-->
                        <div class="row justify-content-center py-8 px-8 py-md-10 px-md-0">
                            <div class="col-md-9">
                                <div class="table-responsive">
                                    <table class="table">
                                        <tbody>
                                        <tr class="font-weight-boldest font-size-lg">
                                            <td class="pl-0 pt-7"><h4>ຊື່​ຜູ້​ຂາຍ</h4></td>
                                            <td class="text-right pt-7"><h4>{{$seller->name}}</h4></td>

                                        </tr>
                                        <tr class="font-weight-boldest font-size-lg">
                                            <td class="pl-0 pt-7"><h4>ລະ​ຫັດ​ເຄື່ອງ</h4></td>
                                            <td class="text-right pt-7"><h4>{{$seller->seller_id}}</h4></td>

                                        </tr>
                                        <tr class="font-weight-boldest font-size-lg">
                                            <td class="pl-0 pt-7"><h4>ຍອດ​ຂາຍ​ທັງ​ໝົດ</h4></td>
                                            <td class="text-right pt-7"><h4 ><b>{{number_format($seller->sells->last()->amount)}} ກີບ</b></h4></td>

                                        </tr>
                                        <tr class="font-weight-boldest font-size-lg">
                                            <td class="pl-0 pt-7"><h4>ເປີ​ເຊັນ​ທີ​ໄດ້​ຮັບ​ 20%</h4></td>
                                            <td class="text-right pt-7"><h4 class="text-success">{{number_format($seller->sells->last()->amount *(20/100))}} ກີບ</h4></td>

                                        </tr>
                                        <tr class="font-weight-boldest font-size-lg">
                                            <td class="pl-0 pt-7"><h4>ສົ່ງ​ໃຫ້​ໜ່ວຍ</h4></td>
                                            <td class="text-right pt-7"><h4 class="text-danger">{{number_format($seller->sells->last()->amount *(80/100))}} ກີບ</h4></td>

                                        </tr>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!-- end: Invoice body-->
                        <!-- begin: Invoice footer-->
                        <div class="row justify-content-center bg-gray-100 py-8 px-8 py-md-10 px-md-0">
                            <div class="col-md-9">
                                <div class="d-flex justify-content-between flex-column flex-md-row font-size-lg">
                                    <div class="">
                                        <img src="assets/media/logos/index.jpg" alt="" width="200px"/>
                                    </div>
                                    <div class="d-flex flex-column mb-10 mb-md-0">
                                        <div class="font-weight-bolder font-size-lg mb-3"><h4><b>ທະ​ນາ​ຄານ​ການ​ຄ້າ​ BCEL</b></h4></div>
                                        <div class="d-flex justify-content-between mb-3">
                                            <span class="mr-15 font-weight-bold"><h4>ຊື່​ບັນ​ຊີ:</h4></span>
                                            <span class="text-right"><h4>KITTIPHATPHONG KTV</h4></span>
                                        </div>
                                        <div class="d-flex justify-content-between mb-3">
                                            <span class="mr-15 font-weight-bold"><h4>ເລກ​ບັນ​ຊີ:</h4></span>
                                            <span class="text-right"><h4>092-12-00-01004045-001</h4></span>
                                        </div>

                                    </div>
                                    <div class="d-flex flex-column text-md-right">
                                        <span class="font-size-lg font-weight-bolder mb-1"><h4><b>ລວມ​ສົ່ງ​ໜວຍ​ທັງ​ໝົດ</b></h4></span>
                                        <span class="font-size-h2 font-weight-boldest text-danger mb-1">{{number_format($seller->sells->last()->amount *(80/100))}} ກີບ</span>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end: Invoice footer-->
                        <!-- begin: Invoice action-->
{{--                        <div class="row justify-content-center py-8 px-8 py-md-10 px-md-0">--}}
{{--                            <div class="col-md-9">--}}
{{--                                <div class="d-flex justify-content-between">--}}
{{--                                    <button type="button" class="btn btn-light-primary font-weight-bold" onclick="window.print();">Download Invoice</button>--}}
{{--                                    <button type="button" class="btn btn-primary font-weight-bold" onclick="window.print();">Print Invoice</button>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
                        <!-- end: Invoice action-->
                        <!-- end: Invoice-->
                    </div>
                </div>
                <!-- end::Card-->
            </div>
            <!--end::Container-->
        </div>
        <!--end::Entry-->
    </div>
@endforeach
@endsection
