@extends('front.master')


@section('title')
   Details Ideas
@endsection
@section('content')

    <!-- blog-contents -->

    <section class="col-md-8" >

        <article class="blog-item">

            <div class="row">
                <div class="col-md-offset-1 col-md-10 col-md-offset-1" style="background-color: #E9EBEE">
                    <div style="background-color: white;padding: 10px; padding-top: 0px; border-radius: 10px;">
                    <h1 style="padding-top: 10px;">
                        {{$ideaById->idea_title}}
                    </h1>
                        <p style="font-family:'Merienda';font-size: 17px;color: #1e2aff;">(<?php if($ideaById->anonymous_post==1){echo "Anonymous Post";}else{echo $ideaById->name;}?>)</p>

                        <p style="font-family:'Merienda';font-size: 17px;color:#9F2438;"><b><i>Views:</i></b><a id="clicks">{{$ideaById->views}}</a></p>
                    <h5><span style="color: blue;font-family:'Merienda';font-size: 17px;"><b><i>Category Name:</i></b></span> {{$ideaById->category_name}}<span style="float: right;"><strong style="font-family: 'Merienda';font-size: 17px;color:blue"><i>Posted on: </i></strong><time> {{$ideaById->created_at}}</time></span></h5>
                    <hr>
                        <p style="font-family: 'Merienda';font-size: 16px;">{{$ideaById->idea_description}}</p>
                        ,
                    <hr/>
                    {{--like dislike start here--}}
                    <div class="rating form-group" id="rating2">
                        <button class="btn btn-default like"  style="border: 1px solid beige; border-radius: 10px;width: 20%" style="<?php if(isset($checkLikeById)){echo "background-color:#87A9C7";}else{echo "border: 1px solid beige; border-radius: 10px";} ?>" id="like"><span><i class="fa fa-thumbs-o-up"></i></span> Like</button>
                        <span class="likes">0</span>
                        <button class="btn btn-default dislike" style="border: 1px solid beige; border-radius: 10px;width: 20%;" id="dislike"><span><i class="fa fa-thumbs-o-down"></i></span> Dislike</button>
                        <span class="dislikes">0</span>
                    </div>
                    </div>
                    <hr/>
                    {{--like dislike ends here--}}

                    {{--comments showing start--}}
                    <div class="col-md-12">


                    <?php if(Auth::user()->userRole('student')){ ?>
                    @foreach($commentsForStudent as $commentForStudent)

                   {{--<div class="" style="padding-top: 20px;padding-right: 0px;">--}}
                     {{--<img src="{{asset('/')}}{{$commentForStudent->image}}" height="40" width="40" class="avatar img-circle" alt="avatar">--}}
                   {{--</div>--}}

                    <div style="padding-bottom: 8px; padding-left: 0px;" class="col-md-12">
                        <h5 style="color:#4267B2;border-radius:10px;padding:10px; box-shadow: 1px 1px 10px 1px #888888; background-color: whitesmoke;"><?php if($commentForStudent->anonymous==0){echo "Anonymous";}else{echo $commentForStudent->name;} ?>: <span style="color: #0c0c0c"><p style="font-family:Comic Sans MS, cursive, sans-serif;font-size: 14px;text-align: justify ">{{$commentForStudent->reply_description}}</p></span></h5>
                    </div>
                    @endforeach
                    <?php }else{ ?>
                    @foreach($commentsForAdmin as $commentForAdmin)
                        <div style="padding-bottom: 8px;">
                            <h5 style="color:#4267B2;border-radius:10px;padding:10px; box-shadow: 1px 1px 10px 1px #888888; background-color: whitesmoke;"><?php if($commentForAdmin->anonymous==0){echo "Anonymous";}else{echo $commentForAdmin->name;} ?>: <span style="color: #0c0c0c">{{$commentForAdmin->reply_description}}</span></h5>
                        </div>
                    @endforeach
                    <?php } ?>
                        </div>
                    <!--comment showing ends here-->
                    {{--comment submit form start here--}}
                    <form method="post" action="{{url('/new-answer')}}" >
                        {{csrf_field()}}

                        <div class="form-group">
                           <div>
                                <input type="hidden" class="form-control" name="idea_id" value="{{$ideaById->id}}" required/>
                                <input type="hidden" class="form-control" name="user_id" value="{{Auth::user()->id}}" required/>
                                <input type="hidden" class="form-control" name="user_role" value="{{Auth::user()->userRole('coordinator')}}" required/>
                                <input type="hidden" class="form-control" name="user_role_two" value="{{Auth::user()->userRole('superadmin')}}"/>
                                <input type="hidden" class="form-control" name="user_role_three" value="{{Auth::user()->userRole('manager')}}"/>
                                <input type="text" class="form-control" name="reply_description" required placeholder="place your comments..."/>
                           </div>
                        </div>
                        <div class="form-group" style="text-align: left">
                            <input type="checkbox"  name="anonymous" value="0"/> <strong>Anonymously Comment</strong>
                        </div>
                        <div class="form-group">
                            <div style="text-align: center">
                                <input type="submit" class="form-control btn " style="background-color:#182C53;color: white" value="Submit" name="submit"/>
                            </div>
                        </div>
                    </form>
                    {{--comment submit form ends here--}}
                </div>
            </div>

        </article>
        </section>
    <!-- end of blog-contents -->

    <!-- sidebar -->
    <aside class="col-md-4 col-sm-8 col-xs-8">
        <div class="sidebar">

            <!-- search option -->
            <?php if(isset($ideaById->file_data)) {?>
            <img class="img-responsive" src="{{ asset('/').$ideaById->file_data }}" alt="avatar">
            <?php }else{ ?>
            <img class="img-responsive" src="{{ asset('/front/') }}/assets/img/No_Image_Available.jpg" alt="No Idea Image">
              <?php } ?>

            <!-- subscribe form -->
            <!-- sidebar share button -->
             <!-- /.share-widget -->

        </div>
    </aside>
    <!-- end of sidebar -->
@endsection
