<?php
/**
 * @package admin
 * @copyright Copyright 2003-2006 Zen Cart Development Team
 * @copyright Portions Copyright 2003 osCommerce
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 * @version $Id: stats_products_notifications.php 1.3 24.04.2007 14:36 AndrewBerezin $
 */
require('includes/application_top.php');
?>
<!doctype html public "-//W3C//DTD HTML 4.01 Transitional//EN">
<html <?php echo HTML_PARAMS; ?>>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=<?php echo CHARSET; ?>">
<title><?php echo TITLE; ?></title>
<link rel="stylesheet" type="text/css" href="includes/stylesheet.css">
<link rel="stylesheet" type="text/css" href="includes/cssjsmenuhover.css" media="all" id="hoverJS">
<style type="text/css">
.showHideOn { background: #FFFAF3; border: 1px dotted #000000; padding: 5px; margin-bottom: 5px; }
.showHideOff { backgroundColor: #000; }
.left { text-align: left; }
.right { text-align: right; }
.center { text-align: center; }
</style>
<script type="text/javascript" src="includes/menu.js"></script>
<script type="text/javascript" src="includes/general.js"></script>
<script type="text/javascript">
<!--
  function init()
  {
    cssjsmenu('navbar');
    if (document.getElementById)
    {
      var kill = document.getElementById('hoverJS');
      kill.disabled = true;
    }
  }
// -->
</script>

<script type="text/javascript">
<!--
function showHide(elementID, showHide) 
{
    var cnt = null;
    var desc = null;
    var on = null;
    var off = null;

    if (document.getElementById) {
        cnt = document.getElementById("showHide_ind_" + elementID);
        desc = document.getElementById("showHide_desc_" + elementID);
        on = document.getElementById("showHide_on_" + elementID);
        off = document.getElementById("showHide_off_" + elementID);
    } else if (document.all) {
        cnt = document.all["showHide_ind_" + elementID];
        desc = document.all["showHide_desc_" + elementID];
        on = document.all["showHide_on_" + elementID];
        off = document.all["showHide_off_" + elementID];
    } else if (document.layers) {
        cnt = document.layers["showHide_ind_" + elementID];
        desc = document.layers["showHide_desc_" + elementID];
        on = document.layers["showHide_on_" + elementID];
        off = document.layers["showHide_off_" + elementID];
    }

    if (desc) {
        if (desc.style.display == 'none') {
            desc.style.display = 'block';
        } else {
            desc.style.display = 'none';
        }
    }

    if (cnt) {
        if (cnt.className == 'showHideOn') {
            cnt.className = 'showHideOff';
        } else {
            cnt.className = 'showHideOn';
        }
    }

    if (on) {
        if (on.style.display == 'none') {
            on.style.display = 'inline';
        } else {
            on.style.display = 'none';
        }
    }

    if (off) {
        if (off.style.display == 'none') {
            off.style.display = 'inline';
        } else {
            off.style.display = 'none';
        }
    }
}

function showHideAll() {
    if (document.body.getElementsByTagName) {
        var cnt = document.body.getElementsByTagName('DIV');
    } else if (document.body.all) {
        var cnt = document.body.all.tags('DIV');
    }
    if (cnt) {
        for (var i=0; i<cnt.length; i++) {
            if (cnt[i].id.substring(0, 13) == 'showHide_ind_') {
                showHide(cnt[i].id.substring(13));
            }
        }
    }
}
// -->
</script>
</head>
<body onload="init()">
<!-- header //-->
<?php require(DIR_WS_INCLUDES . 'header.php'); ?>
<!-- header_eof //-->

<!-- body //-->
<table border="0" width="100%" cellspacing="2" cellpadding="2">
    <tr>
<!-- body_text //-->
        <td width="100%" valign="top"><table border="0" width="100%" cellspacing="0" cellpadding="0">
            <tr>
                <td><table border="0" width="100%" cellspacing="0" cellpadding="0">
                    <tr>
                        <td class="pageHeading"><?php echo HEADING_TITLE; ?></td>
                        <td class="pageHeading right"><?php echo zen_draw_separator('pixel_trans.gif', HEADING_IMAGE_WIDTH, HEADING_IMAGE_HEIGHT); ?></td>
                    </tr>
                </table></td>
            </tr>
            <tr>
                <td><table border="0" width="100%" cellspacing="0" cellpadding="0">
                    <tr>
                        <td class="left"><?php echo INSTRUCTIONS; ?></td>
                        <td class="right">
                            <a href="javascript:showHideAll();">
                                <span id="showHide_on_all" style="display: inline;"><?php echo zen_image(DIR_WS_IMAGES . 'icon_plus.gif'); ?>&nbsp;<?php echo TEXT_SHOWHIDE_SHOW_ALL; ?></span>
                                <span id="showHide_off_all" style="display: none;"><?php echo zen_image(DIR_WS_IMAGES . 'icon_minus.gif'); ?>&nbsp;<?php echo TEXT_SHOWHIDE_HIDE_ALL; ?></span>
                            </a>
                            <div style="display: none;" id="showHide_ind_all"></div>
                        </td>
                    </tr>
                </table></td>
            </tr>
            <tr>
                <td height="5px"></td>
            </tr>
<?php
if (isset($_GET['page']) && ($_GET['page'] > 1)) $rows = $_GET['page'] * MAX_DISPLAY_SEARCH_RESULTS_REPORTS - MAX_DISPLAY_SEARCH_RESULTS_REPORTS;
$rows = 0;
$products_query_raw = 
    "SELECT distinct pn.products_id, pd.products_name, p.products_type, p.products_model, p.master_categories_id
       FROM " . TABLE_PRODUCTS_NOTIFICATIONS . " pn
            LEFT JOIN " . TABLE_PRODUCTS . " p 
                ON (pn.products_id = p.products_id)
            LEFT JOIN " . TABLE_PRODUCTS_DESCRIPTION . " pd 
                ON (pn.products_id = pd.products_id)
      WHERE pd.language_id = " . $_SESSION['languages_id'] . "
      ORDER BY pn.products_id ASC";
$products_split = new splitPageResults($_GET['page'], MAX_DISPLAY_SEARCH_RESULTS_REPORTS, $products_query_raw, $products_query_numrows);
$products = $db->Execute($products_query_raw);
?>
            <tr>
                <td><table border="0" width="100%" cellspacing="0" cellpadding="0">
                    <tr>
                        <td valign="top"><table border="0" width="100%" cellspacing="0" cellpadding="2">
                            <tr>
                                <td colspan="3"><table border="0" width="100%" cellspacing="0" cellpadding="2">
                                    <tr>
                                        <td class="smallText" valign="top"><?php echo $products_split->display_count($products_query_numrows, MAX_DISPLAY_SEARCH_RESULTS_REPORTS, $_GET['page'], TEXT_DISPLAY_NUMBER_OF_PRODUCTS); ?></td>
                                        <td class="smallText right"><?php echo $products_split->display_links($products_query_numrows, MAX_DISPLAY_SEARCH_RESULTS_REPORTS, MAX_DISPLAY_PAGE_LINKS, $_GET['page']); ?></td>
                                    </tr>
                                </table></td>
                            </tr>
                            <tr class="dataTableHeadingRow">
                                <td class="dataTableHeadingContent right"><?php echo TABLE_HEADING_NUMBER; ?></td>
                                <td class="dataTableHeadingContent left"><?php echo TABLE_HEADING_PRODUCTS; ?></td>
                                <td class="dataTableHeadingContent center"><?php echo TABLE_HEADING_VIEWED; ?>&nbsp;</td>
                            </tr>
<?php
while (!$products->EOF) {
    $products_id = $products->fields['products_id'];
    $customers_count = $db->Execute(
        "SELECT count(*) as count
           FROM " . TABLE_PRODUCTS_NOTIFICATIONS . "
          WHERE products_id = $products_id" 
    );
?>
                            <tr class="dataTableRow" onmouseover="rowOverEffect(this);" onmouseout="rowOutEffect(this);">
                                <td class="dataTableContent right"><?php echo $products->fields['products_id']; ?>&nbsp;&nbsp;</td>
                                <td class="dataTableContent left"><a href="<?php echo zen_href_link(zen_get_handler_from_type($products->fields['products_type']), 'cPath=' . $products->fields['master_categories_id'] . '&product_type=' . $products->fields['products_type'] . "&pID=$products_id&action=new_product"); ?>" target="_blank"><?php echo '[' . $products->fields['products_model'] . '] ' . $products->fields['products_name']; ?></a></td>
                                <td class="dataTableContent center"><?php echo $customers_count->fields['count']; ?>&nbsp;<?php $showHide_cnt++; ?>
                                    <a href="javascript:showHide('<?php echo $showHide_cnt; ?>');">
                                        <span id="showHide_on_<?php echo $showHide_cnt; ?>" style="display: inline;"><?php echo zen_image(DIR_WS_IMAGES . 'icon_plus.gif'); ?>&nbsp;<?php echo TEXT_SHOWHIDE_SHOW; ?></span>
                                        <span id="showHide_off_<?php echo $showHide_cnt; ?>" style="display: none;"><?php echo zen_image(DIR_WS_IMAGES . 'icon_minus.gif'); ?>&nbsp;<?php echo TEXT_SHOWHIDE_HIDE; ?></span>
                                    </a>
                                </td>
                            </tr>
                            <tr class="dataTableRow">
                                <td colspan="3" class="left">
                                    <div id="showHide_ind_<?php echo $showHide_cnt; ?>"><div style="display: none;" id="showHide_desc_<?php echo $showHide_cnt; ?>">
                                        <table border="0" width="100%" cellspacing="0" cellpadding="0">
<?php
    $customers = $db->Execute(
        "SELECT pn.customers_id, pn.date_added, c.customers_firstname AS firstname, c.customers_lastname AS lastname, c.customers_email_address AS email_address
           FROM " . TABLE_PRODUCTS_NOTIFICATIONS . " pn
                LEFT JOIN " . TABLE_CUSTOMERS . " c 
                    ON pn.customers_id = c.customers_id
          WHERE pn.products_id = $products_id"
    );
    while(!$customers->EOF) {
        $customers_id = $customers->fields['customers_id'];
        $email_address = $customers->fields['email_address'];
?>
                                            <tr>
                                                <td class="dataTableContent left" width="50%"><a href="<?php echo zen_href_link(FILENAME_CUSTOMERS, "cID=$customers_id&action=edit"); ?>" target="_blank"><?php echo $customers->fields['firstname'] . ' ' . $customers->fields['lastname']; ?></a></td>
                                                <td class="dataTableContent left" width="25%"><a href="<?php echo zen_href_link(FILENAME_MAIL, "cID=$customers_id&customer=$email_address"); ?>" target="_blank"><?php echo $email_address; ?></a></td>
                                                <td class="dataTableContent left" width="25%""><?php echo $customers->fields['date_added']; ?></td>
                                            </tr>
<?php
        $customers->MoveNext();
    }
?>
                                        </table>
                                    </div></div>
                                </td>
                            </tr>
<?php
    $products->MoveNext();
}
?>
                        </table></td>
                    </tr>
                    <tr>
                        <td colspan="3"><table border="0" width="100%" cellspacing="0" cellpadding="2">
                            <tr>
                                <td class="smallText" valign="top"><?php echo $products_split->display_count($products_query_numrows, MAX_DISPLAY_SEARCH_RESULTS_REPORTS, $_GET['page'], TEXT_DISPLAY_NUMBER_OF_PRODUCTS); ?></td>
                                <td class="smallText right"><?php echo $products_split->display_links($products_query_numrows, MAX_DISPLAY_SEARCH_RESULTS_REPORTS, MAX_DISPLAY_PAGE_LINKS, $_GET['page']); ?></td>
                            </tr>
                        </table></td>
                    </tr>
                </table></td>
            </tr>
        </table></td>
<!-- body_text_eof //-->
    </tr>
</table>
<!-- body_eof //-->

<!-- footer //-->
<?php require(DIR_WS_INCLUDES . 'footer.php'); ?>
<!-- footer_eof //-->
</body>
</html>
<?php require(DIR_WS_INCLUDES . 'application_bottom.php'); ?>