@extends('front.master')
@section('title')
    Idea Details
    @endsection
@section('content')
    <!-- blog-contents -->
    <section class="col-md-offset-3 col-md-6 col-md-offset-3" style="">


        <div class="comment-post well" style="border-radius: 10px">
            <h1 style="text-align: center">IDEA SHARE</h1>
            <h4 style="text-align: center"> {{ Session::get('message') }}</h4>
            <form method="post" action="{{url('/save-idea')}}" enctype="multipart/form-data">
                {{csrf_field()}}
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <input  name="idea_title" type="text" class="form-control" id="name" required="required" placeholder="Idea Title">
                            <input  name="user_id" type="hidden" class="form-control" id="name" required="required" value="{{ Auth::user()->id }}">
                            <span style="color: red" >{{ $errors->has('idea_title') ? $errors->first('idea_title') : ' ' }}</span>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <textarea name="idea_description" type="text" class="form-control" id="message" rows="5" required="required" placeholder="Idea Description"></textarea>
                    </div>
                    <span style="color: red" >{{ $errors->has('idea_description') ? $errors->first('idea_description') : ' ' }}</span>
                    <div class="col-md-12">
                        <div class="form-group">
                           <select name="category_id" class="form-control" id="email" required="required" placeholder="Category Name">

                               <option value="">Category Name</option>
                               @foreach($categories as $category)
                                   <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                               @endforeach

                           </select>
                            <span style="color: red" >{{ $errors->has('category_id') ? $errors->first('category_id') : ' ' }}</span>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <input  name="file" type="file" class="form-control">
                    </div>

                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" required="required"> Please Check to Confirm
                            </label>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" name="anonymousPost" value="0" /> Post Anonymously
                            </label>
                        </div>
                    </div>
                    <div class="col-md-offset-1 col-md-6">
                        <button type="submit" id="submit" name="submit" class="btn btn-cmnt">Submit</button>
                    </div>
                </div>

            </form>
        </div>
    </section>
    <!-- end of blog-contents -->

@endsection