<?php
use Guzzle\Http\Client;

use Flaviozantut\Avatars\Avatars;

class AvatarsTest extends PHPUnit_Framework_TestCase {

    protected function setUp()
    {
        $this->avatars = new Avatars('50f73d586e2931274800028d', '932618cc7924d56e3d75484ff91968bf0a1952511b3f741b1f600f0177479115');
    }

    public function testUrl()
    {
        $url = $this->avatars->url('username', 'auto');
        $this->assertEquals('http://avatars.io/auto/username?size=default', $url);
    }

    public function testUpload()
    {

        $file = base64_encode(file_get_contents(dirname(__FILE__) . '/fixtures/avatar.jpg'));
        $this->assertEquals(
            "http://avatars.io/{$this->avatars->getClientId()}/flaviozantut@gmail.com",
            $this->avatars->upload($file, 'flaviozantut@gmail.com')
        );
    }
}