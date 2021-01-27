@extends('admin.master')


@section('content')
</br>
<div class="row">
    <div class="col-sm-12">
        <div class="well">

            @if($message= Session::get('message'))

                <h2 class="text-center text-success">{{$message}}</h2>

            @else

            @endif

            <form class="form-horizontal" action="{{url('/blog/new-blog')}}" method="POST" enctype="multipart/form-data">
                {{csrf_field()}}
                <div class="form-group">
                    <label class="col-sm-3" >Blog titel</label>
                    <div class="col-sm-9">
                        <input type="text" name="blog_title" class="form-control" />
                        <span class="text-danger"> {{$errors->has('blog_title') ? $errors->first('blog_title'): ' '}}</span>

                    </div>

                </div>

                <div class="form-group">
                    <label class="col-sm-3" >author name</label>
                    <div class="col-sm-9">
                        <input type="text" name="author_name" class="form-control" />

                    </div>

                </div>

                <div class="form-group">
                    <label class="col-sm-3" >Category Name</label>
                    <div class="col-sm-9">
                        <select name="category_id" class="form-control">
                            <option>---Select category name--</option>
                            @foreach( $publishedCategories as  $publishedCategory)

                            <option value="{{$publishedCategory->id}}">{{$publishedCategory->category_name}}</option>

                            @endforeach

                        </select>

                    </div>

                </div>

                <div class="form-group">
                    <label class="col-sm-3" >Blog Description</label>
                    <div class="col-sm-9">
                        <textarea class="form-control" name="blog_description"></textarea>

                    </div>

                </div>

                <div class="form-group">
                    <label class="col-sm-3" >Blog Image</label>
                    <div class="col-sm-9">
                       <input type="file" name="blog_image" accept="image/*"/>

                    </div>

                </div>

                <div class="form-group">
                    <label class="col-sm-3" >Publication Status</label>
                    <div class="col-sm-9">
                        <select class="form-control" name="publication_status">
                            <option value="1">Publishaed</option>
                            <option value="0">Unpublishe</option>
                        </select>

                    </div>

                    <div class="form-group">

                        <div class="col-sm-9">
                            <input type="submit" name="btn" class="btn btn-block btn-success" value="save Blog Info" />

                        </div>

                    </div>


                </div>



            </form>

        </div>

    </div>

</div>
@endsection




