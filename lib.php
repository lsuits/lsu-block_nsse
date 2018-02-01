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
 * @package   block_nsse
 * @copyright 2018 onwards Robert Russo, Louisiana State University
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die;

class nsse {
    /**
     * insert new record into {user_info_field}
     * @global type $DB
     * @var $shortname
     * @return \stdClass
     */
    public static function default_profile_field() {
        global $DB;
        $shortname = get_string('profilefield_shortname', 'block_nsse');
        if (!$field = $DB->get_record('user_info_field', array('shortname' => $shortname))) {

            $field                    = new stdClass;
            $field->shortname         = $shortname;
            $field->name              = get_string('profilefield_longname', 'block_nsse');
            $field->description       = get_string('profilefield_shortname', 'block_nsse');
            $field->descriptionformat = 1;
            $field->datatype          = 'text';
            $field->categoryid        = 1;
            $field->locked            = 1;
            $field->visible           = 0;
            $field->param1            = 10;
            $field->param2            = 10;
            $field->param3            = 0;
            $field->id                = $DB->insert_record('user_info_field', $field);
        }
        return $field;
    }
}
