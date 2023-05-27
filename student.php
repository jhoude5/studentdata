<?php

require_once('../../config.php');

global $USER, $DB, $CFG, $PAGE, $OUTPUT, $SESSION;

$PAGE->set_url('/local/studentdata/student.php');
$PAGE->set_context(context_system::instance());
$PAGE->requires->js('/local/studentdata/assets/studentdata.js');

if(isset($SESSION->formerror) > 0) {
    $SESSION->formerror = 0;
}

require_login();
$strpageheading = get_string('pagetitle', 'local_studentdata');
$starcourse = $DB->get_record('course', ['shortname'=>'STAR']);
$courseid = $starcourse->id;
$pagetitle = 'Students';
$PAGE->set_pagelayout('starcourse');
$PAGE->set_title($pagetitle);
$PAGE->set_heading($strpageheading);

// Breadcrumbs
$PAGE->navbar->add('My courses');
$PAGE->navbar->add('STAR', new moodle_url('/course/view.php', ['id' => $courseid]));
$PAGE->navbar->add($pagetitle);
$alpha = $fluency = $vocab = $compre = $data = [];

$mainarr = $DB->get_records_select('local_studentdata', 'userid = ?', [$USER->id]);
foreach ($mainarr as $key => $row) {
  $alpha = $DB->get_records_select('local_studentdata_alpha', 'id = ?', [$row->id]);
  $fluency = $DB->get_records_select('local_studentdata_fluency', 'id = ?', [$row->id]);
  $vocab = $DB->get_records_select('local_studentdata_vocab', 'id = ?', [$row->id]);
  $compre = $DB->get_records_select('local_studentdata_compre', 'id = ?', [$row->id]);
  $main['id'] = $row->id;
  $main['name'] = $row->name;
  $main['notes'] = $row->notes;
  $main['tabe'] = $row->tabe;
  $instructional_priorities = [];
  // alphabetics
  if ($alpha[$key]) {
    if ($alpha[$key]->highest_level_alphabetics === '0') {
      $main['highest_level_alphabetics'] = '-';
    }
    else {
      if ($alpha[$key]->highest_level_alphabetics === '100') {
        $main['highest_level_alphabetics'] = '8+';
      }
      else {
        $main['highest_level_alphabetics'] = $alpha[$key]->highest_level_alphabetics;
      }
    }
    if ($alpha[$key]->level1 === '0') {
      $main['level1'] = NULL;
    }
    else {
      $main['level1'] = $alpha[$key]->level1;
    }
    if ($alpha[$key]->level2 === '0') {
      $main['level2'] = NULL;
    }
    else {
      $main['level2'] = $alpha[$key]->level2;
    }
    if ($alpha[$key]->level3 === '0') {
      $main['level3'] = NULL;
    }
    else {
      $main['level3'] = $alpha[$key]->level3;
    }
    if ($alpha[$key]->level4 === '0') {
      $main['level4'] = NULL;
    }
    else {
      $main['level4'] = $alpha[$key]->level4;
    }
    if ($alpha[$key]->level5 === '0') {
      $main['level5'] = NULL;
    }
    else {
      $main['level5'] = $alpha[$key]->level5;
    }
    if ($alpha[$key]->level6 === '0') {
      $main['level6'] = NULL;
    }
    else {
      $main['level6'] = $alpha[$key]->level6;
    }
    if ($alpha[$key]->level7 === '0') {
      $main['level7'] = NULL;
    }
    else {
      $main['level7'] = $alpha[$key]->level7;
    }
    if ($alpha[$key]->level8 === '0') {
      $main['level8'] = NULL;
    }
    else {
      $main['level8'] = $alpha[$key]->level8;
    }
    if ($alpha[$key]->highest === '0') {
      $main['highest'] = '-';
    }
    else {
      if ($alpha[$key]->highest === '100') {
        $main['highest'] = '8+';
      }
      else {
        $main['highest'] = $alpha[$key]->highest;
      }
    }
    if ($alpha[$key]->alphabetics_level === '0') {
      $main['alphabetics_level'] = '-';
    }
    else {
      $main['alphabetics_level'] = $alpha[$key]->alphabetics_level;
    }
    if ($alpha[$key]->instructional_priorities != NULL) {
      array_push($instructional_priorities, $alpha[$key]->instructional_priorities);
    }
  }

  //fluency
  if ($fluency[$key]) {
    if ($fluency[$key]->begin_level_fluency === '0') {
      $main['begin_level_fluency'] = '-';
    }
    else {
      if ($fluency[$key]->begin_level_fluency === '100') {
        $main['begin_level_fluency'] = '8+';
      }
      else {
        $main['begin_level_fluency'] = $fluency[$key]->begin_level_fluency;
      }
    }
    if ($fluency[$key]->radioar1 === '0') {
      $main['radioar1'] = NULL;
    }
    else {
      if ($fluency[$key]->radioar1 === '1') {
        $main['radioar1'] = 'Yes';
      }
      else {
        if ($fluency[$key]->radioar1 === '2') {
          $main['radioar1'] = 'No';
        }
      }
    }
    if ($fluency[$key]->radioar2 === '0') {
      $main['radioar2'] = NULL;
    }
    else {
      if ($fluency[$key]->radioar2 === '1') {
        $main['radioar2'] = 'Yes';
      }
      else {
        if ($fluency[$key]->radioar2 === '2') {
          $main['radioar2'] = 'No';
        }
      }
    }
    if ($fluency[$key]->radioar3 === '0') {
      $main['radioar3'] = NULL;
    }
    else {
      if ($fluency[$key]->radioar3 === '1') {
        $main['radioar3'] = 'Yes';
      }
      else {
        if ($fluency[$key]->radioar3 === '2') {
          $main['radioar3'] = 'No';
        }
      }
    }
    if ($fluency[$key]->radioar4 === '0') {
      $main['radioar4'] = NULL;
    }
    else {
      if ($fluency[$key]->radioar4 === '1') {
        $main['radioar4'] = 'Yes';
      }
      else {
        if ($fluency[$key]->radioar4 === '2') {
          $main['radioar4'] = 'No';
        }
      }
    }
    if ($fluency[$key]->radioar5 === '0') {
      $main['radioar5'] = NULL;
    }
    else {
      if ($fluency[$key]->radioar5 === '1') {
        $main['radioar5'] = 'Yes';
      }
      else {
        if ($fluency[$key]->radioar5 === '2') {
          $main['radioar5'] = 'No';
        }
      }
    }
    if ($fluency[$key]->radioar6 === '0') {
      $main['radioar6'] = NULL;
    }
    else {
      if ($fluency[$key]->radioar6 === '1') {
        $main['radioar6'] = 'Yes';
      }
      else {
        if ($fluency[$key]->radioar6 === '2') {
          $main['radioar6'] = 'No';
        }
      }
    }
    if ($fluency[$key]->radioar7 === '0') {
      $main['radioar7'] = NULL;
    }
    else {
      if ($fluency[$key]->radioar7 === '1') {
        $main['radioar7'] = 'Yes';
      }
      else {
        if ($fluency[$key]->radioar7 === '2') {
          $main['radioar7'] = 'No';
        }
      }
    }
    if ($fluency[$key]->radioar8 === '0') {
      $main['radioar8'] = NULL;
    }
    else {
      if ($fluency[$key]->radioar8 === '1') {
        $main['radioar8'] = 'Yes';
      }
      else {
        if ($fluency[$key]->radioar8 === '2') {
          $main['radioar8'] = 'No';
        }
      }
    }
    if ($fluency[$key]->radioarr1 === '0') {
      $main['radioarr1'] = NULL;
    }
    else {
      if ($fluency[$key]->radioarr1 === '1') {
        $main['radioarr1'] = 'Yes';
      }
      else {
        if ($fluency[$key]->radioarr1 === '2') {
          $main['radioarr1'] = 'No';
        }
      }
    }
    if ($fluency[$key]->accuracy === '0') {
      $main['accuracy'] = '-';
    }
    else {
      if ($fluency[$key]->accuracy === '100') {
        $main['accuracy'] = '8+';
      }
      else {
        $main['accuracy'] = $fluency[$key]->accuracy;
      }
    }
    if ($fluency[$key]->rates === '0') {
      $main['rates'] = '-';
    }
    else {
      if ($fluency[$key]->rates === '100') {
        $main['rates'] = '8+';
      }
      else {
        $main['rates'] = $fluency[$key]->rates;
      }
    }
    if ($fluency[$key]->instructional_priorities != NULL) {
      array_push($instructional_priorities, $fluency[$key]->instructional_priorities);
    }
  }

  //vocabulary
  if ($vocab[$key]) {
    if ($vocab[$key]->begin_level_vocab === '0') {
      $main['begin_level_vocab'] = '-';
    }
    else {
      if ($vocab[$key]->begin_level_vocab === '100') {
        $main['begin_level_vocab'] = '8+';
      }
      else {
        $main['begin_level_vocab'] = $vocab[$key]->begin_level_vocab;
      }
    }
    if ($vocab[$key]->level1acc === '0') {
      $main['level1acc'] = NULL;
    }
    else {
      $main['level1acc'] = $vocab[$key]->level1acc;
    }
    if ($vocab[$key]->level2acc === '0') {
      $main['level2acc'] = NULL;
    }
    else {
      $main['level2acc'] = $vocab[$key]->level2acc;
    }
    if ($vocab[$key]->level3acc === '0') {
      $main['level3acc'] = NULL;
    }
    else {
      $main['level3acc'] = $vocab[$key]->level3acc;
    }
    if ($vocab[$key]->level4acc === '0') {
      $main['level4acc'] = NULL;
    }
    else {
      $main['level4acc'] = $vocab[$key]->level4acc;
    }
    if ($vocab[$key]->level5acc === '0') {
      $main['level5acc'] = NULL;
    }
    else {
      $main['level5acc'] = $vocab[$key]->level5acc;
    }
    if ($vocab[$key]->level6acc === '0') {
      $main['level6acc'] = NULL;
    }
    else {
      $main['level6acc'] = $vocab[$key]->level6acc;
    }
    if ($vocab[$key]->level7acc === '0') {
      $main['level7acc'] = NULL;
    }
    else {
      $main['level7acc'] = $vocab[$key]->level7acc;
    }
    if ($vocab[$key]->level8acc === '0') {
      $main['level8acc'] = NULL;
    }
    else {
      $main['level8acc'] = $vocab[$key]->level8acc;
    }
    if ($vocab[$key]->instructvocab === '0') {
      $main['instructvocab'] = '-';
    }
    else {
      if ($vocab[$key]->instructvocab === '100') {
        $main['instructvocab'] = '8+';
      }
      else {
        $main['instructvocab'] = $vocab[$key]->instructvocab;
      }
    }
    if ($vocab[$key]->instructional_priorities != NULL) {
      array_push($instructional_priorities, $vocab[$key]->instructional_priorities);
    }
  }

  //comprehension
  if ($compre[$key]) {
    if ($compre[$key]->comprehension === '0') {
      $main['comprehension'] = '-';
    }
    else {
      if ($compre[$key]->comprehension === '100') {
        $main['comprehension'] = '8+';
      }
      else {
        $main['comprehension'] = $compre[$key]->comprehension;
      }
    }
    if ($compre[$key]->begin_level_compre === '0') {
      $main['begin_level_compre'] = '-';
    }
    else {
      if ($compre[$key]->begin_level_compre === '100') {
        $main['begin_level_compre'] = '8+';
      }
      else {
        $main['begin_level_compre'] = $compre[$key]->begin_level_compre;
      }
    }
    if ($compre[$key]->level1perc === '0') {
      $main['level1perc'] = NULL;
    }
    else {
      $main['level1perc'] = $compre[$key]->level1perc . '%';
    }
    if ($compre[$key]->level2perc === '0') {
      $main['level2perc'] = NULL;
    }
    else {
      $main['level2perc'] = $compre[$key]->level2perc . '%';
    }
    if ($compre[$key]->levelperc3 === '0') {
      $main['levelperc3'] = NULL;
    }
    else {
      $main['levelperc3'] = $compre[$key]->levelperc3 . '%';
    }
    if ($compre[$key]->level4perc === '0') {
      $main['level4perc'] = NULL;
    }
    else {
      $main['level4perc'] = $compre[$key]->level4perc . '%';
    }
    if ($compre[$key]->level5perc === '0') {
      $main['level5perc'] = NULL;
    }
    else {
      $main['level5perc'] = $compre[$key]->level5perc . '%';
    }
    if ($compre[$key]->level6perc === '0') {
      $main['level6perc'] = NULL;
    }
    else {
      $main['level6perc'] = $compre[$key]->level6perc . '%';
    }
    if ($compre[$key]->level7perc === '0') {
      $main['level7perc'] = NULL;
    }
    else {
      $main['level7perc'] = $compre[$key]->level7perc . '%';
    }
    if ($compre[$key]->level8perc === '0') {
      $main['level8perc'] = NULL;
    }
    else {
      $main['level8perc'] = $compre[$key]->level8perc . '%';
    }
    $main['comprehension_label'] = '% correct';
    // If retelling values are provided, override the percentage values for display.
    if ($compre[$key]->level1rate > -1 ||
      $compre[$key]->level2rate > -1 ||
      $compre[$key]->level3rate > -1 ||
      $compre[$key]->level4rate > -1 ||
      $compre[$key]->level5rate > -1 ||
      $compre[$key]->level6rate > -1 ||
      $compre[$key]->level7rate > -1 ||
      $compre[$key]->level8rate > -1) {
      $main['comprehension_label'] = 'Retell rating';
      if ($compre[$key]->level1rate === '-1') {
        $main['level1perc'] = NULL;
      }
      else {
        $main['level1perc'] = $compre[$key]->level1rate;
      }
      if ($compre[$key]->level2rate === '-1') {
        $main['level2perc'] = NULL;
      }
      else {
        $main['level2perc'] = $compre[$key]->level2rate;
      }
      if ($compre[$key]->level3rate === '-1') {
        $main['levelperc3'] = NULL;
      }
      else {
        $main['levelperc3'] = $compre[$key]->level3rate;
      }
      if ($compre[$key]->level4rate === '-1') {
        $main['level4perc'] = NULL;
      }
      else {
        $main['level4perc'] = $compre[$key]->level4rate;
      }
      if ($compre[$key]->level5rate === '-1') {
        $main['level5perc'] = NULL;
      }
      else {
        $main['level5perc'] = $compre[$key]->level5rate;
      }
      if ($compre[$key]->level6rate === '-1') {
        $main['level6perc'] = NULL;
      }
      else {
        $main['level6perc'] = $compre[$key]->level6rate;
      }
      if ($compre[$key]->level7rate === '-1') {
        $main['level7perc'] = NULL;
      }
      else {
        $main['level7perc'] = $compre[$key]->level7rate;
      }
      if ($compre[$key]->level8rate === '-1') {
        $main['level8perc'] = NULL;
      }
      else {
        $main['level8perc'] = $compre[$key]->level8rate;
      }

    }
      if ($compre[$key]->instructional_priorities != NULL) {
          array_push($instructional_priorities, $compre[$key]->instructional_priorities);
      }
  }

  $iptext = '';
  if (!empty($instructional_priorities)) {
    foreach ($instructional_priorities as $component) {
      $iptext .= $component . ' ';
    }
  }
  $main['instructional_priorities'] = $iptext;

  array_push($data, $main);
}
$results = new stdClass();
$results->data = array_values($data);

echo $OUTPUT->header();
// Floating student data chart
echo $OUTPUT->render_from_template('local_studentdata/modal_studenttable', $results);


echo '<h2>Student Data Chart</h2>';

echo $OUTPUT->render_from_template('local_studentdata/student_view', $results);
echo '</form>';

echo $OUTPUT->footer();
