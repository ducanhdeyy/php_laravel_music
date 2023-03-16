@extends('admin.main')

@section('content')
    <div class="app-main__inner">
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div>
                        Song
                        <div class="page-title-subheading">
                            View, create, update, delete and manage.
                        </div>
                    </div>
                </div>

                <div class="page-title-actions">
                    <a href="{{route('song.create')}}"
                       class="btn-shadow btn-hover-shine mr-3 btn btn-primary">
                                    <span class="btn-icon-wrapper pr-2 opacity-7">
                                        <i class="fa fa-plus fa-w-20"></i>
                                    </span>
                        Create
                    </a>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="main-card mb-3 card">
                    <x-alert/>
                    <div class="card-header">
                    </div>

                    <div class="table-responsive">
                        <table class="align-middle mb-0 table table-borderless table-striped table-hover text-center">
                            <thead>
                            <tr>
                                <th class="text-center">ID</th>
                                <th>Name</th>
                                <th>Image</th>
                                <th>Price</th>
                                <th>Music</th>
                                <th>Album</th>
                                <th>Singer</th>
                                <th>Genre</th>
                                <th class="text-center">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($songs as $song)
                            <tr>
                                <td class="text-center text-muted">{{$loop->iteration}}</td>
                                <td class="text-center text-muted">{{$song->name}}</td>
                                <td class="text-center text-muted"><img width="100" height="50" src="{{asset('uploads/'.$song->image)}}" alt=""> </td>
                                <td class="text-center text-muted">{{number_format($song->price)}} <strong>USD</strong> </td>
                                <td class="text-center text-muted"><audio controls>
                                        <source src="{{asset('uploads/'.$song->file_url)}}" type="audio/mpeg">
                                    </audio></td>
                                <td class="text-center text-muted">{{$song->album->name}}</td>
                                <td class="text-center text-muted">{{$song->singer->name}}</td>
                                <td class="text-center text-muted">{{$song->genre->name}}</td>
                                <td class="text-center" width="140">
                                    <a href="{{route('song.edit', $song->id)}}"
                                       data-toggle="tooltip" title="" data-placement="bottom"
                                       class="btn btn-outline-warning border-0 btn-sm"
                                       data-original-title="Edit">
                                                            <span class="btn-icon-wrapper opacity-8">
                                                                <i class="fa fa-edit fa-w-20"></i>
                                                            </span>
                                    </a>
                                        <form action="{{route('song.destroy', $song->id)}}" method="post" class="d-inline">
                                            @method('delete')
                                            @csrf
                                            <button class="btn btn-hover-shine btn-outline-danger border-0 btn-sm"
                                                    href=""
                                                    type="submit" data-toggle="tooltip" title=""
                                                    data-placement="bottom"
                                                    onclick="return confirm('Do you really want to delete this item?')"
                                                    data-original-title="Delete">
                                                            <span class="btn-icon-wrapper opacity-8">
                                                                <i class="fa fa-trash fa-w-20"></i>
                                                            </span>
                                            </button>
                                        </form>
                                </td>
                            </tr>

                                </tr>
                            @empty
                                <tr>
                                    <td colspan="9">
                                        <img src="{{asset('template/admin/assets/images/empty.jpg')}}" width="500" height="440" alt="">
                                    </td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                    </div>

                    <div class="d-block card-footer">
                        <nav role="navigation" aria-label="Pagination Navigation"
                             class="flex items-center justify-between">
                            {{$songs->withQueryString()->links()}}
                        </nav>
                    </div>

                </div>
            </div>
        </div>
    </div>

@endsection
