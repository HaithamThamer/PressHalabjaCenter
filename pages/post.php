<?php
require '../HConfig.php';

//check if user have permission to access this page
if (!boolval($_SESSION["user_permissions"][basename(__FILE__,'.php')])){
    header("location:../errors/403.php");
}
$postId = filter_has_var(INPUT_GET, "postId") ? filter_input(INPUT_GET, "postId") : "0";
?>
<html>
    <head>
        <?=$meta?>
        <link rel="stylesheet" type="text/css" href="../style/<?=$styleDefault?>/main.css" media="screen"/>
        <link rel="stylesheet" type="text/css" href="../style/<?=$styleDefault?>/mobile.css" media="screen and (min-width:1px) and (max-width:800px)"/>
        <link rel="stylesheet" type="text/css" href="../style/<?=$styleDefault?>/<?=$lang["global"]["textDirection"]?>.css" media="screen"/>
        <link rel="stylesheet" type="text/css" href="../style/_global/fa/css/font-awesome.css" />
        <script src="../js/jq.js"></script>
        <title><?=$websiteName." | ".""?></title>
        <script>
            var postId = <?=$postId?>;
            var post;
            function addComment(datetime,content,isDatabase){
                var comment;
                if(isDatabase){
                    $.ajax({
                        url:"../applications/HComments.php",
                        method:"GET",
                        async:false,
                        cache:false,
                        data:{postId:postId,content:content,postComment:"1"}
                    }).done(function(data){
                        comment = data;
                    });
                }
                $("docuemnt").ready(function(){
                    $(".comments > ul > li > ul").append("<li class='comment'> <ul> <li class='datetime'>"+datetime+"</li> <li class='content'>"+content+"</li> </ul> </li>");
                });
                
            }
            function loadComments(postId){
                $("docuemnt").ready(function(){
                    var comments;
                    $.ajax({
                        url:"../applications/HComments.php",
                        method:"GET",
                        async:false,
                        cache:false,
                        data:{postId:postId,getComments:"1"}
                    }).done(function(data){
                        if (data === "") {
                            return;
                        }
                        comments = JSON.parse(data);
                        for(var i = 0;i < comments.length;i++){
                            addComment(comments[i]["datetime"],comments[i]["content"],false);
                        }
                    });
                });
            }
            function btnSendClick(e){
                $("document").ready(function(){
                    if($(".commentText").val().length > 3){
                        var d = new Date();
                        addComment(d.getFullYear()+"-"+d.getMonth()+"-"+d.getDay()+" "+d.getHours()+":"+d.getMinutes()+":"+d.getSeconds(),$(".commentText").val(),true); 
                    }
                    $(".commentText").val("");
                });
            }
            function txtCommentTextKeyPress(e){
                if(e.keyCode === 13){
                    btnSendClick(e);
                }
            }
            function loadPost(postId){
                $(document).ready(function(){
                    $.ajax({
                        url:"../applications/HPosts.php",
                        method:"GET",
                        async:false,
                        cache:false,
                        data:{postId:postId,getPost:1}
                    }).done(function(data){
                        if(data === ""){
                            document.location = "../";
                        }
                        post = JSON.parse(data);
                        document.title = "<?=$websiteName." | "?>" + post[0]["title"];
                        $(".post > ul > .title").html("<i class='"+post[0]["category_icon"]+"'></i> "+post[0]["title"]);
                        $(".post > ul > .userName").html(post[0]["user_name"]);
                        $(".post > ul > .datetime").html(post[0]["datetime"]);
                        $(".post > ul > .contentFull").html(post[0]["content"]);
                        loadComments(postId);
                    });
                });
            }
        </script>
    </head>
    <body>
        <header></header>
        <nav></nav>
        <section id="realBody">
            <ul class="items">
                <li>right</li>
                <li id="body">
                    <ul id="posts">
                        <li class="post">
                            <ul>
                                <li class="title"></li>
                                <li class="userName"></li>
                                <li class="datetime"></li>
                                <li class="contentFull"></li>
                            </ul>
                        </li>
                        <li class="comments">
                            <ul>
                                <li class="title">التعليقات</li>
                                <li>
                                    <ul>
                                    </ul>
                                </li>
                                <li>
                                    <textarea class="commentText" placeholder="<?=$lang["words"]["writeComment"]?>" onkeypress="txtCommentTextKeyPress(event);"></textarea>
                                </li>
                                <li>
                                    <button class="btnComment" onclick="btnSendClick(this);"><?=$lang["words"]["send"]?></button>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li>left</li>
            </ul>
        </section>
        <footer></footer>
        <script type="text/javascript">
            $(document).ready(function(){
                $.ajax({
                    url:"../content/header.php",
                    method:"GET",
                    cache:false,
                    async:false
                }).done(function(data){
                    $("header").html($(data).filter("header").html());
                });
                $.ajax({
                    url:"../content/nav.php",
                    method:'GET',
                    cache:false,
                    async:false
                }).done(function(data){
                    $("nav").html($(data).filter("nav").html());
                });
                $.ajax({
                    url:"../content/footer.php",
                    method:"GET",
                    cache:false,
                    async:false
                }).done(function(data){
                    $("footer").html($(data).filter("footer").html());
                });
            });
            loadPost(postId);
        </script>
    </body>
</html>