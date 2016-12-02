<?php

/**
 * Controller for COMP4711 Lab 7
 */
class Lab07 extends CI_Controller {

    var $tabs = array('/lab07/' => 'DOM processing...', '/lab07/one' => 'By Source',
        '/lab07/two' => 'By Vehicle', '/lab07/three' => 'As table',
        '/lab07/four' => 'As elements', '/lab07/five' => 'By quarter',
        '/lab07/six' => 'W/embedded');
    var $msgs = array();

    /** Constructor - nothing exciting to see here */
    function __construct() {
        parent::__construct();
        $this->load->helper('display');
    }

    /**
     * Default entry point.
     * The story is told in the view, and the other functions
     * act as URLs to prrocess different XML documents, each
     * with their own structure.
     */
    function index() {
        $data = array();
        $data['pagetitle'] = 'COMP4711 Lab 7 Solution';
        $data['pagebody'] = 'lab07';
        $data['selected'] = '/lab07/';
        $data['tabs'] = $this->tabs;
        $data['data'] = &$data;
        $this->load->view('template', $data);
    }


    /**
     * Process the vehicle-centric XML, building 3D array for presentation
     */
    function two() {
        // build 3-D array
        $xml = simplexml_load_file('./data/04/sales04-vehicle.xml');
        $results = array();
        // iterate over the vehicle types
        foreach ($xml->vehicles as $vehicles) {
            // and then over the countries
            foreach ($vehicles->source as $source) {
                $country_array = array();
                // setup an array to hold an account
                $row = array();
                // save the account code
                $row[0] = (string) $vehicles['type'];
                // setup account row totals
                $year_total = 0;
                // iterate over the quarterly sales
                foreach ($source->sold as $cell) {
                    // save each month in the appropriate cell
                    $row[(string) $cell['quarter']] = (int) $cell;
                    // update the row total
                    $year_total += (int) $cell;
                }
                // save the row total
                $row[5] = $year_total;
                $results[(string) $source['country']][(string) $vehicles['type']] = $row;
            }
        }

        // view parameters 
        $data = array();
        $data['pagetitle'] = 'COMP4711 Lab 7 Solution - vehicle-centric';
        $data['results'] = $results;
        $data['subtitle'] = 'Process Vehicle-centric XML';
        $data['pagebody'] = 'lab07report';
        $data['selected'] = '/lab07/two';
        $data['tabs'] = $this->tabs;
        $data['data'] = &$data;

        $this->load->view('template', $data);
    }


}

/* End of file lab06.php */
/* Location: ./application/controllers/lab06.php */
