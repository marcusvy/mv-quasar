<?php

namespace Core\Mail;

use Zend\Mail\Message;
use Zend\Mail\Transport\Smtp;
use Zend\Mail\Transport\SmtpOptions;
use Zend\Mail\Exception;

/**
 * Class MailService
 *
 * Easy send a e-mail with configuration on global 'mail' configuration.
 *
 * @example
 *
 * // Get the message from Container Manager
 * $message = $container->get(Core\Mail\MailServiceInterface::class);
 *
 * // Write the message from write() method
 * $message->write()
 *          ->setFrom('test@domain.com.br')
 *          ->addTo($email, $name)
 *          ->setSubject($subject)
 *          ->setEncoding('UTF-8')
 *          ->setBody($message)
 *          ->getHeaders()->addHeaderLine('Content-Type', 'text/html');
 *
 * // Send with the send method
 * $message->send();
 *
 * **Observation**
 * *setEncoding* and *getHeaders* are not provided the default options are imported from default config file:
 *
 * @package Core\Mail
 */
class MailService implements MailServiceInterface
{

    const CONFIG_ENABLED = 'enabled';
    const CONFIG_TRANSPORT = 'transport';
    const CONFIG_OPTIONS = 'options';
    const CONFIG_OPTIONS_ENCODING = 'encoding';
    const CONFIG_OPTIONS_HEADERS = 'headers';


    /** @var array */
    private $options;

    /** @var Message */
    private $message;

    /** @var Smtp */
    private $transport;

    /** @var Exception\RuntimeException */
    private $error;

    /** @var bool */
    private $enabled = false;

    public function __construct(array $config)
    {
        $this->setMessage(new Message());
        $this->setTransport(new Smtp());
        $this->setEnabled($config[self::CONFIG_ENABLED]);
        $this->options = $config[self::CONFIG_OPTIONS];
        $this->transport->setOptions(new SmtpOptions($this->options));
    }

    /**
     * Return the Message object to write the e-mail message
     * @return Message
     */
    public function write(): Message
    {
        $message = $this->getMessage();
        $message->setFrom($this->options['connection_config']['username']);
        return $message;
    }

    /**
     * @return bool
     */
    public function send(): bool
    {
        $this->checkDefaults();
        try {
            $this->transport->send($this->message);
        } catch (Exception\RuntimeException $e) {
            $this->setError($e);
            return false;
        }
        return true;
    }

    /**
     * Check for default config parameters
     * @return MailServiceInterface
     */
    public function checkDefaults()
    {
        if (isset($this->options[self::CONFIG_OPTIONS_ENCODING])) {
            $this->getMessage()->setEncoding($this->options[self::CONFIG_OPTIONS_ENCODING]);
        }
        $headers = isset($this->options[self::CONFIG_OPTIONS_HEADERS])
            ? $this->options[self::CONFIG_OPTIONS_HEADERS]
            : null;
        if (!is_null($headers) && !empty($headers)) {
            $this->getMessage()->getHeaders()->addHeaders($headers);
        }
        return $this;
    }

    /**
     * @return Message
     */
    public function getMessage(): Message
    {
        return $this->message;
    }

    /**
     * @param Message $message
     * @return MailService
     */
    public function setMessage(Message $message): MailService
    {
        $this->message = $message;
        return $this;
    }

    /**
     * @return Smtp
     */
    public function getTransport(): Smtp
    {
        return $this->transport;
    }

    /**
     * @param Smtp $transport
     * @return MailService
     */
    public function setTransport(Smtp $transport): MailService
    {
        $this->transport = $transport;
        return $this;
    }

    /**
     * @return Exception\RuntimeException
     */
    public function getError(): Exception\RuntimeException
    {
        return $this->error;
    }

    /**
     * @param Exception\RuntimeException $error
     * @return MailService
     */
    public function setError($error): MailService
    {
        $this->error = $error;
        return $this;
    }

    /**
     * @return bool
     */
    public function isEnabled(): bool
    {
        return $this->enabled;
    }

    /**
     * @param bool $enabled
     * @return MailService
     */
    public function setEnabled(bool $enabled): MailService
    {
        $this->enabled = $enabled;
        return $this;
    }


}
