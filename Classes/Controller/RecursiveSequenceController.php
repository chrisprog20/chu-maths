<?php
declare(strict_types=1);

namespace Chu\ChuMaths\Controller;

use Psr\Http\Message\ResponseInterface;
use TYPO3\CMS\Extbase\Mvc\Controller\ActionController;

/**
 * @author Christian Huppert <chr.huppert@yahoo.de>
 * @package chu_maths
 */
class RecursiveSequenceController extends ActionController
{
    /**
     * @return ResponseInterface
     */
    public function indexAction(): ResponseInterface
    {
        $this->view->assign('greeting', 'Hello World!');

        return $this->htmlResponse();
    }
}