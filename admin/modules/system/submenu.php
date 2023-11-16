<?php
/**
 * Copyright (C) 2007,2008  Arie Nugraha (dicarve@yahoo.com)
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301  USA
 *
 */

/* Membership module submenu items */
// IP based access limitation
do_checkIP('smc');
do_checkIP('smc-system');

global $sysconf;

$menu[] = array('Header', __('CONFIGURATION'));
// only administrator have privileges for below menus
if ($_SESSION['uid'] == 1) {
    $menu[] = array(__('System Configuration'), MWB.'system/index.php', __('Configure Global System Preferences'));
}
$menu[] = array(__('Content'), MWB.'system/content.php', __('Content'));
// only administrator have privileges for below menus
if ($_SESSION['uid'] == 1) {
    if ($sysconf['index']['engine']['enable']) {
      $menu[] = array(__('Biblio Indexes'), MWB.'system/biblio_indexes_'.$sysconf['index']['engine']['type'].'.php', __('Bibliographic Indexes management'));
    } else {
      $menu[] = array(__('Biblio Indexes'), MWB.'system/biblio_indexes.php', __('Bibliographic Indexes management'));
    }
    $menu[] = array(__('User Group'), MWB.'system/user_group.php', __('Manage Group of Application User'));
    $menu[] = array(__('Librarian & System Users'), MWB.'system/app_user.php', __('Manage Application User or Library Staff'));
    $menu['user-profile'] = array(__('Change User Profiles'), MWB.'system/app_user.php?changecurrent=true&action=detail', __('Change Current User Profiles and Password'));
    
}
$menu[] = array(__('Holiday Setting'), MWB.'system/holiday.php', __('Configure Holiday Setting'));
$menu[] = array(__('Database Backup'), MWB.'system/backup.php', __('Backup Application Database'));