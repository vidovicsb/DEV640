<?php // Example 02: header.php
  session_start();

echo <<<_INIT
<!DOCTYPE html> 
<html>
  <head>
    <meta charset='utf-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1'> 
    <link rel='stylesheet' href='jquery.mobile-1.4.5.min.css'>
    <link rel='stylesheet' href='styles.css' type='text/css'>
    <script src='javascript.js'></script>
    <script src='jquery-2.2.4.min.js'></script>
    <script src='jquery.mobile-1.4.5.min.js'></script>
    <script src='theme.js'></script>
    <style>
      :root {
        --bg-color: #DFD0B8;  /* Lightest color for main background */
        --header-bg: #948979;  /* Third color for header */
        --text-color: #222831;  /* Darkest color for text */
        --border-color: #393E46;  /* Second darkest for borders */
        --secondary-text: #393E46;  /* Second darkest for secondary text */
        --accent-color: #222831;  /* Darkest color for buttons */
      }

      [data-theme="dark"] {
        --bg-color: #222831;  /* Darkest color for main background */
        --header-bg: #393E46;  /* Second darkest for header */
        --content-bg: #2A2F38;  /* Slightly lighter than main for content */
        --card-bg: #323740;  /* Even lighter for cards/elevated elements */
        --text-color: #DFD0B8;  /* Lightest color for primary text */
        --border-color: #393E46;  /* Second darkest for borders */
        --secondary-text: #948979;  /* Third color for secondary text */
        --accent-color: #948979;  /* Third color for buttons */
      }

      body {
        background-color: var(--bg-color);
        color: var(--text-color);
      }

      [data-role="header"] {
        background-color: var(--header-bg) !important;
        border-bottom: 1px solid var(--border-color) !important;
        position: relative !important;
        min-height: 60px !important;
      }

      [data-role="content"] {
        background-color: var(--bg-color);
        padding-top: 20px !important;
      }

      [data-role="footer"] {
        background-color: var(--header-bg) !important;
        border-top: 1px solid var(--border-color) !important;
        padding: 10px 0 !important;
      }

      [data-role="footer"] h4 {
        margin: 0 !important;
        color: var(--text-color) !important;
      }

      [data-role="footer"] a {
        color: var(--accent-color) !important;
        text-decoration: none !important;
      }

      [data-role="footer"] a:hover {
        color: var(--secondary-text) !important;
      }

      .theme-toggle {
        position: absolute;
        right: 10px;
        top: 10px;
      }

      /* Username styling */
      .username {
        text-align: center;
        background: var(--header-bg);
        color: #000000 !important;  /* Black text in light mode */
        font-family: helvetica;
        font-size: 20pt;
        padding: 4px;
      }

      /* Center div containing buttons */
      .center {
        text-align: center;
        color: var(--text-color);
        margin: 0 !important;
        padding: 0 !important;
        line-height: 1.5 !important;
      }

      /* Button container styling */
      .center a[data-role="button"] {
        margin: 5px !important;
        display: inline-block !important;
        vertical-align: middle !important;
      }

      /* Override all text colors and backgrounds in dark mode */
      [data-theme="dark"] * {
        color: var(--text-color) !important;
      }

      /* Specific overrides for elements that might have their own colors */
      [data-theme="dark"] #logo,
      [data-theme="dark"] .username,
      [data-theme="dark"] .info,
      [data-theme="dark"] .center,
      [data-theme="dark"] .subhead,
      [data-theme="dark"] .taken,
      [data-theme="dark"] .error,
      [data-theme="dark"] .available,
      [data-theme="dark"] .whisper,
      [data-theme="dark"] p,
      [data-theme="dark"] div,
      [data-theme="dark"] span {
        color: var(--text-color) !important;
      }

      /* Secondary text elements */
      [data-theme="dark"] .info,
      [data-theme="dark"] .whisper {
        color: var(--secondary-text) !important;
      }

      /* Button styling */
      .ui-btn {
        color: var(--bg-color) !important;
        background-color: var(--accent-color) !important;
        border: none !important;
        text-shadow: none !important;
        margin: 5px !important;
        display: inline-block !important;
        vertical-align: middle !important;
      }

      .ui-btn:hover {
        background-color: var(--secondary-text) !important;
        color: var(--bg-color) !important;
      }

      /* Ensure content areas have correct background */
      [data-role="content"],
      [data-role="page"] {
        background-color: var(--bg-color) !important;
      }

      /* Add subtle elevation to cards/content blocks */
      [data-role="content"] > div {
        background-color: var(--header-bg) !important;
        border-radius: 8px;
        padding: 16px;
        margin: 8px 0;
        box-shadow: 0 2px 4px rgba(0,0,0,0.2);
      }

      /* Info and whisper text in light mode */
      .info,
      .whisper {
        color: var(--secondary-text) !important;
      }

      /* Dark mode specific styles */
      [data-theme="dark"] [data-role="content"] {
        background-color: var(--content-bg) !important;
      }

      [data-theme="dark"] [data-role="content"] > div {
        background-color: var(--card-bg) !important;
      }

      [data-theme="dark"] .username {
        background-color: var(--card-bg) !important;
        color: var(--text-color) !important;  /* Light cream color in dark mode */
      }

      [data-theme="dark"] .center {
        background-color: var(--content-bg) !important;
      }

      [data-theme="dark"] [data-role="footer"] {
        background-color: var(--header-bg) !important;
      }

      [data-theme="dark"] [data-role="footer"] h4 {
        color: var(--text-color) !important;
      }

      [data-theme="dark"] [data-role="footer"] a {
        color: var(--accent-color) !important;
      }

      [data-theme="dark"] [data-role="footer"] a:hover {
        color: var(--text-color) !important;
      }

      /* Form styling */
      form {
        max-width: 300px;
        margin: 0 auto;
        padding: 20px;
        display: flex;
        flex-direction: column;
        align-items: center;
      }

      [data-role="fieldcontain"] {
        margin-bottom: 18px;
        width: 100%;
        display: flex;
        flex-direction: column;
      }

      [data-role="fieldcontain"] label {
        display: block;
        margin-bottom: 8px;
        color: var(--text-color);
        font-weight: bold;
        text-align: center;
        width: 100%;
      }

      [data-role="fieldcontain"] input[type="text"],
      [data-role="fieldcontain"] input[type="password"] {
        width: 300px;
        padding: 8px;
        border: 1px solid var(--border-color);
        border-radius: 4px;
        background-color: #ffffff !important;
        color: var(--text-color);
        margin-top: 0;
        box-sizing: border-box;
        display: block;
        outline: none;
        box-shadow: none;
        transition: border-color 0.2s;
      }

      [data-role="fieldcontain"] input[type="text"]:focus,
      [data-role="fieldcontain"] input[type="password"]:focus {
        outline: none !important;
        box-shadow: none !important;
        border-color: var(--accent-color);
      }

      [data-theme="dark"] [data-role="fieldcontain"] input[type="text"],
      [data-theme="dark"] [data-role="fieldcontain"] input[type="password"] {
        background-color: var(--card-bg) !important;
        border: 3px solid #fff !important;
        color: var(--text-color) !important;
        outline: none !important;
        box-shadow: none !important;
      }

      [data-theme="dark"] [data-role="fieldcontain"] input[type="text"]:focus,
      [data-theme="dark"] [data-role="fieldcontain"] input[type="password"]:focus {
        border: 3px solid #fff !important;
        outline: none !important;
        box-shadow: none !important;
      }

      [data-role="fieldcontain"] input[type="submit"] {
        width: 300px;
        margin-top: 10px;
        display: block;
        margin-left: auto;
        margin-right: auto;
      }

      .error {
        color: #ff0000;
        display: block;
        text-align: center;
        margin-bottom: 10px;
      }

      #used {
        margin-top: 4px;
        font-size: 0.9em;
        color: var(--secondary-text);
      }

      .form-box {
        background: var(--header-bg);
        padding: 0px 24px 0px 24px;
        border-radius: 12px;
        box-shadow: 0 2px 8px rgba(0,0,0,0.10);
        max-width: 340px;
        margin: 0 auto 24px auto;
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 1px;
      }
      .form-box > [data-role="fieldcontain"] {
        margin-bottom: 0;
      }
    </style>

_INIT;

  require_once 'functions.php';

  $userstr = 'Welcome Guest';
  $randstr = substr(md5(rand()), 0, 7);

  if (isset($_SESSION['user']))
  {
    $user     = $_SESSION['user'];
    $loggedin = TRUE;
    $userstr  = "Logged in as: $user";
  }
  else $loggedin = FALSE;

echo <<<_MAIN
    <title>Robin's Nest: $userstr</title>
  </head>
  <body>
    <div data-role='page'>
      <div data-role='header'>
        <div id='logo' class='center' style='color: black'>The Code Crew</div>
        <div class='username'>$userstr</div>
        <button class="theme-toggle" data-role="button" data-icon="bulb" data-iconpos="notext" data-theme="b">Toggle Theme</button>
      </div>
      <div data-role='content'>

_MAIN;

  if ($loggedin)
  {
echo <<<_LOGGEDIN
        <div class='center'>
          <a data-role='button' data-inline='true' data-icon='home' data-theme="b"
            data-transition="slide" href='members.php?view=$user&r=$randstr'>Home</a>
          <a data-role='button' data-inline='true' data-icon='user'
            data-transition="slide" href='members.php?r=$randstr'>Members</a>
          <a data-role='button' data-inline='true' data-icon='heart'
            data-transition="slide" href='friends.php?r=$randstr'>Friends</a><br>
          <a data-role='button' data-inline='true' data-icon='mail'
            data-transition="slide" href='messages.php?r=$randstr'>Messages</a>
          <a data-role='button' data-inline='true' data-icon='edit'
            data-transition="slide" href='profile.php?r=$randstr'>Edit Profile</a>
          <a data-role='button' data-inline='true' data-icon='action'
            data-transition="slide" href='logout.php?r=$randstr'>Log out</a>
        </div>
        
_LOGGEDIN;
  }
  else
  {
echo <<<_GUEST
        <div class='center'>
          <a data-role='button' data-inline='true' data-icon='home' data-theme="b"
            data-transition='slide' href='index.php?r=$randstr''>Home</a>
          <a data-role='button' data-inline='true' data-icon='plus' data-theme="b"
            data-transition="slide" href='signup.php?r=$randstr''>Sign Up</a>
          <a data-role='button' data-inline='true' data-icon='check' data-theme="b"
            data-transition="slide" href='login.php?r=$randstr''>Log In</a>
        </div>
        <p class='info'>(You must be logged in to use this app)</p>
        
_GUEST;
  }
?>
