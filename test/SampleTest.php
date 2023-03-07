
<?php

use Facebook\WebDriver\Remote\DesiredCapabilities;
use Facebook\WebDriver\Remote\RemoteWebDriver;
use PHPUnit\Framework\TestCase;
use Facebook\WebDriver\WebDriverExpectedCondition;
use Facebook\WebDriver\WebDriverBy;

class SampleTest extends TestCase
{
    
    public function test()
    {
        // selenium
        #$host = 'http://host.docker.internal:4444/wd/hub'; #Docker for Desktop のみ実行可能なHost
        $host = 'http://172.17.0.1:4444/wd/hub'; #Github Actions上で実行可能なHost
        // chrome ドライバーの起動
        $driver = RemoteWebDriver::create($host,DesiredCapabilities::chrome());
        // 指定URLへ遷移 (Google)
        $driver->get('http://php/src/hello.php');
        // 検索Box
        //$element = $driver->findElement(WebDriverBy::tagName('div'));
        // 検索Boxにキーワードを入力して
        // $element->sendKeys('セレニウムで自動操作');
        // 検索実行
        // $element->submit();

        // 検索結果画面のタイトルが 'セレニウムで自動操作 - Google 検索' になるまで10秒間待機する
        // $driver->wait(10)->until(
        //     WebDriverExpectedCondition::titleIs('セレニウムで自動操作 - Google 検索')
        // );

        //assert
        //$this->assertEquals('セレニウムで自動操作 - Google 検索', $driver->getTitle());
        $tag = $driver->findElement(WebDriverBy::tagName('div'));
        $this->assertEquals("Hello,PHP", $tag->getText());

        // ブラウザを閉じる
        $driver->close();
    }
}
