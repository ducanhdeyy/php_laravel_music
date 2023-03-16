@extends('admin.main')

@section('content')
    <div class="app-main__inner">
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div>
                        song
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
                            action="@if (isset($song)) {{ route('song.update', $song->id) }} @else {{ route('song.store') }} @endif"
                            method="post" enctype="multipart/form-data">
                            @if (isset($song))
                                @method('put')
                            @endif
                            @csrf
                            <div class="position-relative row form-group">
                                <label for="song" class="col-md-3 text-md-right col-form-label">Song</label>
                                <div class="col-md-9 col-xl-8">
                                    <div class="custom-file ">
                                        <input type="file" class="custom-file-input" id="song"
                                            accept=".mp3" name="file_url">
                                        <label class="custom-file-label" for="song">Choose file...</label>
                                        <div class="invalid-feedback">Example invalid custom file feedback</div>
                                    </div>
                                </div>
                            </div>
                            <div class="position-relative row form-group">
                                <label for="image" class="col-md-3 text-md-right col-form-label">Image</label>
                                <div class="col-md-9 col-xl-8">
                                    <div class="custom-file ">
                                        <input type="file" class="custom-file-input" id="image"
                                            accept=".jpg,.jpeg,.png" name="image">
                                        <label class="custom-file-label" for="image">Choose file...</label>
                                        <div class="invalid-feedback">Example invalid custom file feedback</div>
                                    </div>
                                </div>
                            </div>
                            <div class="position-relative row form-group">
                                <label for="name" class="col-md-3 text-md-right col-form-label">Name</label>
                                <div class="col-md-9 col-xl-8">
                                    <input required="" name="name" id="name" placeholder="Name" type="text"
                                        class="form-control @error('name') border border-danger  @enderror"
                                        value="@if (isset($song)) {{ $song->name }} @else {{ old('name') }} @endif">

                                </div>
                            </div>
                            <div class="position-relative row form-group">
                                <label for="price" class="col-md-3 text-md-right col-form-label">Price</label>
                                <div class="col-md-9 col-xl-8">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">$</span>
                                            </div>
                                            <input required="" name="price" id="price" placeholder="Price" type="text"
                                            class="form-control @error('price') border border-danger  @enderror"
                                            value="@if (isset($song)) {{ $song->price }} @else {{ old('price') }} @endif">
                                            <div class="input-group-append">
                                                <span class="input-group-text">.00</span>
                                            </div>
                                        </div>
                                </div>
                            </div>
                            <div class="position-relative row form-group">
                                <label for="singer" class="col-md-3 text-md-right col-form-label">Singer</label>
                                <div class="col-md-9 col-xl-8">
                                    <select required="" name="singer_id" id="singer"
                                        class="form-control @error('role') border border-danger  @enderror">
                                        <option value="">-- Singer --</option>
                                        @foreach ($singers as $singer)
                                            <option value="{{ $singer->id }}" @if(isset($song)) {{$song->singer_id == $singer->id ? 'selected' : ''}}@endif>{{ $singer->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="position-relative row form-group">
                                <label for="album" class="col-md-3 text-md-right col-form-label">Album</label>
                                <div class="col-md-9 col-xl-8">
                                    <select required="" name="album_id" id="album"
                                        class="form-control @error('role') border border-danger  @enderror">
                                        <option value="">-- Album --</option>
                                        @foreach ($albums as $album)
                                            <option value="{{ $album->id }}" @if(isset($song)){{ $song->album_id == $album->id ? 'selected' : ''}}@endif>{{ $album->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="position-relative row form-group">
                                <label for="genre" class="col-md-3 text-md-right col-form-label">Genre</label>
                                <div class="col-md-9 col-xl-8">
                                    <select required="" name="genre_id" id="genre"
                                        class="form-control @error('role') border border-danger  @enderror">
                                        <option value="">-- Genre --</option>
                                        @foreach ($genres as $genre)
                                            <option value="{{ $genre->id }}"@if(isset($song)) {{$song->genre_id == $genre->id ? 'selected' : ''}}@endif>{{ $genre->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="position-relative row form-group mb-1">
                                <div class="col-md-9 col-xl-8 offset-md-2">
                                    <a href="{{ route('song.index') }}" class="border-0 btn btn-outline-danger mr-1">
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
