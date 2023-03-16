@extends('client.main')
@section('content')
    <div id="content" class="flex">
        <div class="page-container">
            <x-alert />
            <div class="padding sr" id="list">
                <div class="row no-gutters list-grouped">
                    @foreach ($albums as $album)
                        <div class="col-sm-6">
                            <div class="list-item list-overlay r mb-3" data-sr-id="220"
                                style="visibility: visible; transform: none; opacity: 1; transition: none 0s ease 0s;">
                                <div class="media media-4x3"><a href="" class="ajax media-content"
                                        style="background-image:url({{ asset('uploads/' . $album->image) }})"
                                        data-pjax-state=""></a>
                                    <div class="media-action"></div>
                                </div>
                                <div class="list-content p-5">
                                    <div class="list-body"><a href=""
                                            class="list-title title ajax h4 font-weight-bold"
                                            data-pjax-state="">{{ $album->name }}</a><a href=""
                                            class="list-subtitle d-block text-muted subtitle ajax h-1x"
                                            data-pjax-state=""></a></div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="heading py-2 d-flex">
                    <div>
                        <div class="text-muted text-sm sr-item" data-sr-id="222"
                            style="visibility: visible; transform: none; opacity: 1; transition: none 0s ease 0s;">Weekly
                        </div>
                        <h5 class="text-highlight sr-item" data-sr-id="223"
                            style="visibility: visible; transform: none; opacity: 1; transition: none 0s ease 0s;">Top
                            tracks</h5>
                    </div><span class="flex"></span>
                </div>
                <div class="slick slick-visible slick-arrow-top row sr-item" data-sr-id="224"
                    style="visibility: visible; transform: none; opacity: 1; transition: none 0s ease 0s;">
                    @php $i = 0 @endphp
                    @foreach ($songs as $song)
                        <div class="col-2" data-id="92570808" data-category="Pop" data-tag="Canada"
                            data-source="https://audio-ssl.itunes.apple.com/apple-assets-us-std-000001/Music4/v4/64/3d/c1/643dc113-29d1-08de-78e2-a4ab4c3f1730/mzaf_5420937162202173294.plus.aac.p.m4a">
                            <div class="list-item slick-item r mb-3" data-sr-id="225"
                                style="visibility: visible; transform: none; opacity: 1; transition: none 0s ease 0s;">
                                <div class="media"><a href="" class="ajax media-content"
                                        style="background-image:url({{ 'uploads/' . $song->image }}"
                                        data-pjax-state=""></a>
                                    <div class="media-action media-action-overlay">
                                        <button
                                            class="btn btn-icon no-bg no-shadow hide-row" data-toggle-class=""><svg
                                                xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                stroke-linecap="round" stroke-linejoin="round"
                                                class="feather feather-heart active-danger">
                                                <path
                                                    d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z">
                                                </path>
                                            </svg></button>
                                        <div data-index="@php echo $i; $i++ @endphp" class="playpause-track1"
                                            data-url="{{ 'uploads/' . $song->file_url }}" data-name="{{ $song->name }}"
                                            data-image="{{ asset('uploads/' . $song->image) }}"><i
                                                class="fa fa-play-circle fa-3x"></i></div>
                                        <button class="btn btn-icon no-bg no-shadow hide-row btn-more"
                                            data-toggle="dropdown"><svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                class="feather feather-more-horizontal">
                                                <circle cx="12" cy="12" r="1"></circle>
                                                <circle cx="19" cy="12" r="1"></circle>
                                                <circle cx="5" cy="12" r="1"></circle>
                                            </svg></button>
                                        <div class="dropdown-menu dropdown-menu-right text-center">
                                            @if (Auth::guard('cus')->check())
                                                <form action="{{ route('playlist.store', Auth::guard('cus')->id()) }}"
                                                    method="post">
                                                    @csrf
                                                    <input type="hidden" name="user_id"
                                                        value="{{ Auth::guard('cus')->id() }}">
                                                    <input type="hidden" name="song_id" value="{{ $song->id }} ">
                                                    <button class="btn btn-outline-">Add to playlist</button>
                                                </form>
                                                <form action="{{ route('download') }}" method="post">
                                                    @csrf
                                                    <input type="hidden" name="url" value="{{ $song->file_url }}">
                                                    <input type="hidden" name="price" value="{{ $song->price }}">
                                                    <input type="hidden" name="song_id" value="{{ $song->id }}">
                                                    <input type="hidden" name="user_id"
                                                        value="{{ Auth::guard('cus')->id() }}">
                                                    <input type="hidden" name="wallet"
                                                        value="{{ Auth::guard('cus')->user()->wallet }}">
                                                    <button
                                                    onclick="return confirm('Are you sure download!')"
                                                    class="btn btn-outline-">{{ number_format($song->price) }} USD
                                                        <i class="ml-2 fa-solid fa-download"></i></button>
                                                </form>
                                            @else
                                                <form action="{{ route('login.index') }}" method="">
                                                    <button class="btn btn-outline-">Add to playlist</button>
                                                </form>
                                                <form action="{{ route('login.index') }}" method="">
                                                    @csrf
                                                    <button class="btn btn-outline-">{{ number_format($song->price) }} USD
                                                        <i class="ml-2 fa-solid fa-download"></i></button>
                                                </form>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="list-content text-center">
                                    <div class="list-body"><a href="" class="list-title title ajax h-1x"
                                            data-pjax-state="">{{ $song->name }} </a><a href=""
                                            class="list-subtitle d-block text-muted subtitle ajax h-1x"
                                            data-pjax-state="">{{ $song->singer->name }}</a></div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="heading py-2 d-flex">
                            <div>
                                <div class="text-muted text-sm sr-item" data-sr-id="237"
                                    style="visibility: visible; transform: none; opacity: 1; transition: none 0s ease 0s;">
                                    User</div>
                                <h5 class="text-highlight sr-item" data-sr-id="238"
                                    style="visibility: visible; transform: none; opacity: 1; transition: none 0s ease 0s;">
                                    Recently added</h5>
                            </div><span class="flex"></span>
                        </div>
                        <div class="row list-row list-index">
                            @foreach ($newSongs as $newSong)
                                <div class="col-12" data-id="82924078" data-category="France" data-tag="Electronic"
                                    data-source="https://audio-ssl.itunes.apple.com/apple-assets-us-std-000001/Music/v4/fa/37/1c/fa371cea-559d-f418-506a-5fdf64bed3fe/mzaf_1505180730434746810.plus.aac.p.m4a">
                                    <div class="list-item r" data-sr-id="239"
                                        style="visibility: visible; transform: none; opacity: 1; transition: none 0s ease 0s;">
                                        <div class="media"><a href="" class="ajax media-content"
                                                style="background-image:url({{ asset('uploads/' . $newSong->image) }})"
                                                data-pjax-state=""></a>
                                            <div class="media-action media-action-overlay"><button
                                                    class="btn btn-icon no-bg no-shadow hide-row"
                                                    data-toggle-class=""><svg xmlns="http://www.w3.org/2000/svg"
                                                        width="16" height="16" viewBox="0 0 24 24" fill="none"
                                                        stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                        stroke-linejoin="round"
                                                        class="feather feather-heart active-danger">
                                                        <path
                                                            d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z">
                                                        </path>
                                                    </svg></button>
                                                <div data-index="@php echo $i; $i++ @endphp" class="playpause-track1"
                                                    data-url="{{ asset('uploads/' . $newSong->file_url) }}"
                                                    data-name="{{ $newSong->name }}"
                                                    data-image="{{ asset('uploads/' . $newSong->image) }}"><i
                                                        class="fa fa-play-circle fa-3x"></i></div>
                                                <button onclick="playSound()"
                                                    class="btn btn-icon no-bg no-shadow hide-row btn-more"
                                                    data-toggle="dropdown"><svg xmlns="http://www.w3.org/2000/svg"
                                                        width="16" height="16" viewBox="0 0 24 24" fill="none"
                                                        stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                        stroke-linejoin="round" class="feather feather-more-horizontal">
                                                        <circle cx="12" cy="12" r="1"></circle>
                                                        <circle cx="19" cy="12" r="1"></circle>
                                                        <circle cx="5" cy="12" r="1"></circle>
                                                    </svg></button>
                                                <div class="dropdown-menu dropdown-menu-right text-center">
                                                    @if (Auth::guard('cus')->check())
                                                        <form action="?controller=playlist&action=store" method="post">
                                                            <input type="hidden" name="user_id"
                                                                value="{{ Auth::guard('cus')->id() }}">
                                                            <input type="hidden" name="song_id"
                                                                value="{{ $newSong->id }} ">
                                                            <button class="btn btn-outline-">Add to playlist</button>
                                                        </form>
                                                        <form action="{{ route('download') }}" method="post">
                                                            @csrf
                                                            <input type="hidden" name="url"
                                                                value="{{ $newSong->file_url }}">
                                                            <input type="hidden" name="price"
                                                                value="{{ $newSong->price }}">
                                                            <input type="hidden" name="song_id"
                                                                value="{{ $newSong->id }}">
                                                            <input type="hidden" name="user_id"
                                                                value="{{ Auth::guard('cus')->id() }}">
                                                            <input type="hidden" name="wallet"
                                                                value="{{ Auth::guard('cus')->user()->wallet }}">
                                                            <button
                                                            onclick="return confirm('Are you sure download!')"
                                                                class="btn btn-outline-">{{ number_format($newSong->price) }}
                                                                USD <i class="ml-2 fa-solid fa-download"></i></button>
                                                        </form>
                                                    @else
                                                        <form action="{{ route('login.index') }}" method="">
                                                            <button class="btn btn-outline-">Add to playlist</button>
                                                        </form>
                                                        <form action="{{ route('login.index') }}" method="">
                                                            @csrf
                                                            <button
                                                                class="btn btn-outline-">{{ number_format($newSong->price) }}
                                                                USD <i class="ml-2 fa-solid fa-download"></i></button>
                                                        </form>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="list-content text-center">
                                            <div class="list-body"><a href="" class="list-title title ajax h-1x"
                                                    data-pjax-state="">{{ $newSong->name }}</a><a href=""
                                                    class="list-subtitle d-block text-muted subtitle ajax h-1x"
                                                    data-pjax-state="">
                                                    {{ $newSong->singer->name }}</a></div>
                                        </div>
                                        <div class="list-action show-row">
                                            <div class="d-flex align-items-center">
                                                <div class="px-3 text-sm d-none d-md-block"></div><button
                                                    class="btn btn-icon no-bg no-shadow" data-toggle-class=""><svg
                                                        xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                        viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                        class="feather feather-heart active-danger">
                                                        <path
                                                            d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z">
                                                        </path>
                                                    </svg></button> <button class="btn btn-icon no-bg no-shadow btn-more"
                                                    data-toggle="dropdown"><svg xmlns="http://www.w3.org/2000/svg"
                                                        width="16" height="16" viewBox="0 0 24 24" fill="none"
                                                        stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                        stroke-linejoin="round" class="feather feather-more-horizontal">
                                                        <circle cx="12" cy="12" r="1"></circle>
                                                        <circle cx="19" cy="12" r="1"></circle>
                                                        <circle cx="5" cy="12" r="1"></circle>
                                                    </svg></button>
                                                <div class="dropdown-menu dropdown-menu-right text-center">
                                                    @if (Auth::guard('cus')->check())
                                                        <form action="?controller=playlist&action=store" method="post">
                                                            <input type="hidden" name="user_id"
                                                                value="{{ Auth::guard('cus')->id() }}">
                                                            <input type="hidden" name="song_id"
                                                                value="{{ $newSong->id }} ">
                                                            <button class="btn btn-outline-">Add to playlist</button>
                                                        </form>
                                                        <form action="{{ route('download') }}" method="post">
                                                            @csrf
                                                            <input type="hidden" name="url"
                                                                value="{{ $newSong->file_url }}">
                                                            <input type="hidden" name="price"
                                                                value="{{ $newSong->price }}">
                                                            <input type="hidden" name="song_id"
                                                                value="{{ $newSong->id }}">
                                                            <input type="hidden" name="user_id"
                                                                value="{{ Auth::guard('cus')->id() }}">
                                                            <button
                                                            onclick="return confirm('Are you sure download!')"
                                                                class="btn btn-outline-">{{ number_format($newSong->price) }}
                                                                USD <i class="ml-2 fa-solid fa-download"></i></button>
                                                        </form>
                                                    @else
                                                        <form action="{{ route('login.index') }}" method="">
                                                            <button class="btn btn-outline-">Add to playlist</button>
                                                        </form>
                                                        <form action="{{ route('login.index') }}" method="">
                                                            @csrf
                                                            <button
                                                                class="btn btn-outline-">{{ number_format($newSong->price) }}
                                                                USD <i class="ml-2 fa-solid fa-download"></i></button>
                                                        </form>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="heading py-2 d-flex">
                            <div>
                                <div class="text-muted text-sm sr-item" data-sr-id="244"
                                    style="visibility: visible; transform: none; opacity: 1; transition: none 0s ease 0s;">
                                    Upcoming</div>
                                <h5 class="text-highlight sr-item" data-sr-id="245"
                                    style="visibility: visible; transform: none; opacity: 1; transition: none 0s ease 0s;">
                                    Genre</h5>
                            </div><span class="flex"></span>
                        </div>
                        <div class="row row-sm">
                            @foreach ($genres as $genre)
                                <div class="col-6">
                                    <div class="list-item list-overlay r mb-3 gd-primary" data-sr-id="246"
                                        style="visibility: visible; transform: none; opacity: 1; transition: none 0s ease 0s;">
                                        <div class="media media-4x3"><a href="" class="ajax media-content"
                                                style="background-image:url()" data-pjax-state=""></a>
                                            <div class="media-action"></div>
                                        </div>
                                        <div class="list-content p-4">
                                            <div class="list-body"><a href=""
                                                    class="list-title title ajax h5 font-weight-bold"
                                                    data-pjax-state=""><?php echo $genre['name']; ?></a></div>
                                            <div class="list-footer">
                                                <div class="text-muted text-sm">{{$genre->created_at->format('M d, Y h:i a')}}</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="heading py-2 d-flex">
                            <div>
                                <div class="text-muted text-sm sr-item" data-sr-id="248"
                                    style="visibility: visible; transform: none; opacity: 1; transition: none 0s ease 0s;">
                                    Music</div>
                                <h5 class="text-highlight sr-item" data-sr-id="249"
                                    style="visibility: visible; transform: none; opacity: 1; transition: none 0s ease 0s;">
                                    Singer</h5>
                            </div><span class="flex"></span>
                        </div>
                        <div class="row row-sm">
                            @foreach ($singers as $singer)
                                <div class="col-4">
                                    <div class="list-item r" data-sr-id="250"
                                        style="visibility: visible; transform: none; opacity: 1; transition: none 0s ease 0s;">
                                        <div class="media media-16x9"><a
                                                href="{{route('singerSong', $singer->id)}}"
                                                class="ajax media-content"
                                                style="background-image:url({{ asset('uploads/' . $singer->image) }})"
                                                data-pjax-state=""></a>
                                            <div class="media-action"></div>
                                        </div>
                                        <div class="list-content">
                                            <div class="list-body"><a href="{{route('singerSong', $singer->id)}}" class="list-title title ajax"
                                                    data-pjax-state="">{{ $singer->name }}</a>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>
        @php
            $songLists = $songs->concat($newSongs)->all();
            foreach ($songLists as $songList) {
                $songList->image = asset('uploads/' . $songList->image);
                $songList->file_url = asset('uploads/' . $songList->file_url);
            }
        @endphp
        const song = '<?php echo json_encode($songLists); ?>';
    </script>
@endsection
