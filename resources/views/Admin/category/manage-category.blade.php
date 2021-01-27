@extends('admin.master')

@section('content')

    @if($message=Session::get('message'))
        <h1>{{$message}}</h1>
    @endif
    <div class="row">
        <div class="card card-body">
            <div class="card-body">
                <table class="table table-bordered table-hover">

                    <tr>
                        <th>Category ID</th>
                        <th>category Name</th>
                        <th>Category Description</th>
                        <th>Publication status</th>
                        <th>Action</th>

                    </tr>
                    @foreach($categories as $category)
                    <tr>
                        <td>{{$category->id}}</td>
                        <td>{{$category->category_name}}</td>
                        <td>{{$category->category_description}}</td>
                        <td>{{$category->publication_status==1 ? 'published':'unpublished'}}</td>
                        <td>
                            @if($category->publication_status==1 )

                            <a href="{{url('/category/unpublished-category/'.$category->id)}}" class="btn btn-info btn-xs" title="published">
                                <span class="glyphicon glyphicon-arrow-up">publish</span>
                            </a>

                            @else

                                <a href="{{url('/category/published-category/'.$category->id)}}" class="btn btn-warning btn-xs" title="unpublished">
                                    <span class="glyphicon glyphicon-arrow-up">unpublish</span>
                                </a>

                            @endif
                            <a href="{{url('/category/edit-category/'.$category->id)}}" class="btn btn-info btn-xs" title="edit">
                                <span class="glyphicon glyphicon-edit">Edit

                                </span>
                            </a>
                            <a href="{{url('/category/delete-category/'.$category->id)}}" onclick="return confirm('Are you sure to delete this')" class="btn btn-danger btn-xs" title="delete">

                                <span class="glyphicon glyphicon-trash">Delete

                                </span>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </table>

            </div>

        </div>


    </div>
@endsection