<?php
//Creation date: 25-07-2017
require_once './HConfig.php';

?>
<html>
    <head>
        <?=$meta?>
        <link rel="stylesheet" type="text/css" href="./style/<?=$styleDefault?>/main.css" media="screen"/>
        <link rel="stylesheet" type="text/css" href="./style/<?=$styleDefault?>/mobile.css" media="screen and (min-width:1px) and (max-width:800px)"/>
        <link rel="stylesheet" type="text/css" href="./style/<?=$styleDefault?>/<?=$lang["global"]["textDirection"]?>.css" media="screen"/>
        <link rel="stylesheet" type="text/css" href="./style/_global/fa/css/font-awesome.css" />
        <script src="./js/jq.js"></script>
        <title><?=$websiteName." | ".$lang["words"]["home"]?></title>
    </head>
    <body>
        <script>

        </script>
        <div class='loading'>
            <?=$lang["words"]["loading"]?>
        </div>
        <header></header>
        <nav></nav>
        <section id="realBody">
            <ul class="items">
                <li></li>
                <li id="body">
                    <ul id='posts' >
                        <?php
                        $result = $mysql->query("select id,name,description,type from tbl_sections order by id asc");
                        if ($result->num_rows > 0) {
                            while($row = $result->fetch_assoc()){
                                $id = intval($row["id"]);
                                $name = $row["name"];
                                $description = $row["description"];
                                $type = intval($row["type"]);
                                $values = "";
                                $valuesResult = $mysql->query("select id,name,description,is_number from tbl_values where section_id = $id;");
                                if ($valuesResult->num_rows > 0) {
                                    if ($type == 1) {
                                        $values .= "<select id='section$id' onchange='changeSelect(event);'>";
                                        while($valuesRow = $valuesResult->fetch_assoc()){
                                            $values .= "<option id='value".$valuesRow["id"]."'>".$valuesRow["name"]."</option>";
                                        }
                                        $values .= "</select>";
                                    }
                                    if($type == 2){
                                        while($valuesRow = $valuesResult->fetch_assoc()){
                                            $values .= "<input type='text' id='value${valuesRow["id"]}' placeholder='${valuesRow["description"]}' ".(boolval($valuesRow["is_number"]) ? " onkeypress='return event.charCode >= 48 && event.charCode <= 57' " : "")."/>";
                                        }
                                    }
                                    if($type == 3){
                                        while($valuesRow = $valuesResult->fetch_assoc()){
                                            $values .= "<div id='value".$valuesRow["id"]."'>".$valuesRow["name"]."</div>";
                                        }
                                    }  
                                }
                                $content = "<li class='post'>
                                    <ul>
                                    <li class='image'></li>
                                    <li class='container'>
                                    <ul>
                                    <li class='title'>$name</li>
                                    <li class='datetime'>$description</li>
                                    <li class='content' id='section$id'>
                                        $values
                                    </li>
                                    </ul>
                                    </li>
                                    </ul>
                                    </li>";
                                    echo $content;
                            }
                        }
                        ?>
                        
                        
                        <li class="post" style="background-color: #FFBB00;font-weight: bolder;font-size: 40px;" onclick="btnSendOrder(event);">
                            أرسال الطلبية
                        </li>
                        
                    </ul>
                </li>
                <li></li>
            </ul>
        </section>
        <footer></footer>
        <script>
            $.getScript("./js/main.js");
            document.getElementById('section1').getElementsByTagName('option')[1].selected = 'selected';
        </script>
    </body>
</html>