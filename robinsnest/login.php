<?php // Example 07: login.php
  require_once 'header.php';
  $error = $user = $pass = "";

  if (isset($_POST['user']))
  {
    $user = sanitizeString($_POST['user']);
    $pass = sanitizeString($_POST['pass']);
    
    if ($user == "" || $pass == "")
      $error = 'Not all fields were entered';
    else
    {
      $result = queryMySQL("SELECT user,pass FROM members
        WHERE user='$user' AND pass='$pass'");

      if ($result->rowCount() == 0)
      {
        $error = "Invalid login attempt";
      }
      else
      {
        $_SESSION['user'] = $user;
        $_SESSION['pass'] = $pass;
        die("<div class='center'>You are now logged in. Please
             <a data-transition='slide'
               href='members.php?view=$user&r=$randstr'>click here</a>
               to continue.</div></div></body></html>");
      }
    }
  }

echo <<<_END
      <script>
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
      <form method='post' action='login.php?r=$randstr'>
        <div class="form-box">
        <div data-role='fieldcontain'>
          <span class='error'>$error</span>
        </div>
        <div data-role='fieldcontain'>
          <label>Username</label>
          <input type='text' maxlength='16' name='user' value='$user'>
        </div>
        <div data-role='fieldcontain'>
          <label>Password</label>
          <div style="display: flex; align-items: center; gap: 8px;">
            <input type='password' maxlength='16' name='pass' value='$pass' id="login-password" style="flex: 1;">
            <img src="pswrd_off.jpg" id="login-toggle" onclick="togglePasswordVisibility('login-password', 'login-toggle')" 
              style="cursor: pointer; width: 20px; height: 20px; object-fit: contain;">
          </div>
        </div>
        <div data-role='fieldcontain'>
          <input data-transition='slide' type='submit' value='Login'>
          </div>
        </div>
      </form>
    </div>
  </body>
</html>
_END;
?>
