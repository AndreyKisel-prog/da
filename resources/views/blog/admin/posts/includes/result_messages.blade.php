@php /** @var \Illuminate\Support\ViewErrorBag $errors */ @endphp
@if ($errors->any())
    <div class="row justify-content-center">
        <div class="col-md-11">
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <button type='button' class="btn-close" data-bs-dismiss="alert"
                >
                </button>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
                {{session('success')}}
            </div>
        </div>
    </div>
@endif

@if(session('success'))
    <div class="row justify-content-center">
        <div class="col-md-11">
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <button type='button' class="btn-close" data-bs-dismiss="alert"
                >
                </button>
                {{session('success')}}
            </div>
        </div>
    </div>
@endif

