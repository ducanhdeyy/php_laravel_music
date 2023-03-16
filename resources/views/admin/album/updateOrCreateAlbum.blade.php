@extends('admin.main')

@section('content')
    <div class="app-main__inner">
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div>
                        Album
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
                            action="@if (isset($album)) {{ route('album.update', $album->id) }} @else {{ route('album.store') }} @endif"
                            method="post" enctype="multipart/form-data">
                            @if (isset($album))
                                @method('put')
                            @endif
                            @csrf
                            <div class="position-relative row form-group">
                                <label for="image" class="col-md-3 text-md-right col-form-label">Avatar</label>
                                <div class="col-md-9 col-xl-8">
                                    <img style="height: 200px; cursor: pointer;" class="thumbnail rounded-circle"
                                        data-toggle="tooltip" title="" data-placement="bottom"
                                        accept=".jpg,.jpeg,.png"
                                        src=" @if (isset($album->image) != null) {{ asset('uploads/' . $album->image) }}  @else {{ asset('template/admin/assets/images/add-image-icon.jpg') }} @endif"
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
                                        value="@if (isset($album)) {{ $album->name }} @else {{ old('name') }} @endif">
                                </div>
                            </div>
                            <div class="position-relative row form-group">
                                <label for="description" class="col-md-3 text-md-right col-form-label">Description</label>
                                <div class="col-md-9 col-xl-8">
                                    <textarea name="description" id="description" cols="30" rows="10"
                                        class="form-control @error('description') border border-danger  @enderror">
                                        @if (isset($album))
                                        {{ $album->description }}
                                        @else
                                        {{ old('description') }}
                                        @endif
                                        </textarea>
                                </div>
                            </div>


                            <div class="position-relative row form-group mb-1">
                                <div class="col-md-9 col-xl-8 offset-md-2">
                                    <a href="{{ route('album.index') }}" class="border-0 btn btn-outline-danger mr-1">
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
