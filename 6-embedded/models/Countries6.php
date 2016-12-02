<?php

/**
 * CodeIgniter model to abstract the country codes & descriptions
 * using the source-centric XML
 *
 * @author jim
 */
class Countries6 extends Countries {

    // populate our internal data, in a fashion suited to the XML
    function _load() {
        $root = simplexml_load_file('data/04/sales04-embedded.xml');

        // rebuild the keys table
        $this->_data = array();
        // get the DOM root's children
        foreach ($root->countries->country as $country) {
            // store this in our key table
            $this->_data[(string) $country['code']] = (string) $country;
        }

        // sort the table by key
        if (count($this->_data) > 0)
            ksort($this->_data);
        return;
    }

}

/* End of file countries1.php */
/* Location: ./application/models/countries1.php */