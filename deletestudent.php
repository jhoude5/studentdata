<?php

require_once '../../config.php';
global $USER, $DB, $CFG;


$PAGE->set_url('/local/studentdata/deletestudent.php');
$PAGE->set_context(context_system::instance());

require_login();

$PAGE->set_title(get_string('studentcancelled', 'local_studentdata'));
$PAGE->set_heading(get_string('studentcancelled', 'local_studentdata'));

$id = optional_param('id', '', PARAM_TEXT);
$selected_ids = optional_param_array('selected_ids', [], PARAM_INT);
$action = optional_param('action', '', PARAM_TEXT);
if(strpos($_SERVER['HTTP_REFERER'], 'edwiser') || strpos($_SERVER['HTTP_REFERER'], 'studentdata') || strpos($_SERVER['HTTP_REFERER'], 'staruser')) {
    $_SESSION['studentdata_previousurl'] = $_SERVER['HTTP_REFERER'];
}
if ($id) {
    $DB->delete_records_select('local_studentdata', 'id = ?', array($id));
    $DB->delete_records_select('local_studentdata_alpha', 'id = ?', array($id));
    $DB->delete_records_select('local_studentdata_fluency', 'id = ?', array($id));
    $DB->delete_records_select('local_studentdata_compre', 'id = ?', array($id));
    $DB->delete_records_select('local_studentdata_vocab', 'id = ?', array($id));
    if(isset($_SESSION['studentdata_previousurl'])) {
        redirect($_SESSION['studentdata_previousurl'], 'The student has been deleted.', 10,  \core\output\notification::NOTIFY_SUCCESS);
    }
    redirect('local/studentdata/student.php', 'The student has been deleted.', 10,  \core\output\notification::NOTIFY_SUCCESS);


} else if ($action === 'selected') {
  $main = $DB->get_records_select('local_studentdata','userid = ?', array($USER->id));
  foreach($selected_ids as $selected_id) {
    $DB->delete_records_select('local_studentdata', 'id = ?', array($selected_id));
    $DB->delete_records_select('local_studentdata_alpha', 'id = ?', array($selected_id));
    $DB->delete_records_select('local_studentdata_fluency', 'id = ?', array($selected_id));
    $DB->delete_records_select('local_studentdata_compre', 'id = ?', array($selected_id));
    $DB->delete_records_select('local_studentdata_vocab', 'id = ?', array($selected_id));
  }

  if (empty($selected_ids)) {
    if(isset($_SESSION['studentdata_previousurl'])) {
      redirect($_SESSION['studentdata_previousurl'], 'No students were selected for deletion.', 10,  \core\output\notification::NOTIFY_WARNING);
    }
    redirect('local/studentdata/student.php', 'No students were selected for deletion.', 10,  \core\output\notification::NOTIFY_WARNING);
  }

  if(isset($_SESSION['studentdata_previousurl'])) {
    redirect($_SESSION['studentdata_previousurl'], 'Selected students have been deleted.', 10,  \core\output\notification::NOTIFY_SUCCESS);
  }
  redirect('local/studentdata/student.php', 'Selected students have been deleted.', 10,  \core\output\notification::NOTIFY_SUCCESS);


} else {


    echo $OUTPUT->header();
    $mform->display();

    echo $OUTPUT->footer();
}

