<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PHP-Bootstrap-Form Example</title>

    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/sidenav.css">
    <link rel="stylesheet" href="../assets/css/docs.min.css">
    <script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body class="bs-docs-home">
    <link rel="stylesheet" href="../assets/css/prism.css">
    <script src="../assets/js/prism.js"></script>
    <a class="sr-only sr-only-focusable" href="#content">Skip to main content</a>

    <!-- Docs master nav -->
    <header class="navbar navbar-static-top bs-docs-nav" id="top" role="banner">
    <div class="container">
        <div class="navbar-header">
            <button class="navbar-toggle collapsed" type="button" data-toggle="collapse"
                    data-target=".bs-navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a href="/" class="navbar-brand">PHP-Bootstrap-Form</a>
        </div>
        <nav class="collapse navbar-collapse bs-navbar-collapse" role="navigation">
            <ul class="nav navbar-nav">
                <li >
                    <a href="/api/">Documentation</a>
                </li>
                <li>
                    <a href="/example.php" target="_blank">Examples</a>
                </li>
                <li>
                    <a href="https://github.com/avbdr/php-bootstrap-form" target="_blank">GitHub</a>
                </li>
            </ul>
        </nav>
    </div>
</header>
<body>
    <style>
        h2 {
            margin-top: 100px;
        }
    </style>
    <!-- Docs page layout -->
    <div class="bs-docs-header" id="content">
      <div class="container">
        <h1>PHP-Bootstrap-Form</h1>
        <p>Documentation</p>
      </div>
    </div>

    <div class="bs-docs-social">
    If you like bootstrap table: 
    <ul class="bs-docs-social-buttons">
        <li>
            <iframe class="github-btn"
                    src="http://ghbtns.com/github-btn.html?user=avbdr&repo=php-bootstrap-form&type=watch&count=true"
                    width="100" height="20" title="Star on GitHub"></iframe>
        </li>
        <li>
            <iframe class="github-btn"
                    src="http://ghbtns.com/github-btn.html?user=avbdr&repo=php-bootstrap-form&type=fork&count=true"
                    width="102" height="20" title="Fork on GitHub"></iframe>
        </li>
        <li>
            <iframe class="github-btn" src="http://ghbtns.com/github-btn.html?user=avbdr&type=follow&count=true"
                    width="175" height="20" title="Follow on GitHub"></iframe>
        </li>
    </ul>
</div>


    <hr>

    <div class="container bs-docs-container">

      <div class="row">
        <div class="col-md-9" role="main" data-toggle="sidenav" data-container="#sidenav" data-hs="h1,h2" data-smart-id="true" data-bottom=".bs-docs-footer">
          <h1>Installation</h1>
<p>To start using php-bootstrap-forms it should be included into your project.</p>
<div class="highlight">
    <pre><code class="language-php">
    require_once ("PFBC/Form.php");
    </code></pre>
</div>
<p>Or it is also possible to install library via composer:</p>
<div class="highlight">
    <pre><code class="language-php">
        composer require avbdr/php-bootstrap-form:dev-master
    </code></pre>
</div>

          <h1>Basic usage</h1>
<p>Before opening a form please make sure that session is activated. Library is using sessions for server side form validation.</p>
<p>PHP-Bootstrap-Form has support for 32 form elements: Button, Captcha, Checkbox, Checksort, CKEditor, Color, Country, Date, DateTimeLocal, DateTime, Email, File, Hidden, HTML, jQueryUIDate, Month, Number, Password, Phone, Radio, Range, Search, Select, Sort, State, Textarea, Textbox, Time, TinyMCE, Url, Week, YesNo.</p>
<p>Each of HTML5 elements will fallback to textboxes in the event that the HTML5 input type isn't supported in the user's web browser.</p>
<p>In the example below we will create a simple login form and then will explain how it work</p>
<div class="highlight">
    <pre><code class="language-php">
<?php echo htmlspecialchars ('<?php
session_start();
Form::open ("login");
    echo "<legend>Login</legend>";
    Form::Hidden ("id");
    Form::Email ("Email Address:", "email", array("required" => 1));
    Form::Password ("Password:", "password", array("required" => 1));
    Form::Checkbox ("", "remember", array("1" => "Remember me"));
    Form::Button ("Login");
    Form::Button ("Cancel", "button", array("onclick" => "history.go(-1);"));
Form::close (false);
?>');
?>
    </code></pre>
</div>
<p>Following code will produce a form like this:</p>
<?php
require_once ("../../PFBC/Form.php");
$options = Array ('1' => 'option #1', '2' => 'option #2');
Form::open ("login");
    echo "<legend>Login</legend>";
    Form::Hidden ("id");
    Form::Email ("Email Address:", "email", array("required" => 1));
    Form::Password ("Password:", "password", array("required" => 1));
    Form::Checkbox ("", "remember", array("1" => "Remember me"));
    Form::Button ("Login");
    Form::Button ("Cancel", "button", array("onclick" => "history.go(-1);"));
Form::close (false);
?>
<h2>Starting a form</h2>
<div class="highlight">
    <pre><code class="language-php">
    <?php echo htmlspecialchars ('<?php
        $form = Form::open ($id, $values, $attributes = null);
        $form2 = Form::open ($id2, $values2, $attributes = null);
    ?>');?>
    </code></pre>
</div>
<p>Form::open() is used to initiate new form. Function will perform internal configurations as well will echo an initial form code.
If on the single page multiple forms should be generated it is possible to use an objects returned by Form::open() to relate to the needed form.
</p>
<p>Form:open() support all html attributes (including data attributes) plus following library specific attributes:</p>
<table class='table'>
    <tr>
        <th>Attribute</th>
        <th>Type</th>
        <th>Description</th>
    </tr>
    <tr>
        <td>action</td>
        <td>String</td>
        <td>Form action URL. Default is same page</td>
    </tr>
    <tr>
        <td>method</td>
        <td>String</td>
        <td>Form submit method. Default: POST</td>
    </tr>

    <tr>
        <td>ajax</td>
        <td>String</td>
        <td>Javascript function to called after the form's data has been submitted. Default is null -- ajax submit disabled</td>
    </tr>
    <tr>
        <td>prevent</td>
        <td>Array</td>
        <td>Empty by default. Only value could be passed: 'focus' -- disable auto focus of the first form element</td>
    </tr>
    <tr>
        <td>view</td>
        <td>String</td>
        <td>Form rendering type. Default is 'SideBySide'. Available types: Inline, Search, SideBySide, SideBySide4 and Vertical. See <a href='/api/#views'>Views</a> for more information</td>
    </tr>
    <tr>
        <td>errorView</td>
        <td>String</td>
        <td>Error rendering view type. Default: Standart</td>
    </tr>
    <tr>
        <td>noLabel</td>
        <td>Bool</td>
        <td>If true, render all labels as placeholder</td>
    </tr>
</table>

<h2>Closing a form</h2>
<div class="highlight">
    <pre><code class="language-php">
    <?php echo htmlspecialchars ('<?php
        Form::close ();
        Form::close (false);
        Form::close (Form::$SUBMIT);

        $buttons = [
            ["Suspend", "button", ["class" => "btn-danger actionButton", "data-action" => ".."]],
            ["Delete", "button", ["class" => "btn-danger actionButton", "data-action" => ".."]],
        ];
        Form::close ($buttons);
    ?>');?>
    </code></pre>
</div>
<p>Closing a form internally and will echo form closing code and form related css and js code if needed</p>
<p>$closeType could be one of the following types</p>
<table class='table'>
    <tr>
        <th>Type</th>
        <th>Description</th>
    </tr>
    <tr>
        <td>Form::$SUBMIT</td>
        <td>Add submit and Cancel button. Close a form after that</td>
    </tr>
    <tr>
        <td>Array</td>
        <td>Add submit, cancel and extra buttons from an array.</td>
    </tr>
    <tr>
        <td>false</td>
        <td>Just close a form. No need to generate extra buttons</td>
    </tr>
</table>


<h1>Element types</h1>
<h2>Generic prototype description</h2>
<div class="highlight">
    <pre><code class="language-php">
    <?php echo htmlspecialchars ('<?php
        Form::ElementType ($label = "", $id = null, $attributes = null);
        Form::ElementType ($label = "", $id = null, $options = Array(), $attributes = null);
    ?>');?>
    </code></pre>
</div>
<p>All elements falls under this two prototypes.</p>
<table class='table'>
    <tr>
        <th>Variable</th>
        <th>Type</th>
        <th>Description</th>
    </tr>
    <tr>
        <td>$label</td>
        <td>String</td>
        <td>Element label in the form. In case of the 'Vertical' view usage, element label will be rendered as a placeholder</td>
    </tr>
    <tr>
        <td>$id</td>
        <td>String</td>
        <td>Element ID. If name were not set separately, name will be set to the same value as id. If not set, default id will {$formId}-elem-{$elementCount}</td>
    </tr>
    <tr>
        <td>$options</td>
        <td>Array</td>
        <td>Used in elements like Option,Radio,Select. Array could be an associative array or a usual array</td>
    </tr>
    <tr>
        <td>$attributes</td>
        <td>Array</td>
        <td>All elements support all html attributes (including data attributes and html5 validation attributes) plus following library specific attributes:</td>
    </tr>
</table>
<p>Library specific attributes:</p>
<table class='table'>
    <tr>
        <th>Attribute</th>
        <th>Type</th>
        <th>Description</th>
    </tr>
    <tr>
        <td>append</td>
        <td>String</td>
        <td>Append addon to the end of element. Ex: <?php echo htmlspecialchars ('"prepend" => "<span class=\'glyphicon glyphicon-earphone\'></span>"')?></td>
    </tr>
    <tr>
        <td>prepend</td>
        <td>String</td>
        <td>Prepend addon to the begining of element. Ex: <?php echo htmlspecialchars ('"prepend" => "<span class=\'glyphicon glyphicon-earphone\'></span>"')?></td>
    </tr>
    <tr>
        <td>inline</td>
        <td>boolean</td>
        <td>Used in radio and option elements. Indicates if element values should be rendered inline or one after another</td>
    </tr>
    <tr>
        <td>minlength</td>
        <td>int</td>
        <td>Minimal length validation. No support on client side validation, only server side for now</td>
    </tr>
    <tr>
        <td>shared</td>
        <td>String</td>
        <td>Element row should be shared between current and next elements. Value should contain bootstrap bootstrap col- sizing definitions. Ex: 'col-xs-5 col-md-4' if you want to fit 2 elements. Note that maximum row size here is 'col-xs-10 colo-md-8'. If bigger size will be specified, your form will be misaligned. See <a href='#views'>views</a> description for more information.
        </td>
    </tr>
    <tr>
        <td>validation</td>
        <td>object</td>
        <td>Validation object. Ex: <?php echo htmlspecialchars ('"validation" => new Validation_Numeric()')?>. See <a href='#validation'>validation</a> for more info</td>
    </tr>
</table>
<br>
<h2>Hidden</h2>
<p>Generates a hidden input element</p>
<div class="highlight">
    <pre><code class="language-php">
    <?php echo htmlspecialchars ('<?php
        Form::Hidden ("id", $attributes = null);
    ?>');?>
    </code></pre>
</div>
<?php
//    Form::open('demo');
?>
<h2>Textbox</h2>
<p></p>
<div class="highlight">
    <pre><code class="language-php">
    <?php echo htmlspecialchars ('<?php
        Form::Textbox ("Text", "text", $attributes = null);
    ?>');?>
    </code></pre>
</div>
<?php
    Form::Textbox ("Text", "text");
?>
<h2>Number</h2>
<p></p>
<div class="highlight">
    <pre><code class="language-php">
    <?php echo htmlspecialchars ('<?php
        Form::Number("Number", "Number", $attributes = null);
    ?>');?>
    </code></pre>
</div>
<?php
    Form::Number("Number", "Number");
?>
<h2>Select</h2>
<p></p>
<div class="highlight">
    <pre><code class="language-php">
    <?php echo htmlspecialchars ('<?php
        $options = Array ("1" => "option #1", "2" => "option #2");
        Form::Select("Select", "select", $options, $attributes = null);
    ?>');?>
    </code></pre>
</div>
<?php
    Form::Select("Select", "select", $options);
?>

<h2>Buttons</h2>
<p>Buttons have an extra parameter 'icon' to simplify icons markup. Currently fontawesome and glyphicon prefixes supported. Default markup for icons is span.</p>
<div class="highlight">
    <pre><code class="language-php">
    <?php echo htmlspecialchars ('<?php
        Form::Button ("GOGOGO");
        Form::Button ("GOGOGO", "button");
        Form::Button ("GOGOGO", "button", ["class" => "btn-danger"]);
        Form::Button ("GOGOGO", "button", ["icon" => "glyphicon glyphicon-earphone"]);
        Form::Button ("GOGOGO", "button", ["icon" => "fa fa-chrome"]);
    ?>');?>
    </code></pre>
</div>
<?php
    Form::Button ('GOGOGO');
    Form::Button ('GOGOGO', 'button');
    Form::Button ('GOGOGO', 'button', ['class' => 'btn-danger']);
    Form::Button ('GOGOGO', 'button', ['icon' => 'glyphicon glyphicon-earphone']);
?>


<h2>Checkboxes</h2>
<p></p>
<div class="highlight">
    <pre><code class="language-php">
    <?php echo htmlspecialchars ('<?php
    $options = Array ("1" => "option #1", "2" => "option #2");
    // inline checkboxes
    Form::Checkbox ("Inline", "food", $options, array("inline" => 1));

    // regular checkboxes
    Form::Checkbox ("Regular", "food2", $options, $attributes = null);
    ?>');?>
    </code></pre>
</div>
<?php
    Form::Checkbox ("Inline", "food", $options, array("inline" => 1));
    Form::Checkbox ("Regular", "food2", $options);
?>
<h2>Options</h2>
<p></p>
<div class="highlight">
    <pre><code class="language-php">
    <?php echo htmlspecialchars ('<?php
        $options = Array ("1" => "option #1", "2" => "option #2");
        Form::Radio("Inline", "id", $options, array("inline" => 1));
        Form::Radio("", "id2", $options, $attributes = null);
    ?>');?>
    </code></pre>
</div>
<?php
    Form::Radio("Inline", "id3", $options, array('inline' => 1));
    Form::Radio("", "id2", $options);

?>

<h2>Email</h2>
<p></p>
<div class="highlight">
    <pre><code class="language-php">
    <?php echo htmlspecialchars ('<?php
        Form::Email ("Email Address", "email", $attributes = null);
    ?>');?>
    </code></pre>
</div>
<?php
    Form::Email ("Email Address", "email");
?>
<h2>Password</h2>
<p></p>
<div class="highlight">
    <pre><code class="language-php">
    <?php echo htmlspecialchars ('<?php
        Form::Password ("Password", "password", $attributes = null);
    ?>');?>
    </code></pre>
</div>
<?php
    Form::Password ("Password", "password");
?>
<h2>File</h2>
<p></p>
<div class="highlight">
    <pre><code class="language-php">
    <?php echo htmlspecialchars ('<?php
        Form::File("File", "file", $attributes = null);
    ?>');?>
    </code></pre>
</div>
<?php

    Form::File("File", "file");
?>
<h2>Textarea</h2>
<p></p>
<div class="highlight">
    <pre><code class="language-php">
    <?php echo htmlspecialchars ('<?php
        Form::Textarea("Textarea", "textarea", $attributes = null);
    ?>');?>
    </code></pre>
</div>
<?php

    Form::Textarea("Textarea", "textarea");
?>
<h2>Phone</h2>
<p></p>
<div class="highlight">
    <pre><code class="language-php">
    <?php echo htmlspecialchars ('<?php
        Form::Phone("Phone", "phone", $attributes = null);
    ?>');?>
    </code></pre>
</div>
<?php
    Form::Phone("Phone", "phone");
?>
<h2>Search</h2>
<p></p>
<div class="highlight">
    <pre><code class="language-php">
    <?php echo htmlspecialchars ('<?php
        Form::Search ("Search", "search", $attributes = null);
    ?>');?>
    </code></pre>
</div>
<?php

    Form::Search("Search", "search");
?>
<h2>URL</h2>
<p></p>
<div class="highlight">
    <pre><code class="language-php">
    <?php echo htmlspecialchars ('<?php
        Form::Url("Url", "url");
    ?>');?>
    </code></pre>
</div>
<?php
    Form::Url("Url", "url");
?>
<h2>Date Elements</h2>
<p>Please note, that usage of date element can lead to a different behavoir in different browsers. </p>
<div class="highlight">
    <pre><code class="language-php">
    <?php echo htmlspecialchars ('<?php
        Form::Date("US Date", "date", $attributes = null);
        Form::Date("EU Date", "date", array ("pattern" => "\d{2}.\d{2}.\d{4}",
                                             "placeholder" => "DD.MM.YYYY"));
        Form::DateTime("DateTime", "datetime", $attributes = null);
        Form::DateTimeLocal("DateTime Local", "DateTimeLocal", $attributes = null);
        Form::Month("Month", "month", $attributes = null);
        Form::Week("Week", "week", $attributes = null);
        Form::Time("Time", "time", $attributes = null);
    ?>');?>
    </code></pre>
</div>
<?php
    Form::Date("US Date", "date");
    Form::Date("EU Date", "date", array ("pattern" => "\d{2}.\d{2}.\d{4}", "placeholder" => "DD.MM.YYYY"));
    Form::DateTime("DateTime", "datetime");
    Form::DateTimeLocal("DateTime Local", "DateTimeLocal", array ('placeholder' => 'DateTime-Local'));
    Form::Month("Month", "month");
    Form::Week("Week", "week");
    Form::Time("Time", "time");
?>
<h2>Calendar</h2>
<p>jQuery UI based calendar element. Extra option: jQueryOptions</p>
<div class="highlight">
    <pre><code class="language-php">
    <?php echo htmlspecialchars ('<?php
        Form::jQueryUIDate("Date", "jQueryUIDate", $attributes = null);
    ?>');?>
    </code></pre>
</div>
<?php
    Form::jQueryUIDate("Date", "jQueryUIDate");
?>
<h2>Range</h2>
<p></p>
<div class="highlight">
    <pre><code class="language-php">
    <?php echo htmlspecialchars ('<?php
        Form::Range("Range", "Range", $attributes = null);
    ?>');?>
    </code></pre>
</div>
<?php
    Form::Range("Range", "Range");
?>
<h2>Color</h2>
<p></p>
<div class="highlight">
    <pre><code class="language-php">
    <?php echo htmlspecialchars ('<?php
        Form::Color("Color", "Color", $attributes = null);
    ?>');?>
    </code></pre>
</div>
<?php
    Form::Color("Color", "Color");
?>

<h2>State</h2>
<p></p>
<div class="highlight">
    <pre><code class="language-php">
    <?php echo htmlspecialchars ('<?php
        Form::State("State", "State", $attributes = null);
    ?>');?>
    </code></pre>
</div>
<?php
    Form::State("State", "State");
?>
<h2>Country</h2>
<p></p>
<div class="highlight">
    <pre><code class="language-php">
    <?php echo htmlspecialchars ('<?php
        Form::Country("Country", "Country", $attributes = null);
    ?>');?>
    </code></pre>
</div>
<?php
    Form::Country("Country", "Country");
?>
<h2>Yes-No Question</h2>
<p></p>
<div class="highlight">
    <pre><code class="language-php">
    <?php echo htmlspecialchars ('<?php
        Form::YesNo("Yes/No", "YesNo", $attributes = null);
    ?>');?>
    </code></pre>
</div>
<?php
    Form::YesNo("Yes/No", "YesNo");
?>
<h2>Captcha</h2>
<p></p>
<div class="highlight">
    <pre><code class="language-php">
    <?php echo htmlspecialchars ('<?php
        Form::Captcha("Captcha", $attributes = null);
    ?>');?>
    </code></pre>
</div>
<?php
    Form::Captcha("Captcha");
?>
<h2>Sort</h2>
<p>Extra option: jQueryOptions</p>
<div class="highlight">
    <pre><code class="language-php">
    <?php echo htmlspecialchars ('<?php
        $options = Array ("1" => "option #1", "2" => "option #2");
        Form::Sort("Sort", "Sort", $options, $attributes = null);
    ?>');?>
    </code></pre>
</div>
<?php
    Form::Sort("Sort", "Sort", $options);
?>
<h2>Checksort</h2>
<p></p>
<div class="highlight">
    <pre><code class="language-php">
    <?php echo htmlspecialchars ('<?php
        $options = Array ("1" => "option #1", "2" => "option #2");
        Form::Checksort("Checksort", "Checksort", $options, $attributes = null);
        Form::Checksort("Checksort inline ", "Checksort", $options, array("inline" => 1));
    ?>');?>
    </code></pre>
</div>
<?php
    Form::Checksort("Checksort", "Checksort", $options);
    Form::Checksort("Checksort inline ", "Checksort", $options, array('inline' => 1));
?>
<h2>TinyMCE Editor</h2>
<p>Extra attribute: basic</p>
<div class="highlight">
    <pre><code class="language-php">
    <?php echo htmlspecialchars ('<?php
        Form::TinyMCE("Article", "article", $attributes = null);
    ?>');?>
    </code></pre>
</div>
<?php
    Form::TinyMCE("TinyMCE", "TinyMCE");
?>
<h2>CKEditor</h2>
<p>Extra attribute: basic</p>
<div class="highlight">
    <pre><code class="language-php">
    <?php echo htmlspecialchars ('<?php
        Form::CKEditor("CKEditor", "CKEditor", $attributes = null);
    ?>');?>
    </code></pre>
</div>
<?php
    Form::CKEditor("CKEditor", "CKEditor");
    Form::close(false);
?>
<h1>Views</h1>
<p>Views are responsible for converting a form's properties and elements into HTML, CSS, and javascript for the browser to display. There are 4 views available: SideBySide, SideBySide4 (boostrap4), Vertical and Inline.</p>
<p>For bootstrap support use SideBySide4 view</p>
<h2>SideBySide View</h2>
<p>Default library view type. form-horizonal bootstrap form layout.</p>
<div class="highlight">
    <pre><code class="language-php">
    <?php echo htmlspecialchars ('<?php
        Form::open ("test1", $values)
        Form::Textbox ("Login", "login");
        Form::Textbox ("Login", "password");
        Form::Button ("GO");
        Form::close();
    ?>');?>
    </code></pre>
</div>
<?php
        Form::open ("testInline", $values);
        Form::Textbox ("Login", "test");
        Form::Textbox ("Password", "test");
        Form::Button("GO");
        Form::close();
?>

<h2>Inline View</h2>
<p>form-inline bootstrap form layout.</p>
<div class="highlight">
    <pre><code class="language-php">
    <?php echo htmlspecialchars ('<?php
        Form::open ("test1", $values, "view" = "Inline")
        Form::Textbox ("Login", "login");
        Form::Textbox ("Login", "password");
        Form::close();
    ?>');?>
    </code></pre>
</div>
<?php
        Form::open ("testInline", $values, ["view" => "Inline"]);
        Form::Textbox ("Login", "test");
        Form::Textbox ("Password", "test");
        Form::Button("GO");
        Form::close();
?>

<h2>Vertical View</h2>
<p>Simple vertical layout without labels.</p>
<div class="highlight">
    <pre><code class="language-php">
    <?php echo htmlspecialchars ('<?php
        Form::open ("test1", $values, "view" = "Vertical")
        Form::Textbox ("Login", "login");
        Form::Textbox ("Login", "password");
        Form::close();
    ?>');?>
    </code></pre>
</div>
<?php
        Form::open ("testInline", $values, ["view" => "Vertical"]);
        Form::Textbox ("Login", "test");
        Form::Textbox ("Password", "test");
        Form::Button("GO");
        Form::close();
?>


<h1>Ajax</h1>
<p>PHP-Bootstrap-Form provides a very simple way for ajax form submissions. To get started, you'll first need to set the 'ajax' property in the form attributes with a name of a javascript callback function to called after the form's data has been submitted. </p>
<p>Please note, that json reply should come with a content-type set to application/json or it will be ignored.</p>
<p> ajax submit example:</p>
<div class="highlight">
    <pre><code class="language-php">
<?php echo htmlspecialchars ('<?php
Form::open ("test", $values, ["ajax" => "finishCallback"]);
Form::hidden ("id");
From::Button ("Submit");
Form::close ();
?>
<script>
function finishCallback (data) {
    console.log (data.status);
    console.log (data.message);
}
</script>');
?>
    </code></pre>
</div>

<p>Reply example</p>
<div class="highlight">
    <pre><code class="language-php">
<?php echo htmlspecialchars ('<?php
    $reply = ["status" => "OK", "message" => "all is good"];
    header ("Content-type: application/json");
    echo json_encode ($reply);
?>');?></code></pre>
</div>

<p>See an example <a href='https://github.com/avbdr/php-bootstrap-form/blob/master/example_ccform.php'>here</a></p>


<h1>Validation</h1>
<h2>Client-Side validation and Validation types</h2>
<p>PHP-Bootstrap-Form validation is achieved in a two step process. The first step is to apply validation rules to form elements via the element's validation attribute. Some elements including Captcha, Color, Date, Email, jQueryUIDate, Month, Number, Url, and Week have validation rules applied by default.</p>
<p>PHP-Bootstrap-Form supports 7 types of validation rules: AlphaNumeric, Captcha, Date, Email, Numeric, RegExp, Required, and Url, </p>
<table class='table'>
    <tr>
        <th>Type</th>
        <th>Description</th>
    </tr>
    <tr>
        <td>Validation_Required ()</td>
        <td></td>
    </tr>
    <tr>
        <td>Validation_AlphaNumeric ()</td>
        <td>AlphaNumeric validation class will verify that the element's submitted value contains only letters, numbers, underscores, and/or hyphens</td>
    </tr>
    <tr>
        <td>Validation_Numeric ()</td>
        <td>Number element applies the Numeric validation rule by default.  If supported, HTML5 validation will also be provided client-side.</td>
    </tr>
    <tr>
        <td>Validation_Email ()</td>
        <td>Email element applies the Email validation rule by default.  If supported, HTML5 validation will also be provided client-side.</td>
    </tr>
    <tr>
        <td>Validation_Date ()</td>
        <td>Date element applies the RegExp validation rule by default - ensuring the following date format YYYY-MM-DD is adhered to.</td>
    </tr>
    <tr>
        <td>Validation_RegExp ($regExp, $errorMessage)</td>
        <td>RegExp validation class provides the means to apply custom validation to an element.  Its constructor includes two parameters: the regular expression pattern to test and the error message to display if the pattern is not matched.</td>
    </tr>
    <tr>
        <td>Validation_Captcha ()</td>
        <td>Captcha element applies the Captcha validation, which uses <a href=\"http://www.google.com/recaptcha\">reCaptcha's anti-bot service</a> to reduce spam submissions.</td>
    </tr>
    <tr>
        <td>Validation_Url ()</td>
        <td>The Url element applies the Url validation rule by default.  If supported, HTML5 validation will also be provided client-side.</td>
    </tr>
</table>

<h2>Server-side validation</h2>
</p>Secondly, you need to call Form::isValid() static method once the form's data has been submitted. This function will return true/false. If false is returned, it indicates that one or more errors occurred. You will then need to redirect users back to the form to correct and resubmit.</p>
<p>The validation process for an ajax submission also differs slightly from that of a standard submission. If the form's isValid method returns false, you will need to invoke the renderAjaxErrorResponse method, which returns a json response containing the appropriate error messages. These errors will then be displayed in the form so the user can correct and resubmit.</p>
<p>Below is an example of the isValid use.</p>

<div class="highlight">
    <pre><code class="language-php">
    <?php echo htmlspecialchars ('<?php
    //----------AFTER THE FORM HAS BEEN SUBMITTED----------
    include("PFBC/Form.php");
    if(!Form::isValid("<replace with unique form identifier>")) {
        /* Validation errors have been found.  We now need to redirect users back to the 
        form back so the errors can be corrected and the form can be re-submitted.
           In case of ajax submit Form::renderAjaxErrorResponse () will build an error reply.*/

        if ($reqIs("AJAX")) {
            header ("Content-type: application/json");
            Form::renderAjaxErrorResponse($formName);
        } else
            header("Location: <replace with form url>");
    }
    //form submitted data has been validated.  Your script can now proceed with any 
    further processing required.*/');?>
    </code></pre>
</div>

<h2>Custom Validation</h2>
<p>Often times, you'll find that you need to apply custom validation to your forms' submitted data. For instance, if you create a login form, you'll need to validate user entered credentials against your system. PHP-Bootstrap-Form has several methods that support this type of scenario. Let's take a look at an example implementation.</p>

<div class="highlight">
    <pre><code class="language-php">
    <?php echo htmlspecialchars ('<?php
//----------AFTER THE FORM HAS BEEN SUBMITTED----------
include("PFBC/Form.php");
if(Form::isValid("login", false)) {
    if(isValidUser($_POST["Email"], $_POST["Password"])) {
        Form::clearValues("login");
        header("Location: profile.php");
    }
    else {
        Form::setError("login", "Error: Invalid Email Address / Password");
        header("Location: login.php");
    }
}
else
    header("Location: login.php");
');?>
    </code></pre>
</div>
<p>The isValid method has a second, optional parameter that controls whether or not the form's submitted data is cleared from the PHP session if the form validates without errors. In the example above, false is passed allowing us to authenticate the potential user with the fictional isValidUser function. If the user's credentials are valid, the session data is cleared manually with the clearValues method, and we redirect the user to their profile page. If invalid credentials were supplied, we use the setError method to manually set a custom error message and redirect back to the login form so the user can resubmit.</p>
<p>TODO</p>
        </div>
        <div class="col-md-3">
          <div id="sidenav">
        </div>
        
      </div>
    </div>

<footer class="bs-docs-footer" role="contentinfo">
  <div class="container">
    <div class="bs-docs-social">
    If you like php-bootstrap-form:
    <ul class="bs-docs-social-buttons">
        <li>
            <iframe class="github-btn"
                    src="http://ghbtns.com/github-btn.html?user=avbdr&repo=php-bootstrap-form&type=watch&count=true"
                    width="100" height="20" title="Star on GitHub"></iframe>
        </li>
        <li>
            <iframe class="github-btn"
                    src="http://ghbtns.com/github-btn.html?user=avbdr&repo=php-bootstrap-form&type=fork&count=true"
                    width="102" height="20" title="Fork on GitHub"></iframe>
        </li>
        <li>
            <iframe class="github-btn" src="http://ghbtns.com/github-btn.html?user=avbdr&type=follow&count=true"
                    width="175" height="20" title="Follow on GitHub"></iframe>
        </li>
    </ul>
</div>

    <p>Design were developed by <a href="https://github.com/wenzhixin" target="_blank">@wenzhixin</a>.</p>
    <p>Maintained by <a href="https://github.com/avbdr" target="_blank">@avbdr</a> with a support of <a href='http://smarttechdo.com'>Smart Systems</a></p>
    <p>Original author <a href='https://github.com/ajporterfield' target='_blank'>@ajporterfield</a> (2009-2015)<p>
    <p>Code licensed under <a href="https://github.com/avbdr/php-bootstrap-form/blob/master/LICENSE" target="_blank">MIT</a>, documentation under <a href="http://creativecommons.org/licenses/by/3.0/">CC BY 3.0</a>.</p>
    <ul class="bs-docs-footer-links muted">
      <li>Currently v3.99.1</li>
      <li>&middot;</li>
      <li><a href="https://github.com/avbdr/php-bootstrap-form">GitHub</a></li>
      <li>&middot;</li>
      <li><a href="https://github.com/avbdr/php-bootstrap-form/issues">Issues</a></li>
      <li>&middot;</li>
      <li><a href="https://github.com/avbdr/php-bootstrap-form/releases">Releases</a></li>
      <li>&middot;</li>
      <li><a href="mailto:alex@smarttechdo.com">Contact</a></li>
    </ul>
  </div>
</footer>
<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<script src="../assets/js/sidenav.js"></script>
<script src="../assets/js/docs.min.js"></script>

<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
<script src="../ie10-viewport-bug-workaround.js"></script>
  </body>
</html>
