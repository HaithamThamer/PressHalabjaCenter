<?php
require '../HConfig.php';
if (!filter_has_var(INPUT_GET, "postId")){
    exit();
}
$postId = filter_has_var(INPUT_GET, "postId") ? filter_input(INPUT_GET, "postId") : 0;
$title = filter_has_var(INPUT_GET, "title") ? filter_input(INPUT_GET, "title") : 0;
$datetime = filter_has_var(INPUT_GET, "datetime") ? filter_input(INPUT_GET, "datetime") : 0;
$content = filter_has_var(INPUT_GET, "content") ? filter_input(INPUT_GET, "content") : 0;
$categoryName = filter_has_var(INPUT_GET, "categoryName") ? filter_input(INPUT_GET, "categoryName") : 0;
$categoryIcon = filter_has_var(INPUT_GET, "categoryIcon") ? filter_input(INPUT_GET, "categoryIcon") : 0;
$userName = filter_has_var(INPUT_GET, "userName") ? filter_input(INPUT_GET, "userName") : 0;

?>
<html>
    <body>
        <div id="post">
            <li class='post' onclick="location = './pages/post.php?postId=<?=$postId?>'"> 
                <ul> 
                    <li class='image' style="background-image: url('./1.png');"></li>
                    <li class='container'>
                        <ul>
                            <li class='title'>
                                <i class='<?=$categoryIcon?>'></i>
                                <?=$title?>
                            </li>
                            <li class='datetime'>
                                <?=$datetime?>
                            </li>
                            <li class='content'>
                                <?=strip_tags($content)?>
                            </li>
                        </ul>
                    </li>
                </ul>
            </li>
        </div>
    </body>
</html>