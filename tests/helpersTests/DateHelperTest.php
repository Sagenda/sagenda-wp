<?php namespace Sagenda\Tests\HelpersTests;
use Sagenda\Helpers\UrlHelper;
use PHPUnit_Framework_TestCase;
require_once(dirname(dirname(__DIR__)) . '/helpers/UrlHelper.php');

class UrlHelperTest extends PHPUnit_Framework_TestCase
{

    public function testGetQueryOneQuery()
    {
        $output = UrlHelper::getQuery("http://www.sagenda.com/wp-admin/test/mypage.html?test=coucou");
        $this->assertContains ("test=coucou&", $output);
    }

    public function testGetQueryTwoQuery()
    {
        $output = UrlHelper::getQuery("http://www.sagenda.com/wp-admin/test/mypage.html?test=coucou&id=3");
        $this->assertContains ("test=coucou&id=3&", $output);
    }
}
