<?php

require_once($CFG->dirroot . '/mod/quiz/backup/moodle2/restore_mod_quiz_access_subplugin.class.php');

defined('MOODLE_INTERNAL') || die();

class restore_quizaccess_maccessruletemp_subplugin extends restore_mod_quiz_access_subplugin {

    protected function define_quiz_subplugin_structure() {
        
        $paths = array();
        
        $elename = $this->get_namefor('');
        $elepath = $this->get_pathfor('/quizaccess_maccessruletemp');
        $paths[] = new restore_path_element($elename, $elepath);
        
        return $paths;        
    }

    public function process_quizaccess_maccessruletemp($data) {
        global $DB;
        
        $data = (object)$data;
        $data->quizid = $this->get_new_parentid('quiz');
        $DB->insert_record('quizaccess_maccessruletemp', $data);
    }

}
