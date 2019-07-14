

@extends('front.master')


@section('title')
        Home
    @endsection
@section('content')
    <div class="row">

    <div class="col-md-3">
        <?php if(Session::get('role')=='student'){ ?>
<!--            own published ideas starts here-->
            <div class="panel panel-info">
                <div class="panel-heading">Own Published Ideas
                </div>
                <div class="panel-body" style="overflow: scroll; max-height: 300px;">
                    @php $i=0; @endphp
                    @foreach($studentIdeas as $studentIdea)

                            @php $i++; @endphp
                    <div>
                        <h4 style="">
                          {{$i}}.  <a href="{{url('/idea-for-comment/'.$studentIdea->id)}}">{{$studentIdea->idea_title}}</a>
                        </h4>

                        <p><b style="color: blueviolet;font-family:'Merienda';font-size: 16px;"><?php if($studentIdea->anonymous_post==1){echo "(Anonymously Posted)";}else{echo "(Posted With Name)";} ?></b></p>

                        <p style="color: #F15500;font-family:'Merienda';font-size: 17px;"><i><b>Category Name:</b></i> <a href="">{{$studentIdea->category_name}}</a></p>
                        <p style="color: green;font-family:'Merienda';font-size: 15px;"><i><b>Published Date:</b></i> <a href="">{{$studentIdea->created_at}}</a></p>
                    </div>
                    @endforeach

                </div>
            </div>
            {{--Own published ideas ends here--}}
        <?php }else{ ?>
            <div class="panel panel-info">
                <div class="panel-heading">Most Popular Ideas
                </div>
                <div class="panel-body" style="height: 300px; overflow: scroll">
                    @if(isset($FirstTops))
                    <div>
                        <h3 style="color: green;font-family:'Merienda';font-size: 22px;">
                            <a href="{{url('/idea-for-comment/'.$FirstTops->id)}}">1.{{$FirstTops->idea_title}}</a>
                        </h3>

                        <p><i><b>Name: </b></i><b style="color: blueviolet"><?php if($FirstTops->anonymous_post==1){echo "Anonymous";}else{echo $FirstTops->name;} ?></b><i><b style="padding-left: 10px;color: green;font-family:'Merienda';font-size: 18px;">Likes:</b></i> <a href="">{{$firstLike}}</a></p>

                        <p style="color: #F15500;font-family:'Merienda';font-size: 16px;"><i><b>Category Name:</b></i> <a href="">{{$FirstTops->category_name}}</a></p>
                    </div>

                        <hr>
                    @endif
                        @if(isset($secondTop))
                    <div>
                        <h3 style="color: green;font-family:'Merienda';font-size: 22px;">
                            <a href="{{url('/idea-for-comment/'.$secondTop->id)}}">2.{{$secondTop->idea_title}}</a>
                        </h3>

                        <p><i><b>Name: </b></i><b style="color: blueviolet"><?php if($secondTop->anonymous_post==1){echo "Anonymous";}else{echo $secondTop->name;} ?></b><i><b style="padding-left: 10px;color: green;font-family:'Merienda';font-size: 18px;">Likes:</b></i> <a href="">{{$secondLike}}</a></p>

                        <p style="color: #F15500;font-family:'Merienda';font-size: 16px;"><i><b>Category Name:</b></i> <a href="">{{$secondTop->category_name}}</a></p>
                    </div>
                            <hr>
                        @endif
                        @if(isset($thirdTop))
                    <div>
                        <h3 style="color: green;font-family:'Merienda';font-size: 22px;">
                            <a href="{{url('/idea-for-comment/'.$thirdTop->id)}}">3.{{$thirdTop->idea_title}}</a>
                        </h3>

                        <p><i><b>Name: </b></i><b style="color: blueviolet"><?php if($thirdTop->anonymous_post==1){echo "Anonymous";}else{echo $thirdTop->name;} ?></b><i><b style="padding-left: 10px;color: green;font-family:'Merienda';font-size: 18px;">Likes:</b></i> <a href="">{{$thirdLike}}</a></p>

                        <p style="color: #F15500;font-family:'Merienda';font-size: 16px;"><i><b>Category Name:</b></i> <a href="">{{$thirdTop->category_name}}</a></p>
                    </div>
                            <hr>
                        @endif

                </div>
            </div>

            <div class="panel panel-info">
                <div class="panel-heading">Most Viewed Ideas
                </div>
                <div class="panel-body" style="overflow: scroll;max-height: 350px;">
                    @php $i=0; @endphp
                @foreach($MostViewdIdeas as $MostViewdIdea)
                        @php $i++ @endphp
                    <div>
                        <h4>
                            <a href="{{url('/idea-for-comment/'.$MostViewdIdea->id)}}">{{$i}}.{{$MostViewdIdea->idea_title}}</a>
                        </h4>

                        <p><i><b>Name: </b></i><b style="color: blueviolet">(<?php if($MostViewdIdea->anonymous_post==1){echo "Anonymous";}else{echo $MostViewdIdea->name;} ?>)</b><i><b style="padding-left: 10px;color: green;font-family:'Merienda';font-size: 18px;">Likes:</b></i> <a href="">{{$firstLike}}</a></p>

                        <p style="color: #F15500;font-family:'Merienda';font-size: 16px;"><i><b>Category Name:</b></i> <a href="">{{$MostViewdIdea->category_name}}</a></p>
                    </div>
                    <hr/>
                    <hr/>
                        @endforeach
                </div>
            </div>

        <?php }?>
    </div>

    <!-- blog-contents -->
    <section class="col-md-6">

  @foreach($ideas as $idea)

        <article class="blog-item">
            <div class="row">
                <div class="col-md-3">
                    <a href="{{url('/idea-for-comment/'.$idea->id)}}">
                        <?php if($idea->file_data){ ?>
                            <img src="{{url('/'.$idea->file_data)}}" class="img-thumbnail center-block" alt="Uploaded File">
                        <?php }else{?>
                            <img src="https://sl.d.umn.edu/och/PhotoGallery/no-image-available.jpg" class="img-thumbnail center-block" alt="Blog Post Thumbnail">

                        <?php }?>
                    </a>
                </div>
                <div class="col-md-9">

                    <h1>
                        <a href="{{url('/idea-for-comment/'.$idea->id)}}" onclick="hello()">{{$idea->idea_title}}</a>
                    </h1>

                    <p>
                        <b style="color: blueviolet">{{ $idea->anonymous_post ==0 ? 'Anonymous' : $idea->name }}</b>
                        <time>{{$idea->created_at}}</time>

                    </p>

                </div>
            </div>
        </article>

        @endforeach


        <!-- /.page-turn -->

    </section>

    <!-- end of blog-contents -->

    <!-- sidebar -->
    <div class="col-md-3">
        <?php if(Session::get('role')=='student'){ ?>
            {{--student own pending ideas start from here--}}
            <div class="panel panel-info">
                <div class="panel-heading">Own Pending Ideas
                </div>
                <div class="panel-body" style="overflow: scroll; max-height: 300px">

                    <div class="row">
                        @php $i=0; @endphp
                        @foreach($studentIdeasNotPublised as $studentIdeasNotPublise)
                            @php $i++; @endphp
                            <div class="col-md-12">

                                <h4>
                                    {{$i}}. <a href="{{url('/idea-for-comment/'.$studentIdeasNotPublise->id)}}">{{$studentIdeasNotPublise->idea_title}}</a>
                                </h4>
                                <p>
                                    <b style="color: blueviolet;font-family:'Merienda';font-size: 14px;"><?php if($studentIdeasNotPublise->anonymous_post==0){ echo"(Anonymously Posted)";}else{echo"(Posted With Name)";} ?></b>
                                    <a href=""></a>
                                </p>
                                <p style="font-family:'Merienda';font-size: 17px;"><span style="color: #EC0000;"><i><b>Category Name:</b></i></span> <a href="">{{$studentIdeasNotPublise->category_name}}</a></p>

                            </div>
                        @endforeach

                    </div>


                </div>
            </div>
            {{--student own pending ideas end here--}}

        <?php }else{ ?>
            {{--most recent ideas start from here--}}
            <div class="panel panel-success">
                <div class="panel-heading">Most Recent Ideas</div>
                <div class="panel-body">

                <div class="row">
                    @php $i=0; @endphp

                    @foreach($latestIdeas as $latestIdea)
                        @php $i++; @endphp
                    <div class="col-md-12">

                        <h4>
                           {{$i}}. <a href="{{url('/idea-for-comment/'.$latestIdea->id)}}">{{$latestIdea->idea_title}}</a>
                        </h4>
                        <p>
                            <b style="color: blueviolet;">(<?php if($latestIdea->anonymous_post==1){echo $latestIdea->name;}else{echo"anonymous";}?>)</b>
                            <a href=""></a>
                        </p>



                    </div>
                    @endforeach

                </div>


                </div>
            </div>
            {{--most recent ideas ends here--}}
            {{--most recent comment start from here--}}
            <div class="panel panel-info">
                <div class="panel-heading">Most Recent Comments
                </div>
                <div class="panel-body">

                    <div class="row">
                        @php $i=0; @endphp
                        @foreach($latestComments as $latestComment)
                            @php $i++; @endphp
                            <div class="col-md-12">

                                <h4>
                                    {{$i}} .<a href="{{url('/idea-for-comment/'.$latestComment->id)}}">{{$latestComment->reply_description}}</a>
                                </h4>
                                <h5 ><span style="font-family:'Merienda';font-size: 16px;color: green;"><strong><i>Idea Name: </i></strong></span>{{$latestComment->idea_title}}</h5>
                                <p>
                                    <i style="font-family:'Merienda';font-size: 16px;"><b>Name:</b></i><b style="color: blueviolet">(<?php if($latestComment->anonymous==1){echo $latestComment->name;}else{echo"anonymous";} ?>)</b>
                                    <a href=""></a>
                                </p>



                            </div>
                        @endforeach

                    </div>


                </div>
            </div>
            {{--most recent comment ends here--}}
        <?php }?>
    </div>
        <div class="page-turn">
            <div class="row">
                <div class="col-md-6 col-md-offset-3 text-center">
                    {{ $ideas->render() }}
                </div>
            </div>
        </div> <!-- /.page-turn -->

    </div>



    <!-- end of sidebar -->
@endsection
