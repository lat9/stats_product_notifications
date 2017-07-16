<?php
// -----
// Part of the "Products Notifications Report", updated for Zen Cart versions > 1.5.0 by lat9.
// Copyright (C) 2017, Vinos de Frutas Tropicales.
//

// -----
// Register the plugin's report page for display on the menus.
//
if (!zen_page_key_exists ('reportsProductsNotifications')) {
    $next_sort = $db->Execute(
        "SELECT MAX(sort_order) as max_sort 
           FROM " . TABLE_ADMIN_PAGES . " 
          WHERE menu_key = 'reports'", 
          false, 
          false, 
          0, 
          true
    );
    zen_register_admin_page('reportsProductsNotifications', 'BOX_STATS_PRODUCTS_NOTIFICATIONS', 'FILENAME_STATS_PRODUCTS_NOTIFICATIONS', '', 'reports', 'Y', $next_sort->fields['max_sort'] + 1);
}
