<?php

namespace App\Controller;

use App\Entity\Sizes;
use App\Service\Logging;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Service\CheckSize;
use Psr\Log\LoggerInterface;

class CheckPackageSizeController extends AbstractController
{

    /**
     * @Route("/check/package/size/{x},{y},{z}", name="app_check_package_size")
     */
    public function index($x, $y, $z): Response
    {
        $entitySize = new Sizes();
        $entitySize->setX($x);
        $entitySize->setY($y);
        $entitySize->setZ($z);

        $serviceCheck = new CheckSize();
        $result = $serviceCheck->check($entitySize);

        return $this->json([
            'x' => $x,
            'y' => $y,
            'z' => $z,
            'Result' => $result,
        ]);
    }
}
