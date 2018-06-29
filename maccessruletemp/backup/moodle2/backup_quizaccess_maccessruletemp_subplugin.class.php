<?php

require_once($CFG->dirroot . '/mod/quiz/backup/moodle2/backup_mod_quiz_access_subplugin.class.php');

defined('MOODLE_INTERNAL') || die();

class backup_quizaccess_maccessruletemp_subplugin extends backup_mod_quiz_access_subplugin {

    protected function define_quiz_subplugin_structure() {
        
        $subplugin = $this->get_subplugin_element();
        $subpluginwrapper = new backup_nested_element($this->get_recommended_name());
        $subplugintablesettings = new backup_nested_element('quizaccess_maccessruletemp',
            null, array('maccessruletemp'));
        
        $subplugin->add_child($subpluginwrapper);
        $subpluginwrapper->add_child($subplugintablesettings);
        
        $subplugintablesettings->set_source_table('quizaccess_maccessruletemp',
            array('quizid' => backup::VAR_ACTIVITYID));
            
        return $subplugin;
    }

}