jQuery(document).ready(function () {
  jQuery(document).on("change", ".switch", function (ev) {
    ev.preventDefault();
    var tog_status = $("#check").is(":checked");
    var status = "offline";
    if (tog_status) {
      status = "online";
    }

    jQuery.ajax({
      type: "POST",
      url: "home/offline_online",
      data: {
        status: status,
      },
      success: function (response) {
        jQuery("#toast")
          .text("User Status updated successfully")
          .addClass("show");
        setTimeout(function () {
          jQuery("#toast").removeClass("show").text("");
        }, 3000);
      },
    });
  });
});
/* image overview */
$("img[data-enlargable]")
  .addClass("img-enlargable")
  .click(function () {
    var src = $(this).attr("src");
    $("<div>")
      .css({
        background: "RGBA(0,0,0,.5) url(" + src + ") no-repeat center",
        backgroundSize: "contain",
        width: "100%",
        height: "100%",
        position: "fixed",
        zIndex: "10000",
        top: "0",
        left: "0",
        cursor: "zoom-out",
      })
      .click(function () {
        $(this).remove();
      })
      .appendTo("body");
  });
/*  */
$(document).ready(function(){
    $('.fileupload-exists').on('click', function(){
    $('.dept-add-spec-fileupload1').show();
    $('.dept-add-spec-fileupload').hide();
  })
})