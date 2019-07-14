@extends('admin.master')
@section('title')
    Edit Ideas
@endsection
@section('content')
    <br/>
    <div class="row">
        <div class="col-sm-12">
            <div class="well">
                <h1 class="text-info" style="text-align: center">Edit Idea Closer Date</h1>
                <h3 style="text-align: center" class="text-info">{{ Session::get('message') }}</h3>
                <form method="post" action="{{url('/update-idea')}}" name="editIdea">
                    {{csrf_field()}}
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="col-sm-3">Idea Name</label>
                                <div class="col-sm-9 form-group" >
                                <input  name="idea_title" type="text" class="form-control" id="name" required="required" placeholder="Idea Title" value="{{$editIdeas->idea_title}}">
                                <input  name="idea_id" type="hidden" class="form-control" id="name" required="required" value="{{$editIdeas->id}}">
                                 </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="col-sm-3">Idea Description</label>
                                <div class="col-sm-9 form-group">
                                    <textarea name="idea_description" type="text" class="form-control" id="message" rows="5" required="required" placeholder="Idea Description">{{$editIdeas->idea_description}}</textarea>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <label class="col-sm-3">Colser Date</label>
                            <div class="form-group col-sm-9">
                                <input  name="closer_date" type="date" class="form-control" required="required" placeholder="Idea Title" value="{{$editIdeas->closer_date}}">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <label class="col-sm-3">Publication Status</label>
                            <div class="col-sm-9 form-group">
                                <select name="publication_status" class="form-control">
                                    <option>---Select Publication Status---</option>
                                    <option value="1">Published</option>
                                    <option value="0">Unpublished</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                                <input type="submit" name="btn" class="btn btn-success btn-block" value="Update Idea"/>
                            </div>
                        </div>

                    </div>

                </form>
            </div>
        </div>
    </div>
    <script>
        document.forms['editIdea'].elements['publication_status'].value = '{{$editIdeas->publication_status}}';
    </script>
@endsection