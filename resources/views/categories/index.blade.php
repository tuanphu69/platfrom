@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('create Category') }}</div>

                <div class="card-body">


                    <table class="table table-dark table-striped">
                        <thead>
                          <tr>
                            <th scope="col">no</th>
                            <th scope="col">Edit</th>
                            <th scope="col">Delete</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($categories as $category)
                            <tr>
                                <th scope="row">{{$category->name}}</th>
                                
                                <td>
                                    <a class="" href={{URL::to('category/edit' , ['id'=>$category->id])}}>
                                    
                                        <i class="fal fa-edit">edit</i>
                                        
                                    </a>
                                </td>
                                <td>
                                    <a class="" href={{URL::to('category/delete' , ['id'=>$category->id])}}>
                                    
                                        <i class="fas fa-trash-alt">delete</i>
                    
                                    </a>
                                </td>
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
