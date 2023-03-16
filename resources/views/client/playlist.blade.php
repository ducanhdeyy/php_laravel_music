@extends('client.main')
@section('content')
    <div id="content" class="flex">
        <div class="page-container">
            <div class="bg-light">
                <x-alert />
                <div class="page-container padding">
                    <div class="d-sm-flex page-heading">
                        <div class="media circle w w-auto-xs mb-4">
                            <div class="media-content"
                                style="background-image:url({{ Auth::guard('cus')->user()->image != null ? asset('uploads/' . Auth::guard('cus')->user()->image) : asset('template/client/assets/img/default-user.png') }})">
                            </div>
                        </div>
                        <div class="d-md-flex flex">
                            <div class="mx-sm-4 flex">
                                <h1 class="h4 font-weight-bold mb-0">{{ Auth::guard('cus')->user()->name }}</h1>
                                <div class="py-4 toolbar align-items-center">
                                    <button class="btn btn-raised btn-rounded btn-primary">Listen</button>
                                    <span class="text-muted"><?php echo count($playlists->all()); ?> tracks</span>

                                </div>
                                <div class="mb-2"><span class="text-muted">Creator: </span><a href="#"
                                        class="text-color">{{ Auth::guard('cus')->user()->name }}</a>
                                </div>
                            </div>
                            <div class="py-3 py-sm-4 mx-sm-4 w-lg w-auto-sm d-none d-md-block">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="page-container padding" id="list">
                <div class="d-md-flex">
                    <div class="flex">
                        <div class="d-flex">
                            <ul class="nav nav-sm text-sm nav-pills nav-rounded py-4">
                                <li class="nav-item"><a class="nav-link active" href="#playlist"
                                        data-toggle="tab">Playlist</a>
                                </li>
                            </ul>
                        </div>

                        <div class="tab-content">
                            <div class="tab-pane fade active show" id="playlist">
                                <div class="row list-row">
                                    @php $i = 0 @endphp
                                    @forelse($playlists as $playlist)
                                        <div class="col-6 col-sm-4" data-id="312058991" data-category="all"
                                            data-tag="France"
                                            data-source="https://audio-ssl.itunes.apple.com/apple-assets-us-std-000001/AudioPreview62/v4/04/b6/28/04b62834-121f-b3af-47b3-2485ff499e14/mzaf_4474193750897158038.plus.aac.p.m4a">
                                            <div class="list-item r">
                                                <div class="media col-4"><a href="" class="ajax media-content"
                                                        style="background-image:url({{ asset('uploads/' . $playlist->image) }})"
                                                        data-pjax-state=""></a>
                                                    <div class="media-action media-action-overlay">
                                                        <button class="btn btn-icon no-bg no-shadow hide-row"
                                                            data-toggle-class="">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                height="16" viewBox="0 0 24 24" fill="none"
                                                                stroke="currentColor" stroke-width="2"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                class="feather feather-heart active-danger">
                                                                <path
                                                                    d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z">
                                                                </path>
                                                            </svg>
                                                        </button>
                                                        <div data-index="@php echo $i; $i++; @endphp"
                                                            class="playpause-track1"><i class="fa fa-play-circle fa-3x"></i>
                                                        </div>
                                                        <button class="btn btn-icon no-bg no-shadow hide-row btn-more"
                                                            data-toggle="dropdown">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                height="16" viewBox="0 0 24 24" fill="none"
                                                                stroke="currentColor" stroke-width="2"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                class="feather feather-more-horizontal">
                                                                <circle cx="12" cy="12" r="1">
                                                                </circle>
                                                                <circle cx="19" cy="12" r="1">
                                                                </circle>
                                                                <circle cx="5" cy="12" r="1">
                                                                </circle>
                                                            </svg>
                                                        </button>
                                                        <div class="dropdown-menu dropdown-menu-right"></div>
                                                    </div>
                                                </div>
                                                <div class="list-content text-center">
                                                    <div class="list-body">
                                                        <a href="" class="list-title title ajax h-1x"
                                                            data-pjax-state="">{{ $playlist->name }}</a>
                                                        <button class="btn btn-icon no-bg no-shadow btn-more"
                                                            data-toggle="dropdown">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                height="16" viewBox="0 0 24 24" fill="none"
                                                                stroke="currentColor" stroke-width="2"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                class="feather feather-more-horizontal">
                                                                <circle cx="12" cy="12" r="1">
                                                                </circle>
                                                                <circle cx="19" cy="12" r="1">
                                                                </circle>
                                                                <circle cx="5" cy="12" r="1">
                                                                </circle>
                                                            </svg>
                                                        </button>
                                                        <div class="dropdown-menu dropdown-menu-right text-center">
                                                            <form action="{{ route('playlist.delete') }}" method="post">
                                                                @csrf
                                                                <input type="hidden" name="song_id"
                                                                    value="{{ $playlist->id }}">
                                                                <input type="hidden" name="user_id"
                                                                    value="{{ Auth::guard('cus')->id() }}">
                                                                <button class="btn btn-outline-danger"
                                                                    onclick="return confirm('You are sure ?')"
                                                                    class="list-subtitle d-block text-muted subtitle ajax h-1x text-danger"
                                                                    data-pjax-state="">Delete <i
                                                                        class="fa-solid fa-trash ml-2"></i></a>
                                                            </form>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    @empty
                                        <div style="padding: 94px; font-size: 20px" class="text-blue">
                                            <img width="530" src="{{ asset('template/client/assets/img/empty.jpg') }}"
                                                alt="">
                                        </div>
                                    @endforelse
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="w-xl w-auto-sm no-shrink">
                        <div class="padding sticky">
                            <h6 class="text text-muted">Top tracks</h6>
                            <div class="row list-row">
                                @foreach ($topTracks as $topTrack)
                                    <div class="col-12" data-id="274510331" data-category="Pop" data-tag="all"
                                        data-source="{{ asset('uploads/' . $topTrack->file_url) }}">
                                        <div class="list-item r">
                                            <div class="media"><a href="" class="ajax media-content"
                                                    style="background-image:url({{ asset('uploads/' . $topTrack->image) }})"
                                                    data-pjax-state=""></a>
                                                <div class="media-action">
                                                    <button class="btn btn-icon no-bg no-shadow hide-row"
                                                        data-toggle-class="">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                            height="16" viewBox="0 0 24 24" fill="none"
                                                            stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round"
                                                            class="feather feather-heart active-danger">
                                                            <path
                                                                d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z">
                                                            </path>
                                                        </svg>
                                                    </button>
                                                    <div data-index="@php echo $i;$i++; @endphp" class="playpause-track1">
                                                    <i class="fa fa-play-circle fa-3x"></i></div>
                                                    <button class="btn btn-icon no-bg no-shadow hide-row btn-more"
                                                        data-toggle="dropdown">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                            height="16" viewBox="0 0 24 24" fill="none"
                                                            stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round"
                                                            class="feather feather-more-horizontal">
                                                            <circle cx="12" cy="12" r="1">
                                                            </circle>
                                                            <circle cx="19" cy="12" r="1">
                                                            </circle>
                                                            <circle cx="5" cy="12" r="1">
                                                            </circle>
                                                        </svg>
                                                    </button>
                                                    <div class="dropdown-menu dropdown-menu-right"></div>
                                                </div>
                                            </div>
                                            <div class="list-content">
                                                <div class="list-body"><a href=""
                                                        class="list-title title ajax h-1x"
                                                        data-pjax-state="">{{ $topTrack->name }}</a><a href=""
                                                        class="list-subtitle d-block text-muted subtitle ajax h-1x"
                                                        data-pjax-state="">{{ $topTrack->singer->name }}</a></div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <div class="b-b my-3"></div>
                            <div class="my-2"><a href="#" class="text-muted mr-1">About</a> <a href="#"
                                    class="text-muted mr-1">Contact</a>
                                <a href="#" class="text-muted mr-1">Legal</a> <a href="#"
                                    class="text-muted mr-1">Policy</a>
                            </div>
                            <p class="text-muted text-sm">© Copyright 2016</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    @php
        $musics = $playlists->concat($topTracks)->all();
        foreach ($musics as $music) {
            $music->image = asset('uploads/' . $music->image);
            $music->file_url = asset('uploads/' . $music->file_url);
        }
    @endphp

    <script>
        const song = '<?php echo json_encode($musics); ?>';
    </script>
@endsection
