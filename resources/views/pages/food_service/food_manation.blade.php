@extends('pages.food_service.food_service')

@section('css')
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
            top: 22px;
            right: 20px;
        }

        .title_mng_food {
            background-color: rgb(255, 165, 0);
            padding: 15px 0;
            margin-bottom: 40px;
        }

        .title {
            margin: auto;
            text-align: center;
            color: #fff;
        }

        .cart-item__title .link {
            width: 150px !important;
        }

        .btn_add_food {
            background: var(--main-gradient);
            color: hsl(var(--white));
        }
    </style>
@endsection

@section('content')
    <div class="col-xl-9 col-lg-9">
        <div class="tab-content" id="v-pills-tabContent">
            <div class="card card-body filter_booking mb-3">
                <div style="display: flex; justify-content: space-between">
                    <form action="/food/manation/search_food" method="post" class="w-50 ms-3">
                        @csrf
                        <input type="text" name="infor" id="" placeholder="{{__("Food Name")}}" class=""
                            style="height: 100%">
                        <button type="submit" class="btn_search_booking"><i
                                class="fa-solid fa-magnifying-glass"></i></button>
                    </form>
                    <button class="btn btn_add_food" data-bs-toggle="modal" data-bs-target="#modal_add_food">{{__("Add food")}}</button>
                </div>
            </div>
            @if (session('success'))
                <div class="alert alert-success alert-dismissble">
                    {{ session('success') }}
                </div>
            @endif

            @if ($errors->any())
                <div class="alert alert-danger alert-dismissble">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="tab-content" id="v-pills-tabContent">
                <div class="overflow-auto">
                    <div class="card common-card min-w-maxContent">
                        <div class="card-body">
                            <table class="table style-two">
                                <thead>
                                    <tr>
                                        <th>{{ __('Food Information') }}</th>
                                        <th>{{ __('Price') }}</th>
                                        <th>{{ __('Status') }}</th>
                                        <th>{{ __('Action') }}</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if (!empty($food))
                                        @foreach ($food as $item)
                                            @php
                                                $image = $item['image'];
                                            @endphp
                                            <tr>
                                                <td>
                                                    <div class="d-flex align-items-center gap-3">
                                                        <div class="cart-item__thumb">
                                                            <img src='{{ asset("restaurant/food/$image") }}'
                                                                alt="" />
                                                        </div>
                                                        <div class="cart-item__content">
                                                            <h6 class="cart-item__title">
                                                                <div href="property.html"
                                                                    class="link">{{ $item['name'] }}</div>
                                                            </h6>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <span class="" id="">{{ $item['price'] }}</span>
                                                </td>
                                                <td>
                                                    <div class="form-check form-switch d-flex justify-content-center">
                                                        <input class="form-check-input status" type="checkbox"
                                                            role="switch" id="flexSwitchCheckChecked"
                                                            data-id={{ $item['id'] }}
                                                            {{ $item['status'] == 'available' ? 'checked' : '' }}>
                                                    </div>
                                                </td>
                                                <td>
                                                    <button type="button"
                                                        class="link text-main text-decoration-underline font-14 text-poppins btn_edit_food"
                                                        data-bs-toggle="modal" data-bs-target="#modal_editfood"
                                                        data-bs-dismiss="modal" aria-label="Close"
                                                        data-id={{ $item['id'] }}><i class="fa-solid fa-pen"></i>
                                                    </button>

                                                    <button style="margin-left: 5px" data-bs-toggle="modal"
                                                        data-bs-target="#modal_delete_food" class="btn_detele_food"
                                                        data-id={{ $item['id'] }}>
                                                        <i class="fa-solid fa-trash-can"></i>
                                                    </button>
                                                </td>
                                                <td></td>
                                            </tr>
                                        @endforeach
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <nav aria-label="Page navigation example" style="padding-bottom: 50px;">
                    <ul class="pagination common-pagination">
                        {{ $food->links() }}
                    </ul>
                </nav>
            </div>
        </div>
    </div>

    {{-- start modal add food --}}
    <div class="modal fade" id="modal_add_food" tabindex="-1" aria-labelledby="modal_add_food" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title fs-5" id="exampleModalLabel">
                        {{__("Add New Food")}}</h6>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="/food/manation/add_food" enctype="multipart/form-data" method="post">
                        @csrf
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="name" id="add_foodname"
                                placeholder="Food Name" required>
                            <label for="add_foodname">{{__("Food Name")}}</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="number" class="form-control" name="price" id="add_price" placeholder="Price"
                                required>
                            <label for="add_price">{{__("Price")}}</label>
                        </div>
                        <div class="mb-3">
                            <input class="form-control form-control-lg" name="image" type="file"
                                id="formFileMultiple" required>
                        </div>
                        <button class="btn btn-main mb-3 w-100" type="submit">{{__("Add New Food")}}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    {{-- end modal add food --}}

    {{-- start modal delete food --}}
    <div class="modal fade" id="modal_delete_food" tabindex="-1" aria-labelledby="modal_delete_food"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title fs-5" id="exampleModalLabel">{{__("Delete Food")}}</h6>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <span>{{__("Are you sure you want to delete?")}}</span>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{__("Close")}}</button>
                    <button type="button" class="btn btn-main comfirm">{{__("Delete")}}</button>
                </div>
            </div>
        </div>
    </div>
    {{-- end modal delete food --}}

    <div class="toast-container p-3 top-0 end-0">
        <div id="liveToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header">
                {{-- <img src="..." class="rounded me-2" alt="..."> --}}
                <strong class="me-auto">{{ __('Notification') }}</strong>
                {{-- <small>11 mins ago</small> --}}
                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="toast-body">
                {{__("Success!!!")}}
            </div>
        </div>
    </div>
@endsection

@include('pages.food_service.modal_edit_food')

@section('js')
    <script>
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $(document).on('click', 'input.status', function() {

                let status = '';
                let id_food = $(this).attr('data-id');

                if ($(this).prop('checked')) {
                    status = 'available';
                } else {
                    status = 'unavailable';
                }

                $.ajax({
                    type: "post",
                    url: "/food/manation/change_status",
                    data: {
                        status: status,
                        id_food: id_food,
                    },
                    dataType: "json",
                });
            });

            let id_food = '';
            let __this = '';

            $(document).on('click', 'button.btn_detele_food', function() {
                id_food = $(this).attr('data-id');
                __this = $(this).closest('tr');
            })

            $(document).on('click', 'button.comfirm', function() {
                $.ajax({
                    type: "post",
                    url: "/food/manation/delete_food",
                    data: {
                        id_food: id_food,
                    },
                    dataType: "json",
                    success: function(response) {
                        let mess = response.mess;

                        if (mess) {
                            $('#modal_delete_food').modal(
                                'hide');
                            var toast = new bootstrap.Toast(
                                document.getElementById(
                                    'liveToast'));
                            toast.show();
                            __this.remove();
                        }
                    }
                });
            })

            $(document).on('click', 'button.btn_edit_food', function() {
                let id_food = $(this).attr('data-id');
                $('#modal_editfood').find('#form_edit').attr('action', '/food/manation/edit_food/' + id_food)

                $.ajax({
                    type: "post",
                    url: "/food/manation/fill_modal",
                    data: {
                        id_food: id_food,
                    },
                    dataType: "json",
                    success: function(response) {
                        let mess = response.food;

                        console.log(mess);

                        if (mess) {
                            $('#foodname').val(mess.name);
                            $('#price').val(mess.price);
                            $('h4.title_edit').text('Edit ' + mess.name);
                        }
                    }
                });
            });
        });
    </script>
@endsection
