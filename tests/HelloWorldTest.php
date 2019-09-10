<?php

require_once 'vendor/autoload.php';
define('SAUCE_HOST','pubinator:580f062b-af5a-4982-85dc-4619f66a2987@ondemand.saucelabs.com');

class WebTest extends PHPUnit_Extensions_Selenium2TestCase {
	
    protected $start_url = '';

    public static $browsers = array(
        array(
            'browserName' => 'firefox',
            'host' => SAUCE_HOST,
            'port' => 80,
            'desiredCapabilities' => array(
                'version' => '69.0',
                'platform'=> 'Windows 10'
            )
        )
    );


    protected function setUp()
    {
		$html_path = getcwd().'/';
		$base_url = 'file:///'.$html_path;
        $this->setBrowserUrl('http://localhost:8080/');
    }

    public function testTitle()
    {
		$start_url = 'http://localhost:8080/hello.html';
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