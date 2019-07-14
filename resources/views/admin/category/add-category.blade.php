@extends('admin.master')
@section('content')
    <br/>
    <div class="row">
        <div class="col-sm-12">
            <div class="well">
                <h3 style="text-align: center">ADD Category</h3>
                <h4 style="text-align: center">{{ Session::get('message') }}</h4>

                <form action="{{ url('/new-category') }}" method="POST" class="form-horizontal">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label class="col-sm-3">Category Name</label>
                        <div class="col-sm-9">
                            <input type="text" name="category_name" class="form-control"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3">Category Description</label>
                        <div class="col-sm-9">
                            <textarea class="form-control" name="category_description"></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3">Start Date</label>
                        <div class="col-sm-9">
                            <input type="date" name="start_date" class="form-control"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3">End Date</label>
                        <div class="col-sm-9">
                            <input type="date" name="end_date" class="form-control"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3">Publication Status</label>
                        <div class="col-sm-9">
                            <select name="publication_status" class="form-control">
                                <option>---Select Publication Status---</option>
                                <option value="1">Published</option>
                                <option value="0">Unpublished</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-9 col-sm-offset-3">
                            <input type="submit" name="btn" class="btn btn-success btn-block" value="Save Category Info"/>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection