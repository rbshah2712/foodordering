<script src="plugins/jquery/jquery.min.js"></script>
<script src="plugins/jquery-validation/jquery.validate.min.js"></script>
<script src="plugins/jquery-validation/additional-methods.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="js/adminlte.min.js"></script>
<script src="js/tinymce/tinymce.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
<script>
$(".toggle-password").click(function() {

$(this).toggleClass("fa-eye fa-eye-slash");
var input = $($(this).attr("toggle"));
if (input.attr("type") == "password" || input.attr("type") == "rptpwd") {
  input.attr("type", "text");
} else {
  input.attr("type", "password");
}
});


  function confirmationDelete(anchor)
{
   var conf = confirm('Are you sure want to delete this record?');
   if(conf)
      window.location=anchor.attr("href");
}

jQuery(document).ready(function(){
  
  jQuery(function () {
    jQuery('#order_date').datepicker({
   format: 'dd/mm/yyyy' 
  });
  });

  
});

tinymce.init({
    selector: '#notes'
});

</script>