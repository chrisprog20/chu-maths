<?php
declare(strict_types=1);

namespace Chu\ChuMaths\Controller;

use Chu\ChuMaths\Domain\Service\SequenceService;
use Psr\Http\Message\ResponseInterface;
use TYPO3\CMS\Extbase\Mvc\Controller\ActionController;

/**
 * @author Christian Huppert <chr.huppert@yahoo.de>
 * @package chu_maths
 */
class RecursiveSequenceController extends ActionController
{
    /**
     * @param SequenceService $sequenceService
     */
    public function __construct(private readonly SequenceService $sequenceService)
    {
    }

    /**
     * indexAction.
     *
     * @param int|null $a first start value
     * @param int|null $b second start value
     * @param int|null $iterations number of iterations
     *
     * @return ResponseInterface
     */
    public function indexAction(?int $a = null, ?int $b = null, int $iterations = null): ResponseInterface
    {
        $values = [];
        if ($a !== null && $b !== null && $iterations !== null) {
            $values = $this->sequenceService->getValues($a, $b, $iterations);
        }

        $this->view->assignMultiple([
                'a' => $a,
                'b' => $b,
                'iterations' => $iterations,
                'values' => $values
            ]
        );

        return $this->htmlResponse();
    }
}