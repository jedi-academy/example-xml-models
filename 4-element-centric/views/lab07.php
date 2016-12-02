<?php
/*
 * Explain what went into this lab.
 */
?>
<?php 
make_tabbed_menu($tabs,$selected);
?>
<div>
    <p>To solve Lab 7, I used the XML documents from lab 4, purposefully without
        changing their structure, and explicitly not binding them to any DTD or
        schema. We will dynamically bind documents to those for server-side
        calidation, in a future lab.</p>
    <p>The task given you was to essentially reproduce the North America
    Vehicle Sales table provided as a PDF for lab 4.</p>
    <hr/>
    <p>The output for each of the different XML documents is the same.
    The difference is in the controller processing needed to accomodate
    the structure of each document. Check the source code :)</p>
    <ul>
        <li>The source-centric approach iterates by source/vehicles/sold</li>
        <li>The vehicle-centric approach iterates by vehicles/source/sold.</li>
        <li>The table approach iterates by sold.</li>
        <li>The element approach iterates by source/vehicles/sold.</li>
        <li>The quarter-centric approach iterates by quarter/country/vehicle/car_sold.</li>
        <li>There is no "best" solution, just different approaches needed to 
            traverse the XML documents based on their structure. Each of the traversals
        produces the same 3-D associative array, appropriate to the view.</li>
    </ul>
</div>