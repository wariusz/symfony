<?php

namespace App\Tests;

use App\Controller\CheckPackageSizeController;
use PHPUnit\Framework\TestCase;


class CheckSizeTest extends TestCase
{

    public function testSomething(): void
    {
        $result = json_decode('{ "x":"20","y":"65","z":"33","Result":"Size 1 does not fit"}');
        $check = new CheckPackageSizeController();
        $toCheck = $check->index(20,65,33);

        $test = true;
        foreach($result as $key => $row){
            if($row != $toCheck[$key]){
                $test = false;
                break;
            }
        }
        $this->assertTrue($test);
    }
}
