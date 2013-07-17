<?php
namespace Flaviozantut\Avatars;

use Guzzle\Http\Client;
/**
 * Avatars
 */
class Avatars{
    /**
     * avatars.io url
     */
    const AVATARS_IO = 'http://avatars.io';
    /**
     * Guzzle client
     */
    private $client;
    /**
     * client id to get uplouded avatar
     */
    private $clientId;
    /**
     * secret key to auth on avatars.oi
     */
    private $secretKey;
    /**
     * Constructor class
     *
     * @param string $clientId
     * @param string $secretKey
     */
    public function __construct($clientId = '', $secretKey = '')
    {
        $this->setClientId($clientId);
        $this->setSecretKey($secretKey);
    }
    /**
     * Get client id
     *
     * @return string $clientId
     */
    public function getClientId()
    {
        return $this->clientId;
    }
    /**
     * Get secret key
     *
     * @return string $secretKey
     */
    public function getSecretKey()
    {
        return $this->secretKey;
    }
    /**
     * Set client id
     *
     * @param string $value
     */
    public function setClientId($value)
    {
        $this->clientId = $value;
    }
    /**
     * Set secret key
     *
     * @param string $value
     */
    public function setSecretKey($value)
    {
        $this->secretKey = $value;
    }
    /**
     * Get avatar url
     *
     *
     * @param string $user user key
     * @param string $service service to get avatar  suported: auto, twitter, facebook, instagram, gravatar
     * @param string $size suported: default, small, medium, large
     * @param string $test
     *
     * @return string avatar url
     */
    public function url($user, $service = '', $size = 'default')
    {

        if (!$service) {
            $service = $this->getClientId();
        } elseif(!preg_match("/twitter|facebook|instagram|gravatar/", $service)) {
             $service = 'auto';
        }

        if(!preg_match("/small|medium|large/", $size)) {
                $size = 'default';
        }
        return self::AVATARS_IO . "/{$service}/{$user}?size={$size}";
    }
    /**
     * Upload avatar
     *
     * @param string $file base64 encoded file
     * @param string $user user id
     *
     * @return string avatar url
     */
    public function upload($file,$user)
    {
        if (base64_decode($file, true)) {
            $file = base64_decode($file);
        } else {
            throw new \Exception("Invalid base64 encode file");
        }

        $client = new Client(self::AVATARS_IO.'/{version}/token',array(
            'version' =>  'v1',
        ));
        $auth = array(
            'x-client_id'  => $this->getClientId(),
            'Authorization' => "OAuth {$this->getsecretKey()}",
        );
        $response = $client->post(
            null,
            $auth,
            array(
                'data' => array(
                    'filename' => md5($file),
                    'md5' => md5($file),
                    'size' => strlen(base64_decode($file)),
                    'path' => $user
                )
            )
        )->send()->json();
        if($response['error']) {
            throw new \Exception($response['error']);
        } elseif(isset($response['meta'])) {
            throw new \Exception("Auth error");
        } elseif (!isset($response['data']['upload_info'])) {
            return $response['data']['url'];
        }
        $uploadInfo = $response['data']['upload_info'];

        $client->put(
            $uploadInfo['upload_url'],
            array(
                'Authorization' => $uploadInfo['signature'],
                'Date' => $uploadInfo['date'],
                'Content-Type'=> $uploadInfo['content_type'],
                'x-amz-acl'=> 'public-read'
            ),
            $file
        )->send();

        $complete = $client->post($response['data']['id'] . '/complete',$auth )->send()->json();
        return $complete['data']['data'];
    }
}