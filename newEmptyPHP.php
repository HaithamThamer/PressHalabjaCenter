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
                        
                        <li class="post">
                            <ul>
                                <li class="image"></li>
                                <li class="container">
                                    <ul>
                                        <li class="title">الطبعة</li>
                                        <li class="datetime"></li>
                                        <li class="content">
                                            <ul>
                                                <li>ورقية</li>
                                                <li>دفترية</li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        
                        
                        <li class="post">
                            <ul>
                                <li class="image"></li>
                                <li class="container">
                                    <ul>
                                        <li class="title">العدد</li>
                                        <li class="datetime"></li>
                                        <li class="content">
                                            <ul>
                                                <li>الدفاتر : <input type="text" id="bookNumber"/></li>
                                                <li>الورق:  <input type="text" id="paperNumber"/></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li class="post">
                            <ul>
                                <li class="image"></li>
                                <li class="container">
                                    <ul>
                                        <li class="title">الحبر</li>
                                        <li class="datetime"></li>
                                        <li class="content">
                                            <ul>
                                                <li>ليزر</li>
                                                <li>انجيكت</li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li class="post">
                            <ul>
                                <li class="image"></li>
                                <li class="container">
                                    <ul>
                                        <li class="title">طباعة على</li>
                                        <li class="datetime">4444</li>
                                        <li class="content">
                                            <ul>
                                                <li>وجه</li>
                                                <li>وجهين</li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li class="post">
                            <ul>
                                <li class="image"></li>
                                <li class="container">
                                    <ul>
                                        <li class="title">طباعة على</li>
                                        <li class="datetime">4444</li>
                                        <li class="content">
                                            <ul>
                                                <li>وجه</li>
                                                <li>وجهين</li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li class="post">
                            <ul>
                                <li class="image"></li>
                                <li class="container">
                                    <ul>
                                        <li class="title">k,u hg,vrm</li>
                                        <li class="datetime">333333</li>
                                        <li class="content">
                                            <ul>
                                                <li>عادي</li>
                                                <li>Art</li>
                                                <li>PVC</li>

                                            </ul>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li class="post">
                            <ul>
                                <li class="image"></li>
                                <li class="container">
                                    <ul>
                                        <li class="title">سُمك الورقة</li>
                                        <li class="datetime">333333</li>
                                        <li class="content">
                                            <ul>
                                                <li>75</li>
                                                <li>80</li>
                                                <li>90</li>
                                                <li>115</li>
                                                <li>130</li>
                                                <li>150</li>
                                                <li>160</li>
                                                <li>170</li>
                                                <li>200</li>
                                                <li>250</li>
                                                <li>300</li>
                                                <li>350</li>
                                                <li>350</li>
                                                <li>500</li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        
                        <li class="post">
                            <ul>
                                <li class="image"></li>
                                <li class="container">
                                    <ul>
                                        <li class="title">حجم الورقة</li>
                                        <li class="datetime">222222</li>
                                        <li class="content">
                                            <ul>
                                                <li>A3 SR</li>
                                                <li>A3</li>
                                                <li>A4</li>
                                                <li>A5</li>
                                                <li>A6</li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        
                        
                        <li class="post">
                            <ul>
                                <li class="image"></li>
                                <li class="container">
                                    <ul>
                                        <li class="title">اللمسات الاخيرة</li>
                                        <li class="datetime">1111111</li>
                                        <li class="content">
                                            <ul>
                                                <li>بدون</li>
                                                <li>مسلفن</li>
                                                <li>تخريم + كبس</li>
                                                <li>غراء</li>
                                                <li>سلفنة + كسر</li>
                                                <li>كسر</li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li class="post">
                            <ul>
                                <li class="image"></li>
                                <li class="container">
                                    <ul>
                                        <li class="title">العملة</li>
                                        <li class="datetime">1111111</li>
                                        <li class="content">
                                            <ul>
                                                <li>دولار</li>
                                                <li>دينار</li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        
                        <li class="post">
                            <ul>
                                <li class="image"></li>
                                <li class="container">
                                    <ul>
                                        <li class="title">السعر</li>
                                        <li class="datetime"></li>
                                        <li class="content">
                                            <ul style="font-size: 50px;">
                                                <li style="display: inline-block;">$</li>
                                                <li style="display: inline-block;">250,000</li>
                                            </ul>
                                            
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li class="post">
                            <ul>
                                <li class="image"></li>
                                <li class="container">
                                    <ul>
                                        <li class="title">معلومات الشخصية</li>
                                        <li class="datetime">1111111</li>
                                        <li class="content">أسم و موبايل</li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        
                        <li class="post" style="background-color: #FFBB00;font-weight: bolder;font-size: 40px;">
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
        </script>
    </body>
</html>