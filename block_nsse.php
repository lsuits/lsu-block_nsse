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
     * Standard moodle function
     *
     * @return false (do not allow config)
     */
    public function instance_allow_config() {
        return false;
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

        if (!empty($USER->aim)) {
            $nssepat = "/^NSSE,/";
            $nssesub = $USER->aim;

            if (preg_match($nssepat, $nssesub)) {
                $nsselinkid = preg_replace($nssepat, '', $nssesub);
                $nsselinktext = get_string('linktitle', 'block_nsse');

                $this->content = new stdClass;
                $this->content->text = '';
                $this->content->footer = '';

                // Get the NSSE link
                $nsselink = '<a href="https://nssesurvey.org/' . $nsselinkid . '/60" target="blank">' . $nsselinktext . '</a>';
                $this->content->text = $nsselink;

                return $this->content;
            }
        }
    }
}
