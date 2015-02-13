<?php
/*************************************************************************************/
/*      This file is part of the module ProductOfflineWithStock                      */
/*                                                                                   */
/*      Copyright (c) OpenStudio                                                     */
/*      email : dev@thelia.net                                                       */
/*      web : http://www.thelia.net                                                  */
/*                                                                                   */
/*      For the full copyright and license information, please view the LICENSE.txt  */
/*      file that was distributed with this source code.                             */
/*************************************************************************************/

namespace ProductOfflineWithStock\Loop;

use Propel\Runtime\ActiveQuery\Criteria;
use Thelia\Core\Template\Loop\Product;
use Thelia\Model\ProductQuery;

/**
 * Class ProductOfflineWithStockLoop
 * @package ProductOfflineWithStock\Loop
 * @author Julien Citerne <jciterne@openstudio.fr>
 * @author Gilles Bourgeat <gbourgeat@openstudio.fr>
 */
class ProductOfflineWithStockLoop extends Product
{
    /**
     * this method returns a Propel ModelCriteria
     *
     * @return \Propel\Runtime\ActiveQuery\ModelCriteria
     */
    public function buildModelCriteria()
    {
        /** @var ProductQuery $search */
        $search = parent::buildModelCriteria();

        $search->useProductSaleElementsQuery("join_pse_stock", Criteria::INNER_JOIN)
            ->filterByQuantity(0, Criteria::GREATER_THAN)
        ->endUse();

        return $search;
    }
}
