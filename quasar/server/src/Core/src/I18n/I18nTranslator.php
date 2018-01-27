<?php
namespace Core\I18n;

use Zend\I18n\Translator\Translator;
use Zend\I18n\Translator\TranslatorInterface;
use Zend\Validator\Translator\TranslatorInterface as ValidatorTranslatorInterface;

class I18nTranslator
    extends Translator
    implements TranslatorInterface, ValidatorTranslatorInterface
{

}