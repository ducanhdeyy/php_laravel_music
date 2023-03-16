@extends('client.main')
@section('content')
    <div id="content" class="flex">
        <!-- ############ Main START-->
        <div>
            <div class="page-hero page-container" id="page-hero">
                <x-alert />
                <div class="padding d-flex">
                    <div class="page-title">
                        <h2 class="text-md text-highlight">Setting</h2><small class="text-muted">Configure the
                            things</small>
                    </div>
                    <div class="flex"></div>
                    <div></div>
                </div>
                <a-alert />
            </div>
            <div class="page-content page-container" id="page-content">
                <div class="padding">
                    <div id="accordion">
                        <p class="text-muted"><strong>Account</strong></p>
                        <div class="card">
                            <div class="d-flex align-items-center px-4 py-3 pointer collapsed" data-toggle="collapse"
                                data-parent="#accordion" data-target="#c_1" aria-expanded="false">
                                <div><span class="w-48 avatar circle bg-info-lt" data-toggle-class="loading"><img
                                            src="{{ Auth::guard('cus')->user()->image != null ? asset('uploads/' . Auth::guard('cus')->user()->image) : asset('template/client/assets/img/default-user.png') }}"
                                            alt="."></span></div>
                                <div class="mx-3 d-none d-md-block">
                                    <strong>{{ Auth::guard('cus')->user()->name }}</strong>
                                    <div class="text-sm text-muted">{{ Auth::guard('cus')->user()->email }}</div>
                                </div>
                                <div class="flex"></div>
                                <div class="mx-3">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round"
                                        class="feather feather-chevron-right">
                                        <polyline points="9 18 15 12 9 6"></polyline>
                                    </svg>
                                </div>
                                <div><a href="{{ route('logout.user') }}" class="text-prmary text-sm">Sign Out</a>
                                </div>
                            </div>
                            <div class="collapse p-4" id="c_1">
                                <form action="{{ route('update.customer', Auth::guard('cus')->id()) }}" method="post"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group"><label>Profile picture</label>
                                        <div class="custom-file"><input type="file" name="image"
                                                class="custom-file-input" id="customFile" accept=".jpg,.jpeg,.png"><label
                                                class="custom-file-label" for="customFile">Choose file</label></div>
                                    </div>
                                    <div class="form-group">
                                        <label for="name">Name</label>
                                        <input type="text" name="name" id="" class="form-control"
                                            placeholder="name" value="{{ Auth::guard('cus')->user()->name }}"
                                            aria-describedby="helpId">
                                    </div>
                                    <fieldset disabled>
                                        <div class="form-group">
                                            <label for="disabledTextInput">Email</label>
                                            <input type="text" id="disabledTextInput" class="form-control"
                                                placeholder="{{ Auth::guard('cus')->user()->email }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="disabledTextInput">Account balance</label>
                                            <input
                                                style="
                                            color: black;
                                            font-family: fantasy;
                                        "
                                                type="text" id="disabledTextInput" class="form-control"
                                                placeholder="{{ number_format(Auth::guard('cus')->user()->wallet) ?? 0 }} USD">
                                        </div>
                                    </fieldset>
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </form>
                            </div>
                            <div class="d-flex align-items-center px-4 py-3 b-t">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="feather feather-refresh-cw">
                                    <polyline points="23 4 23 10 17 10"></polyline>
                                    <polyline points="1 20 1 14 7 14"></polyline>
                                    <path d="M3.51 9a9 9 0 0 1 14.85-3.36L23 10M1 14l4.64 4.36A9 9 0 0 0 20.49 15"></path>
                                </svg>
                                <div class="px-3">
                                    <div>Sync</div>
                                    <div class="text-sm text-muted">On - Sync everything</div>
                                </div>
                                <div class="flex"></div>
                                <span><label class="ui-switch ui-switch-md"><input type="checkbox" checked="checked">
                                        <i></i></label></span>
                            </div>
                            <div class="d-flex align-items-center px-4 py-3 b-t pointer" data-toggle="collapse"
                                data-parent="#accordion" data-target="#c_2" aria-expanded="false">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round" class="feather feather-lock">
                                    <rect x="3" y="11" width="18" height="11" rx="2"
                                        ry="2"></rect>
                                    <path d="M7 11V7a5 5 0 0 1 10 0v4"></path>
                                </svg>
                                <div class="px-3">
                                    <div>Password</div>
                                </div>
                                <div class="flex"></div>
                                <div>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round"
                                        class="feather feather-chevron-right">
                                        <polyline points="9 18 15 12 9 6"></polyline>
                                    </svg>
                                </div>
                            </div>
                            <div class="p-4 collapse" id="c_2" style="">

                                <form class="needs-validation" novalidate method="post"
                                    action="{{ route('password.change', Auth::guard('cus')->id()) }}">
                                    @csrf
                                    <div class="form-row">
                                        <div class="col-md-12 mb-3">
                                            <label for="validationCustom03">Old Password</label>
                                            <input type="password" class="form-control" id="validationCustom03" required
                                                name="password_old">
                                            <div class="invalid-feedback">
                                                Please provide a Old Password.
                                            </div>
                                        </div>
                                        <div class="col-md-12 mb-3">
                                            <label for="validationCustom03">New Password</label>
                                            <input type="password" class="form-control" id="validationCustom03" required
                                                name="password">
                                            <div class="invalid-feedback">
                                                Please provide a New Password.
                                            </div>
                                        </div>
                                        <div class="col-md-12 mb-3">
                                            <label for="validationCustom03">New Password Again</label>
                                            <input type="password" class="form-control" id="validationCustom03" required
                                                name="password_confirmation">
                                            <div class="invalid-feedback">
                                                Please provide a New Password Again.
                                            </div>
                                        </div>
                                    </div>

                                    <button class="btn btn-primary" type="submit">Update</button>
                                </form>

                            </div>
                            <div class="d-flex align-items-center px-4 py-3 b-t pointer " data-toggle="collapse"
                                data-parent="#accordion" data-target="#c_3" aria-expanded="false">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round" class="feather feather-credit-card">
                                    <rect x="1" y="4" width="22" height="16" rx="2"
                                        ry="2"></rect>
                                    <line x1="1" y1="10" x2="23" y2="10"></line>
                                </svg>
                                <div class="px-3">
                                    <div>Payment methods</div>
                                </div>
                                <div class="flex"></div>
                                <div>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round"
                                        class="feather feather-chevron-right">
                                        <polyline points="9 18 15 12 9 6"></polyline>
                                    </svg>
                                </div>
                            </div>
                            <div class="p-4 collapse show" id="c_3" style="">

                                <div class=""><strong>Thanh toán bằng VNPay</strong> </div>
                                <form class="needs-validation mt-4" novalidate method="post"
                                    action="{{ route('payment.vnpay') }}">
                                    @csrf
                                    <div class="form-row">
                                        <div class="col-md-12 mb-3">
                                            <label for="validationCustom03">Enter the amount to deposit</label>
                                            <input type="hidden" name="redirect">
                                            <input id="payment" type="text" class="form-control payment"
                                                id="validationCustom03" required name="money">
                                            <div class="invalid-feedback">
                                                Please provide a money.
                                            </div>
                                        </div>
                                    </div>

                                    <button class="btn btn-primary" type="submit">Recharge</button>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div><!-- ############ Main END-->
    </div>

@endsection
