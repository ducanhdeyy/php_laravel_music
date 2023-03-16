@extends('client.main')
@section('content')
    <div id="content" class="flex">
        <div class="page-container">
            <x-alert/>
            <div class="padding sr" id="list">
                <div class="heading py-2 d-flex">
                    <div>
                        <div class="text-muted text-sm sr-item" data-sr-id="31"
                             style="visibility: visible; transform: none; opacity: 1; transition: none 0s ease 0s;"></div>
                        <h5 class="text-highlight sr-item" data-sr-id="32"
                            style="visibility: visible; transform: none; opacity: 1; transition: none 0s ease 0s;">
                            Songs</h5>
                    </div>
                    <span class="flex"></span>
                </div>
                <div class="row row-md list">

                   @php
                        $i = 0;
                        @endphp
                    @forelse($songs as $song)
                    <div class="col-4 col-sm-4 col-md-3 col-lg-2" data-id="312058991" data-category="all"
                         data-tag="France" data-source="">
                        <div class="list-item r" data-sr-id="35"
                             style="visibility: visible; transform: none; opacity: 1; transition: none 0s ease 0s;">
                            <div class="media"><a href="" class="ajax media-content"
                                                  style="background-image:url({{asset('uploads/'. $song->image)}})"
                                                  data-pjax-state=""></a>
                                <div class="media-action media-action-overlay">
                                    <button class="btn btn-icon no-bg no-shadow hide-row" data-toggle-class="">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                             viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                             stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                             class="feather feather-heart active-danger">
                                            <path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path>
                                        </svg>
                                    </button>
                                    <div data-index="@php echo $i;$i++; @endphp" class="playpause-track1"
                                         data-url=""
                                         data-name=""
                                         data-image=""><i
                                            class="fa fa-play-circle fa-3x"></i></div>
                                    <button class="btn btn-icon no-bg no-shadow hide-row btn-more"
                                            data-toggle="dropdown">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                             viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                             stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                             class="feather feather-more-horizontal">
                                            <circle cx="12" cy="12" r="1"></circle>
                                            <circle cx="19" cy="12" r="1"></circle>
                                            <circle cx="5" cy="12" r="1"></circle>
                                        </svg>
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-right text-center">
                                        @if(Auth::guard('cus')->check())
                                            <form action="{{route('playlist.store', Auth::guard('cus')->id())}}" method="post">
                                                <input type="hidden" name="user_id" value="{{Auth::guard('cus')->id()}}">
                                                <input type="hidden" name="song_id" value="{{$song->id}} ">
                                                <button class="btn btn-outline-">Add to playlist</button>
                                            </form>
                                            <form action="{{route('download')}}" method="post">
                                                @csrf
                                                <input type="hidden" name="url" value="{{$song->file_url}}">
                                                <input type="hidden" name="price" value="{{$song->price}}">
                                                <input type="hidden" name="song_id" value="{{$song->id}}">
                                                <input type="hidden" name="user_id" value="{{Auth::guard('cus')->id()}}">
                                                <input type="hidden" name="wallet" value="{{Auth::guard('cus')->user()->wallet}}">
                                                <button onclick="return confirm('Are you sure download!')" class="btn btn-outline-">{{number_format($song->price) }} USD <i class="ml-2 fa-solid fa-download"></i></button>
                                            </form>
                                        @else
                                            <form action="{{route('login.index')}}" method="">
                                                <button class="btn btn-outline-">Add to playlist</button>
                                            </form>
                                            <form action="{{route('login.index')}}" method="">
                                                @csrf
                                                <button class="btn btn-outline-">{{number_format($song->price) }} USD <i class="ml-2 fa-solid fa-download"></i></button>
                                            </form>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="list-content text-center">
                                <div class="list-body"><a href="" class="list-title title ajax h-1x"
                                                          data-pjax-state="">{{$song->name}}</a><a
                                        href="" class="list-subtitle d-block text-muted subtitle ajax h-1x"
                                        data-pjax-state="">{{$song->singer->name}}</a></div>
                            </div>
                        </div>
                    </div>
                    @empty
                    <img src="{{asset('template/client/assets/img/empty.jpg')}}" alt="" style="
                            width: 1200px;
                            height: 500px;
                        ">
                    @endforelse
                </div>
                {{$songs->withQueryString()->links()}}
            </div>
        </div>
    </div>
@endsection
@section('js')
    @php
        foreach($songs as $song){
            $song->image = asset('uploads/'. $song->image);
            $song->file_url = asset('uploads/'. $song->file_url);
        }
    @endphp

    <script>
        const song = '<?php echo json_encode($songs->all()); ?>';
    </script>
@endsection
