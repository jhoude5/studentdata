<?php

require_once('../../config.php');
require_once("forms/students.php");
require_once('locallib.php');
global $SESSION, $USER, $DB, $CFG, $PAGE, $OUTPUT;

$PAGE->set_url('/local/studentdata/student.php');
$PAGE->set_context(context_system::instance());
$PAGE->requires->js('/local/studentdata/assets/studentdata.js');

require_login();

$id = optional_param('id', '', PARAM_TEXT);
if(isset($_POST['id'])) {
    $id = $_POST['id'];
}
$errormessage = '';
if(isset($SESSION->formerror) && $SESSION->formerror == 1) {
    $errormessage = '<div class="usa-alert usa-alert-error" role="alert">
            <div class="usa-alert-body">
            <p class="usa-alert-text">The form did not submit because there were errors. Please correct the errors below and re-submit.
            </p></div></div>';
} else {
    $SESSION->formerror = 1;

}

$strpagetitle = get_string('studentdata', 'local_studentdata');
if(!empty($id)) {
    $strpageheading = 'Edit student';
} else {
    $strpageheading = get_string('addstudent', 'local_studentdata');
}

$PAGE->set_title($strpageheading);
$PAGE->set_heading('Student Achievement in Reading');
$PAGE->set_pagelayout('starcourse');

$mform = new students_form();
$toform = [];

$alphadb = $fluencydb = $vocabdb = $compredb = array();

$alphaid = $fluencyid = $vocabid = $compreid = "";

//Handle form cancel operation, if cancel button is present on form
  if ($mform->is_cancelled()) {
      $SESSION->formerror = 0;
      redirect($_SESSION['studentdata_previousurl'], 'Form was cancelled.', 10);
  } // Process data
  elseif ($fromform = $mform->get_data()) {

          $alphadb['highest_level_alphabetics'] = $fromform->highest_level_alphabetics;
          $alphadb['level1'] = $fromform->level1;
          $alphadb['level2'] = $fromform->level2;
          $alphadb['level3'] = $fromform->level3;
          $alphadb['level4'] = $fromform->level4;
          $alphadb['level5'] = $fromform->level5;
          $alphadb['level6'] = $fromform->level6;
          $alphadb['level7'] = $fromform->level7;
          $alphadb['level8'] = $fromform->level8;
          $alphadb['highest'] = $fromform->highest;
          $alphadb['alphabetics_level'] = $fromform->alphabetics_level;

          $fluencydb['begin_level_fluency'] = $fromform->begin_level_fluency;
          $fluencydb['radioar1'] = $fromform->yesnona1;
          $fluencydb['radioar2'] = $fromform->yesnona2;
          $fluencydb['radioar3'] = $fromform->yesnona3;
          $fluencydb['radioar4'] = $fromform->yesnona4;
          $fluencydb['radioar5'] = $fromform->yesnona5;
          $fluencydb['radioar6'] = $fromform->yesnona6;
          $fluencydb['radioar7'] = $fromform->yesnona7;
          $fluencydb['radioar8'] = $fromform->yesnona8;
          $fluencydb['radioarr1'] = $fromform->yesno;
          $fluencydb['accuracy'] = $fromform->accuracy;
          $fluencydb['rates'] = $fromform->rates;

          $vocabdb['begin_level_vocab'] = $fromform->begin_level_vocab;
          $vocabdb['level1acc'] = $fromform->level1acc;
          $vocabdb['level2acc'] = $fromform->level2acc;
          $vocabdb['level3acc'] = $fromform->level3acc;
          $vocabdb['level4acc'] = $fromform->level4acc;
          $vocabdb['level5acc'] = $fromform->level5acc;
          $vocabdb['level6acc'] = $fromform->level6acc;
          $vocabdb['level7acc'] = $fromform->level7acc;
          $vocabdb['level8acc'] = $fromform->level8acc;
          $vocabdb['instructvocab'] = $fromform->instructvocab;

          $compredb['begin_level_compre'] = $fromform->begin_level_compre;
          $compredb['level1perc'] = $fromform->level1perc;
          $compredb['level2perc'] = $fromform->level2perc;
          $compredb['levelperc3'] = $fromform->levelperc3;
          $compredb['level4perc'] = $fromform->level4perc;
          $compredb['level5perc'] = $fromform->level5perc;
          $compredb['level6perc'] = $fromform->level6perc;
          $compredb['level7perc'] = $fromform->level7perc;
          $compredb['level8perc'] = $fromform->level8perc;
          $compredb['level1rate'] = $fromform->level1rate;
          $compredb['level2rate'] = $fromform->level2rate;
          $compredb['level3rate'] = $fromform->level3rate;
          $compredb['level4rate'] = $fromform->level4rate;
          $compredb['level5rate'] = $fromform->level5rate;
          $compredb['level6rate'] = $fromform->level6rate;
          $compredb['level7rate'] = $fromform->level7rate;
          $compredb['level8rate'] = $fromform->level8rate;
          $compredb['comprehension'] = $fromform->comprehension;

          foreach($fromform->types as $key => $type) {
              if($key == 'alpha') {
                  $alphadb['instructional_priorities'] = $type;
              }
              if($key == 'vocab') {
                  $vocabdb['instructional_priorities'] = $type;
              }
              if($key == 'fluency') {
                  $fluencydb['instructional_priorities'] = $type;
              }
              if($key == 'compre') {
                  $compredb['instructional_priorities'] = $type;
              }
          }

          $mainobj = [];
          $mainobj['name'] = $fromform->name;
          $mainobj['tabe'] = $fromform->tabe;
          $mainobj['notes'] = $fromform->notes;

          $mainobj['userid'] = $USER->id;

      // If ID is in URL then update the records
      if ($id) {
          $mainobj['id'] = $id;
          $alphadb['id'] = $id;
          $fluencydb['id'] = $id;
          $vocabdb['id'] = $id;
          $compredb['id'] = $id;

          $DB->update_record('local_studentdata', $mainobj);
          $DB->update_record('local_studentdata_alpha', $alphadb);
          $DB->update_record('local_studentdata_fluency', $fluencydb);
          $DB->update_record('local_studentdata_vocab', $vocabdb);
          $DB->update_record('local_studentdata_compre', $compredb);

          if(isset($_SESSION['studentdata_previousurl'])) {
              if(!strpos($_SESSION['studentdata_previousurl'], 'local/studentdata/studentform.php')) {
                  redirect($_SESSION['studentdata_previousurl'], 'Changes saved', 10,  \core\output\notification::NOTIFY_SUCCESS);
              }
          }
          redirect('/local/studentdata/student.php', 'Changes saved', 10,  \core\output\notification::NOTIFY_SUCCESS);

      } // Insert data into all 5 tables
      else {
              $DB->insert_record('local_studentdata_alpha', $alphadb);
              $DB->insert_record('local_studentdata_fluency', $fluencydb);
              $DB->insert_record('local_studentdata_vocab', $vocabdb);
              $DB->insert_record('local_studentdata_compre', $compredb);

              // Adding new record to studentdata table need to get each tables id
              $alphadbget = $DB->get_records('local_studentdata_alpha', null, '');
              $fluencydbget = $DB->get_records('local_studentdata_fluency', null, '');
              $vocabdbget = $DB->get_records('local_studentdata_vocab', null, '');
              $compredbget = $DB->get_records('local_studentdata_compre', null, '');

              $alpharow = end($alphadbget);
              $alphaid = $alpharow->id;
              $fluencyrow = end($fluencydbget);
              $fluencyid = $fluencyrow->id;
              $vocabrow = end($vocabdbget);
              $vocabid = $vocabrow->id;
              $comprerow = end($compredbget);
              $compreid = $comprerow->id;

              // Main table array object
              $mainobj['alphabeticsid'] = $alphaid;
              $mainobj['fluencyid'] = $fluencyid;
              $mainobj['vocabid'] = $vocabid;
              $mainobj['compreid'] = $compreid;

              // Not inserting id into main table
              $DB->insert_record('local_studentdata', $mainobj);

          $SESSION->formerror = 0;
          if(isset($_SESSION['studentdata_previousurl']) && !strpos($_SESSION['studentdata_previousurl'], '/local/studentdata/studentform.php')) {
              redirect($_SESSION['studentdata_previousurl'], 'New student successfully added.', 10,  \core\output\notification::NOTIFY_SUCCESS);
          }
          redirect('/local/studentdata/student.php', 'New student successfully added.', 10,  \core\output\notification::NOTIFY_SUCCESS);

      }

  } else {
      // The form needs to show existing record values to edit
      if ($id) {
          $maintable = $DB->get_record_select('local_studentdata', 'id = ?', array($id));

          $alphatable= $DB->get_record_select('local_studentdata_alpha', 'id = ?', array($maintable->alphabeticsid));
          $fluencytable = $DB->get_record_select('local_studentdata_fluency', 'id = ?', array($maintable->fluencyid));
          $vocabtable = $DB->get_record_select('local_studentdata_vocab', 'id = ?', array($maintable->vocabid));
          $compretable = $DB->get_record_select('local_studentdata_compre', 'id = ?', array($maintable->compreid));

          $toform['id'] = $id;
          $toform['name'] = $maintable->name;
          $toform['tabe'] = $maintable->tabe;
          $toform['notes'] = $maintable->notes;

          foreach($alphatable as $key => $value) {
//            do not overwrite the key => id set from the main student table
              if(!array_key_exists($key, $toform)) {
                if ($key === 'instructional_priorities') {
                  $toform["types[$value]"] = $value;
                } else {
                  $toform[$key] = $value;
                }
              }
          }
          foreach($fluencytable as $key => $value) {
              if(!array_key_exists($key, $toform)) {
                if ($key === 'instructional_priorities') {
                  $toform["types[$value]"] = $value;
                } elseif ($key === 'radioar1') {
                  $toform['yesnona1'] = $value;
                } elseif ($key === 'radioar2') {
                  $toform['yesnona2'] = $value;
                } elseif ($key === 'radioar3') {
                  $toform['yesnona3'] = $value;
                } elseif ($key === 'radioar4') {
                  $toform['yesnona4'] = $value;
                } elseif ($key === 'radioar5') {
                  $toform['yesnona5'] = $value;
                } elseif ($key === 'radioar6') {
                  $toform['yesnona6'] = $value;
                } elseif ($key === 'radioar7') {
                  $toform['yesnona7'] = $value;
                } elseif ($key === 'radioar8') {
                  $toform['yesnona8'] = $value;
                } elseif ($key === 'radioarr1') {
                  $toform['yesno'] = $value;
                } else {
                  $toform[$key] = $value;
                }
              }
          }
          foreach($vocabtable as $key => $value) {
              if(!array_key_exists($key, $toform)) {
                if ($key === 'instructional_priorities') {
                  $toform["types[$value]"] = $value;
                } else {
                  $toform[$key] = $value;
                }
              }
          }
          foreach($compretable as $key => $value) {
              if(!array_key_exists($key, $toform)) {
                if ($key === 'instructional_priorities') {
                  $toform["types[$value]"] = $value;
                } else {
                  $toform[$key] = $value;
                }
              }
          }
      }
      $mform->set_data($toform);

      // Save previous url to redirect back to
      $_SESSION['studentdata_previousurl'] = $_SERVER['HTTP_REFERER'];


      $studentdata = new studentdata();
      $data = $studentdata->get_student_data($USER->id);
      $results = new stdClass();
      $results->data = array_values($data);

      echo $OUTPUT->header();
      // Floating student data chart
      echo $OUTPUT->render_from_template('local_studentdata/modal_studenttable', $results);

      echo '<h2>' . $strpageheading . '</h2>';
      if($errormessage != '') {
          echo $errormessage;
      }
      if(!empty($id)) {
          echo '<div class="container"><div class="row"><a href="/local/studentdata/deletestudent.php?id=$id" class="btn btn-secondary float-right">Delete this student</a></div></div>';
      }
      $mform->display();


      echo $OUTPUT->footer();
  }
