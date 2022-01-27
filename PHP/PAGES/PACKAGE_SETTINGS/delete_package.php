<?php
include('../FUNCTIONS/functions_packages.php');
$id_package = $_GET['id_package'];

if (deletePackage($id_package) > 0) {
    echo "
    <script>
        alert ('Successfully');
        document.location.href = 'main.php?page=Package settings';  
    </script>
    ";
} else {
    echo "
    <script>
        alert ('Failed');
    </script>
    ";
}
