 $(document).ready(function () {
     function popup () {
         $(".pop").fadeIn(300);
         positionPopup();
     };
     $(".pop > span, .pop").click(function () {
         $(".pop").fadeOut(300);
     });
 });