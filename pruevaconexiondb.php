<?php

$conn = oci_connect('DB_PINTEREST', 'oracle', 'localhost/XE');

$stid = oci_parse($conn, 'SELECT * FROM TBL_USUARIO');
oci_execute($stid);

echo "<table>\n";
while (($row = oci_fetch_array($stid, OCI_ASSOC+OCI_RETURN_NULLS)) != false) {
    echo "<tr>\n";
    foreach ($row as $item) {
        echo "  <td>".($item !== null ? htmlentities($item, ENT_QUOTES) : " ")."</td>\n";
    }
    echo "</tr>\n";
}
echo "</table>\n";

?>