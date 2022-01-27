<?php
include('../FUNCTIONS/functions_items.php');
$id_item = $_GET['id_item'];

if (deleteItem($id_item) > 0) {
    echo "
    <script>
        alert ('Successfully');
        document.location.href = 'main.php?page=Item settings';  
    </script>
    ";
} else {
    echo "
    <script>
        alert ('Failed');
    </script>
    ";
}
