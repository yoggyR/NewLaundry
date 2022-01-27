<?php
include('../FUNCTIONS/functions_customers.php');
$id_customer = $_GET['id_customer'];

if (deleteCustomer($id_customer) > 0) {
    echo "
    <script>
        alert ('Successfully');
        document.location.href = 'main.php?page=Customer list';  
    </script>
    ";
} else {
    echo "
    <script>
        alert ('Failed');
    </script>
    ";
}
