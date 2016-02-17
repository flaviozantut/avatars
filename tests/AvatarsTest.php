<?php

use Flaviozantut\Avatars\Avatars;

class AvatarsTest extends PHPUnit_Framework_TestCase
{
    protected function setUp()
    {
        $this->avatars = new Avatars('50f73c59000100986a000010', '932618cc7924d56e3d75484ff91968bf0a1952511b3f741b1f600f0177479115');
    }

    public function testUrl()
    {
        $url = $this->avatars->url('user@mail.com', 'auto');
        $this->assertEquals('http://avatars.io/auto/user@mail.com?size=default', $url);
    }

    public function testUpload()
    {
        $file = base64_encode(file_get_contents(dirname(__FILE__).'/fixtures/avatar.jpg'));
        $this->assertEquals(
            "http://avatars.io/{$this->avatars->getClientId()}/user@mail.com",
            $this->avatars->upload($file, 'user@mail.com')
        );
    }
}
