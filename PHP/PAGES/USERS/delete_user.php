<?php 
include('../FUNCTIONS/functions_users.php');
$id = $_GET['id'];

if (deleteUser($id) > 0) {
    echo "
    <script>
        alert ('Successfully');
        document.location.href = 'main.php?page=Users';  
    </script>
    ";
} else {
    echo "
    <script>
        alert ('Failed');
    </script>
    ";
}
