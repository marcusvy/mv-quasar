<?php

namespace Core\Utils;


use Psr\Http\Message\ServerRequestInterface;
use Zend\Json\Json;
use Zend\Json\Exception\RuntimeException;

class RequestUtils
{

    const ERROR = 'QuasarCoreRequestHasError';
    const MESSAGE = 'message';

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
            $content = $request->getBody()->getContents();
            if (!empty($content)) {
                try {
                    $data = Json::decode($content, Json::TYPE_ARRAY);
                } catch (RuntimeException $e) {
                    $data[self::ERROR][self::MESSAGE] = $e->getMessage();
                }
            }
        }
        if ($contentType == 'application/x-www-form-urlencoded') {
            $data = $request->getQueryParams();
        }
        return $data;
    }

    /**
     * @param $data
     * @return bool
     */
    public static function check($data)
    {
        return isset($data[RequestUtils::ERROR]);
    }

    public static function getMessage($data){
        return (self::check($data)) ? $data[RequestUtils::ERROR][RequestUtils::MESSAGE] : '';
    }
}