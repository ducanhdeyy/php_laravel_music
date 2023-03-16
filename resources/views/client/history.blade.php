@extends('client.main')
@section('content')
    <div id="content" class="flex"><!-- ############ Main START-->
        <div class="page-container">
            <div class="padding">
                <div class="row">
                    <div class="col-12"><h6>History Buy Music</h6>
                        <div class="table-responsive">
                            <div class="bootstrap-table">
                                <div class="fixed-table-toolbar">
                                    <div class="bs-bars float-left">
                                        <div id="toolbar"></div>
                                    </div>

                                </div>
                                <div class="fixed-table-container" style="padding-bottom: 0px;">
                                    <div class="fixed-table-header" style="display: none;">
                                        <table></table>
                                    </div>
                                    <div class="fixed-table-body">
                                        <div class="fixed-table-loading" style="top: 41px;">Loading, please wait...
                                        </div>
                                        <table id="table" class="table table-theme v-middle table-hover"
                                               data-toolbar="#toolbar" data-search="true" data-search-align="left"
                                               data-show-export="true" data-show-columns="true" data-detail-view="false"
                                               data-pagination="true" data-page-list="[10, 25, 50, 100, ALL]">
                                            <thead>
                                            <tr>
                                                <th style="" data-field="id">
                                                    <div class="th-inner sortable both">ID</div>
                                                </th>
                                                <th style="" data-field="owner">
                                                    <div class="th-inner sortable both">Image</div>
                                                </th>
                                                <th style="" data-field="project">
                                                    <div class="th-inner sortable both desc">Name Song</div>
                                                </th>
                                                <th style="" data-field="task">
                                                    <div class="th-inner "><span class="d-none d-sm-block">Price</span>
                                                    </div>
                                                </th>
                                                <th style="" data-field="finish">
                                                    <div class="th-inner "><span class="d-none d-sm-block">Date</span>
                                                    </div>
                                                    <div class="fht-cell"></div>
                                                </th>

                                            </tr>
                                            </thead>
                                            <tbody>
                                                @forelse($transactions as $transaction)
                                            <tr class="" data-index="0" data-id="1">
                                                <td style=""><small class="text-muted">{{$loop->iteration}}</small></td>
                                                <td style=""><a href="#"><span class="w-32 avatar gd-success"><img src="{{asset('uploads/'. $transaction->song->image)}}" alt="."></span></a></td>
                                                <td class="flex" style=""><a href="#" class="item-title text-color">{{$transaction->song->name}}</a>
                                                    <div class="item-except text-muted text-sm h-1x">
                                                        {{$transaction->song->singer->name}}
                                                    </div>
                                                </td>
                                                <td style=""><span
                                                        class="item-amount d-none d-sm-block text-sm">{{$transaction->price}} USD</span>
                                                </td>
                                                <td style=""><span
                                                        class="item-amount d-none d-sm-block text-sm">{{$transaction->created_at->format('M-d-y')}}</span>
                                                </td>
                                            </tr>

                                            @empty
                                            <tr>
                                                <td colspan="5" class="text-center">
                                                    <img width="800" src="{{asset('template/client/assets/img/empty.jpg')}}" alt="">
                                                </td>

                                            </tr>
                                            @endforelse
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- ############ Main END-->
    </div>
@endsection

