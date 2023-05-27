<?php

/**
 * Student data form
 *
 * @package    local_studentdata
 * @copyright  2021 Jennifer Aube <jennifer.aube@civicactions.com>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

require_once("$CFG->libdir/formslib.php");

class students_form extends moodleform
{
    //Add elements to form
    public function definition()
    {
        global $CFG;

        $mform = $this->_form;

        if(isset($_GET['id'])) {
            $mform->addElement('hidden', 'id', $_GET['id']);
            $mform->setType('id', PARAM_RAW);
        }

        // Name
        $mform->addElement('text', 'name', 'Student name', ' size="100%" ');
        $mform->setType('name', PARAM_RAW);
        
        // TABE/CASAS Reading GLE
        $mform->addElement('float', 'tabe', 'TABE/CASAS GLE', ' size="100%" ');
        $mform->setType('tabe', PARAM_RAW);
        $mform->addRule('tabe', get_string('numericalerror', 'local_studentdata'), 'numeric', null, 'server');
        // Alphabetics
        $mform->addElement('html', '<div class="accordion" id="studentdata-accordion"><div class="accordion-item" id="accordion">');
        $mform->addElement('html',
                    '<h3 class="usa-accordion__heading" id="headingone">
                    <button class="usa-accordion__button collapsed" type="button" aria-expanded="false">
                    Alphabetics<i class="fa fa-plus"></i><i class="fa fa-minus"></i></button></h3>');
        // Alphabetics - At what level did you begin testing?
        $options = array(
            '0' => '-None-',
            '1' => 1,
            '2' => 2,
            '3' => 3,
            '4' => 4,
            '5' => 5,
            '6' => 6,
            '7' => 7,
            '8' => 8,
        );
        $options2 = array(
            '0' => '-None-',
            '1' => 1,
            '2' => 2,
            '3' => 3,
            '4' => 4,
            '5' => 5,
            '6' => 6,
            '7' => 7,
            '8' => 8,
            '100' => '8+',
        );
        $retelling_options = array(
          '-1' => '-None-',
          '3' => 3,
          '2' => 2,
          '1' => 1,
          '0' => 0,
        );
        $mform->addElement('html', '<div id="collapseone" class="accordion-collapse usa-accordion__content usa-prose collapse" aria-labelledby="headingone"><div class="accordion-body">');
        $mform->addElement('select', 'highest_level_alphabetics', 'At what level did you begin testing?', $options);
        $mform->setType('highest_level_alphabetics', PARAM_RAW);
        $mform->setDefault('highest_level_alphabetics', '-None-');
            // Alphabetics - Number of words correct
        $mform->addElement('html', '<div class="accordion" id="studentdata-accordion--inner"><div class="accordion-item" id="accordion">');
        $mform->addElement('html',
            '<h3 class="usa-accordion__heading" id="headingone">
                    <button class="usa-accordion__button collapsed" type="button" aria-expanded="false">
                    Number of words correct<i class="fa fa-plus"></i><i class="fa fa-minus"></i></button></h3>');

                // Number of words correct - Level 1
        $mform->addElement('html', '<div id="collapseone" class="accordion-collapse usa-accordion__content usa-prose collapse" aria-labelledby="headingone"><div class="accordion-body">');
        $mform->addElement('float', 'level1', 'Level 1');
        $mform->setType('level1', PARAM_RAW);
        $mform->addRule('level1', get_string('numericalerror', 'local_studentdata'), 'numeric', null, 'server');
        
                // Number of words correct - Level 2
        $mform->addElement('float', 'level2', 'Level 2');
        $mform->setType('level2', PARAM_RAW);
        $mform->addRule('level2', get_string('numericalerror', 'local_studentdata'), 'numeric', null, 'server');
                // Number of words correct - Level 3
        $mform->addElement('float', 'level3', 'Level 3');
        $mform->setType('level3', PARAM_RAW);
        $mform->addRule('level3', get_string('numericalerror', 'local_studentdata'), 'numeric', null, 'server');
                // Number of words correct - Level 4
        $mform->addElement('float', 'level4', 'Level 4');
        $mform->setType('level4', PARAM_RAW);
        $mform->addRule('level4', get_string('numericalerror', 'local_studentdata'), 'numeric', null, 'server');
                // Number of words correct - Level 1
        $mform->addElement('float', 'level5', 'Level 5');
        $mform->setType('level5', PARAM_RAW);
        $mform->addRule('level5', get_string('numericalerror', 'local_studentdata'), 'numeric', null, 'server');
                // Number of words correct - Level 6
        $mform->addElement('float', 'level6', 'Level 6');
        $mform->setType('level6', PARAM_RAW);
        $mform->addRule('level6', get_string('numericalerror', 'local_studentdata'), 'numeric', null, 'server');
                // Number of words correct - Level 7
        $mform->addElement('float', 'level7', 'Level 7');
        $mform->setType('level7', PARAM_RAW);
        $mform->addRule('level7', get_string('numericalerror', 'local_studentdata'), 'numeric', null, 'server');
                // Number of words correct - Level 8
        $mform->addElement('float', 'level8', 'Level 8');
        $mform->setType('level8', PARAM_RAW);
        $mform->addRule('level8', get_string('numericalerror', 'local_studentdata'), 'numeric', null, 'server');
        $mform->addElement('html', '</div></div></div>');
            // Alphebtics - Highest Level Accurate on Alphabetics List
        $mform->addElement('select', 'highest', 'Highest Level Accurate on Alphabetics List', $options, ' size="100%" ');
        $mform->setType('highest', PARAM_RAW);
        $mform->setDefault('highest', '-None-');
            // Alphabetics - Alphabetics Instructional Level
        $levels = array (
            '0' => '-None-',
            'None indicated' => 'None indicated',
            'TBD after fluency assessment' => 'TBD after fluency assessment',
            'Basic phonics' => 'Basic phonics',
            'Advanced alphabetics' => 'Advanced alphabetics'
         );
        $mform->addElement('select', 'alphabetics_level', 'Alphabetics Instructional Level', $levels, ' size="100%" ');
        $mform->setType('alphabetics_level', PARAM_RAW);
        $mform->setDefault('alphabetics_level', '-None-');
        // End accordion for Alphabetics
        $mform->addElement('html', '</div></div></div>');

        // Fluency
        $mform->addElement('html',
            '<div class="accordion-item"><h3 class="usa-accordion__heading" id="headingtwo">
                    <button class="usa-accordion__button collapsed" type="button" aria-expanded="false">
                    Fluency<i class="fa fa-plus"></i><i class="fa fa-minus"></i></button></h3>');

        $mform->addElement('html', '<div id="collapsetwo" class="accordion-collapse usa-accordion__content usa-prose collapse" aria-labelledby="headingtwo"><div class="accordion-body">');

        $mform->addElement('select', 'begin_level_fluency', 'At what level did you begin testing?', $options);
        $mform->setType('begin_level_fluency', PARAM_RAW);
        $mform->setDefault('begin_level_fluency', '-None-');

        $mform->addElement('html', '<div class="accordion" id="studentdata-accordion--inner"><div class="accordion-item" id="accordion">');
        $mform->addElement('html',
            '<h3 class="usa-accordion__heading" id="headingone">
                    <button class="usa-accordion__button collapsed" type="button" aria-expanded="false">
                    Enter score for accuracy<i class="fa fa-plus"></i><i class="fa fa-minus"></i></button></h3>');

        $mform->addElement('html', '<div id="collapsetwo" class="accordion-collapse usa-accordion__content usa-prose collapse" aria-labelledby="headingtwo"><div class="accordion-body">');

        $radioarray1=array();
        $radioarray1[] = $mform->createElement('radio', 'yesnona1', '', 'N/A', 0, '');
        $radioarray1[] = $mform->createElement('radio', 'yesnona1', '', 'Yes', 1, '');
        $radioarray1[] = $mform->createElement('radio', 'yesnona1', '', 'No', 2, '');

        $mform->addGroup($radioarray1, 'radioar1', 'Accurate at Level 1', array(' '), false);

        $radioarray2=array();
        $radioarray2[] = $mform->createElement('radio', 'yesnona2', '', 'N/A', 0, '');
        $radioarray2[] = $mform->createElement('radio', 'yesnona2', '', 'Yes', 1, '');
        $radioarray2[] = $mform->createElement('radio', 'yesnona2', '', 'No', 2, '');
        $mform->addGroup($radioarray2, 'radioar2', 'Accurate at Level 2', array(' '), false);

        $radioarray3=array();
        $radioarray3[] = $mform->createElement('radio', 'yesnona3', '', 'N/A', 0, '');
        $radioarray3[] = $mform->createElement('radio', 'yesnona3', '', 'Yes', 1, '');
        $radioarray3[] = $mform->createElement('radio', 'yesnona3', '', 'No', 2, '');
        $mform->addGroup($radioarray3, 'radioar3', 'Accurate at Level 3', array(' '), false);

        $radioarray4=array();
        $radioarray4[] = $mform->createElement('radio', 'yesnona4', '', 'N/A', 0, '');
        $radioarray4[] = $mform->createElement('radio', 'yesnona4', '', 'Yes', 1, '');
        $radioarray4[] = $mform->createElement('radio', 'yesnona4', '', 'No', 2, '');
        $mform->addGroup($radioarray4, 'radioar4', 'Accurate at Level 4', array(' '), false);

        $radioarray5=array();
        $radioarray5[] = $mform->createElement('radio', 'yesnona5', '', 'N/A', 0, '');
        $radioarray5[] = $mform->createElement('radio', 'yesnona5', '', 'Yes', 1, '');
        $radioarray5[] = $mform->createElement('radio', 'yesnona5', '', 'No', 2, '');
        $mform->addGroup($radioarray5, 'radioar5', 'Accurate at Level 5', array(' '), false);

        $radioarray6=array();
        $radioarray6[] = $mform->createElement('radio', 'yesnona6', '', 'N/A', 0, '');
        $radioarray6[] = $mform->createElement('radio', 'yesnona6', '', 'Yes', 1, '');
        $radioarray6[] = $mform->createElement('radio', 'yesnona6', '', 'No', 2, '');
        $mform->addGroup($radioarray6, 'radioar6', 'Accurate at Level 6', array(' '), false);

        $radioarray7=array();
        $radioarray7[] = $mform->createElement('radio', 'yesnona7', '', 'N/A', 0, '');
        $radioarray7[] = $mform->createElement('radio', 'yesnona7', '', 'Yes', 1, '');
        $radioarray7[] = $mform->createElement('radio', 'yesnona7', '', 'No', 2, '');
        $mform->addGroup($radioarray7, 'radioar7', 'Accurate at Level 7', array(' '), false);

        $radioarray8=array();
        $radioarray8[] = $mform->createElement('radio', 'yesnona8', '', 'N/A', 0, '');
        $radioarray8[] = $mform->createElement('radio', 'yesnona8', '', 'Yes', 1, '');
        $radioarray8[] = $mform->createElement('radio', 'yesnona8', '', 'No', 2, '');
        $mform->addGroup($radioarray8, 'radioar8', 'Accurate at Level 8', array(' '), false);

        $mform->addElement('html', '</div></div></div>');

        $radioarray=array();
        $radioarray[] = $mform->createElement('radio', 'yesno', '', 'N/A', 0, '');
        $radioarray[] = $mform->createElement('radio', 'yesno', '', 'Yes', 1, '');
        $radioarray[] = $mform->createElement('radio', 'yesno', '', 'No', 2, '');
        $mform->addGroup($radioarray, 'radioarr1', 'Good rate & prosody on highest passage?', array(' '), false);

        $mform->addElement('select', 'accuracy', 'Fluency Instructional Level: Accuracy', $options2);
        $mform->setType('accuracy', PARAM_RAW);
        $mform->setDefault('accuracy', '-None-');

        $mform->addElement('select', 'rates', 'Fluency Instructional Level: Rate and Prosody', $options2);
        $mform->setType('rates', PARAM_RAW);
        $mform->setDefault('rates', '-None-');

        $mform->addElement('html', '</div></div></div>');
        // Vocabulary
        $mform->addElement('html',
            '<div class="accordion-item"><h3 class="usa-accordion__heading" id="headingthree">
                    <button class="usa-accordion__button collapsed" type="button" aria-expanded="false">
                    Vocabulary<i class="fa fa-plus"></i><i class="fa fa-minus"></i></button></h3>');

        $mform->addElement('html', '<div id="collapsethree" class="accordion-collapse usa-accordion__content usa-prose collapse" aria-labelledby="headingthree">
                    <div class="accordion-body">');

        $mform->addElement('select', 'begin_level_vocab', 'At what level did you begin testing?', $options);
        $mform->setType('begin_level_vocab', PARAM_RAW);
        $mform->setDefault('begin_level_vocab', '-None-');

        $mform->addElement('html', '<div class="accordion" id="studentdata-accordion--inner"><div class="accordion-item" id="accordion">');
        $mform->addElement('html',
            '<h3 class="usa-accordion__heading" id="headingone">
                    <button class="usa-accordion__button collapsed" type="button" aria-expanded="false">
                    Number of words correct<i class="fa fa-plus"></i><i class="fa fa-minus"></i></button></h3>');

        // Number of words correct - Level 1
        $mform->addElement('html', '<div id="collapsethree" class="accordion-collapse usa-accordion__content usa-prose collapse" aria-labelledby="headingthree">
                    <div class="accordion-body">');
        $mform->addElement('float', 'level1acc', 'Level 1');
        $mform->setType('level1acc', PARAM_RAW);
        $mform->addRule('level1acc', get_string('numericalerror', 'local_studentdata'), 'numeric', null, 'server');
        // Number of words correct - Level 2
        $mform->addElement('float', 'level2acc', 'Level 2');
        $mform->setType('level2acc', PARAM_RAW);
        $mform->addRule('level2acc', get_string('numericalerror', 'local_studentdata'), 'numeric', null, 'server');
        // Number of words correct - Level 3
        $mform->addElement('float', 'level3acc', 'Level 3');
        $mform->setType('level3acc', PARAM_RAW);
        $mform->addRule('level3acc', get_string('numericalerror', 'local_studentdata'), 'numeric', null, 'server');
        // Number of words correct - Level 4
        $mform->addElement('float', 'level4acc', 'Level 4');
        $mform->setType('level4acc', PARAM_RAW);
        $mform->addRule('level4acc', get_string('numericalerror', 'local_studentdata'), 'numeric', null, 'server');
        $mform->addElement('float', 'level5acc', 'Level 5');
        $mform->setType('level5acc', PARAM_RAW);
        $mform->addRule('level5acc', get_string('numericalerror', 'local_studentdata'), 'numeric', null, 'server');
        // Number of words correct - Level 6
        $mform->addElement('float', 'level6acc', 'Level 6');
        $mform->setType('level6acc', PARAM_RAW);
        $mform->addRule('level6acc', get_string('numericalerror', 'local_studentdata'), 'numeric', null, 'server');
        // Number of words correct - Level 7
        $mform->addElement('float', 'level7acc', 'Level 7');
        $mform->setType('level7acc', PARAM_RAW);
        $mform->addRule('level7acc', get_string('numericalerror', 'local_studentdata'), 'numeric', null, 'server');
        // Number of words correct - Level 8
        $mform->addElement('float', 'level8acc', 'Level 8');
        $mform->setType('level8acc', PARAM_RAW);
        $mform->addRule('level8acc', get_string('numericalerror', 'local_studentdata'), 'numeric', null, 'server');
        $mform->addElement('html', '</div></div></div>');

        $mform->addElement('select', 'instructvocab', 'Vocabulary Instructional Level', $options2);
        $mform->setType('instructvocab', PARAM_RAW);
        $mform->setDefault('instructvocab', '-None-');

        $mform->addElement('html', '</div></div></div>');
        // Comprehension
        $mform->addElement('html',
            '<div class="accordion-item"><h3 class="usa-accordion__heading" id="headingfour">
                    <button class="usa-accordion__button collapsed" type="button" aria-expanded="false">
                    Comprehension<i class="fa fa-plus"></i><i class="fa fa-minus"></i></button></h3>');

        $mform->addElement('html', '<div id="collapsefour" class="accordion-collapse usa-accordion__content usa-prose collapse" aria-labelledby="headingfour"><div class="accordion-body">');

        $mform->addElement('select', 'begin_level_compre', 'At what level did you begin testing?', $options);
        $mform->setType('begin_level_compre', PARAM_RAW);
        $mform->setDefault('begin_level_compre', '-None-');

        $mform->addElement('html', '<div class="accordion" id="studentdata-accordion--inner"><div class="accordion-item" id="accordion">');
        $mform->addElement('html',
            '<h3 class="usa-accordion__heading" id="headingone">
                    <button class="usa-accordion__button collapsed" type="button" aria-expanded="false">
                    Percent of questions correct (If using questions)<i class="fa fa-plus"></i><i class="fa fa-minus"></i></button></h3>');

        $mform->addElement('html', '<div id="collapsefour" class="accordion-collapse usa-accordion__content usa-prose collapse" aria-labelledby="headingfour"><div class="accordion-body">');
        $mform->addElement('float', 'level1perc', 'Level 1');
        $mform->setType('level1perc', PARAM_RAW);
        $mform->addRule('level1perc', get_string('numericalerror', 'local_studentdata'), 'numeric', null, 'server');
        // Number of words correct - Level 2
        $mform->addElement('float', 'level2perc', 'Level 2');
        $mform->setType('level2perc', PARAM_RAW);
        $mform->addRule('level2perc', get_string('numericalerror', 'local_studentdata'), 'numeric', null, 'server');
        // Number of words correct - Level 3
        $mform->addElement('float', 'levelperc3', 'Level 3');
        $mform->setType('levelperc3', PARAM_RAW);
        $mform->addRule('levelperc3', get_string('numericalerror', 'local_studentdata'), 'numeric', null, 'server');
        // Number of words correct - Level 4
        $mform->addElement('float', 'level4perc', 'Level 4');
        $mform->setType('level4perc', PARAM_RAW);
        $mform->addRule('level4perc', get_string('numericalerror', 'local_studentdata'), 'numeric', null, 'server');
        // Number of words correct - Level 1
        $mform->addElement('float', 'level5perc', 'Level 5');
        $mform->setType('level5perc', PARAM_RAW);
        $mform->addRule('level5perc', get_string('numericalerror', 'local_studentdata'), 'numeric', null, 'server');
        // Number of words correct - Level 6
        $mform->addElement('float', 'level6perc', 'Level 6');
        $mform->setType('level6perc', PARAM_RAW);
        $mform->addRule('level5perc', get_string('numericalerror', 'local_studentdata'), 'numeric', null, 'server');
        // Number of words correct - Level 7
        $mform->addElement('float', 'level7perc', 'Level 7');
        $mform->setType('level7perc', PARAM_RAW);
        $mform->addRule('level7perc', get_string('numericalerror', 'local_studentdata'), 'numeric', null, 'server');
        // Number of words correct - Level 8
        $mform->addElement('float', 'level8perc', 'Level 8');
        $mform->setType('level8perc', PARAM_RAW);
        $mform->addRule('level8perc', get_string('numericalerror', 'local_studentdata'), 'numeric', null, 'server');
        $mform->addElement('html', '</div></div></div>');

        $mform->addElement('html', '<div class="accordion" id="studentdata-accordion--inner"><div class="accordion-item" id="accordion">');
        $mform->addElement('html',
            '<h3 class="usa-accordion__heading" id="headingone">
                    <button class="usa-accordion__button collapsed" type="button" aria-expanded="false">
                    Retelling rating (If using retelling)<i class="fa fa-plus"></i><i class="fa fa-minus"></i></button></h3>');

        $mform->addElement('html', '<div id="collapsefour" class="accordion-collapse usa-accordion__content usa-prose collapse" aria-labelledby="headingfour"><div class="accordion-body">');
        $mform->addElement('select', 'level1rate', 'Level 1', $retelling_options,' size="20%" ');
        $mform->setType('level1rate', PARAM_RAW);
        $mform->setDefault('level1rate', '-None-');
        // Number of words correct - Level 2
        $mform->addElement('select', 'level2rate', 'Level 2', $retelling_options);
        $mform->setType('level2rate', PARAM_RAW);
        $mform->setDefault('level2rate', '-None-');
        // Number of words correct - Level 3
        $mform->addElement('select', 'level3rate', 'Level 3', $retelling_options);
        $mform->setType('level3rate', PARAM_RAW);
        $mform->setDefault('level3rate', '-None-');
        // Number of words correct - Level 4
        $mform->addElement('select', 'level4rate', 'Level 4', $retelling_options);
        $mform->setType('level4rate', PARAM_RAW);
        $mform->setDefault('level4rate', '-None-');
        // Number of words correct - Level 1
        $mform->addElement('select', 'level5rate', 'Level 5', $retelling_options);
        $mform->setType('level5rate', PARAM_RAW);
        $mform->setDefault('level5rate', '-None-');
        // Number of words correct - Level 6
        $mform->addElement('select', 'level6rate', 'Level 6', $retelling_options);
        $mform->setType('level6rate', PARAM_RAW);
        $mform->setDefault('level6rate', '-None-');
        // Number of words correct - Level 7
        $mform->addElement('select', 'level7rate', 'Level 7', $retelling_options);
        $mform->setType('level7rate', PARAM_RAW);
        $mform->setDefault('level7rate', '-None-');
        // Number of words correct - Level 8
        $mform->addElement('select', 'level8rate', 'Level 8', $retelling_options);
        $mform->setType('level8rate', PARAM_RAW);
        $mform->setDefault('level8rate', '-None-');
        $mform->addElement('html', '</div></div></div>');

        $mform->addElement('select', 'comprehension', 'Comprehension Instructional Level', $options2);
        $mform->setType('comprehension', PARAM_RAW);
        $mform->setDefault('comprehension', '-None-');

        $mform->addElement('html', '</div></div></div></div>');


        $types = [
            'alpha' => 'Alphabetics',
            'vocab' => 'Vocabulary',
            'fluency' => 'Fluency',
            'compre' => 'Comprehension',

        ];
        $typeitem = array();
        foreach ($types as $key => $value) {
            $typeitem[] = &$mform->createElement('advcheckbox', $key, '', $value, array('name' => $key,'group'=>1), $key);
            $mform->setDefault("types[$key]", false);
        }
        $mform->addElement('html', '<h3>Instructional Priorities</h3>
        <p>Note: Wait until you\'ve completed diagnostic assessment for all four components and have also completed Module 11 before deciding on instructional priorities.
        </p>');

        $mform->addGroup($typeitem, 'types', 'Which components are instructional priorities for this student?<br>(you can change this at any time)');

        // Notes
        $mform->addElement('textarea', 'notes', 'Notes', ' size="100%" ');
        $mform->setType('notes', PARAM_RAW);
        $mform->setDefault('notes', '');
        $mform->addElement('html', '</div>');
        $this->add_action_buttons(true, 'Save student');

    }

}
