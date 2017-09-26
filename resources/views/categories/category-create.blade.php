@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Add New Category</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('category.store') }}"  enctype="multipart/form-data">
                        {{ csrf_field() }}
                        
                        <div class="form-group">
                            <label for="type" class="col-md-4 control-label">Title</label>

                            <div class="col-md-6">
                                <input id="type" type="text" class="form-control" name="type"  required autofocus>
                            </div>
                        </div>

                        

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Add
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