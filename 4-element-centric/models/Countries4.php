<?php

/**
 * CodeIgniter model to abstract the country codes & descriptions
 * using the source-centric XML
 *
 * @author jim
 */
class Countries4 extends Countries {

    // populate our internal data, in a fashion suited to the XML
    function _load() {
        $root = simplexml_load_file('data/04/sales04-elements.xml');

        // rebuild the keys table
        $this->_data = array();
        // get the DOM root's children
        foreach ($root->source as $source) {
            // extract the attribute value to use for indexing
            $key = (string) $source->country;
            // store this in our key table
            $this->_data[$key] = (string) $key;
        }

        // sort the table by key
        if (count($this->_data) > 0)
            ksort($this->_data);
        return;
    }

}

/* End of file countries1.php */
/* Location: ./application/models/countries1.php */