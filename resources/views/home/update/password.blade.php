@extends('layouts.app')

@section('title', __('home.change_password'))

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('home.settings') }}</div>
            
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <!-- Errors -->
                        @if ($errors->any())
                            <div class="alert alert-danger" role="alert">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form method="post">
                            @csrf
                            <div class="form-group">
                                <input type="password" class="form-control" name="old_password" placeholder="Old password" required>
                            </div>
                            <div class="form-row">
                                <div class="col form-group">
                                    <input type="password" class="form-control" name="password" placeholder="New password" required>
                                </div>
                                <div class="col form-group">
                                    <input type="password" class="form-control" name="password_confirmation" placeholder="Confirm password" required>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-lg btn-primary btn-block mt-2 mb-3">Submit</button>
                        </form>
                        <a href="{{ route('home.settings') }}">{{ __('interface.return_back') }}</a>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <div class="text-center mb-3">
                            <a href="{{ route('home.index') }}" class="text-dark">
                                <i class="fas fa-user p-3 border rounded-circle"></i>
                            </a>
                            <h3>{{ Auth::user()->name }}</h3>
                        </div>
                        <div class="list-group">
                            <a href="{{ route('home.index') }}" class="list-group-item list-group-item-action border-0 rounded">{{ __('home.dashboard') }}</a>
                            <a href="{{ route('home.posts') }}" class="list-group-item list-group-item-action border-0 rounded">{{ __('home.my_posts') }}</a>
                            <a href="{{ route('home.comments') }}" class="list-group-item list-group-item-action border-0 rounded">{{ __('home.my_comments') }}</a>
                            <a href="{{ route('home.settings') }}" class="list-group-item list-group-item-action border-0 rounded active">{{ __('home.settings') }}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
