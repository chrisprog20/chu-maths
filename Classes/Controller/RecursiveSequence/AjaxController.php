<?php

declare(strict_types=1);

namespace Chu\ChuMaths\Controller\RecursiveSequence;

use Chu\ChuMaths\Domain\Service\SequenceService;
use Psr\Http\Message\ResponseInterface;
use TYPO3\CMS\Extbase\Mvc\Controller\ActionController;

/**
 * @author Christian Huppert <chr.huppert@yahoo.de>
 * @package chu_maths
 */
class AjaxController extends ActionController
{
    /**
     * @param SequenceService $sequenceService
     */
    public function __construct(private readonly SequenceService $sequenceService)
    {
    }

    /**
     * calculateAction.
     *
     * @return ResponseInterface
     */
    public function calculateAction(): ResponseInterface
    {
        $parsedBody = $this->request->getParsedBody();

        $a = $parsedBody['a'] ?? null;
        $b = $parsedBody['b'] ?? null;
        $iterations = $parsedBody['iterations'] ?? null;

        $values = [];
        if ($a !== null && $b !== null && $iterations !== null) {
            $values = $this->sequenceService->getValues((int)$a, (int)$b, (int)$iterations);
        }

        return $this->jsonResponse(
            json_encode([
                    'a' => $a,
                    'b' => $b,
                    'iterations' => $iterations,
                    'values' => $values
                ]
            )
        );
    }
}
