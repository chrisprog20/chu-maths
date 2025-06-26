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
            $dateObject = new DateTime($dateOfBirth);
            $nextPrimeYears =  $this->primeService->getNextPrimeYears($dateObject);

            $primeAges = $this->primeService->getPrimesBetween(0, 150);

            $result = [];
            $year = (int)$dateObject->format('Y');
            $month = (int)$dateObject->format('m');
            $day = (int)$dateObject->format('d');

            foreach($primeAges as $primeAge) {
                $result[$primeAge] = clone ($dateObject->setDate($year + $primeAge, $month, $day));
            }
        }

        $this->view->assignMultiple([
            'dateOfBirth' =>  $dateOfBirth,
            'result' => $result
        ]);

        return $this->htmlResponse();
    }
}
