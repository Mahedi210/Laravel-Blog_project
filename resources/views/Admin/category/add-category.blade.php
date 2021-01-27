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

                <form class="form-horizontal" action="{{url('/category/new-category')}}" method="POST">
                  {{csrf_field()}}
                    <div class="form-group">
                        <label class="col-sm-3" >Category Name</label>
                        <div class="col-sm-9">
                            <input type="text" name="category_name" class="form-control" />

                        </div>

                    </div>

                    <div class="form-group">
                        <label class="col-sm-3" >Category Description</label>
                        <div class="col-sm-9">
                            <textarea class="form-control" name="category_description"></textarea>

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
                                <input type="submit" name="btn" class="btn btn-block btn-success" value="save category Info" />

                            </div>

                        </div>


                    </div>



                </form>

            </div>

        </div>

    </div>
@endsection


