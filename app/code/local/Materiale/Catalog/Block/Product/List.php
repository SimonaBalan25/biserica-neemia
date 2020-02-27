<?php
/**
 * Product list
 *
 * @category   Mage
 * @package    Materiale_Catalog
 * @author     Biserica Neemia
 */
class Materiale_Catalog_Block_Product_List extends Mage_Catalog_Block_Product_List
{
    protected function getDefaultDirection() {
    	return 'desc';
    }
}