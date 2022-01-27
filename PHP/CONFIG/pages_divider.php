<!-- Pages divider -->
<?php

$pages = isset($_GET['page']) ? $_GET['page'] : '';

// ==Beginning==
// My profile
if ($pages == 'My profile') {
    include('../PAGES/PROFILE/my_profile.php');
}
// End my profile \\

// Edit profile
elseif ($pages == 'Edit profile') {
    include('../PAGES/PROFILE/edit_profile.php');
}
// End edit profile \\

// Change password
elseif ($pages == 'Change password') {
    include('../PAGES/PROFILE/change_password.php');
}
// End change password \\
// ==End beginning==


// ==Pages==
// Home 
elseif ($pages == 'Home') {
    include('../PAGES/HOME/home.php');
} elseif ($pages == 'Order') {
    include('../PAGES/HOME/order.php');
} elseif ($pages == 'Edit order') {
    include('../PAGES/HOME/edit_order.php');
} elseif ($pages == 'Checkout') {
    include('../PAGES/HOME/checkout.php');
} elseif ($pages == 'Delete order') {
    include('../PAGES/HOME/delete_order.php');
}
// End home \\

// Transaction
elseif ($pages == 'Transaction') {
    include('../PAGES/TRANSACTION/transaction.php');
} elseif ($pages == 'Details') {
    include('../PAGES/TRANSACTION/details.php');
}
// Transaction \\

// Customer list
elseif ($pages == 'Customer list') {
    include('../PAGES/CUSTOMER_LIST/customer_list.php');
} elseif ($pages == 'Delete customer') {
    include('../PAGES/CUSTOMER_LIST/delete_customer.php');
}
// End customer list

// Package settings
elseif ($pages == 'Package settings') {
    include('../PAGES/PACKAGE_SETTINGS/package_settings.php');
} elseif ($pages == 'Create new package') {
    include('../PAGES/PACKAGE_SETTINGS/create_new_package.php');
} elseif ($pages == 'Edit package') {
    include('../PAGES/PACKAGE_SETTINGS/edit_package.php');
} elseif ($pages == 'Delete package') {
    include('../PAGES/PACKAGE_SETTINGS/delete_package.php');
}
// End package settings \\

// Item settings
elseif ($pages == 'Item settings') {
    include('../PAGES/ITEM_SETTINGS/show_items.php');
} elseif ($pages == 'Delete item') {
    include('../PAGES/ITEM_SETTINGS/delete_item.php');
}
// End item settings

// Users
elseif ($pages == 'Users') {
    include('../PAGES/USERS/user_list.php');
} elseif ($pages == 'New user') {
    include('../PAGES/USERS/add_new_user.php');
} elseif ($pages == 'User details') {
    include('../PAGES/USERS/user_details.php');
} elseif ($pages == 'Delete user') {
    include('../PAGES/USERS/delete_user.php');
}
// End users \\

// Report
elseif ($pages == 'Report') {
    include('../PAGES/REPORT/report.php');
} elseif ($pages == 'On process') {
    include('../PAGES/REPORT/on_process.php');
} elseif ($pages == 'Finished') {
    include('../PAGES/REPORT/finished.php');
} elseif ($pages == 'Taken') {
    include('../PAGES/REPORT/taken.php');
} elseif ($pages == 'On process details') {
    include('../PAGES/REPORT/on_process_details.php');
} elseif ($pages == 'Finished details') {
    include('../PAGES/REPORT/finished_details.php');
} elseif ($pages == 'Taken details') {
    include('../PAGES/REPORT/taken_details.php');
} elseif ($pages == 'Customers') {
    include('../PAGES/REPORT/customers.php');
}
// End report \\

// Another
else {
    include('../PAGES/ANOTHER/not_found.php');
}
// End another \\
// ==End pages==

?>
<!-- //Pages divider\\ -->