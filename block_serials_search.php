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
 * The Serials Solutions Summon block
 *
 * @package     block_serials_search
 * @copyright   2012 Jennifer Edmondson
 * @license     http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

/**
 * Define the serials_search block
 *
 * @package     block_serials_search
 * @copyright   2012 Jennifer Edmondson
 * @license     http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class block_serials_search extends block_base {
    /** @var array This variable stores (custom) module name for use in language strings */
    protected $_servicename;

    /**
     * Define title and language string
     */
    public function init() {
        $this->_servicename = array("name"=>get_config('serials_search', 'name'));
        if (empty($this->_servicename['name'])) {
            $this->_servicename = array(
                "name"=>get_string('pluginname', 'block_serials_search')
            );
        }
        $this->title = get_string('plugintitle', 'block_serials_search',
                                  $this->_servicename);
    }

    /**
     * Define block content
     *
     * @return  object  block content 
     */
    public function get_content() {
        global $OUTPUT;

        if ($this->content !== null) {
            return $this->content;
        }

        $this->content = new stdClass;

        //Check for required values
        $summonprefix = get_config('serials_search', 'summon_prefix');
        if (empty($summonprefix)) {
            $this->content->text = get_string('notconfigured', 'block_serials_search');
            return $this->content;
        }

        //Check for optional tagline
        $taglinetext = get_string('tagline', 'block_serials_search');
        if (!empty($taglinetext)) {
            $taglinehtml = '
            <div class="tagline">
                '.$taglinetext.
            '</div>';
        } else {
            $taglinehtml = '';
        }

        //Check whether or not to open in new window
        $target = get_config('serials_search', 'new_window');
        if (!empty($target)) {
            $targethtml = ' target="_blank"';
        } else {
            $targethtml = ' target="_top"';
        }

        //Check for optional advanced search link
        $advanced = get_config('serials_search', 'advanced');
        if (!empty($advanced)) {
            $advancedhtml = '
            <div class = "advanced-link">
                <a href="http://'.$summonprefix.'.summon.serialssolutions.com/advanced"'.
                        $targethtml.
                        'title="'.get_string('url_advanced_title', 'block_serials_search').'">
                    '.get_string('url_advanced_text', 'block_serials_search').'
                </a>
            </div>';
        } else {
            $advancedhtml = '';
        }

        //Search form
        $this->content->text = '
            <form action="http://'.$summonprefix.'.summon.serialssolutions.com/search"'.
                    $targethtml.'>'.
                $taglinehtml.
                '<div class="search-box">
                    <input class="search-field"
                            name="s.q" id="sq" maxlength="75" type="text" />
                    <input class="search-submit"
                            value="'.get_string('button_submit_search',
                                                'block_serials_search').'"
                            type="submit" />
                </div>
                '.$advancedhtml.'
            </form>';

        //Check for optional footer link
        $footerurl = get_config('serials_search', 'about_url');
        if (!empty($footerurl)) {
            $this->content->footer =
                $OUTPUT->pix_icon('about', 'Summon icon', 'block_serials_search').
                '<a href="'.$footerurl.'"'.
                        $targethtml.
                        'title="'.get_string('url_about_title', 'block_serials_search',
                                            $this->_servicename).
                        '">
                    '.get_string('url_about_text', 'block_serials_search',
                                 $this->_servicename).
                '</a>';
        }

        return $this->content;
    }

    /**
     * allow the block to have a configuration page
     *
     * @return boolean
     */
    public function has_config() {
        return true;
    }
}