<?php
namespace Silverstreet;

use GuzzleHttp\Psr7\Uri;
use Laravie\Codex\Request as BaseRequest;

abstract class Request extends BaseRequest
{
    /**
     * Get API Body.
     *
     * @return array
     */
    protected function getApiBody()
    {
        return [
            'username' => $this->client->getApiUsername(),
            'password' => $this->client->getApiPassword(),
        ];
    }
}
