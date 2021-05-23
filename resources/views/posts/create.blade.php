@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('create') }}</div>

                    <div class="card-body">

                        <h1>Create Post</h1>
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif


                        <form action={{ URL::to('post/store') }} method="POST" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="mb-3">
                                <label for="title" class="form-label">Title</label>
                                <input type="text" class="form-control" name="title" value="">
                            </div>
                            <div class="mb-3">
                                <label for="category" class="form-label">Category</label>
                                <select class="form-control" name="category_id" id="category"
                                    aria-label="Default select example">
                                    @foreach ($categories as $category)

                                        <option value="{{ $category->id }}">{{ $category->name }}</option>

                                    @endforeach

                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="content" class="form-label">Description</label>
                                <textarea class="form-control" name="content" rows="8" cols="8"></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="featured">Photo</label>
                                <input class="form-control-file" name="featrued" type="file">
                            </div>

                            <button type="submit" class="btn btn-primary">save</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
