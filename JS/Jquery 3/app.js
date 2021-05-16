$(document).ready(function () {
  $(".main h3:first").addClass("active");
  $(".main p:not(:first)").hide();
  $(".main h3").click(function () {
    $(".main p").each(function () {
      $(this).hide();
    });
    $(this).next().show();
    $(".main h3.active").removeClass("active");
    $(this).addClass("active");
    /*       $(this)
          .next("p")
          .slideToggle("slow");
      $(this)
      .next("p")
      .sublings("p:visible")
      .slideUp("slow");
    $(this).addClass("active");
    $(this).sublings("h3").removeClass("active");
    console.log($(this)); */
  });
});

$(document).ready(function () {
  $(".infoblock div").hover(
    function () {
      $(this)
        .next(".hideblock")
        .animate({ opacity: "show", top: "-75" }, "slow");
    },
    function () {
      $(this).next(".hideblock").animate({ opacity: "hide", top: "-85" });
    }
  );
});

$(".small").click(function () {
  $(".main_image").css("background-image", $(this).css("background-image"));
});
