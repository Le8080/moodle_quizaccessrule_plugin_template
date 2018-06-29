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
 * Implementaton of the quizaccess_maccessruletemp plugin.
 *
 * @package    quizaccess
 * @subpackage maccessruletemp
 * @copyright  leahfuentes.kd@gmail.com
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */


defined('MOODLE_INTERNAL') || die();

require_once($CFG->dirroot . '/mod/quiz/accessrule/accessrulebase.php');


/**
 * A rule controlling the template of attempts allowed.
 *
 * @copyright  2018 leahfuentes.kd@gmail.com
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class quizaccess_maccessruletemp extends quiz_access_rule_base {
    /**
     * This is where the new accesrule is added on attempt object
     * You can work on this like verifing if an accessrule is on or not depending on your requirements.
     *
     * @param quiz $quizobj
     * @param int $timenow
     * @param boolean $canignoretimelimits
     * @return null or quiz object
     */
    public static function make(quiz $quizobj, $timenow, $canignoretimelimits) {

        return new self($quizobj, $timenow);
    }
    /**
     * @return string
     */
    public function description() {
    }

    /**
     * This is where you add additional settings of a quiz, 
     * will display under  Extra Restrictions on Attempts tab
     * when you add or edit a quiz
     *
     * @param mod_quiz_mod_form $quizform
     * @param MoodleQuickForm $mform
     * @return form
     */
    public static function add_settings_form_fields(
                mod_quiz_mod_form $quizform, MoodleQuickForm $mform) {
    }    
    
    /**
    * Function to save the settings 
    *
    * @param object $quiz
    * @return void
    */
   public static function save_settings($quiz) {
       global $DB;
   }
    
   /**
     * This is where you create a functionality to delete the accessrule settings applied on a quiz
     *
     * @param [type] $quiz
     * @return void
     */
    public static function delete_settings($quiz) {
            global $DB;
            //example
            //$DB->delete_records('quizaccess_temporaryaccess', array('quizid' => $quiz->id));
    }
    /**
     * SQL to join the new accesrule table on quiz object query
     *
     * @param int $quizid
     * @return array
     */
    public static function get_settings_sql($quizid) {
        //example
            // return array(
            //     'temporaryaccesson',
            //     'LEFT JOIN {quizaccess_temporaryaccess} tmc ON tmc.quizid = quiz.id',
            //     array());
    }
    /**
     * Function called before starting the attempt page,
     * 
     * 
     * @param object $page
     * @return void
     */
    public function setup_attempt_page($page) {
    }	

    /**
     * This function is used to check if a quiz accessrule has a a required settings or form needed to answer/view by the student.
     * If this is on, the system will then check what's inside the add_preflight_check_form_fields and display to the user before 
     * they can start the attempt.
     *
     * @param int $attemptid
     * @return boolean
     */
    public function is_preflight_check_required($attemptid) {
        return false;
    }
    /**
     * This is where you add additional message and or forms to be answer by the students 
     *
     * @param mod_quiz_preflight_check_form $quizform
     * @param MoodleQuickForm $mform
     * @param int $attemptid
     * @return void
     */
    public function add_preflight_check_form_fields(mod_quiz_preflight_check_form $quizform,
    MoodleQuickForm $mform, $attemptid) {
        //using moodlequick form  $mform you can add a form here to be filled by user out before starting an attempt
    }
    /**
     * This is where you add checker if the required fields on preflight has met the criteria
     *
     * @param array $data
     * @param  $files
     * @param array $errors
     * @param int $attemptid
     * @return void
     */
    public function validate_preflight_check($data, $files, $errors, $attemptid) {
        $errors = false;
        return $errors;
    }
    /**
     * Function that allows you to control whether or not allow new attempt
     *
     * @param int $numprevattempts
     * @param object $lastattempt
     * @return boolean
     */
    public function prevent_new_attempt($numprevattempts, $lastattempt) {
        return false;
    }
}
