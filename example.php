<?php
session_start();
require_once ("PFBC/Form.php");
$version = '';
if (isset ($_GET['v']) && $_GET['v'] == 4)
    $version = 4;
$options = Array ('1' => 'option #1', '2' => 'option #2');

// default values
$values['email'] = 'testemail@test.com';
$values['password'] = 'testpass';
$values['select'] = 2;

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PHP-Bootstrap-Form Example</title>
<?php if ($version == 4) { ?>
    <link rel="stylesheet" href="https://cdn.rawgit.com/twbs/bootstrap/v4-dev/dist/css/bootstrap.min.css">
    <script src="https://cdn.rawgit.com/twbs/bootstrap/v4-dev/dist/js/bootstrap.min.js"></script>
<?php } else {?>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<?php } ?>
    <script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <div class='container'>
        SEE ALSO: <a href='example_ccform.php'>AJAX DEMO CREDIT CARD</a>
        <div class='row'>
            <div class='col-md-6'>
                <?php
                Form::open ("login", $values, array ('view' => "SideBySide$version"));
                echo '<legend>Base</legend>';
                Form::Hidden("id");
                Form::Email("Email Address", "email", array("required" => 1, "prepend" => '@'));
                Form::Password ("Password", "password", array("required" => 1));

                Form::File("File", "file");
                Form::Textarea("Textarea", "textarea");
                Form::Select("Select", "select", $options);
                Form::HTML('<legend>HTML5</legend>');
                Form::Phone("Phone", "phone", array ("append" => '<span class="glyphicon glyphicon-earphone" aria-hidden="true"></span>',
                                                     "placeholder" => '(212) 3455-333'));
                Form::Search("Search", "search");
                Form::Url("Url", "url");
                Form::Date("Date", "date");
                Form::DateTime("DateTime", "datetime", array ('shared' => 'col-md-4'));
                Form::DateTimeLocal("", "DateTimeLocal", array ('shared' => 'col-md-4', 'placeholder' => 'DateTime-Local'));
                Form::Month("Month", "month");
                Form::Week("Week", "week");
                Form::Time("Time", "time");
                Form::Number("Number", "Number");
                Form::Range("Range", "Range");
                Form::Color("Color", "Color");

                echo '<legend>Custom/Other</legend>';
                Form::State("State", "State");
                Form::Country("Country", "Country");
                Form::YesNo("Yes/No", "YesNo");
                Form::Captcha("Captcha");
                ?>
            </div>
            <div class='col-md-6'>
                <?php
                echo '<legend>Checkboxes</legend>';
                Form::Checkbox ("Inline", "Remember", $options, array('inline' => 1));
                Form::Checkbox ("Regular", "something else", $options);

                echo '<legend>Radios</legend>';
                Form::Radio("Inline", "Remember", $options, array('inline' => 1));
                Form::Radio("", "something else", $options);

                Form::HTML('<legend>jQuery UI</legend>');
                Form::jQueryUIDate("Date", "jQueryUIDate");
                Form::Sort("Sort", "Sort", $options);
                Form::Checksort("Checksort", "Checksort", $options);
                Form::Checksort("Checksort inline ", "Checksort", $options, array('inline' => 1));

                echo '<legend>WYSIWYG Editor</legend>';
                Form::TinyMCE("TinyMCE", "TinyMCE");
                Form::CKEditor("CKEditor", "CKEditor");
                ?>
            </div>
        </div>
    <?php
    Form::close();
    ?>
    </div>
</body>
