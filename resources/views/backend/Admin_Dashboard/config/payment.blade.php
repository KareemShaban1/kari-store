@extends('backend.layouts.master')


@section('content')
    <div class="row">

        <div class="col-md-6">

            <div class="card card-statistics mb-30">
                <div class="card-body">
                    <h5 class="card-title">Paymob Configuration</h5>
                    <form action="{{ route('admin.config.updatePaymobSettings') }}" method="POST">
                        @csrf
                        <div class="row mb-4">
                            <div class="col-lg-5 col-md-4 col-sm-6 col-5">
                                <h5 class="setting-title">
                                    PAYMOB API KEY</h5>
                            </div>
                            <div class="col-lg-7 col-md-8 col-sm-6 col-7"><input type="text" name="PAYMOB_API_KEY"
                                    value="{{ env('PAYMOB_API_KEY') }}" class="form-control"></div>
                        </div>

                        <div class="row mb-4">
                            <div class="col-lg-5 col-md-4 col-sm-6 col-5">
                                <h5 class="setting-title">
                                    PAYMOB CARD INTEGRATION ID</h5>
                            </div>
                            <div class="col-lg-7 col-md-8 col-sm-6 col-7"><input type="text"
                                    name="PAYMOB_CARD_INTEGRATION_ID" value="{{ env('PAYMOB_CARD_INTEGRATION_ID') }}"
                                    class="form-control"></div>
                        </div>

                        <div class="row mb-4">
                            <div class="col-lg-5 col-md-4 col-sm-6 col-5">
                                <h5 class="setting-title">
                                    PAYMOB CARD IFRAME ID</h5>
                            </div>
                            <div class="col-lg-7 col-md-8 col-sm-6 col-7"><input type="text" name="PAYMOB_CARD_IFRAME_ID"
                                    value="{{ env('PAYMOB_CARD_IFRAME_ID') }}" class="form-control"></div>
                        </div>

                        <div class="row mb-4">
                            <div class="col-lg-5 col-md-4 col-sm-6 col-5">
                                <h5 class="setting-title">
                                    PAYMOB CARD VALU INTEGRATION ID</h5>
                            </div>
                            <div class="col-lg-7 col-md-8 col-sm-6 col-7"><input type="text"
                                    name="PAYMOB_CARD_VALU_INTEGRATION_ID"
                                    value="{{ env('PAYMOB_CARD_VALU_INTEGRATION_ID') }}" class="form-control"></div>
                        </div>

                        <div class="row mb-4">
                            <div class="col-lg-5 col-md-4 col-sm-6 col-5">
                                <h5 class="setting-title">
                                    PAYMOB CARD VALU IFRAME ID</h5>
                            </div>
                            <div class="col-lg-7 col-md-8 col-sm-6 col-7"><input type="text"
                                    name="PAYMOB_CARD_VALU_IFRAME_ID" value="{{ env('PAYMOB_CARD_VALU_IFRAME_ID') }}"
                                    class="form-control"></div>
                        </div>


                        <div class="row mb-4">
                            <div class="col-lg-5 col-md-4 col-sm-6 col-5">
                                <h5 class="setting-title">
                                    PAYMOB BANK INSTALLMENT INTEGRATION ID</h5>
                            </div>
                            <div class="col-lg-7 col-md-8 col-sm-6 col-7"><input type="text"
                                    name="PAYMOB_BANK_INSTALLMENT_INTEGRATION_ID"
                                    value="{{ env('PAYMOB_BANK_INSTALLMENT_INTEGRATION_ID') }}" class="form-control"></div>
                        </div>

                        <div class="row mb-4">
                            <div class="col-lg-5 col-md-4 col-sm-6 col-5">
                                <h5 class="setting-title">
                                    PAYMOB BANK INSTALLMENT IFRAME ID</h5>
                            </div>
                            <div class="col-lg-7 col-md-8 col-sm-6 col-7"><input type="text"
                                    name="PAYMOB_BANK_INSTALLMENT_IFRAME_ID"
                                    value="{{ env('PAYMOB_BANK_INSTALLMENT_IFRAME_ID') }}" class="form-control"></div>
                        </div>


                        <div class="row mb-4">
                            <div class="col-lg-5 col-md-4 col-sm-6 col-5">
                                <h5 class="setting-title">
                                    PAYMOB MOBILE WALLET INTEGRATION ID</h5>
                            </div>
                            <div class="col-lg-7 col-md-8 col-sm-6 col-7"><input type="text"
                                    name="PAYMOB_MOBILE_WALLET_INTEGRATION_ID"
                                    value="{{ env('PAYMOB_MOBILE_WALLET_INTEGRATION_ID') }}" class="form-control"></div>
                        </div>

                        <button type="submit" class="btn btn-success btn-md nextBtn btn-lg ">Submit</button>

                    </form>
                </div>
            </div>

        </div>

        <div class="col-md-6">

        </div>
    </div>
@endsection
