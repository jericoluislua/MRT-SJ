var clickedbtns=0,c1btnstat=false,c2btnstat=false;

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
  // if(col == "c1"){
  //     while(!c2btnstat){
  //         $(".c1 > button").each(function () {
  //            $(this).prop('disabled',true);
  //         });
  //     }
  // }
  // if(col == "c2"){
  //     while(!c1btnstat){
  //         $(".c2 > button").each(function () {
  //            $(this).prop('disabled',true);
  //         });
  //     }
  // }
}

$(".btn11").click(function () {
 $(".btn11").addClass("selected");
 clickedbtns+=1;
 c1btnstat = true;
 disablebtns();
});
$(".btn12").click(function () {
    $(".btn12").addClass("selected");
    clickedbtns+=1;
    c2btnstat = true;
    disablebtns();
});
$(".btn21").click(function () {
    $(".btn21").addClass("selected");
    clickedbtns+=1;
    c1btnstat = true;
    disablebtns();
});
$(".btn22").click(function () {
    $(".btn22").addClass("selected");
    clickedbtns+=1;
    c2btnstat = true;
    disablebtns();
});
$(".btn31").click(function () {
    $(".btn31").addClass("selected");
    clickedbtns+=1;
    c1btnstat = true;
    disablebtns();
});
$(".btn32").click(function () {
    $(".btn32").addClass("selected");
    clickedbtns+=1;
    c2btnstat = true;
    disablebtns();
});
$("#answer-div button").click(function () {
    $(this).addClass("right-answ");
});