@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Edit Subcategory </div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="updatesub"  enctype="multipart/form-data">
                        {{ csrf_field() }}
                        
                        <div class="form-group">
                            <label for="type" class="col-md-4 control-label">Title</label>

                            <div class="col-md-6">
                                <input type="hidden" name="_method" value="PUT">
                                <input type="hidden" name="cat_id" value="{{$category->id}}" />
                                <input id="type" type="text" class="form-control" name="type" value="{{$category->type}}" required autofocus>

                                
                            </div>
                        </div>

                        

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Edit
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>




<div >
	<ul class="pager">
  		<li><a href="{{url()->previous()}} ">Previous</a></li>
	</ul>
</div>
@endsection