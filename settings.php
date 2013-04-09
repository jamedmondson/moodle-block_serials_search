<?php
// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
 * Add an admin settings page
 *
 * @package     block_serials_search
 * @copyright   2012 Jennifer Edmondson
 * @license     http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

//Service name
$settings->add(new admin_setting_configtext(
    'serials_search/name',
    get_string('admin_name', 'block_serials_search'),
    get_string('admin_name_desc', 'block_serials_search'),
    'Summon®',
    PARAM_TEXT
));

//URL for html search form (optional JS widget may be a future feature)
$settings->add(new admin_setting_configtext(
    'serials_search/summon_prefix',
    get_string('admin_summon_prefix', 'block_serials_search'),
    get_string('admin_summon_prefix_desc', 'block_serials_search'),
    '',
    PARAM_URL
));

//Whether or not to open search results in a new tab
$settings->add(new admin_setting_configcheckbox(
    'serials_search/new_window',
    get_string('admin_new_window', 'block_serials_search'),
    get_string('admin_new_window_desc', 'block_serials_search'),
    '0'
));

//Advanced Search URL (Link text in language file)
$settings->add(new admin_setting_configcheckbox(
    'serials_search/advanced',
    get_string('admin_advanced', 'block_serials_search'),
    get_string('admin_advanced_desc', 'block_serials_search'),
    '0'
));

//Footer URL (Link text in language file)
$settings->add(new admin_setting_configtext(
    'serials_search/about_url',
    get_string('admin_about_url', 'block_serials_search'),
    get_string('admin_about_url_desc', 'block_serials_search'),
    'http://www.serialssolutions.com/en/services/serials_search/',
    PARAM_URL
));