var clickedbtns=0;

function disablebtns() {
    if(clickedbtns == 2){
        $(".selected").each(function () {
            $(this).removeClass("selected");
            $(this).prop('disabled',true);
            $(this).addClass("disabled");
        });
        clickedbtns = 0;
    }
}
function disablecol(col) {
   if(col == "c1"){

           if($("#FiPa .c2 button").is('[disabled]')){
               $("#FiPa .c2 button").each(function () {
                   $(this).prop('disabled',false);
               });
               $(".disabled").prop('disabled',true);
           }
           else{
               $("#FiPa .c1 button").each(function () {
                   $(this).prop('disabled',true);
               });
           }
   }
   if(col == "c2"){

           if($("#FiPa .c1 button").is('[disabled]')){
               $("#FiPa .c1 button").each(function () {
                   $(this).prop('disabled',false);
               });
               $(".disabled").prop('disabled',true);
           }
           else{
               $("#FiPa .c2 button").each(function () {
                   $(this).prop('disabled',true);
               });
           }
   }
}

$(".btn11").click(function () {
 $(".btn11").addClass("selected");
 clickedbtns+=1;
 disablebtns();
 disablecol("c1");
});
$(".btn12").click(function () {
    $(".btn12").addClass("selected");
    clickedbtns+=1;
    disablebtns();
    disablecol("c2");
});
$(".btn21").click(function () {
    $(".btn21").addClass("selected");
    clickedbtns+=1;
    disablebtns();
    disablecol("c1");
});
$(".btn22").click(function () {
    $(".btn22").addClass("selected");
    clickedbtns+=1;
    disablebtns();
    disablecol("c2");
});
$(".btn31").click(function () {
    $(".btn31").addClass("selected");
    clickedbtns+=1;
    disablebtns();
    disablecol("c1");
});
$(".btn32").click(function () {
    $(".btn32").addClass("selected");
    clickedbtns+=1;
    disablebtns();
    disablecol("c2");
});
$("#answer-div .solut").click(function () {
    $("#answer-div button").addClass("wrong-answ");
    $(this).removeClass("wrong-answ");
    $(this).addClass("right-answ");
});
$("#answer-div button").click(function (){
    $("#answer-div button").addClass("wrong-answ");
    $("#answer-div .solut").addClass("right-answ");
    $("#answer-div .solut").removeClass("wrong-answ");
});
