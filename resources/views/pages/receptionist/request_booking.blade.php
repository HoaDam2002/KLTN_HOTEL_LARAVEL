@extends('layout.app')

@section('content')
    <div class="container">
        <div class="card common-card min-w-maxContent" style="margin: 50px 0 50px 0; ">
            <div class="card-body">
                <table class="table style-two" >
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Check In</th>
                            <th>Check Out</th>
                            <th>Deposit</th>
                            <th>Total</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <span>1</span>
                            </td>
                            <td>
                                <span>Antony</span>
                            </td>
                            <td>
                                <span class="date" id="checkin">17/02/2024</span>
                            </td>
                            <td>
                                <span class="date" id="checkout">17/02/2024</span>
                            </td>
                            <td>
                                <span>20$</span>
                            </td>
                            <td>
                                <span>100$</span>
                            </td>
                            <td>
                                <button><i class="fa-solid fa-check" style="margin-right: 15px"></i></button>
                                <button><i class="fa-solid fa-xmark"></i></button>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <span>1</span>
                            </td>
                            <td>
                                <span>Antony</span>
                            </td>
                            <td>
                                <span class="date" id="checkin">17/02/2024</span>
                            </td>
                            <td>
                                <span class="date" id="checkout">17/02/2024</span>
                            </td>
                            <td>
                                <span>20$</span>
                            </td>
                            <td>
                                <span>100$</span>
                            </td>
                            <td>
                                <button><i class="fa-solid fa-check" style="margin-right: 15px"></i></button>
                                <button><i class="fa-solid fa-xmark"></i></button>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <span>1</span>
                            </td>
                            <td>
                                <span>Antony</span>
                            </td>
                            <td>
                                <span class="date" id="checkin">17/02/2024</span>
                            </td>
                            <td>
                                <span class="date" id="checkout">17/02/2024</span>
                            </td>
                            <td>
                                <span>20$</span>
                            </td>
                            <td>
                                <span>100$</span>
                            </td>
                            <td>
                                <button><i class="fa-solid fa-check" style="margin-right: 15px"></i></button>
                                <button><i class="fa-solid fa-xmark"></i></button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
