@extends('pages.account.account')
@section('content_account')
    <div class="col-xl-9 col-lg-8">
        <div class="tab-content" id="v-pills-tabContent">
            <div class="card common-card mb-4">
                <div class="card-body">
                    <div class="profile-info d-flex gap-4 align-items-center">
                        @php
                            $avatar = '';
                            $check = empty($data['avatar']);
                            $url = $data['avatar'];

                            if ($check) {
                                $avatar = asset('assets/customer/images/thumbs/team1.png');
                            } else {
                                $avatar = asset("/customer/avatar/$url");
                            }
                        @endphp
                        <div class="profile-info__thumb">
                            <img src="{{ $avatar }}" alt="" />
                        </div>
                        <div class="profile-info__content">

                            <h4 class="profile-info__title text-poppins mb-4">
                                {{ $data['user']['name'] }}
                            </h4>
                            <div class="contact-info d-flex gap-3 align-items-center mb-2">
                                <span class="contact-info__icon text-gradient"><i class="fas fa-map-marker-alt"></i></span>
                                <div class="contact-info__content">
                                    <span class="contact-info__address">{{ $data['user']['address'] }}</span>
                                </div>
                            </div>
                            <div class="contact-info d-flex gap-3 align-items-center mb-2">
                                <span class="contact-info__icon text-gradient"><i class="fas fa-phone"></i></span>
                                <div class="contact-info__content">
                                    <span class="contact-info__address">{{ $data['user']['phone'] }}</span>
                                </div>
                            </div>
                            <div class="contact-info d-flex gap-3 align-items-center mb-2">
                                <span class="contact-info__icon text-gradient"><i class="fas fa-envelope"></i></span>
                                <div class="contact-info__content">
                                    <span class="contact-info__address">{{ $data['account']['email'] }}</span>
                                </div>
                            </div>

                            <div class="contact-info d-flex gap-3 align-items-center">
                                <span class="contact-info__icon text-gradient"><i
                                        class="fa-solid fa-cake-candles"></i></i></span>
                                <div class="contact-info__content">
                                    <span
                                        class="contact-info__address">{{ substr($data['user']['birth_date'], 0, 10) }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card common-card">
                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success alert-dismissble">
                            {{ session('success') }}
                        </div>
                    @endif

                    <form action="/profile/profile/edit" enctype="multipart/form-data" method="post">
                        @csrf
                        <h6 class="loginRegister__title text-poppins">
                            {{ __('Your Information') }}
                        </h6>

                        <div class="row gy-lg-4 gy-3">
                            <div class="col-sm-6 col-xs-6">
                                <label for="name" class="form-label">{{ __('Name') }}</label>
                                <input type="text" class="common-input name" name="name"
                                    value="{{ $data['user']['name'] }}" id="name" />
                                @error('name')
                                    <div class="mt-2 text-danger">
                                        <small>{{ $message }}</small><br>
                                    </div>
                                @enderror
                            </div>

                            <div class="col-sm-6 col-xs-6">
                                <label for="email" class="form-label">{{ __('Email') }}</label>
                                <input type="email" class="common-input" name="email"
                                    value="{{ $data['account']['email'] }}" id="email" disabled />
                            </div>
                            <div class="col-sm-6 col-xs-6">
                                <label for="phone" class="form-label">{{ __('Phone') }}</label>
                                <input type="tel" class="common-input phone" name="phone"
                                    value="{{ $data['user']['phone'] }}" id="phone" />
                                @error('phone')
                                    <div class="mt-2 text-danger">
                                        <small>{{ $message }}</small><br>
                                    </div>
                                @enderror
                            </div>
                            <div class="col-sm-6 col-xs-6">
                                <label for="avatar" class="form-label">{{ __('avatar') }}</label>
                                <input type="file" class="common-input avatar" name="avatar" id="avatar" />
                                @error('avatar')
                                    <div class="mt-2 text-danger">
                                        <small>{{ $message }}</small><br>
                                    </div>
                                @enderror
                            </div>
                            @php
                                $date = date("Y-m-d", strtotime($data['user']['birth_date']));
                            @endphp
                            <div class="col-sm-6 col-xs-6">
                                <label for="birth_date" class="form-label">{{ __('Birthday') }}</label>
                                <input type="date" value="{{$date}}" class="common-input birthday" name="birth_date"
                                    id="birth_date" />
                            </div>

                            <div class="col-sm-6 col-xs-6">
                                <label for="gender" class="form-label">{{ __('Gender') }}</label>
                                <div class="select-has-icon">
                                    @php
                                        if (!empty($data['users']['gender'])) {
                                            $gender = $data['user']['gender'];
                                        } else {
                                            $gender = '';
                                        }
                                    @endphp
                                    <select class="form-select common-input text-gray-800 gender" name="gender">
                                        <option value="{{ $gender }}" disabled="" selected="">
                                            @if (!empty($data['user']['gender']))
                                                {{ $data['user']['gender'] }}
                                            @else
                                                {{ __('Select Your Gender') }}
                                            @endif
                                        </option>
                                        <option value="Male">
                                            Male
                                        </option>
                                        <option value="Female">
                                            Female
                                        </option>
                                        <option value="Other">
                                            Other
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <label for="address" class="form-label">{{ __('Address') }}</label>
                                <textarea class="common-input address" placeholder="Your Address" aria-valuetext="" name="address" id="address">{{ $data['user']['address'] }}</textarea>
                            </div>
                            <div class="col-12">
                                <button type="submit" class="btn btn-main w-100" id="liveToastBtn"s>
                                    {{ __('Update information') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="toast-container position-fixed bottom-0 end-0 p-3">
        <div id="liveToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header">
                <img src="..." class="rounded me-2" alt="...">
                <strong class="me-auto">Success!!!</strong>
                <small>Now</small>
                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="toast-body">
                Your information have been update !!!
            </div>
        </div>
    </div>
    {{-- end home account --}}
@endsection

@section('js')
    <script>
        // Định dạng ngày cần chuyển đổi (dd/mm/yyyy)
        var ngayCanChuyenDoi = {{$data['user']['birth_date']}};

        // Chuyển đổi sang định dạng yyyy-mm-dd
        var ngayChuyenDoi = ngayCanChuyenDoi.split('/').reverse().join('-');

        // Lấy thẻ input theo ID
        var inputNgay = document.getElementById('birth_date');

        // Gán giá trị vào thuộc tính value của input
        inputNgay.value = ngayChuyenDoi;
        // $(document).ready(function() {

        //     $('button#liveToastBtn').click(function(e) {
        //         e.preventDefault();

        //         let name = $('input.name').val();
        //         let phone = $('input.phone').val();
        //         let gender = $('select.gender').val();
        //         let address = $('textarea.address').val();
        //         let avatar = $('input.avatar')[0].files[0] || '';
        //         let birthday = $('input.birthday').val();
        //         let id_user = "{{ Auth::id() }}";
        //         // console.log(image);

        //         let form_user = new FormData();

        //         form_user.append('name', name);
        //         form_user.append('phone', phone);
        //         form_user.append('gender', gender);
        //         form_user.append('address', address);
        //         form_user.append('birth_date', birthday);
        //         form_user.append('avatar', avatar);
        //         form_user.append('id_user', id_user);

        //         $.ajax({
        //             type: "post",
        //             url: "{{ url('/profile/profile/edit') }}",
        //             contentType: false,
        //             processData: false,
        //             data: form_user,
        //             success: function(response) {
        //                 console.log(response.data);
        //             },
        //             error: function(xhr, status, error) {
        //                 var errors = xhr.responseJSON.errors;
        //                 html = "";

        //                 $.each(errors, function(key, value) {
        //                     html += "<li>" + value + "</li>";
        //                 });

        //                 console.log(html);
        //                 $('.alert-danger').show();
        //                 $('li.Errors').html(html);
        //             }
        //         });

        //     });


        // });
    </script>
@endsection
