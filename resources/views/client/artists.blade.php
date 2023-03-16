@extends('client.main')
@section('content')
    <div id="content" class="flex">
        <div class="page-container">
            <div class="padding sr" id="list">
                <div class="heading py-2 d-flex">
                    <div>
                        <div class="text-muted text-sm sr-item" data-sr-id="113"
                            style="visibility: visible; transform: none; opacity: 1; transition: none 0s ease 0s;">
                            Featured
                        </div>
                        <h5 class="text-highlight sr-item" data-sr-id="114"
                            style="visibility: visible; transform: none; opacity: 1; transition: none 0s ease 0s;">
                            Artists</h5>
                    </div>
                    <span class="flex"></span>
                </div>
                <div class="row list media-circle">
                    @forelse($singers as $singer)
                        <div class="col-4 col-sm-3 col-md-2-4 col-lg-2 col-xl-1-8" data-id="303988181" data-category="Pop"
                            data-tag="Australia"
                            data-source="https://audio-ssl.itunes.apple.com/apple-assets-us-std-000001/AudioPreview71/v4/fb/0c/fc/fb0cfc4d-dfc7-18fc-89c9-f2302a9fc65a/mzaf_9146754008516582895.plus.aac.p.m4a">
                            <div class="list-item r" data-sr-id="116"
                                style="visibility: visible; transform: none; opacity: 1; transition: none 0s ease 0s;">
                                <div class="media"><a href="{{ route('singerSong', $singer->id) }}"
                                        class="ajax media-content"
                                        style="background-image:url({{ asset('uploads/' . $singer->image) }})"
                                        data-pjax-state=""></a>
                                    <div class="media-action"></div>
                                </div>
                                <div class="list-content text-center">
                                    <div class="list-body"><a href=""
                                            class="list-subtitle d-block text-muted subtitle ajax h-1x"
                                            data-pjax-state="">{{ $singer->name }}</a></div>
                                </div>
                            </div>
                        </div>
                    @empty
                        <img src="{{ asset('template/client/assets/img/empty.jpg') }}" alt=""
                            style="
                    width: 1200px;
                    height: 500px;
                ">
                    @endforelse
                </div>
            </div>
            {{ $singers->withQueryString()->links() }}
        </div>
    </div>
@endsection
