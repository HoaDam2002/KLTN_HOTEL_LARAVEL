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
                @if (session('success'))
                    <div class="alert alert-success alert-dismissble">
                        {{ session('success') }}
                    </div>
                @endif
                @if (session('error'))
                    <div class="alert alert-warning alert-dismissble">
                        {{ session('error') }}
                    </div>
                @endif
                <div class="card-header">
                    <h6 class="title mb-0">{{__("List Evaluate")}}</h6>
                </div>
                <div class="card-body">
                    <table class="table style-two">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>{{__("Room")}}</th>
                                <th>{{__("Comment")}}</th>
                                <form action="{{ route('search_rate_admin') }}" method="get" id="form_search_rate">
                                    <th>{{__("Rate")}}
                                        @csrf
                                        <select id="search_rate" name="rate">
                                            <option value="5" {{ isset($_GET['rate']) && $_GET['rate'] == 5 ? 'selected' : ''}}>⭐⭐⭐⭐⭐</option>
                                            <option value="4" {{ isset($_GET['rate']) && $_GET['rate'] == 4 ? 'selected' : ''}}>⭐⭐⭐⭐</option>
                                            <option value="3" {{ isset($_GET['rate']) && $_GET['rate'] == 3 ? 'selected' : ''}}>⭐⭐⭐</option>
                                            <option value="2" {{ isset($_GET['rate']) && $_GET['rate'] == 2 ? 'selected' : ''}}>⭐⭐</option>
                                            <option value="1" {{ isset($_GET['rate']) && $_GET['rate'] == 1 ? 'selected' : ''}}>⭐</option>
                                        </select>
                                    </th>
                                    </form>
                                <th>{{__("Status")}}</th>
                                <th>{{__("Action")}}</th>
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
                                            <form action="{{ route('update_status_comment_admin') }}" method="post" class="form_update_status">
                                                @csrf
                                                <input type="hidden" name="id_comment" value="{{ $data->id }}">
                                                <select name="status_comment" class="change_status_comment">
                                                    <option value="show" {{ $data->status == 'show' ? 'selected' : '' }}>{{__("Show")}}</option>
                                                    <option value="hide" {{ $data->status == 'hide' ? 'selected' : '' }}>{{__("Hide")}}</option>
                                                </select>
                                            </form>
                                        </td>
                                        <td>
                                            <div>
                                                <button class="rounded-btn  text-danger bg-danger bg-opacity-10 flex-shrink-0 btn_delete_comment" data-bs-toggle="modal" data-bs-target="#modal_delete_comment" data-id='{{ $data->id }}'><i
                                                            class="fas fa-trash-alt"></i></button>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                    <nav aria-label="Page navigation example" style="padding-bottom: 50px;">
                        <ul class="pagination common-pagination">
                            {{ $data_evaluate->links() }}
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modal_delete_comment" tabindex="-1" aria-labelledby="modal_delete_comment" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title fs-5" id="exampleModalLabel">{{__("Delete Comment")}}</h6>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="POST" action="{{ route('delete_comment_admin') }}">
                    @csrf
                    <div class="modal-body">
                        <input type="hidden" name="id_comment" id="id_comment">
                        <span>{{__("Are you sure you want to delete?")}}</span>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{__("Close")}}</button>
                        <button type="submit" id="btn_delete_comment" class="btn btn-main comfirm">{{__("Delete")}}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>
        $(document).ready(function () {
            $('.change_status_comment').change(function () {
                $(this).closest('form').submit();
            })

            $('.btn_delete_comment').click(function () {
                var id_comment = $(this).attr('data-id');
                $('#id_comment').val(id_comment);
            })

            $('#search_rate').change(function () {
                $('#form_search_rate').submit();
            })
        })
    </script>
@endsection
