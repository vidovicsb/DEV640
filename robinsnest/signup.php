<?php // Example 05: signup.php
  require_once 'header.php';

echo <<<_END
  <script>
    function checkUser(user)
    {
      if (user.value == '')
      {
        $('#used').html('&nbsp;')
        return
      }

      $.post
      (
        'checkuser.php',
        { user : user.value },
        function(data)
        {
          $('#used').html(data)
        }
      )
    }

    function togglePasswordVisibility(inputId, buttonId) {
      const passwordInput = document.getElementById(inputId);
      const toggleButton = document.getElementById(buttonId);
      
      if (passwordInput.type === 'password') {
        passwordInput.type = 'text';
        toggleButton.src = 'pswrd_on.jpg';
      } else {
        passwordInput.type = 'password';
        toggleButton.src = 'pswrd_off.jpg';
      }
    }
  </script>  
_END;

  $error = $user = $pass = "";
  if (isset($_SESSION['user'])) destroySession();

  if (isset($_POST['user']))
  {
    $user = sanitizeString($_POST['user']);
    $pass = sanitizeString($_POST['pass']);

    if ($user == "" || $pass == "")
      $error = 'Not all fields were entered<br><br>';
    else
    {
      $result = queryMysql("SELECT * FROM members WHERE user='$user'");

      if ($result->rowCount())
        $error = 'That username already exists<br><br>';
      else
      {
        queryMysql("INSERT INTO members VALUES('$user', '$pass')");
        die('<h4>Account created</h4>Please Log in.</div></body></html>');
      }
    }
  }

echo <<<_END
      <form method='post' action='signup.php?r=$randstr'>
        <div class="form-box">
          <div data-role='fieldcontain'>
            <span class='error'>$error</span>
          </div>
          <div data-role='fieldcontain'>
            <label>Username</label>
            <input type='text' maxlength='16' name='user' value='$user'
              onBlur='checkUser(this)'>
            <div id='used'>&nbsp;</div>
          </div>
          <div data-role='fieldcontain'>
            <label>Password</label>
            <div style="display: flex; align-items: center; gap: 8px;">
              <input type='password' maxlength='16' name='pass' value='$pass' id="signup-password" style="flex: 1;">
              <img src="pswrd_off.jpg" id="signup-toggle" onclick="togglePasswordVisibility('signup-password', 'signup-toggle')" 
                style="cursor: pointer; width: 20px; height: 20px; object-fit: contain;">
            </div>
          </div>
          <div data-role='fieldcontain'>
            <input data-transition='slide' type='submit' value='Sign Up'>
          </div>
        </div>
      </form>
    </div>
  </body>
</html>
_END;
?>
