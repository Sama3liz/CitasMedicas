@extends('layouts.panel')

@section('content')
<div class="main-container">
    <div class="pd-ltr-20 xs-pd-20-10">
        <div class="min-height-200px">
            <div class="invoice-wrap">
                <div class="invoice-box">
                    <div class="invoice-header">
                        <div class="logo text-center">
                            <img src="{{ asset('vendors/images/deskapp-logo.png') }}" alt="">
                        </div>
                    </div>
                    <h4 class="text-center mb-30 weight-600">INVOICE</h4>
                    <div class="row pb-30">
                        <div class="col-md-6">
                            <h5 class="mb-15">Client Name</h5>
                            <p class="font-14 mb-5">Date Issued: <strong class="weight-600">10 Jan 2018</strong></p>
                            <p class="font-14 mb-5">Invoice No: <strong class="weight-600">4556</strong></p>
                        </div>
                        <div class="col-md-6">
                            <div class="text-right">
                                <p class="font-14 mb-5">Your Name </strong></p>
                                <p class="font-14 mb-5">Your Address</p>
                                <p class="font-14 mb-5">City</p>
                                <p class="font-14 mb-5">Postcode</p>
                            </div>
                        </div>
                    </div>
                    <div class="invoice-desc pb-30">
                        <div class="invoice-desc-head clearfix">
                            <div class="invoice-sub">Description</div>
                            <div class="invoice-rate">Rate</div>
                            <div class="invoice-hours">Cant.</div>
                            <div class="invoice-subtotal">Subtotal</div>
                        </div>
                        <div class="invoice-desc-body">
                            <ul>
                                <li class="clearfix">
                                    <div class="invoice-sub">Medical Appointment</div>
                                    <div class="invoice-rate">$20</div>
                                    <div class="invoice-hours">1</div>
                                    <div class="invoice-subtotal"><span class="weight-600">$20</span></div>
                                </li>
                            </ul>
                        </div>
                        <div class="invoice-desc-footer">
                            <div class="invoice-desc-head clearfix">
                                <div class="invoice-sub">Bank Info</div>
                                <div class="invoice-rate">Due By</div>
                                <div class="invoice-subtotal">Total Due</div>
                            </div>
                            <div class="invoice-desc-body">
                                <ul>
                                    <li class="clearfix">
                                        <div class="invoice-sub">
                                            <p class="font-14 mb-5">Account No: <strong class="weight-600">123 456 789</strong></p>
                                            <p class="font-14 mb-5">Code: <strong class="weight-600">4556</strong></p>
                                        </div>
                                        <div class="invoice-rate font-20 weight-600">10 Jan 2018</div>
                                        <div class="invoice-subtotal"><span class="weight-600 font-24 text-danger">$20</span></div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <h4 class="text-center pb-20">Thank You!!</h4>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
