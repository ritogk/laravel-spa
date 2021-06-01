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
     * baseUrl
     *
     * @return void
     */
    protected function baseUrl()
    {
        // nginx = webサーバーコンテナのコンテナ名
        return 'http://nginx';
    }

    /**
     * Prepare for Dusk test execution.
     *
     * @beforeClass
     * @return void
     */
    public static function prepare(){}

    /**
     * Create the RemoteWebDriver instance.
     *
     * @return \Facebook\WebDriver\Remote\RemoteWebDriver
     */
    protected function driver()
    {
        return RemoteWebDriver::create(
            'http://selenium_chrome:4444/wd/hub', DesiredCapabilities::chrome()
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
    }
}
