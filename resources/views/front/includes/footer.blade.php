
<footer >
    <div class="container">
        <div class="row">
            <!-- copyright -->
            <div class="col-md-4 col-sm-4">
                copyright &copy; 2018 <a href="#" style="margin-left: 4px;">SHARE-BOARD</a>
                <br>

            </div>

            <!-- footer share button -->


            <!-- footer-nav -->

        </div>
    </div>
</footer>

<!--  Necessary scripts  -->

<script type="text/javascript" src="{{ asset('/front/') }}/assets/js/jquery-2.1.3.min.js"></script>
<script type="text/javascript" src="{{ asset('/front/') }}/assets/js/bootstrap.min.js"></script>
<script type="text/javascript" src="{{ asset('/front/') }}/assets/js/jQuery.scrollSpeed.js"></script>
<script type="text/javascript" src="{{ asset('/front/') }}/Like-Dislike/js/like-dislike.js"></script>

<!-- smooth-scroll -->

<script>

    $(function() {
        jQuery.scrollSpeed(100, 1000);
        $.get("{{url('/like-count')}}",function (msg) {
            $('.likes').html(msg);


        })
        $.get("{{url('/dislike-count')}}",function (msg) {
            $('.dislikes').html(msg);
        })
    });
</script>
<script>

    $('.giveLike').click(function(){
        $.ajax({
            method: "POST",
            url: "{{url('/dislike-to-like')}}",
            data: { ideaid:"{{Session::get('idea_id')}}",userid:"{{Session::get('user_id')}}", likes: 1, "_token":"{{csrf_token()}}" }
        }).done(function( msg ) {
            $.get("{{url('/like-count')}}",function (msg) {
                $('.likes').html(msg);
                $('#dislike').prop('disabled',false);
                $('#like').prop('disabled',true);
            });
            $.get("{{url('/dislike-count')}}",function (msg) {
                $('.dislikes').html(msg);
            });
        });
    });
    $('.giveDislike').click(function(){
        $.ajax({
            method: "POST",
            url: "{{url('/dislike-to-like')}}",
            data: { ideaid:"{{Session::get('idea_id')}}",userid:"{{Session::get('user_id')}}", likes: 0, "_token":"{{csrf_token()}}" }
        }).done(function( msg ) {
            $.get("{{url('/like-count')}}",function (msg) {
                $('.likes').html(msg);
                $('#like').prop('disabled',false);
                $('#dislike').prop('disabled',true);
            });
            $.get("{{url('/dislike-count')}}",function (msg) {
                $('.dislikes').html(msg);
            })
        });
    });
</script>
<script>

    $('.like').click(function(){
        $.ajax({
            method: "POST",
            url: "{{url('/like-dislike')}}",
            data: { idea_id:"{{Session::get('idea_id')}}",user_id:"{{Session::get('user_id')}}", like: 1, "_token":"{{csrf_token()}}" }
        }).done(function( msg ) {

            $.get("{{url('/like-count')}}",function (msg) {
                $('#like').prop('disabled',true);
                $('#dislike').prop('disabled',false);
                $('#dislike').css({"background-color":"#39B403","color":"#FFFFFF"});
                $('#like').css({"background-color":"#C70000","color":"#FFFFFF","border-radius":"10px"});
                $('.likes').html(msg);
            })
            $.get("{{url('/dislike-count')}}",function (msg) {
                $('.dislikes').html(msg);
            })
        });
    });
    $('.dislike').click(function(){
        $.ajax({
            method: "POST",
            url: "{{url('/like-dislike')}}",
            data: { idea_id:"{{Session::get('idea_id')}}",user_id:"{{Session::get('user_id')}}", dislike: 1, "_token":"{{csrf_token()}}" }
        }).done(function() {
            $.get("{{url('/like-count')}}",function (msg) {
                $('#like').prop('disabled',false);
                $('#dislike').prop('disabled',true);
                $('#dislike').css({"background-color":"#C70000","color":"#FFFFFF"});
                $('#like').css({"background-color":"#39B403","color":"#FFFFFF","border-radius":"10px"});

                $('.likes').html(msg);
            })
            $.get("{{url('/dislike-count')}}",function (msg) {
                $('.dislikes').html(msg);
            })

        });
    });
</script>
<script type="text/javascript">

    function hello() {
        //alert({$_session['idea_id'];
        $.ajax({

            method: "POST",
            url: "{{url('/update-view')}}",
            data: { ideaIdonClick:"{{Session::get('idea_id')}}",click:1, "_token":"{{csrf_token()}}" }
        }).done(function() {
            $.get("{{url('/view-count')}}",function (msg) {
                $('#clicks').html(msg);
            })

    })};
</script>

</body>
</html>