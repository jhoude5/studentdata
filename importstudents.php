<?php

require_once '../../config.php';
global $USER, $DB, $CFG;

require_login();

$userid = $USER->id;

$alphastudent[] = ['highest_level_alphabetics'=>'8', 'level5'=>'10', 'level6'=>'10', 'level7'=>'10', 'level8'=>'9'];
$alphastudent[] = ['highest_level_alphabetics'=>'7', 'level6'=>'10', 'level7'=>'9', 'level8'=>'7'];
$alphastudent[] = ['highest_level_alphabetics'=>'8', 'level5'=>'9', 'level6'=>'10', 'level7'=>'10', 'level8'=>'9'];
$alphastudent[] = ['highest_level_alphabetics'=>'7', 'level7'=>'9', 'level8'=>'6'];
$alphastudent[] = ['highest_level_alphabetics'=>'8', 'level6'=>'10', 'level7'=>'10', 'level8'=>'9'];
$alphastudent[] = ['highest_level_alphabetics'=>'5', 'level4'=>'9', 'level5'=>'9', 'level6'=>'7'];
$alphastudent[] = ['highest_level_alphabetics'=>'7', 'level5'=>'10', 'level6'=>'9', 'level7'=>'9', 'level8'=>'6'];
$alphastudent[] = ['highest_level_alphabetics'=>'5', 'level5'=>'9', 'level6'=>'6'];
$alphastudent[] = ['highest_level_alphabetics'=>'5', 'level4'=>'9', 'level5'=>'9', 'level6'=>'7'];
$alphastudent[] = ['highest_level_alphabetics'=>'8', 'level5'=>'10', '10'];


$fluencystudent[] = ['begin_level_fluency'=>'7', 'radioar7'=>'1', 'radioar8'=>'1', 'radioarr1'=>'1'];
$fluencystudent[] = ['begin_level_fluency'=>'7', 'radioar7'=>'1', 'radioar8'=>'1', 'radioarr1'=>'1'];
$fluencystudent[] = ['begin_level_fluency'=>'7', 'radioar7'=>'1', 'radioar8'=>'1', 'radioarr1'=>'2'];
$fluencystudent[] = ['begin_level_fluency'=>'7', 'radioar4'=>'1', 'radioar5'=>'2', 'radioar6'=>'2', 'radioar7'=>'2', 'radioarr1'=>'2'];
$fluencystudent[] = ['begin_level_fluency'=>'8', 'radioar8'=>'1', 'radioarr1'=>'1'];
$fluencystudent[] = ['begin_level_fluency'=>'5', 'radioar5'=>'1', 'radioar6'=>'2','radioarr1'=>'2'];
$fluencystudent[] = ['begin_level_fluency'=>'7', 'radioar7'=> '1', 'radioar8'=>'2','radioarr1'=>'2'];
$fluencystudent[] = ['begin_level_fluency'=>'5', 'radioar4'=>'1', 'radioar5'=>'2', 'radioarr1'=>'2'];
$fluencystudent[] = ['begin_level_fluency'=>'5', 'radioar5'=>'1', 'radioar6'=>'2', 'radioarr1'=>'2'];
$fluencystudent[] = ['begin_level_fluency'=>'8', 'radioar8'=>'1', 'radioarr1'=>'1'];


$vocabstudent[] = ['begin_level_vocab'=>'5', 'level4acc'=>'5', 'level5acc'=>'3'];
$vocabstudent[] = ['begin_level_vocab'=>'6', 'level5acc'=>'4', 'level6acc'=>'3'];
$vocabstudent[] = ['begin_level_vocab'=>'5', 'level4acc'=>'4', 'level5acc'=>'3'];
$vocabstudent[] = ['begin_level_vocab'=>'7', 'level4acc'=>'4', 'level5acc'=>'3', 'level6acc'=>'2', 'level7acc'=>'3'];
$vocabstudent[] = ['begin_level_vocab'=>'7', 'level4acc'=>'5', 'level5acc'=>'3', 'level6acc'=>'3', 'level7acc'=>'2'];
$vocabstudent[] = ['begin_level_vocab'=>'5', 'level4acc'=>'4', 'level5acc'=>'3'];
$vocabstudent[] = ['begin_level_vocab'=>'6', 'level4acc'=>'5', 'level5acc'=>'3', 'level6acc'=>'2'];
$vocabstudent[] = ['begin_level_vocab'=>'5', 'level4acc'=>'5', 'level5acc'=>'3'];
$vocabstudent[] = ['begin_level_vocab'=>'4', 'level4acc'=>'5', 'level5acc'=>'5', 'level6acc'=>'3'];
$vocabstudent[] = ['begin_level_vocab'=>'7', 'level4acc'=>'4', 'level5acc'=>'3', 'level6acc'=>'3', 'level7acc'=>'2'];


$comprestudent[] = ['begin_level_compre'=>'5', 'level4perc'=>'75', 'level5perc'=>'62'];
$comprestudent[] = ['begin_level_compre'=>'6', 'level6perc'=>'80', 'level7perc'=>'62'];
$comprestudent[] = ['begin_level_compre'=>'5', 'level5perc'=>'82', 'level6perc'=>'56'];
$comprestudent[] = ['begin_level_compre'=>'7', 'level7perc'=>'100', 'level8perc'=>'92'];
$comprestudent[] = ['begin_level_compre'=>'6', 'level4perc'=>'88', 'level5perc'=>'70', 'level6perc'=>'55'];
$comprestudent[] = ['begin_level_compre'=>'4', 'level4perc'=>'100', 'level5perc'=>'100', 'level6perc'=>'92', 'level7perc'=>'86', 'level8perc'=>'65'];
$comprestudent[] = ['begin_level_compre'=>'5', 'level4perc'=>'75', 'level5perc'=>'68'];
$comprestudent[] = ['begin_level_compre'=>'5', 'level5perc'=>'77', 'level6perc'=>'62'];
$comprestudent[] = ['begin_level_compre'=>'4', 'level4perc'=>'86', 'level5perc'=>'72', 'level6'=>'56'];
$comprestudent[] = ['begin_level_compre'=>'7', 'level5perc'=>'92', 'level6perc'=>'70', 'level7perc'=>'68'];


$students[] = ['name'=> 'A', 'tabe' => '5', 'userid'=>$userid, 'notes' => ''];
$students[] = ['name'=> 'B', 'tabe' => '6.4', 'userid'=>$userid, 'notes' => ''];
$students[] = ['name'=> 'C', 'tabe' => '5.7', 'userid'=>$userid, 'notes' => ''];
$students[] = ['name'=> 'D', 'tabe' => '7.4', 'userid'=>$userid, 'notes' => ''];
$students[] = [ 'name'=> 'E', 'tabe' => '6.4', 'userid'=>$userid, 'notes' => ''];
$students[] = ['name'=> 'F', 'tabe' => '5', 'userid'=>$userid, 'notes' => ''];
$students[] = ['name'=> 'G', 'tabe' => '5.8', 'userid'=>$userid, 'notes' => ''];
$students[]= ['name'=> 'H', 'tabe' => '5.9', 'userid'=>$userid, 'notes' => ''];
$students[] = ['name'=> 'I', 'tabe' => '4.5', 'userid'=>$userid, 'notes' => ''];
$students[] = ['name'=> 'J', 'tabe' => '7.2', 'userid'=>$userid, 'notes' => ''];
$index = 0;
$message = '';
foreach($students as $student) {
    if(!$DB->get_record('local_studentdata', array('userid' => $userid, 'name' => $student['name']))) {
        $DB->insert_record('local_studentdata_alpha', $alphastudent[$index]);
        $DB->insert_record('local_studentdata_fluency', $fluencystudent[$index]);
        $DB->insert_record('local_studentdata_vocab', $vocabstudent[$index]);
        $DB->insert_record('local_studentdata_compre', $comprestudent[$index]);

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
        $student['alphabeticsid'] = $alphaid;
        $student['fluencyid'] = $fluencyid;
        $student['vocabid'] = $vocabid;
        $student['compreid'] = $compreid;
        $DB->insert_record('local_studentdata', $student);
        $index++;
        $message = 'Sample students have been added.';
    }

}
if(isset($_SERVER['HTTP_REFERER'])) {
    $previous = $_SERVER['HTTP_REFERER'];
    redirect($previous, $message, 10,  \core\output\notification::NOTIFY_SUCCESS);
} else {
    redirect('/local/studentdata/student.php', $message, 10,  \core\output\notification::NOTIFY_SUCCESS);
}


