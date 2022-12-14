<?php
namespace Custom\PincodeChecker\Api\Data;
interface PincodecheckerInterface
{

    const PINCODE = 'pincode';
    const PINCODECHECKER_ID = 'pincodechecker_id';


    /**
     * Get pincodechecker_id
     * @return string|null
     */
    
    public function getPincodecheckerId();

    /**
     * Set pincodechecker_id
     * @param string $pincodechecker_id
     * @return Custom\PincodeChecker\Api\Data\PincodecheckerInterface
     */
    
    public function setPincodecheckerId($pincodecheckerId);

    /**
     * Get pincode
     * @return string|null
     */
    
    public function getPincode();

    /**
     * Set pincode
     * @param string $pincode
     * @return Custom\PincodeChecker\Api\Data\PincodecheckerInterface
     */
    
    public function setPincode($pincode);
}
