<?php

/**
 * CodeIgniter model to abstract the country codes & descriptions
 * using the source-centric XML
 *
 * @author jim
 */
class Sales1 extends Sales {

    // populate our internal data
    function _load() {
        $this->_root = simplexml_load_file('data/04/sales04-source.xml');
    }

    /**
     * Find and return largest sales value in a country & vehicle type.
     * This is a dummy method, meant to be over-ridden in document-specific models.
     *
     * @access	public
     * @param   array   quarter=>amount
     */
    function findLargest($country, $vtype) {
        $result = array();
        $quarter = 0;
        $units = 0;
        foreach ($this->_root->source as $source) {
            if ($source['country'] == $country) {
                foreach ($source->vehicles as $vehicles) {
                    if ($vehicles['type'] == $vtype) {
                        foreach ($vehicles->sold as $sold)
                            if ($sold > $units) {
                                $units = (int) $sold;
                                $quarter = (string) $sold['quarter'];
                            }
                    }
                }
            }
        }
        $result[$quarter] = $units;
        return $result;
    }

}

/* End of file countries1.php */
/* Location: ./application/models/countries1.php */