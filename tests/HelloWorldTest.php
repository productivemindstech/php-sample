<?php

require_once 'vendor/autoload.php';
/*define('SAUCE_HOST','pubinator:580f062b-af5a-4982-85dc-4619f66a2987@ondemand.saucelabs.com');*/

class WebTest extends PHPUnit_Extensions_Selenium2TestCase {
	
    protected $start_url = '';

   /* public static $browsers = array(
        array(
            'browserName' => 'firefox',
            'host' => SAUCE_HOST,
            'port' => 80,
            'desiredCapabilities' => array(
                'version' => '69.0',
                'platform'=> 'Windows 10'
            )
        )
    );*/

	public static $browsers = RemoteWebDriver::create(
    "https://pubinator:580f062b-af5a-4982-85dc-4619f66a2987@ondemand.saucelabs.com:443/wd/hub",
    array("platform"=>"Windows 7", "browserName"=>"chrome", "version"=>"50")
  );

    protected function setUp()
    {
		$html_path = getcwd().'/';
		$base_url = 'file:///'.$html_path;
        $this->setBrowserUrl('http://localhost:8080/');
    }

    public function testTitle()
    {
		$start_url = 'hello.html';
		try {
        $this->url($start_url);
		}catch(Exception $e) {
		echo 'Message: ' .$e->getMessage();
		}
		$currentURL = $this->url();
		echo $currentURL;
        $this->assertContains("PHP Hello World Test", $this->title());		
    }
}
?>


<?php /*
require_once('vendor/autoload.php');
use Facebook\WebDriver\Remote\RemoteWebDriver;
use Facebook\WebDriver\WebDriverBy;



class HelloWorldTest extends PHPUnit_Framework_TestCase {
    public function testGreeting() {
        $greeting = "Hello World";
        $requiredGreeting = "Hello World";

        $this->assertEquals($greeting, $requiredGreeting);
    }

    public function testSeleniumSauce() {
//        $caps = Selenium::WebDriver::Remote::Capabilities.firefox([
//          'tunnel-identifier' => env('TRAVIS_JOB_NUMBER')
//        ]);
//        $driver = Selenium::WebDriver.for(:remote, json_encode('{
//                    url: "http://username:access_key@ondemand.saucelabs.com/wd/hub",
//          desired_capabilities: "' . $caps . '"
//        }'));

//        print_r($caps, true);


        $web_driver = Remote\RemoteWebDriver::create(
            "https://pubinator:580f062b-af5a-4982-85dc-4619f66a2987@ondemand.saucelabs.com:443/wd/hub",
            array("platform"=>"Windows 7", "browserName"=>"chrome", "version"=>"40")
        );
        $web_driver->get("https://saucelabs.com/test/guinea-pig");

        //Test actions here...


        $web_driver->quit();


        $this->assertEquals(false, true);
    }
} */
