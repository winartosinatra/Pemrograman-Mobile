<script type="text/javascript">
$(document).ready(function(){
 $('#username').focus(); // Focus to the username field on body loads
 $('#login').click(function(){ // Create `click` event function for login
  var username = $('#username'); // Get the username field
  var password = $('#password'); // Get the password field
  var login_result = $('.login_result'); // Get the login result div
  login_result.html('loading..'); // Set the pre-loader can be an animation
  if(username.val() == ''){ // Check the username values is empty or not
   username.focus(); // focus to the filed
   login_result.html('<span class="error">Isi Username</span>');
   return false;
  }
  if(password.val() == ''){ // Check the password values is empty or not
   password.focus();
   login_result.html('<span class="error">Isi Password</span>');
   return false;
  }
  if(username.val() != '' && password.val() != ''){ // Check the username and password values is not empty and make the ajax request
   var UrlToPass = 'action=login&username='+username.val()+'&password='+password.val();
   $.ajax({ // Send the credential values to another checker.php using Ajax in POST menthod
   type : 'POST',
   data : UrlToPass,
   url  : '<?php echo base_url(); ?>user_login',
   success: function(responseText){ // Get the result and asign to each cases
    if(responseText == 0){
     login_result.html('<span class="error">Username or Password Incorrect!</span>');
    }
    else if(responseText == 1){
     window.location = '<?php echo base_url(); ?>register';
    }
    else{
     alert('Problem with sql query');
    }
   }
   });
  }
  return false;
 });
});
</script>