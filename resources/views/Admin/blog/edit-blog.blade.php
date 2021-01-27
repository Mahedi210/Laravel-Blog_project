@extends('admin.master');

@section('content')
</br>
<div class="row">
    <div class="col-sm-12">
        <div class="well">

            @if($message= Session::get('message'))

                <h2 class="text-center text-success">{{$message}}</h2>

            @else

            @endif

            <form name="editBlogForm" class="form-horizontal" action="{{url('/blog/update-blog')}}" method="POST">
                {{csrf_field()}}
                <div class="form-group">
                    <label class="col-sm-3" >Blog titel</label>
                    <div class="col-sm-9">
                        <input type="text" value="{{$blog->blog_title}}" name="blog_title" class="form-control" />
                        <input type="hidden" value="{{$blog->id}}" name="blog_id" class="form-control" />

                    </div>

                </div> <div class="form-group">
                    <label class="col-sm-3" >author name</label>
                    <div class="col-sm-9">
                        <input type="text" value="{{$blog->author_name}}" name="author_name" class="form-control" />

                    </div>

                </div>

                <div class="form-group">
                    <label class="col-sm-3" >Category Name</label>
                    <div class="col-sm-9">
                        <input type="text" value="{{$blog->category_name}}" name="category_name" class="form-control" />

                    </div>

                </div>

                <div class="form-group">
                    <label class="col-sm-3" >Blog Description</label>
                    <div class="col-sm-9">
                        <textarea class="form-control" name="blog_description">{{$blog->blog_description}}</textarea>

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
                            <input type="submit" name="btn" class="btn btn-block btn-success" value="Update Blog Info" />

                        </div>

                    </div>


                </div>



            </form>

        </div>

    </div>

</div>

<script>

    document.forms['editBlogForm'].elements['publication_status'].value='{{$blog->publication_status}}';

</script>
@endsection





