Name
====
Products Notifications Report

Version Date
==============
2.0.1, 2017-07-16 (lat9)

Author
======
Andrew Berezin andrew@ecommerce-service.com http://ecommerce-service.com andrew@zen-cart.spb.ru http://zen-cart.spb.ru
Modified by Cindy Merkin (lat9) for continued use under Zen Cart 1.5.0+

Description
===========
Display Products Notifications Report

Support forum
=============
Support topic on forum: http://www.zen-cart.com/forum/showthread.php?t=58766

Affected files
==============
Changed files
-------------
- none -

New files
---------
YOUR_ADMIN/stats_products_notifications.php
YOUR_ADMIN/includes/extra_datafiles/stats_products_notifications_filename.php
YOUR_ADMIN/includes/functions/extra_functions/init_products_notifications_report.php
YOUR_ADMIN/includes/languages/english/extra_definitions/stats_products_notifications.php
YOUR_ADMIN/includes/languages/english/stats_products_notifications.php
YOUR_ADMIN/includes/languages/russian/extra_definitions/stats_products_notifications.php
YOUR_ADMIN/includes/languages/russian/stats_products_notifications.php

Affects DB
==========
- v2.0.0 (and later) add a record to the admin_pages table, registering the plugin for menu display.

Features:
=========
-

Install:
========
0. BACKUP! BACKUP! BACKUP! BACKUP! BACKUP! BACKUP!
1. Upload all files in YOUR_ADMIN;
2. Go to Admin->Reports->Products Notifications

Uninstall
=========
Delete these files:
YOUR_ADMIN/stats_products_notifications.php
YOUR_ADMIN/includes/extra_datafiles/stats_products_notifications_filename.php
YOUR_ADMIN/includes/functions/extra_functions/init_products_notifications_report.php
YOUR_ADMIN/includes/languages/english/extra_definitions/stats_products_notifications.php
YOUR_ADMIN/includes/languages/english/stats_products_notifications.php
YOUR_ADMIN/includes/languages/russian/extra_definitions/stats_products_notifications.php
YOUR_ADMIN/includes/languages/russian/stats_products_notifications.php

and copy & paste the following into your admin's Tools->Install SQL Patches:

DELETE FROM admin_pages WHERE page_key = 'reportsProductsNotifications' LIMIT 1;

History
=======
2.0.1   2017-07-16  lat9
  - Updated to correct the product-page link, per the support forum.
2.0.0   2017-07-16  lat9
  - Updated for continued use under Zen Cart 1.5.0 and later.
3. 1.3 24.04.2007 14:36 (a_berezin)
0. Initial version - 1.0 19.02.2007 6:41 (a_berezin)


DISCLAIMER
==========
This program is free software; you can redistribute it and/or
modify it under the terms of the GNU General Public License
as published by the Free Software Foundation; either version 2
of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
(LICENSE) along with this program; if not, write to the Free Software
Foundation, Inc., 59 Temple Place - Suite 330, Boston, MA  02111-1307, USA.

Installation of this contribution is done at your own risk.
Backup your ZenCart database and any and all applicable files before proceeding.