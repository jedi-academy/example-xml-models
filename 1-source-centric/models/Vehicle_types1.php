<?php

/**
 * CodeIgniter model to abstract the vehicle type codes & descriptions
 * using the source-centric XML
 *
 * @author jim
 */
class Vehicle_types1 extends Vehicle_types {

    // populate our internal data, in a fashion suited to the XML
    function _load() {
        $root = simplexml_load_file('data/04/sales04-source.xml');

        // rebuild the keys table
        $this->_data = array();
        // get the DOM root's children
        foreach ($root->source as $source) {
            foreach($source->vehicles as $vehicles) {
            // extract the attribute value to use for indexing
            $key = (string) $vehicles['type'];
            // store this in our key table
            $this->_data[$key] = (string) $key;
            }
        }

        // sort the table by key
        if (count($this->_data) > 0)
            ksort($this->_data);
        return;
    }

}

/* End of file countries1.php */
/* Location: ./application/models/countries1.php */