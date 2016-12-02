<?php

/**
 * CodeIgniter base model for the sales data.
 * Extend this and provide your own _load method to suit your data structure :)
 *
 * NOTE: Add this to config/autoload.php, so that you only have to load the
 * appropriate model later.
 * 
 * NOTE: this differs from the other models, in that we want to store
 * the root element itself, so that the DOM can be traversed differently
 * for different methods.
 * 
 * @author jim
 */
class Sales extends CI_Model {

    var $_root;     // the SimpleXMLElement DOM root

    // constructor

    function __construct() {
        parent::__construct();
        $this->_load(); // go get the data
    }

    // populate our internal data
    function _load() {
        // YOUR CODE SHOULD GO HERE IN THE SUBCLASS
    }

    /**
     * Find and return largest sales value in a country & vehicle type.
     * This is a dummy method, meant to be over-ridden in document-specific models.
     *
     * @access	public
     * @param   array   quarter=>amount
     */
    function findLargest($country,$vtype) {
       $result = array();
       $result['1'] = 100;
       return $result;
    }

}

/* End of file countries1.php */
/* Location: ./application/models/countries1.php */