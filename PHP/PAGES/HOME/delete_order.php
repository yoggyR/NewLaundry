<?php
include('../FUNCTIONS/functions_transaction.php');
$id = $_GET['id'];

if (deleteTransaction($id) > 0) {
    echo "
    <script>
        alert ('Successfully');
        document.location.href = 'main.php?page=Home';  
    </script>
    ";
} else {
    echo "
    <script>
        alert ('Failed');
    </script>
    ";
}
