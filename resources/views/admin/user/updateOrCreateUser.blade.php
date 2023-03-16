@extends('admin.main')

@section('content')
    <div class="app-main__inner">
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div>
                        User
                        <div class="page-title-subheading">
                            View, create, update, delete and manage.
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="main-card mb-3 card">
                    <x-alert />
                    <div class="card-body">
                        <form
                            action="@if (isset($user)) {{ route('user.update', $user->id) }} @else {{ route('user.store') }} @endif"
                            method="post" enctype="multipart/form-data">
                            @if (isset($user))
                                @method('put')
                            @endif
                            @csrf
                            <div class="position-relative row form-group">
                                <label for="image" class="col-md-3 text-md-right col-form-label">Avatar</label>
                                <div class="col-md-9 col-xl-8">
                                    <img style="height: 200px; cursor: pointer;" class="thumbnail rounded-circle"
                                        data-toggle="tooltip" title="" data-placement="bottom"
                                        accept=".jpg,.jpeg,.png"
                                        src=" @if (isset($user->image) != null) {{ asset('uploads/' . $user->image) }}  @else {{ asset('template/admin/assets/images/add-image-icon.jpg') }} @endif"
                                        alt="Avatar" data-original-title="Click to change the image">
                                    <input name="image" type="file" onchange="changeImg(this)" accept=".jpg,.jpeg,.png"
                                        class="image form-control-file" style="display: none;" value="">
                                    <input type="hidden" name="image_old" value="" accept=".jpg,.jpeg,.png">
                                    <small class="form-text text-muted">
                                        Click on the image to change (required)
                                    </small>
                                </div>
                            </div>
                            <div class="position-relative row form-group">
                                <label for="name" class="col-md-3 text-md-right col-form-label">Name</label>
                                <div class="col-md-9 col-xl-8">
                                    <input required="" name="name" id="name" placeholder="Name" type="text"
                                        class="form-control @error('name') border border-danger  @enderror"
                                        value="@if (isset($user)) {{ $user->name }} @else {{ old('name') }} @endif">
                                </div>
                            </div>

                            <div class="position-relative row form-group">
                                <label for="email" class="col-md-3 text-md-right col-form-label">Email</label>
                                <div class="col-md-9 col-xl-8">
                                    <input required="" name="email" id="email" placeholder="Email" type="email"
                                        @isset($user)
                                            disabled="" 
                                        @endisset
                                        class="form-control @error('email') border border-danger  @enderror"
                                        value="@if (isset($user)) {{ $user->email }} @else {{ old('email') }} @endif">
                                </div>
                            </div>
                            @if (!isset($user))
                                <div class="position-relative row form-group">
                                    <label for="password" class="col-md-3 text-md-right col-form-label">Password</label>
                                    <div class="col-md-9 col-xl-8">
                                        <input name="password" id="password" placeholder="Password" type="password"
                                            class="form-control @error('password') border border-danger  @enderror"
                                            value="">
                                    </div>
                                </div>

                                <div class="position-relative row form-group">
                                    <label for="password_confirmation" class="col-md-3 text-md-right col-form-label">Confirm
                                        Password</label>
                                    <div class="col-md-9 col-xl-8">
                                        <input name="password_confirmation" id="password_confirmation"
                                            placeholder="Confirm Password" type="password"
                                            class="form-control @error('password_confirmation') border border-danger  @enderror"
                                            value="">
                                    </div>
                                </div>
                            @endif
                            <div class="position-relative row form-group">
                                <label for="level" class="col-md-3 text-md-right col-form-label">Level</label>
                                <div class="col-md-9 col-xl-8">
                                    <select required="" name="role" id="level" class="form-control @error('role') border border-danger  @enderror">
                                        <option value="">-- Level --</option>
                                        <option value="1"
                                            @if (isset($user)) {{ $user->role == 1 ? 'selected' : '' }} @endif>
                                            Admin
                                        </option>
                                        <option value="0"
                                            @isset($user) {{ $user->role == 0 ? 'selected' : '' }} @endisset>
                                            Client
                                        </option>
                                    </select>
                                </div>
                            </div>

                            <div class="position-relative row form-group mb-1">
                                <div class="col-md-9 col-xl-8 offset-md-2">
                                    <a href="{{ route('user.index') }}" class="border-0 btn btn-outline-danger mr-1">
                                        <span class="btn-icon-wrapper pr-1 opacity-8">
                                            <i class="fa fa-times fa-w-20"></i>
                                        </span>
                                        <span>Cancel</span>
                                    </a>

                                    <button type="submit" class="btn-shadow btn-hover-shine btn btn-primary">
                                        <span class="btn-icon-wrapper pr-2 opacity-8">
                                            <i class="fa fa-download fa-w-20"></i>
                                        </span>
                                        <span>Save</span>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>


                </div>
            </div>
        </div>
    </div>
@endsection
