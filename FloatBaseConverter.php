<?php

class FloatBaseConverter
{
    /**
     * @param float $floatNumber
     * @return float
     * @throws Exception
     */
    public static function convertToBinaryBetweenZeroToOneValue(float $floatNumber): float
    {
        $baseResult = '';

        if ($floatNumber === 0.0 && $floatNumber < 1) {
            throw new Exception('Invalid float number. Need to be a float number between 0 and 1');
        }

        while(true) {
            $floatNumber = floatval($floatNumber) * 2;
            if($floatNumber == 1) {
                $baseResult .= '1';
                break;
            }
            if ($floatNumber > 1) {
                $floatNumber = floatval($floatNumber) - 1;
                $baseResult .= '1';
            } else {
                $baseResult .= '0';
            }
        }

        $baseResult = '0.' . $baseResult;

        return $baseResult;
    }
}

print FloatBaseConverter::convertToBinaryBetweenZeroToOneValue(0.324);