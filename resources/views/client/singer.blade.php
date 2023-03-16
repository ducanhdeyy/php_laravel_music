@extends('client.main')
@section('content')
    <div id="content" class="flex">
        <div class="page-container">
            <div class="bg-light" >
                <div class="page-container padding">
                    <div class="d-sm-flex page-heading">
                        <div class="media circle w w-auto-xs mb-4">
                            <div class="media-content" style="background-image:url({{asset('uploads/'. $singer->image)}})"></div>
                        </div>
                        <div class="d-md-flex flex">
                            <div class="mx-sm-4 flex">
                                <h1 class="h4 font-weight-bold mb-0">{{$singer->name}}</h1>
                                <div class="py-4 toolbar align-items-center">
                                    <button class="btn btn-raised btn-rounded btn-primary">Singer</button>
                                    <span class="text-muted">{{$singer->songs->count()}} tracks</span>

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
                                <li class="nav-item"><a class="nav-link active" href="#singer" data-toggle="tab">singer</a>
                                </li>
                            </ul>
                        </div>

                        <div class="tab-content">
                            <div class="tab-pane fade active show" id="singer">
                                <div class="row list-row">
                                    @php
                                    $i = 0;
                                    @endphp
                                       @forelse ($singer->songs as $song)
                                    <div class="col-6 col-sm-4" data-id="312058991" data-category="all" data-tag="France" data-source="https://audio-ssl.itunes.apple.com/apple-assets-us-std-000001/AudioPreview62/v4/04/b6/28/04b62834-121f-b3af-47b3-2485ff499e14/mzaf_4474193750897158038.plus.aac.p.m4a">
                                        <div class="list-item r">
                                            <div class="media col-4"><a href="" class="ajax media-content" style="background-image:url({{asset('uploads/' . $song->image)}})" data-pjax-state=""></a>
                                                <div class="media-action media-action-overlay">
                                                    <button class="btn btn-icon no-bg no-shadow hide-row" data-toggle-class="">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-heart active-danger">
                                                            <path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path>
                                                        </svg>
                                                    </button>
                                                    <div data-index="@php echo $i; $i++;@endphp" class="playpause-track1" data-url="" data-name="" data-image=""><i class="fa fa-play-circle fa-3x"></i></div>
                                                    <button class="btn btn-icon no-bg no-shadow hide-row btn-more" data-toggle="dropdown">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-horizontal">
                                                            <circle cx="12" cy="12" r="1"></circle>
                                                            <circle cx="19" cy="12" r="1"></circle>
                                                            <circle cx="5" cy="12" r="1"></circle>
                                                        </svg>
                                                    </button>
                                                    <div class="dropdown-menu dropdown-menu-right"></div>
                                                </div>
                                            </div>
                                            <div class="list-content text-center">
                                                <div class="list-body">
                                                    <a href="" class="list-title title ajax h-1x" data-pjax-state="">{{$song->name}}</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    @empty
                                    <div style="padding: 94px; font-size: 20px" class="text-blue">
                                        <img width="530" src="{{asset('template/client/assets/img/empty.jpg')}}" alt="">
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
                                <?php foreach ($topTracks as $topTrack) : ?>
                                <div class="col-12" data-id="274510331" data-category="Pop" data-tag="all">
                                    <div class="list-item r">
                                        <div class="media"><a href="" class="ajax media-content" style="background-image:url({{asset('uploads/' . $topTrack->image)}})" data-pjax-state=""></a>
                                            <div class="media-action">
                                                <button class="btn btn-icon no-bg no-shadow hide-row" data-toggle-class="">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-heart active-danger">
                                                        <path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path>
                                                    </svg>
                                                </button>
                                                <div data-index="<?php echo $i; $i++; ?>" class="playpause-track1" ><i class="fa fa-play-circle fa-3x"></i></div>
                                                <button class="btn btn-icon no-bg no-shadow hide-row btn-more" data-toggle="dropdown">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-horizontal">
                                                        <circle cx="12" cy="12" r="1"></circle>
                                                        <circle cx="19" cy="12" r="1"></circle>
                                                        <circle cx="5" cy="12" r="1"></circle>
                                                    </svg>
                                                </button>
                                                <div class="dropdown-menu dropdown-menu-right"></div>
                                            </div>
                                        </div>
                                        <div class="list-content">
                                            <div class="list-body"><a href="" class="list-title title ajax h-1x" data-pjax-state="">{{$topTrack->name }}</a><a href="" class="list-subtitle d-block text-muted subtitle ajax h-1x" data-pjax-state="">{{$topTrack->singer->name }}</a></div>
                                        </div>
                                    </div>
                                </div>
                                <?php endforeach; ?>
                            </div>
                            <div class="b-b my-3"></div>
                            <div class="my-2"><a href="#" class="text-muted mr-1">About</a> <a href="#" class="text-muted mr-1">Contact</a>
                                <a href="#" class="text-muted mr-1">Legal</a> <a href="#" class="text-muted mr-1">Policy</a>
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
<script>
    @php
        $songLists = $singer->songs->concat($topTracks)->all();
        foreach ($songLists as $songList) {
            $songList->image = asset('uploads/' . $songList->image);
            $songList->file_url = asset('uploads/' . $songList->file_url);
        }
    @endphp
    const song = '<?php echo json_encode($songLists); ?>';
</script>
@endsection
