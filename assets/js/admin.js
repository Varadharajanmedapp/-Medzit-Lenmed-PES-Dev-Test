$(document).ready(function() {
  	$('.number-validation').mask('0000000000');
});
(function(){ 
  function calculate() {
    $('.kap').each(function(){
      var total = 0;
      console.log(total);
      $('input[value="yes"]:checked', this).each(function(){
        total += 1;
        console.log(total);
      });
      $('input.tot_kap', this).val(total);
    });
  }
  calculate();
  $('.kap input').on('change', calculate);
})();


$(document).ready(function() {
  $('#occupation,#education,#income').change(function(){
    var x=0;
    var y=0;
    var z=0;
    var total=0;
    $.each($("#occupation option:selected"), function(){
      var value = $(this).val();
      localStorage.setItem("occupation", value);
     console.log(value);
    // sam = localStorage.getItem("occupation");
    // var str = $("#totscore").val(sam);
    });

    $.each($("#education option:selected"), function(){
      var edu = $(this).val();
      localStorage.setItem("education", edu);
     console.log(edu);
    }); 

    $.each($("#income option:selected"), function(){
      var income = $(this).val();
      localStorage.setItem("income", income);
     console.log(income);
    }); 
    console.log(x);
    x = localStorage.getItem("occupation");
    y = localStorage.getItem("education");
    z = localStorage.getItem("income");
    var check1 = $.isNumeric(x);  
    var check2 = $.isNumeric(y);  
    var check3 = $.isNumeric(z);  
    // console.log(parseInt(y));
    // console.log(parseFloat(y));
    // console.log(check1);
    // console.log(check2);
    // console.log(check3);
    // console.log(x);
    // console.log(y);
    // console.log(z);
    // var check1 = $.isNumeric(y);  
    // total = parseInt(x)+parseInt(y)+parseInt(z);
    total = parseInt(x)+parseInt(y)+parseInt(z);
    // console.log(total);
    // var check = $.isNumeric(total); 

    var str = $("#totscore").val(total);
    console.log(str);
    // Object.values(total)
    // $('input.totscore', this).val(total);
  });
});

$(document).ready(function(){
  // console.log($(".smoke").attr('checked', 'checked').val());
  var smoke = $('input:radio[name="tob_smoking"]:checked').val();
  console.log(smoke);
 if ( $('[name="tob_smoking"]:checked').val() !== 'no' ) {
    $('#smoking_duration').show();
    $('#smoking_frequent').show();
  }
  // } else {
  //   $('#smoking_duration').hide();
  //   $('#smoking_frequent').hide();
  // }

  if ($('[name="chewing"]:checked').val() !== 'no' ) {
    $("#chewing_duration").show();
    $("#chewing_frequent").show();
  }
  // } else {
  //   $("#chewing_duration").hide();
  //   $("#chewing_frequent").hide()
  // }
  if ($('[name="betelnut"]:checked').val() !== 'no' ) {
    $("#betelnut_duration").show();
    $("#betelnut_frequent").show();
  }
  // } else {
  //   $("#betelnut_duration").hide();
  //   $("#betelnut_frequent").hide();
  // }
  if ($('[name="pouching"]:checked').val() !== 'no' ) {
    $("#pouching_duration").show();
    $("#pouching_frequent").show();
  }
  // } else {
  //   $("#pouching_duration").hide();
  //   $("#pouching_frequent").hide();
  // } 
  if ($('[name="alcohol"]:checked').val() !== 'no' ) {
    $("#alcohol_duration").show();
    $("#alcohol_frequent").show();
  }
  // } else {
  //   $("#alcohol_duration").hide();
  //   $("#alcohol_frequent").hide();
  // }
});

$('.smoke').on('click',function() {
  if ($(this).val()=="yes") {
      $("#smoking_duration").css("visibility", "visible");
      $("#smoking_frequent").css("visibility", "visible");
  }
  else {
    $("#smoking_duration").css("visibility", "hidden");
    $("#smoking_frequent").css("visibility", "hidden");
 }
});
$('.tobacco').on('click',function() {
  if ($(this).val()=="yes") {
    $("#chewing_duration").css("visibility", "visible");
    $("#chewing_frequent").css("visibility", "visible");
  }
  else {
    $("#chewing_duration").css("visibility", "hidden");
    $("#chewing_frequent").css("visibility", "hidden");
  } 
});
$('.betelnut').on('click',function() {
  if ($(this).val()=="yes") {
    $("#betelnut_duration").css("visibility", "visible");
    $("#betelnut_frequent").css("visibility", "visible");
  }
  else {
    $("#betelnut_duration").css("visibility", "hidden");
    $("#betelnut_frequent").css("visibility", "hidden");
  } 
});
$('.pouching').on('click',function() {
  if ($(this).val()=="yes") {
    $("#pouching_duration").css("visibility", "visible");
    $("#pouching_frequent").css("visibility", "visible");
  }
  else {
    $("#pouching_duration").css("visibility", "hidden");
    $("#pouching_frequent").css("visibility", "hidden");
  } 
});
$('.alcohol').on('click',function() {
  if ($(this).val()=="yes") {
     $("#alcohol_duration").css("visibility", "visible");
    $("#alcohol_frequent").css("visibility", "visible");
  }
  else {
    $("#alcohol_duration").css("visibility", "hidden");
    $("#alcohol_frequent").css("visibility", "hidden");
  } 
});

$('.intra_buccal').on('click',function() {
  if ($(this).val()=="changes") {
      $("#buccal_ul").css("visibility", "visible");
      $("#buccal_white").css("visibility", "visible");
      $("#buccal_red").css("visibility", "visible");
      $("#buccal_papale").css("visibility", "visible");
  }
  else {
    $("#buccal_ul").css("visibility", "hidden");
    $("#buccal_white").css("visibility", "hidden");
    $("#buccal_red").css("visibility", "hidden");
    $("#buccal_papale").css("visibility", "hidden");
  }});
$('.intra_labial').on('click',function() {
  if ($(this).val()=="changes") {
      $("#labial_ul").css("visibility", "visible");
      $("#labial_white").css("visibility", "visible");
      $("#labial_red").css("visibility", "visible");
      $("#labial_palpable").css("visibility", "visible");
  }
  else {
    $("#labial_ul").css("visibility", "hidden");
    $("#labial_white").css("visibility", "hidden");
    $("#labial_red").css("visibility", "hidden");
    $("#labial_palpable").css("visibility", "hidden");
  }});
$('.intra_vestibule').on('click',function() {
  if ($(this).val()=="changes") {
      $("#vestibule_ul").css("visibility", "visible");
      $("#vestibule_white").css("visibility", "visible");
      $("#vestibule_red").css("visibility", "visible");
      $("#vestibule_palpable").css("visibility", "visible");
  }
  else {
    $("#vestibule_ul").css("visibility", "hidden");
    $("#vestibule_white").css("visibility", "hidden");
    $("#vestibule_red").css("visibility", "hidden");
    $("#vestibule_palpable").css("visibility", "hidden");
  }});
$('.intra_tongue').on('click',function() {
  if ($(this).val()=="changes") {
      $("#tongue_ul").css("visibility", "visible");
      $("#tongue_white").css("visibility", "visible");
      $("#tongue_red").css("visibility", "visible");
      $("#tongue_palpable").css("visibility", "visible");
  }
  else {
    $("#tongue_ul").css("visibility", "hidden");
    $("#tongue_white").css("visibility", "hidden");
    $("#tongue_red").css("visibility", "hidden");
    $("#tongue_palpable").css("visibility", "hidden");
  }});
$('.intra_mouth').on('click',function() {
  if ($(this).val()=="changes") {
      $("#mouth_ul").css("visibility", "visible");
      $("#mouth_white").css("visibility", "visible");
      $("#mouth_red").css("visibility", "visible");
      $("#mouth_palpable").css("visibility", "visible");
  }
  else {
    $("#mouth_ul").css("visibility", "hidden");
    $("#mouth_white").css("visibility", "hidden");
    $("#mouth_red").css("visibility", "hidden");
    $("#mouth_palpable").css("visibility", "hidden");
  }});
$('.intra_palate').on('click',function() {
  if ($(this).val()=="changes") {
      $("#palate_ul").css("visibility", "visible");
      $("#palate_white").css("visibility", "visible");
      $("#palate_red").css("visibility", "visible");
      $("#palate_palpable").css("visibility", "visible");
  }
  else {
    $("#palate_ul").css("visibility", "hidden");
    $("#palate_white").css("visibility", "hidden");
    $("#palate_red").css("visibility", "hidden");
    $("#palate_palpable").css("visibility", "hidden");
  }});
$('.intra_gingiva').on('click',function() {
  if ($(this).val()=="changes") {
      $("#gingiva_ul").css("visibility", "visible");
      $("#gingiva_white").css("visibility", "visible");
      $("#gingiva_red").css("visibility", "visible");
      $("#gingiva_palpable").css("visibility", "visible");
  }
  else {
    $("#gingiva_ul").css("visibility", "hidden");
    $("#gingiva_white").css("visibility", "hidden");
    $("#gingiva_red").css("visibility", "hidden");
    $("#gingiva_palpable").css("visibility", "hidden");
  }});
$('.intra_oropharynx').on('click',function() {
  if ($(this).val()=="changes") {
      $("#oropharynx_ul").css("visibility", "visible");
      $("#oropharynx_white").css("visibility", "visible");
      $("#oropharynx_red").css("visibility", "visible");
      $("#oropharynx_palpable").css("visibility", "visible");
  }
  else {
    $("#oropharynx_ul").css("visibility", "hidden");
    $("#oropharynx_white").css("visibility", "hidden");
    $("#oropharynx_red").css("visibility", "hidden");
    $("#oropharynx_palpable").css("visibility", "hidden");
  }});

  $("#mobile").on("blur",function(){
    var mobile = $(this).val();
    $.ajax({
      type: "POST",
      url: base_url+'patient/check_mobile',    
      data: {"mobile":mobile},
      success: function(res) {
        if(res==1){
          $(".mobile_uniq").html("This mobile already exist Please check Report");
        } else {
          $(".mobile_uniq").html("");
        }
      }
    });
  });

  function report(){
    var mobile = document.getElementById("mobile").value;
    window.location.href = base_url+'patient/report_view/'+mobile;
  }
  
  function printDiv(divName) {
    var printContents = document.getElementById(divName).innerHTML;
    var originalContents = document.body.innerHTML;
    document.body.innerHTML = printContents;
    window.print();
    document.body.innerHTML = originalContents;
  }

  // function PreviewImage() {
  //   var oFReader = new FileReader();
  //   oFReader.readAsDataURL(document.getElementById("profile_pic").files[0]);
  //   oFReader.onload = function (oFREvent) {
  //     document.getElementById('profile_pic').style.display="block";
  //     document.getElementById("profile_pic").src = oFREvent.target.result;
  //   };
  // };

