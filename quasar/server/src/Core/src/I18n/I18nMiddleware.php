<?php

namespace Core\I18n;

use Zend\I18n\Translator\Resources;
use Zend\I18n\Translator\Translator;
use Psr\Http\Server\RequestHandlerInterface as DelegateInterface;
use Psr\Http\Server\MiddlewareInterface;
use Psr\Http\Message\ServerRequestInterface;
use Zend\Validator\AbstractValidator;

class I18nMiddleware implements MiddlewareInterface
{
    private $config = [];

    public function __construct($config = [])
    {
        $this->config = $config;
    }

    /**
     * {@inheritDoc}
     */
    public function process(ServerRequestInterface $request, DelegateInterface $delegate) : \Psr\Http\Message\ResponseInterface
    {
        $translator = new I18nTranslator();

        if (isset($this->config['locale'])) {
            $locale = \Locale::canonicalize($this->config['locale']);

            if (!empty($locale)) {
                \Locale::setDefault($locale);
//                $translator->setLocale(\Locale::canonicalize($locale));
            }
        }

        $translator->addTranslationFilePattern(
            'phpArray',
            Resources::getBasePath(),
            Resources::getPatternForValidator()
        );

        $translator->addTranslationFilePattern(
            'phpArray',
            Resources::getBasePath(),
            Resources::getPatternForCaptcha()
        );


        AbstractValidator::setDefaultTranslator($translator);

        // Translate Validators
        return $delegate->handle($request);
    }
}
