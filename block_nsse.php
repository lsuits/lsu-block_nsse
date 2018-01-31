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
 * NSSE Survey Links block.
 *
 * @package   block_nsse
 * @copyright 2018 onwards Robert Russo, Louisiana State University
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class block_nsse extends block_base {
    /**
     * Standard moodle function
     *
     * @var $this->title is populated via the lang string.
     */
    public function init() {
        $this->title = get_string('pluginname', 'block_nsse');
    }

    /**
     * Standard moodle function
     *
     * @return false (only allow one instance per page)
     */
    public function instance_allow_multiple() {
        return false;
    }

    /**
     * Standard moodle function
     *
     * @return array of applicable formats
     */
    public function applicable_formats() {
        return array('site' => true,
                     'my' => true);
    }

     /**
     * Allows configuration within Moodle.
     *
     * @return true
     */
    function has_config(){
        return true;
    }

    /**
     * Standard moodle function
     *
     * @var string $nssepat pattern for searching
     * @var string $nssesub data we're searching
     * @var string $nsselinkid modified $nssesub for generating links
     * @var string $nsselinktext lang-specific text used for the generated link
     * 
     * @return content for the page
     */
    public function get_content() {
        global $USER;
        // TODO: make this a generic link/user profile tool, not just an NSSE one
        if (!empty($USER->profile['nsse'])) {
            $nsse_prefix = get_config('block_nsse', 'urlprefix');
            $nsse_suffix = get_config('block_nsse', 'urlsuffix');
            $nsse_link_id = $USER->profile['nsse'];
            $nsse_link_text = get_string('linktitle', 'block_nsse');

            $this->content = new stdClass;
            $this->content->text = '';
            $this->content->footer = '';

            // Get the NSSE link
            $nsse_link = '<a href="' . $nsse_prefix . $nsse_link_id . $nsse_suffix . '" target="blank">' . $nsse_link_text . '</a>';
            $this->content->text = $nsse_link;

            return $this->content;
        }
    }
}
