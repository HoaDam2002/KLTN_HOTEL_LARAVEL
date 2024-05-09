@section('css')
    <style>
        .submit_comment {
            color: #fff;
            font-size: 20px
        }
    </style>
@endsection


<div class="modal fade" id="modal_evaluate" tabindex="-1" aria-labelledby="evaluate" aria-hidden="true"
    style="z-index: 9999">
    <div class="modal-dialog modal-md">
        <div class="modal-content" style="padding: 0 15px">
            <div class="modal-header">
                <h4 class="loginRegister__title text-poppins">
                    Welcome to DanaHotel's room review form</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="#">
                    <div class="row gy-lg-4 gy-3">

                        <div class="col-12">
                            <div id="rateYo"></div>
                        </div>
                        <div class="col-12">
                            <label for="comment" class="form-label">Comment</label>
                            <div class="position-relative">
                                <textarea class="common-input" name="comment" id="comment" cols="30" rows="10" placeholder="Your Comment"></textarea>
                            </div>
                        </div>

                        <div class="col-12">
                            <button type="button" class="btn btn-main w-100 submit_comment">
                                Submit
                                <span class="icon-right"> <i class="far fa-paper-plane"></i></span>
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
            {{-- <img src="..." class="rounded me-2" alt="..."> --}}
            <strong class="me-auto">{{ __('Notification') }}</strong>
            {{-- <small>11 mins ago</small> --}}
            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
        <div class="toast-body">
            Success!!!
        </div>
    </div>
</div>

@section('js')
    <script>
        $(document).ready(function() {
            let rate = 5;
            let id_room = '';
            let check_commented = '';

            $(function() {
                $("#rateYo").rateYo({
                    rating: 5,
                    fullStar: true,
                    onSet: function(rating, rateYoInstance) {
                        console.log("Rating is set to: " + rating);
                        rate = rating;
                    }
                });
            });

            $(document).on('click', 'button.action', function() {
                let status = $(this).closest('tr').find('.status').text();
                id_room = $(this).attr('id');

                check_commented = $(this).hasClass('true');

                console.log(check_commented, status);

                if (status == 'confirm' || status == 'cancel' || status == 'pending') {
                    $(this).closest('.btn-action').find('button.btn_rating').prop('disabled', true);
                } else {
                    if (!check_commented) {
                        $(this).closest('.btn-action').find('button.btn_rating').prop('disabled', false);
                    } else {
                        $(this).closest('.btn-action').find('button.btn_rating').prop('disabled', true);

                    }
                }
            })


            $(document).on('click', 'button.submit_comment', function() {
                let comment = $(this).closest('.modal-body').find('textarea#comment').val();

                let id_booking = $('.btn_rating').attr('id');

                $.ajax({
                    type: "post",
                    url: "/customer/my-bookings/rating",
                    data: {
                        id_booking: id_booking,
                        comment: comment,
                        rate: rate,
                        id_room: id_room
                    },
                    dataType: "json",
                    success: function(response) {
                        $('#modal_evaluate').modal(
                            'hide');
                        var toast = new bootstrap.Toast(
                            document.getElementById(
                                'liveToast'));
                        toast.show();
                        $('.btn-action').find('button.btn_rating').prop(
                            'disabled', true);

                    }
                });

            })




        });
    </script>
@endsection
