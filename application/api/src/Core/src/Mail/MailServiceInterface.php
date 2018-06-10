<?php

namespace Core\Mail;

/**
 * Interface MailServiceInterface
 *
 * Easy send a e-mail with configuration on global 'mail' configuration.
 *
 * @example
 *
 *  1. Setup the e-mail configuration on 'mail.local.php' in config/autoload folder:
 *
 *  'mail' => [
 *      // Transport options
 *      'transport' => [
 *          'name'              => 'localhost',
 *          'host'              => 'smtp.domain.com',
 *          'connection_class'  => 'login',
 *          'connection_config' => [
 *              'username' => 'test@domain.com',
 *              'password' => '@password'
 *          ]
 *      ],
 *
 *      // Default settings
 *      'options' => [
 *          'encoding' => 'UTF-8',
 *          'headers' => [
 *              'Content-Type' => 'text/html'
 *          ]
 *      ]
 *  ],
 *
 *
 * 2. Get the service from container and configure
 *
 * // Get the message from Container Manager
 * $message = $container->get(Core\Mail\MailServiceInterface::class);
 *
 * // Write the message from write() method
 * $message->write()
 *          ->setFrom('test@domain.com')
 *          ->addTo($email, $name)
 *          ->setSubject($subject)
 *          ->setEncoding('UTF-8')
 *          ->setBody($message)
 *          ->getHeaders()->addHeaderLine('Content-Type', 'text/html');
 *
 * // Send with the send method
 * $message->send();
 *
 * @package Core\Mail
 */
interface MailServiceInterface
{

    /**
     * Return the Message object to write the e-mail message.
     * @return mixed
     */
    public function write();

    /**
     * Send the e-mail. Return true if the operation have no errors.
     * @return bool
     */
    public function send(): bool;


    /**
     * Return the error object if a error occur on the send method.
     * @return \Exception
     */
    public function getError();


    /**
     * Set the error object from send method.
     *
     * @param \Exception $error
     * @return MailServiceInterface
     */
    public function setError($error);

    /**
     * Check for default config parameters
     * @return MailServiceInterface
     */
    public function checkDefaults();


    /**
     * @return bool
     */
    public function isEnabled(): bool;

    /**
     * @param bool $enabled
     * @return MailService
     */
    public function setEnabled(bool $enabled): MailService;
}
