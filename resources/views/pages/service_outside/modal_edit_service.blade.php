<div class="modal fade" id="modal_editservice" tabindex="-1" aria-labelledby="signin" aria-hidden="true" style="z-index: 9999">
    <div class="modal-dialog modal-md">
        <div class="modal-content" style="padding: 0 15px">
            <div class="modal-header">
                <h4 class="loginRegister__title text-poppins">{{__("Edit Service")}}</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="form_edit" action="" method="post" enctype="multipart/form-data" >
                    @csrf
                    <div class="row gy-lg-4 gy-3">
                        <div class="col-12">
                            <label for="service_name" class="form-label">{{__("Name")}}</label>
                            <input type="text" class="common-input nameservice" placeholder="Service Name" name="name" id="servicename">
                        </div>
                        
                        <div class="col-12">
                            <label for="price" class="form-label">{{__("Price")}}</label>
                            <input type="text" class="common-input price" placeholder="Price" name="price" id="price">
                        </div>

                        <div class="col-12">
                            <label for="image" class="form-label">{{__("Image")}}</label>
                            <input type="file" class="common-input" placeholder="image" name="image" id="image">
                        </div>  

                        <div class="col-12">
                            <button type="submit" class="btn btn-main w-100"> {{__("Update")}}<span class="icon-right"> <i
                                        class="far fa-paper-plane"></i>
                                </span> </button>
                        </div>
                        
                    </div>
                </form>
            </div>
            {{-- <div class="modal-footer" style="text-align: center">
                <div class="text-center" style="display: flex; flex-direction: column; margin: auto">

                    <a href="https://cribmed.com/facebook/login"><img class="mb-2 entered loaded" width="280"
                            data-src="https://cribmed.com/images/fb-login.png" data-ll-status="loaded"
                            src="https://cribmed.com/images/fb-login.png"></a>

                    <a href="https://cribmed.com/login/google"><img class="entered loaded" width="280"
                            data-src="https://cribmed.com/images/gl-login.png" data-ll-status="loaded"
                            src="https://cribmed.com/images/gl-login.png"></a>
                </div>
            </div> --}}
        </div>
    </div>
</div>

