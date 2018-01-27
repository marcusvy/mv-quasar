<?php

namespace Core\I18n;

use Zend\I18n\Translator\Resources;
use Zend\I18n\Translator\Translator;
use Interop\Http\ServerMiddleware\DelegateInterface;
use Interop\Http\ServerMiddleware\MiddlewareInterface;
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
    public function process(ServerRequestInterface $request, DelegateInterface $delegate)
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
        return $delegate->process($request);
    }
}
