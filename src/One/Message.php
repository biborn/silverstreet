<?php

namespace Silverstreet\One;

use Silverstreet\Request;
use Laravie\Codex\Contracts\Response;
use Laravie\Codex\Support\MultipartRequest;

class Message extends Request
{
    use MultipartRequest;

    /**
     * Send SMS.
     *
     * @param  string  $body
     * @param  string  $destination
     * @param  string  $sender
     * @param  array  $optional
     *
     * @return \Laravie\Codex\Contracts\Response
     */
    public function text(string $body, string $destination, string $sender, array $optional = []): Response
    {
        $payload = array_merge(compact('body', 'destination', 'sender'), $optional);

        list($headers, $stream) = $this->prepareMultipartRequestPayloads(
            $this->mergeApiHeaders(['Content-Type' => 'multipart/form-data']),
            $this->mergeApiBody($payload),
            []
        );

        return $this->send('POST', 'send.php', $headers, $stream);
    }
}
