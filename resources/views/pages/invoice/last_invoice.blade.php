@extends('layout.app')

@section('css')
    <style>
        .invoice {
            width: 60%;
            margin: auto;
            margin-bottom: 200px;
            margin-top: 100px;
        }

        .title {
            font-weight: bold;
            text-align: center;
            font-size: 40px;
            background-color: rgb(246,143,32);
        }

        .check_time {
            display: flex;
        }

        .content {
            width: 50%;
        }

        .title_content {
            font-weight: bold;

        }

        .boxs {
            padding-left: 50px;
            padding-bottom: 20px;
        }

        .content-t {
            width: 50%;
            font-weight: bold;
        }

        .bd {
            background-color: rgb(255, 255, 255);
            border: 2px;
        }

        .total{
            font-size: 30px;
        }
    </style>
@endsection

@section('content')
    <div class="container">
        <div class="invoice">
            <p class="title bd">Request</p>
            <div class="check_time boxs bd">
                <div class="content">
                    <p class="title_content">Check In</p>
                    <p>01 Nov 2023</p>
                </div>
                <div class="content">
                    <p class="title_content">Check Out</p>
                    <p>29 Nov 2023</p>
                </div>
            </div>

            <div class="boxs bd">
                <div class="check_time">
                    <p class="title_content content">Hotel Service Price:</p>
                    <span class="content-t">25$</span>
                </div>
                <div>
                    <div class="check_time">
                        <p class="title_content content">Food Service Price:</p>
                        <span class="content-t">25$</span>
                    </div>
                    <div class="check_time">
                        <p class="content">- Fish</p>
                        <p class="content">$5</p>
                    </div>
                </div>
                <div>
                    <div class="check_time">
                        <p class="title_content content">OutSide Service Price: </p>
                        <p class="content-t">25$</p>
                    </div>
                    <div class="check_time">
                        <p class="content">- Tenis</p>
                        <p class="content">$5</p>
                    </div>
                </div>
            </div>

            <div class="boxs bd">
                <div>
                    <div class="check_time">
                        <p class="title_content content total">Total: </p>
                        <span class="content-t total">25$</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
