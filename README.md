### PHP Bootstrap Form helper
Project is fork of PFBC/PHP Form Builder Class (http://code.google.com/p/php-form-builder-class/). The main differences of the original branch and a fork are:

Documentation: http://smarttechdo.com/~avb/pfbc/

Demo: at http://smarttechdo.com/~avb/pfbc/example.php

Demo Source:  https://github.com/avbdr/php-bootstrap-form/blob/master/example.php

Bootstrap4 Demo: at http://smarttechdo.com/~avb/pfbc/example.php?v=4

Bootstrap4 Source: at http://smarttechdo.com/~avb/pfbc/example.php

Features:

1. Bootstrap 3 and 4 support
2. Added new simple API. Old API is still supported
3. Added 'shared' element property to share 1 row between multiple elements in SideBySide View
4. View class renamed to FormView class
5. Added Form::renderArray() helper function
6. Fixed prepend and append properties handling
7. Added icon property to buttons

New API:
```php
Form::open ("login");
echo '<legend>Login</legend>';
Form::Hidden ("id");
Form::Email ("Email Address:", "email", array("required" => 1));
Form::Password ("Password:", "password", array("required" => 1));
Form::Checkbox ("", "remember", array("1" => "Remember me"));
Form::Button ("Login");
Form::Button ("Cancel", "button", array("onclick" => "history.go(-1);"));
Form::close ();
```

Old API:
```php
$form = new Form("login");
$form->addElement(new Element_HTML('<legend>Login</legend>'));
$form->addElement(new Element_Hidden("form", "login"));
$form->addElement(new Element_Email("Email Address:", "Email", array("required" => 1)));
$form->addElement(new Element_Password("Password:", "Password", array("required" => 1)));
$form->addElement(new Element_Checkbox("", "Remember", array("1" => "Remember me")));
$form->addElement(new Element_Button("Login"));
$form->addElement(new Element_Button("Cancel", "button", array("onclick" => "history.go(-1);")));
$form->render();
```


