 jQuery(document).ready(function() {
    jQuery(document).on('change','.switch',function(ev) {
      ev.preventDefault();
      var tog_status = $('#check').is(":checked");  
      var status = 'offline';
      if(tog_status){
        status = 'online';
      }

      jQuery.ajax({
        type: 'post',
        url: 'home/offline_online', 
        data: {
          status:status
        },
        success: function (response) {
          console.log(response);
          jQuery("#toast").text("User Status updated successfully").addClass('show');
          setTimeout(function(){ jQuery('#toast').removeClass('show').text(''); }, 3000); 
        }
      });
    });
  });
