<?php

namespace Tests;

use Facebook\WebDriver\Chrome\ChromeOptions;
use Facebook\WebDriver\Remote\DesiredCapabilities;
use Facebook\WebDriver\Remote\RemoteWebDriver;
use Laravel\Dusk\TestCase as BaseTestCase;
use Facebook\WebDriver\WebDriverBy;
use Facebook\WebDriver\WebDriverDimension;

abstract class DuskTestCase extends BaseTestCase
{
    use CreatesApplication;

    /**
     * Prepare for Dusk test execution.
     *
     * @beforeClass
     * @return void
     */
    public static function prepare()
    {
        if (! static::runningInSail()) {
            static::startChromeDriver();
        }
    }

    /**
     * Create the RemoteWebDriver instance.
     *
     * @return \Facebook\WebDriver\Remote\RemoteWebDriver
     */
    protected function driver()
    {
        $options = (new ChromeOptions)->addArguments([
            '--disable-gpu',     // windows OSにのみ適用可能
            '--headless',      
            '--window-size=1920,1080',
            '--no-sandbox'      // osセキュリティモデルをバイパスします。
        ]);

        return RemoteWebDriver::create(
            $_ENV['DUSK_DRIVER_URL'] ?? 'http://localhost:9515',
            DesiredCapabilities::chrome()->setCapability(
                ChromeOptions::CAPABILITY, $options
            )
        );
    }
    
    /**
     * Caputure Image for Long page.
     *
     * @return \Facebook\WebDriver\Remote\RemoteWebDriver
     */
    protected function captureImage($browser, $filenm)
    {
        $body = $browser->driver->findElement(WebDriverBy::tagName('body'));
        if (!empty($body)) {
            $currentSize = $body->getSize();
            $size = new WebDriverDimension($currentSize->getWidth(), $currentSize->getHeight());
            $browser->driver->manage()->window()->setSize($size);
        }
        $browser->screenshot($filenm);
//        $browser->screenshot($filenm."_001");
//
//        $browser->script('window.scrollTo(0, 500);');
//        $browser->screenshot($filenm.'_002');
    }
}
