@extends('pages.account.account')

@section('content_account')
    <div class="col-xl-9 col-lg-8">
        <div class="tab-content" id="v-pills-tabContent">
            <form action="#">
                <div class="card common-card">
                    <div class="card-body">
                        <h6 class="loginRegister__title text-poppins">
                            Password Change
                        </h6>

                        <div class="row gy-lg-4 gy-3">
                            <div class="col-12">
                                <label for="current-passwordd" class="form-label">Current Password</label>
                                <div class="position-relative">
                                    <input type="password" class="common-input" placeholder="Password"
                                        id="current-passwordd" />
                                    <span class="password-show-hide fas fa-eye toggle-password la-eye-slash"
                                        id="#current-passwordd"></span>
                                </div>
                            </div>
                            <div class="col-12">
                                <label for="new-passwordd" class="form-label">New Password</label>
                                <div class="position-relative">
                                    <input type="password" class="common-input" placeholder="New Password"
                                        id="new-passwordd" />
                                    <span class="password-show-hide fas fa-eye toggle-password la-eye-slash"
                                        id="#new-passwordd"></span>
                                </div>
                            </div>
                            <div class="col-12">
                                <label for="confirm-passwordd" class="form-label">Confirm Password</label>
                                <div class="position-relative">
                                    <input type="password" class="common-input" placeholder="Confirm Password"
                                        id="confirm-passwordd" />
                                    <span class="password-show-hide fas fa-eye toggle-password la-eye-slash"
                                        id="#confirm-passwordd"></span>
                                </div>
                            </div>
                            <div class="col-12">
                                <button type="submit" class="btn btn-main w-100">
                                    Save Changes
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    </div>
@endsection
