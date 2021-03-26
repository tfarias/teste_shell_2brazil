<?php

    function getAmount($money)
    {
        try{
            $cleanString = preg_replace('/([^0-9\.,])/i', '', $money);
            $onlyNumbersString = preg_replace('/([^0-9])/i', '', $money);

            $separatorsCountToBeErased = strlen($cleanString) - strlen($onlyNumbersString) - 1;

            $stringWithCommaOrDot = preg_replace('/([,\.])/', '', $cleanString, $separatorsCountToBeErased);
            $removedThousendSeparator = preg_replace('/(\.|,)(?=[0-9]{3,}$)/', '',  $stringWithCommaOrDot);

            return (float) str_replace(',', '.', $removedThousendSeparator);
        }catch (Exception $e){
            return null;
        }
    }


    function calculateDiscount($price, $quantity ){
        $total = $price*$quantity;

        if(($quantity>= 5 && $quantity <= 9) && $total > 500){
            return getAmount($total*0.15);
        }
        return 0;
}
