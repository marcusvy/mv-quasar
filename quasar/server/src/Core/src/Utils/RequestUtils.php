<?php

namespace Core\Utils;


use Psr\Http\Message\ServerRequestInterface;
use Zend\Json\Json;

class RequestUtils
{

    /**
     * Extract information from $request and return the correct array based on content-type in request headers;
     * @param ServerRequestInterface $request
     * @return array|null|object
     */
    public static function extract(ServerRequestInterface $request)
    {
        $data = [];
        $ct = $request->getHeader('Content-Type');
        $contentType = array_shift($ct);

        if (preg_match('/^multipart\/form-data;/', $contentType)) {
            $data = $request->getParsedBody();
        }
        if ($contentType == 'application/json') {
            $data = Json::decode($request->getBody(), Json::TYPE_ARRAY);
        }
        if ($contentType == 'application/x-www-form-urlencoded') {
            $data = $request->getQueryParams();
        }
        return $data;
    }
}