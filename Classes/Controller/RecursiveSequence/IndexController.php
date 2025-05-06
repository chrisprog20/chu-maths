<?php

declare(strict_types=1);

namespace Chu\ChuMaths\Controller\RecursiveSequence;

use Psr\Http\Message\ResponseInterface;
use TYPO3\CMS\Extbase\Mvc\Controller\ActionController;

/**
 * IndexController.
 *
 * @author Christian Huppert <chr.huppert@yahoo.de>
 * @package chu_maths
 */
class IndexController extends ActionController
{
    /**
     * indexAction.
     *
     * @return ResponseInterface
     */
    public function indexAction(): ResponseInterface
    {
        return $this->htmlResponse();
    }
}
