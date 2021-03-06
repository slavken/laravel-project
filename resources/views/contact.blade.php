@extends('layouts.default')

@section('title', __('interface.contact'))

@section('content')
    <div class="row justify-content-center mt-4">
        <div class="col-md-7">
            @if (session('status'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Success!</strong> {{ session('status') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif

            <div class="card">
                <div class="card-body">
                    <h1 class="h2 card-title mb-4">{{ __('interface.contact_us') }}</h1>

                    <form action="{{ route('contact.submit') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <input type="email" class="form-control form-control-lg @error('email') is-invalid @enderror" name="email" placeholder="Email" required autocomplete="email" autofocus>
                        </div>
                        <div class="form-group">
                            <textarea class="form-control @error('body') is-invalid @enderror" name="body" cols="30" rows="10" placeholder="Your message" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-lg btn-block btn-primary mt-4">Send</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection