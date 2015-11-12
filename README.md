

<h1>Readme</h1>
<p>Below is a brief description of all PHP files you will find in the download archive.</p>
<ol>
  <li>config.php - This script contains the database connection details. Edit this file to specify your own database's connection details.</li>
  <li>register-form.php - A simple registration form</li>
  <li>register-exec.php - Handler script for the the above form. This script will create member accounts for you.</li>
  <li>index.php - Login form</li>
  <li>login-exec.php - Handler script for the above login form. This script authenticates the login details and then sets up a session for the user.</li>
  <li>logout.php - Script used to logout a user from the session.</li>
  <li>member-index.php - Sample password protected page.</li>
  <li>member-profile.php - Sample password protected page.</li>
  <li>auth.php - Include this script at the top of any page you want to password protect. This script checks whether the user is logged in or not.</li>
</ol>
<h2>Notes</h2>
<ul>
  <li>Make sure that you edit the <b>config.php</b> file and change the connections details to match your own environment.</li>
  <li>The script is meant to be a teaching tool for PHP newbies and is not meant to be used in production environments.</li>
</ul>
