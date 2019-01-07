 <?php

 class Subject
 {
     /**
      * @return float|int
      * @notice 因為物件與 NumberProvider的耦合，使得我們無法測試return 回去的演算式是否正確
      * @notice square = 平方
      */
     public function getSquare($a, $b)
     {
        $method = new NumberProvider();
        return $method->response() + $method->response();
     }
 }

 class NumberProvider
 {
     public function response()
     {
        return 1;
     }
 }