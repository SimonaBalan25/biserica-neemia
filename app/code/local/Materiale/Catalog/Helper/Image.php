<?php

/**
 * Catalog image helper
 *
 * @author      Biserica Neemia
 */
class Materiale_Catalog_Helper_Image extends Mage_Catalog_Helper_Image
{
    protected $_imageWidth;

    /**
     * Schedule resize of the image
     * $width *or* $height can be null - in this case, lacking dimension will be calculated.
     *
     * @see Mage_Catalog_Model_Product_Image
     * @param int $width
     * @param int $height
     * @return Mage_Catalog_Helper_Image
     */
    public function resize($width, $height = null)
    {
    	/*** extend to icons ***/
    	$this->_imageWidth = $width;
    	/***********************/    	
    	
        $this->_getModel()->setWidth($width)->setHeight($height);
        $this->_scheduleResize = true;
        return $this;
    }

    public function __toString()
    {
    	/*** extend to icons ***/
    	$iconsPath = 'images/catalog/product/icons/materiale';
    	
    	$url = Mage::getDesign()->getSkinBaseUrl() . $iconsPath;
    	
    	switch (strtolower($this->_product->getAttributeText('format'))) {
    		case 'audio':
    			$url .= '_audio';
    			break;
    			
    		case 'video':
    			$url .= '_video';
    			break;
    			
    		default:
    		case 'pdf':
    			$url .= '_pdf';
    			break;
    	}
    	
    	if ($this->_scheduleResize) {
    		switch ($this->_imageWidth) {
    			case 60:
    				$url .= '_small';
    				break;
    				
    			case 30:
    				$url .= '_thumbnail';
    				break;

    			default:
    			case 120:
    				$url .= '';
    				break;
    		}
    	}
    	$url .= '.png';
    	
    	return $url;
    	/***********************/    	
    }
}
