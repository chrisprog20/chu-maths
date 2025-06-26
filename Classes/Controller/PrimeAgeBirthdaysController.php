<?php
declare(strict_types=1);

namespace Chu\ChuMaths\Controller;

use Chu\ChuMaths\Service\Prime\PrimeService;
use DateInterval;
use DateTime;
use Psr\Http\Message\ResponseInterface;
use TYPO3\CMS\Extbase\Mvc\Controller\ActionController;

/**
 * @author Christian Huppert <chr.huppert@yahoo.de>
 * @package chu_maths
 */
class PrimeAgeBirthdaysController extends ActionController
{
    /**
     * @param PrimeService $primeService
     */
    public function __construct(private readonly PrimeService $primeService)
    {
    }

    /**
     * indexAction.
     *
     * @param string|null $dateOfBirth
     * @return ResponseInterface
     */
    public function indexAction(string $dateOfBirth = null): ResponseInterface
    {
        $result = [];
        if ($dateOfBirth !== null) {
            $dateObject = clone (new DateTime($dateOfBirth));
            $nextPrimeYears =  $this->primeService->getNextPrimeYears($dateObject);

            $primeAges = $this->primeService->getPrimesBetween(0, 150);

            debug($dateObject, 'dateObject');
            debug($dateObject->add(new DateInterval('P2Y')), 'dateObject + 2 years');
            $result = [];
            foreach($primeAges as $primeAge) {
                debug('P' . $primeAge . 'Y');
                $result[$primeAge] = $dateObject->add(new DateInterval('P' . $primeAge . 'Y'));
            }
        }

        debug($result);

        $this->view->assignMultiple([
            'dateOfBirth' =>  $dateOfBirth,
            'result' => $result
        ]);

        return $this->htmlResponse();
    }
}
