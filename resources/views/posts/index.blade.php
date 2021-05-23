@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">POST</div>
                    <div class="card-body">
                        <table class="table table-dark table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">Image</th>
                                    <th scope="col">Title</th>
                                    <th scope="col">updated_at</th>
                                    <th scope="col">created_at</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($posts as $post)
                                    <tr>
                                        <th scope="row">
                                            <img src="{{$post->featrued}}" alt="{{$post->title }}" class="img-thumbnail">
                                            {{-- {{ $post->featrued }} --}}
                                        </th>
                                        <th scope="row">{{ $post->title }}</th>
                                        <th scope="row">{{ $post->updated_at }}</th>
                                        <th scope="row">{{ $post->created_at }}</th>

                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
