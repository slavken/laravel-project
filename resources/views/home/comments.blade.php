@extends('layouts.app')

@section('title', __('home.my_comments'))

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-4 order-md-2 mb-3">
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
                            <a href="#" class="list-group-item list-group-item-action border-0 rounded active">{{ __('home.my_comments') }}</a>
                            <a href="{{ route('home.settings') }}" class="list-group-item list-group-item-action border-0 rounded">{{ __('home.settings') }}</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-8 order-md-1">
                <div class="card">
                    <div class="card-header">{{ __('home.comments') }}</div>

                    <div class="card-body">
                        @if ($comments->isNotEmpty())
                            <div class="table-responsive">
                                <table class="table table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th scope="col">Comment</th>
                                            <th scope="col">Post</th>
                                            <th class="text-center" scope="col">Date</th>
                                            <th class="text-center" scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($comments as $comment)
                                            <tr>
                                                <td>{{ $comment->body }}</td>
                                                <th><a href="{{ route('post.show', $comment->post->alias) }}" class="text-dark">{{ Str::limit($comment->post->{'title_' . app()->currentLocale()}, 30) }}</a></th>
                                                <td class="text-center">{{ $comment->created_at->diffForHumans() }}</td>
                                                <td>
                                                    <div class="d-flex justify-content-center">
                                                        <form action="{{ route('home.comments.destroy', $comment->id) }}" method="POST">
                                                            @method('DELETE')
                                                            @csrf
                                                            <button type="submit" class="btn btn-sm btn-danger delete">Delete</button>
                                                        </form>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>

                            <!-- Pagination -->
                            <div class="d-flex justify-content-center">
                                {{ $comments->links() }}
                            </div>
                        @else
                            <span class="text-danger">{{ __('interface.not_found') }}</span>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
