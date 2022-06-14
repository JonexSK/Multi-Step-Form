<?php

error_reporting(0);

require 'db.php';

?>

<!DOCTYPE html>
<html lang="sk">

<?php
include("inc/head.php");
?>

<body>
    <div class="container2">
    <?php

        $data = "SELECT * FROM data";

        if($udaje = mysqli_query($con, $data))
        {
            if(mysqli_num_rows($udaje) > 0)
            {
                echo "<table class='table-data'>
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Meno</th>
                            <th>Priezvisko</th>
                            <th>Ulica</th>
                            <th>Cislo Domu</th>
                            <th>PSČ</th>
                            <th>Mesto</th>
                            <th>IBAN</th>
                        </tr>
                        </thead>
                        <tbody>";

                while($udaj = mysqli_fetch_array($udaje)) 
                {
                    echo "<tr>";
                    echo "<td>" . $udaj['id'] . "</td>";
                    echo "<td>" . $udaj['meno'] . "</td>";
                    echo "<td>" . $udaj['priezvisko'] . "</td>";
                    echo "<td>" . $udaj['ulica'] . "</td>";
                    echo "<td>" . $udaj['cislo_domu'] . "</td>";
                    echo "<td>" . $udaj['psc'] . "</td>";
                    echo "<td>" . $udaj['mesto'] . "</td>";
                    echo "<td>" . $udaj['iban'] . "</td>";
                    echo "<td><a id='delete' href=\"delete.php?id=$udaj[id]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";
                    echo "</tr>";
                }
                echo "</tbody>
                </table>";
                mysqli_free_result($cities);
            } 

            else
            {
                echo "<p class='no-records'>No records found.</p>";
            }
        }

        mysqli_close($con);
        ?>
    </div>  

<?php
include("inc/footer.php");
?>