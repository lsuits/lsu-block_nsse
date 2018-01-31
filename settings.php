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
 * Provides a link based on an additional profile field to an NSSE survey
 *
 * @package    block_nsse
 * @copyright  2018 onwards Robert Russo, Louisiana State University
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die;

if ($ADMIN->fulltree) {
    $nsse_url_prefix = get_string('urlprefix', 'block_nsse');
    $nsse_url_prefix_desc = get_string('urlprefixdesc', 'block_nsse');
    $nsse_default_prefix = get_string('urlprefixdefault', 'block_nsse');

    $settings->add(new admin_setting_configtext('block_nsse/urlprefix',
        $nsse_url_prefix, $nsse_url_prefix_desc, $nsse_default_prefix));

    $nsse_url_suffix = get_string('urlsuffix', 'block_nsse');
    $nsse_url_suffix_desc = get_string('urlsuffixdesc', 'block_nsse');
    $nsse_default_suffix = get_string('urlsuffixdefault', 'block_nsse');

    $settings->add(new admin_setting_configtext('block_nsse/urlsuffix',
        $nsse_url_suffix, $nsse_url_suffix_desc, $nsse_default_suffix));
}
