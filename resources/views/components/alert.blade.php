@if ($errors->any())
    <div class="alert alert-danger">
        @foreach ($errors->all() as $error)
            <div>{{ $error }}</div>
        @endforeach

    </div>
@endif

@if (Session::has('error'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <div>{{ session('error') }}</div>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif



@if (Session::has('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <div>{{ session('success') }}</div>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif
