<?php

namespace Midia\Action;

use Core\Action\AbstractRestAction;

/**
 * Class AbstractMidiaRestAction
 *
 * Enable Rest to work with files e manager in one module
 * @package Midia\Action
 */
abstract class AbstractMidiaRestAction
    extends AbstractRestAction
{

    protected $fileRequest = true;
    protected $fileRequestNames = ['file'];

}
