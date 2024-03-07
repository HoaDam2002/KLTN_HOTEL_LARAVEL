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
                            <button type="submit" class="btn btn-main w-100">
                                <a href="" class="submit_comment">Submit</a>
                                <span class="icon-right"> <i class="far fa-paper-plane"></i></span>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@section('js')
    <script>
        $(function() {
            $("#rateYo").rateYo({
                rating: 5,
                fullStar: true,
                onSet: function(rating, rateYoInstance) {
                    console.log("Rating is set to: " + rating);
                }
            });
        });
    </script>
@endsection
