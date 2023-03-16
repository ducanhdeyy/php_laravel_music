@extends('admin.main')

@section('content')

    <div class="app-main__inner">
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div>
                        Transaction
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
                    <x-alert/>
                    <div class="card-header">
                    </div>

                    <div class="table-responsive">
                        <table class="align-middle mb-0 table table-borderless table-striped table-hover text-center">
                            <thead>
                            <tr>
                                <th class="text-center">ID</th>
                                <th>User Name</th>
                                <th>Song Name</th>
                                <th>Price</th>
                                <th>Date</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($transactions as $transaction)
                                <tr>
                                    <td class="text-center text-muted">{{$loop->iteration}}</td>
                                    <td class="text-center text-muted">{{$transaction->user->name}}</td>
                                    <td class="text-center text-muted">{{$transaction->song->name}}</td>
                                    <td class="text-center text-muted">{{number_format($transaction->price)}} <strong>USD</strong> </td>
                                    <td class="text-center text-muted">{{$transaction->created_at->format('M-d-y')}}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7">
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
                            {{$transactions->withQueryString()->links()}}
                        </nav>
                    </div>

                </div>
            </div>
        </div>
    </div>

@endsection
