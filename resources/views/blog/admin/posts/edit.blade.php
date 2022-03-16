@extends('layouts.app')

@section('content')
    @php
        /** @var \App\Models\BlogCategory $item */
    @endphp

    @if($item->exists)
        <form action="{{route('blog.admin.categories.update', $item->id)}}" method="POST">
            @method('PATCH')
    @else
                <form action="{{route('blog.admin.categories.store')}}" method="POST">
                    @endif
                    @csrf
                    <div class="container">

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


                        <div class="row justify-content-center">
                            <div class="col-md-8">
                                @include('blog.admin.categories.includes.item_edit_main_col')
                            </div>
                            <div class="col-md-3">
                                @include('blog.admin.categories.includes.item_edit_add_col')
                            </div>
                        </div>
                    </div>
                </form>



@endsection
