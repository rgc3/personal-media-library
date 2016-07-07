<?php
$name = $_POST["name"];
$email = $_POST["email"];
$details = $_POST["details"];

echo "<pre>";
$email_body = "";
$email_body .= "Name " . $name . "\n";
$email_body .= "Email " . $email . "\n";
$email_body .= "Details " . $details . "\n";
echo $email_body;
echo "</pre>";

//To Do: Send Email
header("location:thanks.php");

$pageTitle = "Suggest a Media Item";
$section = "suggest";

include("includes/header.php"); ?>

<div class="section page">
  <div class="wrapper">
    <h1>Suggest a Media Item</h1>
    <p>If you think there is something I&rsquo;m missing, let me know! Complete the form to send me an email.</p>
    <form method="post" action="suggest.php">
      <table>
        <tr>
          <th><label for="name">Name</label></th>
          <td><input type="text" id="name" name="name"/></td>
        </tr>
        <tr>
          <th><label for="email">Email</label></th>
          <td><input type="text" id="email" name="email"/></td>
        </tr>
        <tr>
          <th><label for="details">Suggest Item Details</label></th>
          <td><textarea name="details" id="details"></textarea></td>
        </tr>
      </table>
      <input type="submit" value="send" />
    </form>
  </div>

</div>

	<?php include("includes/footer.php"); ?>
