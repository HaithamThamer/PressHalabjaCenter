
window.load = load();

function load(){
    $(document).ready(function(){
        $.ajax({
            url:"./content/header.php",
            method:"GET",
            cache:false,
            async:false
        }).done(function(data){
            $("header").html($(data).filter("header").html());
        });
        $.ajax({
            url:"./content/nav.php",
            method:"GET",
            cache:false,
            async:false
        }).done(function(data){
            $("nav").html($(data).filter("nav").html());
        });
        $.ajax({
            url:"./content/footer.php",
            method:"GET",
            cache:false,
            async:false
        }).done(function(data){
            $("footer").html($(data).filter("footer").html());
        });
    });
    loading(false);
}

function loading(isLoading){
    if(isLoading){
        $(document).ready(function(){
            $(".loading").css("visibility","visible");
            $("#realBody,header,nav,footer").css("filter","blur(5px)");
            $("#realBody,header,nav,footer").css("-webkit-filter","blur(5px)");
        });
    }else{
        $(document).ready(function(){
            $(".loading").css("visibility","hidden");
            $("#realBody,header,nav,footer").css("filter","blur(0px)");
            $("#realBody,header,nav,footer").css("-webkit-filter","blur(0px)");
        });
    }
}
var sections = new Array();
var values;
function changeSelect(event){
    loading(true);
    var sectionId = String(event.target.id).substr(String(event.target.id).indexOf('n')+1);
    var valueId = String($(event.target).children(":selected").attr("id")).substring(String($(event.target).children(":selected").attr("id")).indexOf("e")+1);
    
    //Get sections ids if sections variable is empty
    if(sections.length === 0){
        $.ajax({
            url:"./applications/sections.php",
            async:false,
            cache:false,
            data:{getSections:1}
        }).done(function(data){
            var jsonData = JSON.parse(data);
            for (var i = 0; i < jsonData.length; i++) {
                sections.push(jsonData[i]["id"]);
            }
        });
    }
    
    
    
    //remove all values of other sections and larger
    for (var i = 0; i < sections.length; i++) {
        if (sections[i] < sectionId || sections[i] === sectionId) {
            continue;
        }
        //section Type 1
        $("#section"+sections[i]+" > select").children().remove();
        
        //section Type 2
        $("#section"+sections[i]+" > input").remove();
    }
    
    //get available values of all sections
    $.ajax({
        url:"./applications/sections.php",
        async:false,
        cache:false,
        data:{getValues:1,section:sectionId,value:valueId}
    }).done(function(data){
        if (data === "") {
            values = new Array();
        }else{
            values = JSON.parse(data);
        }
    });
    //
    for (var i = 0; i < values.length; i++){
        switch(Number(values[i]["type"])){
            case 1:
                $("#section"+values[i]["second_section_id"]+" > select").append("<option id='value"+values[i]["second_value_id"]+"' >"+values[i]["value_name"]+"</option>");
                break;
            case 2:
                $("#section"+values[i]["second_section_id"]).append("<input type='text' id='value"+values[i]["second_value_id"]+"' placeholder='"+values[i]["value_name"]+"' "+(values[i]["is_number"] === "1" ? " onkeypress='return event.charCode >= 48 && event.charCode <= 57' " : "")+"/>");
                break;
            default:
                alert(values[i]["value_name"]);
                break;
        }
    }
    loading(false);
}
function btnSendOrder(e){
    var inputs = document.getElementsByTagName("input");
    
    //check if one of inputs is empty to cancel task
    for (var i = 0; i < inputs.length; i++) {
        if (inputs[i].value === "") {
            alert("هناك بعض الحقول بحاجة الى معلومات");
            return;
        }
    }
    
    //
    $.ajax({
        url:"./applications/mail.php",
        async:false,
        cache:false,
        data:{to:"hiethem.hiethem@yahoo.com",body:"الاسم",subject:"العنوان"}
    }).done(function(data){
        if (data === "1") {
            alert('تم الأرسال');
        }else{
            
        }
    });
}

