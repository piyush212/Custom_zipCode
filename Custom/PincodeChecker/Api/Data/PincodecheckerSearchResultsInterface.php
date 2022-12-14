<?php
namespace Custom\PincodeChecker\Api\Data;
interface PincodecheckerSearchResultsInterface extends \Magento\Framework\Api\SearchResultsInterface
{
    /**
     * Get pincodechecker list.
     * @return \Custom\PincodeChecker\Api\Data\PincodecheckerInterface[]
     */
    
    public function getItems();

    /**
     * Set pincode list.
     * @param \Custom\PincodeChecker\Api\Data\PincodecheckerInterface[] $items
     * @return $this
     */
    
    public function setItems(array $items);
}
