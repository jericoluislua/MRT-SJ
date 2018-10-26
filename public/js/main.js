var clickedbtns=0;
var rightansw = false;

function disablebtns() {
    if(clickedbtns === 2){

        $(".selected").prop('disabled', true);
        $(".selected").each(function () {
            $(this).removeClass("selected");
            $(this).prop('disabled',true);
            $(this).addClass("disabled");
        });
        clickedbtns = 0;
    }
}
function disablecol(col) {
   if(col === "c1"){

           if($("#FiPa .c2 button").is('[disabled]')){
               $("#FiPa .c2 button").each(function () {
                   $(this).prop('disabled',false);
               });
               $(".disabled").prop('disabled',true);
           }
   }
   if(col === "c2"){

           if($("#FiPa .c1 button").is('[disabled]')){
               $("#FiPa .c1 button").each(function () {
                   $(this).prop('disabled',false);
               });
               $(".disabled").prop('disabled',true);
           }
   }
}

$(".btn11").click(function () {
    $(".btn11").addClass("selected");
    $(".btn11").prop('disabled', true);
    clickedbtns+=1;
    disablebtns();
    disablecol("c1");
});
$(".btn12").click(function () {
    $(".btn12").addClass("selected");
    $(".btn12").prop('disabled', true);
    clickedbtns+=1;
    disablebtns();
    disablecol("c2");
});
$(".btn21").click(function () {
    $(".btn21").addClass("selected");
    $(".btn21").prop('disabled', true);
    clickedbtns+=1;
    disablebtns();
    disablecol("c1");
});
$(".btn22").click(function () {
    $(".btn22").addClass("selected");
    $(".btn22").prop('disabled', true);
    clickedbtns+=1;
    disablebtns();
    disablecol("c2");
});
$(".btn31").click(function () {
    $(".btn31").addClass("selected");
    $(".btn31").prop('disabled', true);
    clickedbtns+=1;
    disablebtns();
    disablecol("c1");
});
$(".btn32").click(function () {
    $(".btn32").addClass("selected");
    $(".btn32").prop('disabled', true);
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
    if($(this).text() == $('.answ').text()){
        $(this).removeClass("wrong-answ");
        $(this).addClass("right-answ");
        rightansw = true;
    }
    else{
        $(this).addClass("wrong-answ");
        rightansw = false;
    }
    $("#answer-div button").each(
      function(){
          console.log("Clicked:"+$(this).text()+"<br> Solut:"+$('.answ').text());
          if($(this).text() == $('.answ').text()){
              $(this).removeClass("wrong-answ");
              $(this).addClass("right-answ");
          }
          else{
              $(this).addClass("wrong-answ");
          }
      }
    );



});
$(document).ready(function () {
    $('#mucho_next').click(function () {
        $(location).attr('href', './MuCho?solved=' + $('.quest').attr('id')+'&corr='+rightansw);
    });
});


