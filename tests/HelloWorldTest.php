
<?php
  // Setup: $ php composer.phar require facebook/webdriver
 
  require_once('vendor/autoload.php');
  use Facebook\WebDriver\Remote\RemoteWebDriver;
  use Facebook\WebDriver\WebDriverBy;
 
  $web_driver = RemoteWebDriver::create(
    "http://pubinator:580f062b-af5a-4982-85dc-4619f66a2987@localhost:4445/wd/hub",
    array("platform"=>"Windows 7", "browserName"=>"chrome", "version"=>"60")
  );
  $web_driver->get("http://127.0.0.1:3000/hello.html");
 
  /*
    Test actions here...
  */
 
  $web_driver->quit();
?>