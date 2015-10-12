<?php
session_start();
require_once ("PFBC/Form.php");

if ($_POST) {
    header ("Content-type: application/json");
    if (Form::isValid('payment2')) {
        echo json_encode (array ("status" => 'ok'));
        exit;
    }
    Form::renderAjaxErrorResponse('payment2');
    exit;
}

for ($i = 1;$i <= 9;$i++)
    $months[] = "0".$i;

for ($i = 15;$i <= 28;$i++)
    $years[$i] = "20".$i;

$values['nameOnCard'] = 'test';
$values['cardNum'] = '4222222222222222';
$values['cvNum'] = '123';
$values['expYear'] = '16';
$values['expMonth'] = '08';
$values['id'] = '16333';
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PHP-Bootstrap-Form Example: CREDIT CARD FORM</title>

    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
    <script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <div class='container'>
    <legend>Please pay your dues</legend>
    <?php
    Form::open ("payment2", $values, ['ajax' => 'finishCallback']);
    Form::Hidden ("id");
    Form::Textbox ("Cardholder name", "nameOnCard", ["minlength" => 4, "required" => 1, "validation" => new Validation_AlphaNumeric()]);
    Form::Textbox ("Card number", "cardNum",  ["placeholder" => 'XXXXXXXXXXXXXXXX', "maxlength" => 18, "required" => 1, "pattern" => '\d{16,18}', "validation" => new Validation_Numeric()]);
    Form::Select ("Expiration date", "expMonth", $months, Array('required' => 1, 'shared' => "col-md-4", "validation" => new Validation_Numeric()));
    Form::Select ("", "expYear", $years, Array("required" => 1, "shared" => "col-md-4", "validation" => new Validation_Numeric()));
    Form::TextBox ("CVV", "cvNum", Array("required" => 1, "maxlength" => 4, "pattern" => '\d{3,4}', "validation" => new Validation_Numeric()));
    Form::close (Form::$SUBMIT);
    ?>
    </div>

    <script>
        function finishCallback (data) {
            alert('you payment were approved');
        }
    </script>
  </body>
</html>
