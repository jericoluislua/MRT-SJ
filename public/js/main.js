var clickedbtns=0;
var rightansw = false;
var points = 0;

function disablebtns() {
    var btns  = [];
    if(clickedbtns === 2){

        $(".selected").prop('disabled', true);
        $(".selected").each(function () {
            $(this).prop('disabled',true);
            $(this).addClass("disabled");
            btns.push($(this).attr('name'));
        });


        console.log("btn1:"+btns[0]);
        console.log("btn2:"+btns[1]);
        if(btns[0] === btns[1]){
            $(".selected").each(function () {
                $(this).removeClass("selected");
                $(this).addClass("right-answ");
                points += parseInt($(this).attr('points'));
            });
        }
        else{
            $(".selected").each(function () {
                $(this).removeClass("selected");
                $(this).addClass("wrong-answ");
            });
        }

        clickedbtns = 0;
        if($(".right-answ").length + $(".wrong-answ").length === 6){
            $(location).attr('href', './checkFiPa?points='+points+'&solved='+btns[0]);
        }
    }

}
function disablecol(col) {
   if(col === "c1"){

       $("#FiPa .c2 button").each(function () {
           $(this).prop('disabled',false);
       });
       $(".disabled").prop('disabled',true);
       $("#FiPa .c1 button").each(function () {
           $(this).prop('disabled', true);
       })
   }
   if(col === "c2"){

       $("#FiPa .c1 button").each(function () {
           $(this).prop('disabled',false);
       });
       $(".disabled").prop('disabled',true);
       $("#FiPa .c2 button").each(function () {
           $(this).prop('disabled', true);
       })
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
        $(location).attr('href', './MuCho?solved=' + $('.quest').attr('id') + '&corr=' + rightansw);
    });

});

 function returnToChoice() {
    if(window.confirm("Do you really want to return to Home? (progress won't be saved)")){
        $(location).attr('href','/');
    }
    else{
        return false;
    }
}


