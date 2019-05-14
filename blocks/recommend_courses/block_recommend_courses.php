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
 * Block to search forum posts.
 *
 * @package   block_search_forums
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

class block_recommend_courses extends block_base {
    function init() {
        $this->title = get_string('pluginname', 'block_recommend_courses');
    }

    function get_content() {
        global $CFG, $OUTPUT, $USER;

        // access userid as $USER->id
        if($this->content !== NULL) {
            return $this->content;
        }

        $this->content = new stdClass;
        $this->content->footer = '';

        if (empty($this->instance)) {
            $this->content->text   = '';
            return $this->content;
        }
        
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, "http://xenoeye.org:49999/recommend/getRecommendCourses?userid=".$USER->id);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        $res = curl_exec($curl);
        curl_close($curl);
        
        // transform json string to object
        $res = json_decode($res);
        if ($res -> status == "0"){
            // transform data type to moodle compliable
            // from object to array of courses
            $excourses = array();
            foreach ($res->data as $record) {
                // kick searched courses
                if(!array_key_exists($record->id,array($this->page->course->id=>""))){
                    $excourses[$record->id] = $record;
                }
            }
            
        }

        $advancedsearch = get_string('advancedsearch', 'block_recommend_courses');

        $strsearch  = get_string('search');
        $strgo      = get_string('go');

        $this->content->text  = '<div class="searchform">';
        foreach($excourses as $excourse){
            $this->content->text .= '<a href="'.$CFG->wwwroot.'/course/view.php?id='.$excourse->id.'">'.$excourse->fullname.'</a><br>';
        }
        $this->content->text .= '</div>';

        return $this->content;
    }

    function applicable_formats() {
        return array('site' => true, 'course' => true);
    }

    /**
     * Returns the role that best describes the forum search block.
     *
     * @return string
     */
    public function get_aria_role() {
        return 'search';
    }
}


