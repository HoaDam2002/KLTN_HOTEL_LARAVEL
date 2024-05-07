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
        top: 22px;
        right: 20px;
    }

    .text {
        font-size: 13px;
    }
</style>

@section('content')
    <div class="col-lg-9">
        <div class="overflow-auto">
            <div class="card card-body filter_booking mb-3">
                <div style="display: flex; justify-content: space-between">
                    <form action="/admin/search/user" method="get" class="w-50 ms-3">
                        @csrf
                        <input type="text" name="value_search_user" id="" placeholder="Email User Or ID" class=""
                            style="height: 100%">
                        <button type="submit" class="btn_search_booking"><i class="fa-solid fa-magnifying-glass"></i></button>
                    </form>
                    <button class="btn btn-main" data-bs-toggle="modal" data-bs-target="#modal_add_staff">Add Staff</button>
                </div>
            </div>
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
                    <h6 class="title mb-0">List Account User </h6>
                </div>
                <div class="card-body">
                    <table class="table style-two">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (isset($data_users))
                                @foreach ($data_users as $user)
                                    <tr>
                                        <td><strong>{{ $user->id }}</strong></td>
                                        <td>
                                            <div class="d-flex align-items-center gap-3">
                                                <div class="">
                                                    <h6 class="cart-item__title fw-500 font-18"> <a href="property.html"
                                                            class="link">{{ $user->name }}</a></h6>

                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <span
                                                style="margin-right: 15px">{{ $user->customer ? $user->customer->account->email : ($user->staff ? $user->staff->account->email : '') }}</span>
                                        </td>
                                        <td>
                                            @if ($user->role === 'customer')
                                                <span>Customer</span>
                                            @else
                                                <form action="/admin/set_role_user" method="POST">
                                                    @csrf
                                                    <input type="hidden" name="id_user" value="{{ $user->id }}">
                                                    <select name="role_user" class="list_role_user">
                                                        <option value="admin" {{ $user->role === 'admin' ? 'selected' : '' }}>Admin</option>
                                                        <option value="receptionist" {{ $user->role === 'receptionist' ? 'selected' : '' }}>
                                                            Receptionist</option>
                                                        <option value="service" {{ $user->role === 'service' ? 'selected' : '' }}>Service
                                                        </option>
                                                        <option value="restaurant" {{ $user->role === 'restaurant' ? 'selected' : '' }}>
                                                            Restaurant
                                                        </option>
                                                    </select>
                                                </form>
                                            @endif
                                        </td>
                                        <td>
                                            <!-- Button trigger modal -->
                                            @if ($user->role != 'customer')
                                                <button data-bs-toggle="modal" data-bs-target="#modal_edit_staff" type="button"
                                                    class="btn_edit_staff rounded-btn edit-btn  text-primary bg-primary bg-opacity-10 flex-shrink-0"
                                                    data-userid="{{ $user->id }}"
                                                    data-accountid="{{ $user->staff ? $user->staff->id_account : '' }}"><i
                                                        class="fa-sharp fa-solid fa-pen-to-square"></i></button>
                                            @endif
                                            @if ($user->customer || $user->staff)
                                                <button type="button"
                                                    class="rounded-btn text-danger bg-danger bg-opacity-10 flex-shrink-0 btn_delete_user"
                                                    data-bs-toggle="modal" data-bs-target="#modal_delete_user"
                                                    data-userid="{{ $user->customer ? $user->customer->id : ($user->staff ? $user->staff->id : '') }}"
                                                    data-role="{{ $user->role }}">
                                                    <i class="fas fa-trash-alt"></i>
                                                </button>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                    <nav aria-label="Page navigation example" style="padding-bottom: 50px;">
                        <ul class="pagination common-pagination">
                            {{ $data_users->links() }}
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modal_delete_user" tabindex="-1" aria-labelledby="modal_delete_user" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title fs-5" id="exampleModalLabel">Delete User</h6>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="POST" action="/admin/list_users/delete" id="delete_user">
                    @csrf
                    <div class="modal-body">
                        <input type="hidden" name="user_id" id="user_id">
                        <input type="hidden" name="role" id="role">
                        <span>Are you sure you want to delete?</span>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" id="btn_delete_user" class="btn btn-main comfirm">Delete</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modal_add_staff" tabindex="-1" aria-labelledby="modal_add_staff" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title fs-5" id="exampleModalLabel">Add Staff</h6>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="POST" action="{{ route('create_account_staff') }}" class="needs-validation" novalidate>
                    @csrf
                    <div class="modal-body">
                        <div class="form-floating mb-3 validation">
                            <input type="email" class="form-control" name="email" id="floatingInput" placeholder="name@example.com"
                                required>
                            <label for="floatingInput">Email address</label>
                            <div class="invalid-feedback">
                                This field is required.
                            </div>
                        </div>
                        <div class="form-floating mb-3 validation">
                            <input type="password" class="form-control" name="password" id="floatingPassword" placeholder="Password"
                                required>
                            <label for="floatingPassword">Password</label>
                            <div class="invalid-feedback">
                                This field is required.
                            </div>
                        </div>
                        <div class="form-floating mb-3 validation">
                            <input type="text" class="form-control" name="name" id="floatingName" placeholder="Name" required>
                            <label for="floatingName">Name</label>
                            <div class="invalid-feedback">
                                This field is required.
                            </div>
                        </div>
                        <div class="form-floating mb-3">
                            <select class="form-control" id="nationality" name="nationality"></select>
                            <label for="nationality">Nationality</label>
                        </div>
                        <div class="form-floating mb-3">
                            <select class="form-control" id="floatingRole" name="role_staff">
                                <option value="admin">Admin</option>
                                <option value="receptionist">Receptionist</option>
                                <option value="service">service</option>
                                <option value="restaurant">restaurant</option>
                            </select>
                            <label for="floatingRole">Role</label>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-main comfirm" id="btn_create_account_staff">Create</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- Start modal edit staff --}}
    <div class="modal fade" id="modal_edit_staff" tabindex="-1" aria-labelledby="modal_edit_staff" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title fs-5" id="exampleModalLabel">Edit Information Staff</h6>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="POST" action="{{ route('edit_info_staff') }}" class="needs-validation" novalidate>
                    @csrf
                    <div class="modal-body">
                        <input type="hidden" name="id_user">
                        <div class="form-floating mb-3 validation">
                            <input type="text" class="form-control" name="staff_name" id="floatingInput" placeholder="Full name"
                                required pattern="^[a-zA-Z\sàáạảãâầấậẩẫăằắặẳẵèéẹẻẽêềếệểễìíịỉĩòóọỏõôồốộổỗơờớợởỡùúụủũưừứựửữỳýỵỷỹđĐ]+$">
                            <label for="floatingInput">Name</label>
                            <div class="invalid-feedback">
                                This field is required.
                            </div>
                        </div>
                        <div class="form-floating mb-3 validation">
                            <input type="text" class="form-control" name="staff_phone" id="floatingPhone" placeholder="Phone" required
                                pattern="[0-9]{10,11}">
                            <label for="floatingPhone">Phone</label>
                            <div class="invalid-feedback">
                                This field is required.
                            </div>
                        </div>
                        <div class="form-floating mb-3 validation">
                            <input type="text" class="form-control" name="staff_birthday" id="floatingBirthday" placeholder="Birthday"
                                required pattern="\d{2}/\d{2}/\d{4}">
                            <label for="floatingBirthday">Birthday</label>
                            <div class="invalid-feedback">
                                This field is required.
                            </div>
                        </div>
                        <div class="form-floating mb-3 validation">
                            <input type="text" class="form-control" name="staff_address" id="floatingAddress" placeholder="Address"
                                required>
                            <label for="floatingAddress">Address</label>
                            <div class="invalid-feedback">
                                This field is required.
                            </div>
                        </div>
                        <div class="form-floating mb-3 validation">
                            <select class="form-control" name="staff_gender" id="floatingGender" required>
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                            </select>
                            <label for="floatingGendery">Gender</label>
                            <div class="invalid-feedback">
                                This field is required.
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" id="btn_modal_change_pass" class="btn btn-secondary" data-bs-dismiss="modal"
                            data-bs-toggle="modal" data-bs-target="#modal_change_pass_staff" data-idaccount=''>Change Pass</button>
                        <button type="submit" class="btn btn-main comfirm" id="btn_create_account_staff">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{-- end modal edit staff --}}

    {{-- start modal change pass staff --}}
    <div class="modal fade" id="modal_change_pass_staff" tabindex="-1" aria-labelledby="modal_change_pass_staff" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title fs-5" id="exampleModalLabel">Delete User</h6>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="POST" action="{{ route('change_pass_staff_admin') }}" id="change_pass_staff" class="needs-validation"
                    novalidate>
                    @csrf
                    <div class="modal-body">
                        <input type="hidden" name="staff_id_account">
                        <div class="form-floating mb-3 validation">
                            <input type="password" class="form-control" name="staff_new_pass" id="floatingNewPass"
                                placeholder="New Password" required>
                            <label for="floatingNewPass">New Password</label>
                            <div class="invalid-feedback">
                                This field is required.
                            </div>
                        </div>
                        <div class="form-floating mb-3 validation">
                            <input type="password" class="form-control" name="confirm_staff_new_pass" id="floatingCFNewPass"
                                placeholder="Confirm New Password" required>
                            <label for="floatingCFNewPass">Confirm New Password</label>
                            <div class="invalid-feedback invalid_confirm_pass">
                                This field is required.
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" id="btn_change_pass_staff" class="btn btn-main comfirm">Change</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{-- end modal change pass staff --}}
@endsection

@section('js')
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        fetch('https://restcountries.com/v3.1/all')
            .then(response => response.json())
            .then(data => {
                const select = document.getElementById("nationality");
                data.forEach(country => {
                    const option = document.createElement("option");
                    option.value = country.name.common;
                    option.text = country.name.common;
                    select.appendChild(option);
                });
            })
            .catch(error => console.error('Error fetching countries:', error));

        $(document).ready(function() {
            var id_user = '';
            $('.btn_delete_user').click(function() {
                id_user = $(this).attr('data-userid');
                role = $(this).attr('data-role');
                $('#user_id').val(id_user);
                $('#role').val(role);
            })

            $('.list_role_user').change(function() {
                $(this).closest('form').submit();
            });


            (() => {
                'use strict';

                const forms = document.querySelectorAll('.needs-validation');

                Array.from(forms).forEach(form => {
                    form.addEventListener('submit', event => {
                        if (!form.checkValidity()) {
                            event.preventDefault();
                            event.stopPropagation();
                            Array.from(form.elements).forEach(element => {
                                if (!element.checkValidity()) {
                                    element.classList.add('is-invalid');
                                }
                            });
                        }
                        form.classList.add('was-validated');
                    }, false);
                });
            })();

            $('#floatingBirthday').on('input', function() {
                var val = this.value.replace(/\D/g, '');
                var formattedDate = '';
                if (val.length <= 8) {
                    var day = val.slice(0, 2);
                    var month = val.slice(2, 4);
                    var year = val.slice(4, 8);

                    if (parseInt(day) > 31) {
                        day = '31';
                    }
                    if (parseInt(month) > 12) {
                        month = '12';
                    }
                    if (parseInt(year) > new Date().getFullYear()) {
                        year = new Date().getFullYear().toString();
                    }

                    if (val.length > 4) {
                        formattedDate = day + '/' + month + '/' + year;
                    } else if (val.length > 2) {
                        formattedDate = day + '/' + month;
                    } else {
                        formattedDate = val;
                    }
                }

                this.value = formattedDate;
            });



            $('.btn_edit_staff').click(function() {
                var id_user = $(this).attr('data-userid');
                var id_account = $(this).attr('data-accountid');
                alert(id_user)
                $.ajax({
                    type: "post",
                    url: "/admin/info_staff",
                    data: {
                        id_user: id_user
                    },
                    success: function(data) {
                        console.log(data);
                        if (data) {
                            var date = new Date(data.birth_date);
                            var year = date.getFullYear();
                            var month = (1 + date.getMonth()).toString().padStart(2, '0');
                            var day = date.getDate().toString().padStart(2, '0');
                            var formattedDate = day + '/' + month + '/' + year;
                            $('input[name="id_user"]').val(data.id);
                            $('input[name="staff_name"]').val(data.name);
                            $('input[name="staff_phone"]').val(data.phone);
                            $('input[name="staff_birthday"]').val(formattedDate);
                            $('input[name="staff_address"]').val(data.address);
                            $('select[name="staff_gender"]').val(data.gender);
                            $('#btn_modal_change_pass').attr('data_idaccount', id_account)
                        }
                    }
                })

            })

            $('#btn_modal_change_pass').click(function() {
                var id_account = $(this).attr('data_idaccount');
                $('input[name="staff_id_account"]').val(id_account);
            })

            $('#change_pass_staff').submit(function(e) {
                e.preventDefault();

                var staff_new_pass = $('input[name="staff_new_pass"]').val();
                var confirm_staff_new_pass = $('input[name="confirm_staff_new_pass"]').val();
                if (staff_new_pass === confirm_staff_new_pass) {
                    if (this.checkValidity()) {
                        this.submit();
                    }
                } else {
                    $('.invalid_confirm_pass').html('<div>Passwords do not match</div>');
                }
            });


        })
    </script>
@endsection
