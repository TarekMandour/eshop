<?php
#App\Plugins\Payment\Cash\Controllers\FrontController.php
namespace App\Plugins\Payment\Cash\Controllers;

use EShop\Core\Front\Controllers\ShopCartController;
use App\Http\Controllers\RootFrontController;
class FrontController extends RootFrontController
{
    /**
     * Process order
     *
     * @return  [type]  [return description]
     */
    public function processOrder(){
        
        return (new ShopCartController)->completeOrder();
    }
}
