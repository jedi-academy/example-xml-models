<?php
make_tabbed_menu($tabs, $selected);
$headings = array("", "2010<br/>Q1", "2010<br/>Q2", "2010<br/>Q3", "2010<br/>Q4", "TOTAL");

// The data structure used in the XML incorporated the report headings
?>
<div class="report">
    <h1>North American Sales by Source (Units)</h1>
    <hr/>
    <table cols="6">
        <?php
        $spacer = array(" ");
        header_row_from_array($headings,false);
        foreach ($results as $ccode => $country) {
            $subtotals = array();
            $subtotals[0] = $ccode;
            header_row_from_array($subtotals,false);
            for ($i = 1; $i < 6; $i++)
                $subtotals[$i] = 0;
            foreach ($country as $type => $row) {
                for ($i = 1; $i < 6; $i++) {
                    $subtotals[$i] += $row[$i];
                }
                row_from_array($row);
            }
            $subtotals[0] = 'Total ' . $ccode;
            header_row_from_array($subtotals);
            row_from_array($spacer);
        }
        ?>
    </table>
</div>
<?php

/**
 * display an array as a table row
 */
function row_from_array($data) {
    $first = true;
    echo '<tr>';
    foreach ($data as $cell) {
        echo '<td>';
        if (!$first) {
            echo '<div class="report">' . number_format($cell) . '</div>';
        } else
            echo '<div>' . $cell . '</td>';
        $first = false;
        echo '</td>';
    }
    echo '</tr>';
}

/**
 * display an array as a table header row
 */
function header_row_from_array($data,$summary=true) {
    $first = true;
    echo '<tr>';
    foreach ($data as $cell) {
        echo '<th>';
        if (!$first && $summary) {
            echo '<div class="report">' . number_format($cell) . '</div>';
        } else
            echo '<div>' . $cell . '</td>';
        $first = false;
        echo '</th>';
    }
    echo '</tr>';
}
