<?php

namespace App\Service;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Sizes;
use Psr\Log\LoggerInterface;
class CheckSize
{
    const x = 19;
    const y = 38;
    const z = 64;

//    private $logger;
//
//    /**
//     *
//     */
//    public function __construct(LoggerInterface $logger){
//        $this->logger = $logger;
//    }

    /**
     * Sprawdzam wymiary paczki
     * @param Sizes $sizes
     * @return string
     */
    public function check(Sizes $sizes): string
    {
        $arrWithSizes = [$sizes->getX(), $sizes->getY(), $sizes->getZ()];
        //posortowanie tablicy aby porównać wymiary
        sort($arrWithSizes);

        $patternArray = [CheckSize::x, CheckSize::y, CheckSize::z];
        // posortowanie tablicy wzorcowej, gdy dany były podane w kolejności nie rosnącej
        sort($patternArray);

        $comment = 'Package size is correct';
        for($i=0; $i<count($patternArray); $i++){
            if($arrWithSizes[$i] > $patternArray[$i]){
                $comment = 'Size '.($i+1).' does not fit';
                break;
            }
        }
//        $logger->info($comment,$arrWithSizes);

        return $comment;
    }
}