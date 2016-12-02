<?php

/**
 * CodeIgniter model to abstract the country codes & descriptions
 * using the source-centric XML
 *
 * @author jim
 */
class Sales5 extends Sales {

    // populate our internal data
    function _load() {
        $this->_root = simplexml_load_file('data/04/sales04-quarter.xml');
    }

    /**
     * Find and return largest sales value in a country & vehicle type.
     * This is a dummy method, meant to be over-ridden in document-specific models.
     *
     * @access	public
     * @param   array   quarter=>amount
     */
    function findLargest($ctype, $vtype) {
        $result = array();
        $period = 0;
        $units = 0;
        foreach ($this->_root->quarter as $quarter)
            foreach ($quarter->country as $country)
                if ($country['name'] == $ctype)
                    foreach ($country->vehicle as $vehicle)
                        if ($vehicle['type'] == $vtype) {
                            if ($vehicle->car_sold > $units) {
                                $units = (int) $vehicle->car_sold;
                                $period = (string) $quarter['number'];
                            }
                        }

        $result[$period] = $units;
        return $result;
    }

}

/* End of file countries1.php */
    /* Location: ./application/models/countries1.php */