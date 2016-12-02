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
     * Process the quarter-centric XML, building 3D array for presentation
     */
    function five() {
        // build 3-D array
        $xml = simplexml_load_file('./data/04/sales04-quarter.xml');
        $results = array();

        // iterate over the cells
        foreach ($xml->children() as $quarter)
            foreach ($quarter->country as $country) {
                $ccode = (string) $country['name'];
                // init first dimension if needed
                if (!isset($results[$ccode]))
                    $results[$ccode] = array();
                foreach ($country->vehicle as $vehicle) {
                    // init second dimension if needed
                    $vehicle_type = (string) $vehicle['type'];
                    if (!isset($results[$ccode][$vehicle_type]))
                        $results[$ccode][$vehicle_type] = array($vehicle_type);
                    // store quarterly sales
                    $results[$ccode][$vehicle_type][(string) $quarter['number']] = (int) $vehicle->car_sold;
                }
            }

        // accumulate row totals only
        foreach ($results as $ccode => $vehicles) {
            foreach ($vehicles as $vehicle_type => $row) {
                $year_total = 0;
                for ($i = 1; $i < 5; $i++)
                    if (isset($row[$i]))
                        $year_total += $row[$i];
                $results[$ccode][$vehicle_type][5] = $year_total;
            }
        }



        // view parameters 
        $data = array();
        $data['pagetitle'] = 'COMP4711 Lab 7 Solution - quarter-centric';
        $data['results'] = $results;
        $data['subtitle'] = 'Process Quarter-centric XML';
        $data['pagebody'] = 'lab07report5';
        $data['selected'] = '/lab07/five';
        $data['tabs'] = $this->tabs;
        $data['data'] = &$data;

        $this->load->view('template', $data);
    }

 
}

/* End of file lab06.php */
/* Location: ./application/controllers/lab06.php */
