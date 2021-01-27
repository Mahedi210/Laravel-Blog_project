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
                        <th>Blog ID</th>
                        <th>Blog title</th>
                        <th>Author Name</th>
                        <th>Category Name</th>
                        <th>Blog Description</th>
                        <th>Publication status</th>
                        <th>Action</th>

                    </tr>

                     @foreach($blogs as $blog)

                        <tr>
                            <td>{{$blog->id}}</td>
                            <td>{{$blog->blog_title}}</td>
                            <td>{{$blog->author_name}}</td>
                            <td>{{$blog->category_name}}</td>
                            <td>{{$blog->blog_description}}</td>
                            <td>{{$blog->publication_status==1 ? 'published':'unpublished'}}</td>


                            <td>



                            @if($blog->publication_status==1)
                                    <a href="{{url('/blog/unpublished-blog/'.$blog->id)}}" class="btn btn-info btn-xs" title="published">
                                        <span class="glyphicon glyphicon-arrow-up">publish</span>

                                    </a>
                                @else
                                    <a href="{{url('/blog/published-blog/'.$blog->id)}}" class="btn btn-warning btn-xs" title="published">
                                        <span class="glyphicon glyphicon-arrow-up">publish</span>

                                    </a>
                                @endif


                                <a href="{{url('/blog/edit-blog/'.$blog->id)}}" class="btn btn-info btn-xs" title="edit">
                                <span class="glyphicon glyphicon-edit">Edit

                                </span>
                                </a>
                                <a href="" class="btn btn-info btn-xs" title="view">
                                <span class="glyphicon glyphicon-edit">View

                                </span>
                                </a>
                                <a href="{{url('/blog/delete-blog/'.$blog->id)}}" onclick="return confirm('Are you sure to delete this')" class="btn btn-danger btn-xs" title="delete">

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

