@extends('pages.admin.admin')

<style>
    span.status {
        color: #fff;
        padding: 5px 10px;
        border-radius: 40px;
        min-width: 85px;
    }

    .status.cancel {
        background-color: orange;
    }

    .status.confirm {
        background-color: green;
    }

    .status.pending {
        background-color: blue;
    }

    .status.finish {
        background-color: black;
    }

    .status.checkin {
        background-color: crimson;
    }

    .btn_filter {
        background: var(--main-gradient);
        color: #fff;
        padding: 8px 20px;
    }

    .filter_booking form {
        position: relative;
    }

    .filter_booking input {
        width: 100%;
        padding: 8px 15px;
        outline: none;
    }

    .btn_search_booking {
        position: absolute;
        top: 15px;
        right: 20px;
    }

    .text {
        font-size: 13px;
    }
</style>
@section('content')
                <div class="col-lg-9">
                    <div class="overflow-auto">
                        <div class="card common-card min-w-maxContent">
                            <div class="card-header">
                                <h6 class="title mb-0">List Evaluate</h6>
                            </div>
                            <div class="card-body">
                                <table class="table style-two">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Room</th>
                                            <th>Comment</th>
                                            <th>Rate
                                                <select>
                                                    <option value="5">⭐⭐⭐⭐⭐</option>
                                                    <option value="4">⭐⭐⭐⭐</option>
                                                    <option value="3">⭐⭐⭐</option>
                                                    <option value="2">⭐⭐</option>
                                                    <option value="1">⭐</option>
                                                </select>
                                            </th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if (isset($data_evaluate))
                                            @foreach ($data_evaluate as $data)
                                                <tr>
                                                    <td>
                                                        {{ $data->id }}
                                                    </td>
                                                    <td>
                                                        {{ $data->typeroom->name }}
                                                    </td>

                                                    <td>
                                                        <h6 class="cart-item__totalPrice font-16 fw-500 mb-0">{{ $data->comment }}</h6>
                                                    </td>
                                                    <td>
                                                        @switch($data->rate)
                                                            @case(1)
                                                                <span>⭐</span>
                                                                @break
                                                            @case(2)
                                                                <span>⭐⭐</span>
                                                            @break
                                                            @case(3)
                                                                <span>⭐⭐⭐</span>
                                                            @break
                                                            @case(4)
                                                                <span>⭐⭐⭐⭐</span>
                                                            @break
                                                                @case(5)
                                                                    <span>⭐⭐⭐⭐⭐</span>
                                                                @break
                                                            @default

                                                        @endswitch
                                                    </td>
                                                    <td>
                                                        <div>
                                                        <button type="button" class="rounded-btn  text-danger bg-danger bg-opacity-10 flex-shrink-0"><i class="fas fa-trash-alt"></i></button>
                                                        <button type="button" class="rounded-btn text-danger bg-danger bg-opacity-10 flex-shrink-0"><i class="fa-regular fa-eye-slash"></i></button>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

    </section>
@endsection
