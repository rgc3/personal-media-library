<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $name = trim(filter_input(INPUT_POST,"name",FILTER_SANITIZE_STRING));
  $email = trim(filter_input(INPUT_POST,"email",FILTER_SANITIZE_EMAIL));
  $details = trim(filter_input(INPUT_POST,"details",FILTER_SANITIZE_SPECIAL_CHARS));

  //Validation
  if ($name == "" || $email == "" || $details == "") {
    echo "Please fill in the required fields: Name, Email and Details";
    exit;
  }
  //Honeypot Spam
  if ($_POST["address"] != "") {
    echo "Bad form input";
    exit;
  }

  echo "<pre>";
  $email_body = "";
  $email_body .= "Name " . $name . "\n";
  $email_body .= "Email " . $email . "\n";
  $email_body .= "Details " . $details . "\n";
  echo $email_body;
  echo "</pre>";

  //To Do: Send Email
  header("location:suggest.php?status=thanks");
}

$pageTitle = "Suggest a Media Item";
$section = "suggest";

include("includes/header.php"); ?>

<div class="section page">
  <div class="wrapper">
    <h1>Suggest a Media Item</h1>
    <?php if (isset($_GET["status"]) && $_GET["status"] == "thanks") {
      echo "<p>Thanks for your email! I&rsquo;ll check out your suggestion shortly!</p>"
    } else { ?>
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
        //Honeypot Span Filter, users will not see field but robots will fill it in
        <tr style="display:none">
          <th><label for="address">Address</label></th>
          <td><textarea name="address" id="address"></textarea></td>
          <p>Please leave this field blank</p>
        </tr>
      </table>
      <input type="submit" value="send" />
    </form>
    <?php } ?>
  </div>

</div>

	<?php include("includes/footer.php"); ?>
