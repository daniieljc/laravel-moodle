<?php

namespace Daniieljc\LaravelMoodle;

/**
 * Class Connection
 * @package Daniieljc\LaravelMoodle
 */
class Connection
{
    /**
     * @var string
     */
    protected $url;

    /**
     * @var string
     */
    protected $token;

    /**
     * Connection constructor.
     * @param string $url
     * @param string $token
     */
    public function __construct($url, $token)
    {
        $this->setUrl($url);
        $this->token = $token;
    }

    /**
     * Set URL
     * @param string $url
     */
    protected function setUrl($url)
    {
        $this->url = trim($url, '/');
    }

    /**
     * Get URL
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * Get token
     * @return string
     */
    public function getToken()
    {
        return $this->token;
    }
}
