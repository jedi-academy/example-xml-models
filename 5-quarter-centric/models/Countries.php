<?php

/**
 * CodeIgniter base model for country codes.
 * Extend this and provide your own _load method to suit your data structure :)
 *
 * NOTE: Add this to config/autoload.php, so that you only have to load the
 * appropriate model later.
 * 
 * @author jim
 */
class Countries extends CI_Model {

    var $_data = array();   // the country codes we extracted from the XML

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
     * Find and return the description of a specific country.
     *
     * @access	public
     * @param   string  the key to look for
     */
    function get($code) {
        // find it if we can
        if (isset($this->_data[$code])) {
            return $this->_data[$code];
        } else {
            return null;
        }
    }

    /**
     * Return the entire array of country codes & descriptions.
     * 
     * Use this to populate a combobox, for instance.
     *
     * @access	public
     */
    function getall() {
        return $this->_data;
    }

}

/* End of file countries1.php */
/* Location: ./application/models/countries1.php */