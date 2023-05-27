<?php

require_once '../../config.php';
global $USER, $DB, $CFG;

$PAGE->set_url('/local/studentdata/index.php');
$PAGE->set_context(context_system::instance());

require_login();

if(!has_capability('local/studentdata:admin', context_system::instance()))
{
  echo $OUTPUT->header();
  echo "<h3>You do not have permission to view this page.</h3>";
  echo $OUTPUT->footer();
}

$strpageheading = get_string('pagetitle', 'local_studentdata');

$PAGE->set_title('Student data chart');
$PAGE->set_heading($strpageheading);
$PAGE->set_pagelayout('starcourse');

echo $OUTPUT->header();
echo '<h2>Student Data Chart</h2>';
echo '<a href="/local/studentdata/studentform.php" class="btn btn-secondary float-right">Add a student</a><br>';
echo $OUTPUT->footer();
