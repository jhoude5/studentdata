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
 * Upgrade code for install
 *
 * @package   local_studentdata
 * @copyright 2012 NetSpot {@link http://www.netspot.com.au}
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

/**
 * upgrade this studentdata instance - this function could be skipped but it will be needed later
 * @param int $oldversion The old version of the assign module
 * @return bool
 */
function xmldb_local_studentdata_upgrade($oldversion) {
    global $CFG, $DB;

    $dbman = $DB->get_manager();

    // Automatically generated Moodle v3.5.0 release upgrade line.
    // Put any upgrade step following this.

    // Automatically generated Moodle v3.6.0 release upgrade line.
    // Put any upgrade step following this.

    if ($oldversion < 2022012500) {

        // Changing type of field alphabetics_level on table local_studentdata_alpha to text.
        $table = new xmldb_table('local_studentdata_alpha');
        $field = new xmldb_field('alphabetics_level', XMLDB_TYPE_TEXT, null, null, null, null, null, 'highest');

        // Launch change of type for field alphabetics_level.
        $dbman->change_field_type($table, $field);

        // Studentdata savepoint reached.
        upgrade_plugin_savepoint(true, 2022012500, 'local', 'studentdata');
    }
    if ($oldversion < 2022022800) {

        // Changing type of field alphabetics_level on table local_studentdata_alpha to text.
        $table = new xmldb_table('local_studentdata_alpha');
        $field = new xmldb_field('instructional_priorities', XMLDB_TYPE_CHAR, '100', null, null, null, null, 'alphabetics_level');

        // Launch change of type for field alphabetics_level.
        if (!$dbman->field_exists($table, $field)) {
            $dbman->add_field($table, $field);
        }

        $table2 = new xmldb_table('local_studentdata_fluency');
        $field2 = new xmldb_field('instructional_priorities', XMLDB_TYPE_CHAR, '100', null, null, null, null, 'rates');

        // Launch change of type for field alphabetics_level.
        if (!$dbman->field_exists($table2, $field2)) {
            $dbman->add_field($table2, $field2);
        }

        $table3 = new xmldb_table('local_studentdata_vocab');
        $field3 = new xmldb_field('instructional_priorities', XMLDB_TYPE_CHAR, '100', null, null, null, null, 'instructvocab');

        // Launch change of type for field alphabetics_level.
        if (!$dbman->field_exists($table3, $field3)) {
            $dbman->add_field($table3, $field3);
        }

        $table4 = new xmldb_table('local_studentdata_compre');
        $field4 = new xmldb_field('instructional_priorities', XMLDB_TYPE_CHAR, '100', null, null, null, null, 'comprehension');

        // Launch change of type for field alphabetics_level.
        if (!$dbman->field_exists($table4, $field4)) {
            $dbman->add_field($table4, $field4);
        }
        // Studentdata savepoint reached.
        upgrade_plugin_savepoint(true, 2022022800, 'local', 'studentdata');
    }
    if ($oldversion < 2022053102) {

        // Changing type of field on table local_studentdata.
        $studenttable = new xmldb_table('local_studentdata');
        $tabe = new xmldb_field('tabe', XMLDB_TYPE_CHAR, '10', null, null, null, null, 'name');
        $notes = new xmldb_field('notes', XMLDB_TYPE_CHAR, '500', null, XMLDB_NOTNULL, null, null, 'userid');
        // Launch change of type for studentdata table.
        $dbman->change_field_type($studenttable, $tabe);
        $dbman->change_field_type($studenttable, $notes);

        // Changing type of field on table local_studentdata_alpha.
        $alphatable = new xmldb_table('local_studentdata_alpha');
        $highestlevel = new xmldb_field('highest_level_alphabetics', XMLDB_TYPE_CHAR, '4', null, null, null, null, 'id');
        $level1 = new xmldb_field('level1', XMLDB_TYPE_CHAR, '10', null, null, null, null, 'highest_level_alphabetics');
        $level2 = new xmldb_field('level2', XMLDB_TYPE_CHAR, '10', null, null, null, null, 'level1');
        $level3 = new xmldb_field('level3', XMLDB_TYPE_CHAR, '10', null, null, null, null, 'level2');
        $level4 = new xmldb_field('level4', XMLDB_TYPE_CHAR, '10', null, null, null, null, 'level3');
        $level5 = new xmldb_field('level5', XMLDB_TYPE_CHAR, '10', null, null, null, null, 'level4');
        $level6 = new xmldb_field('level6', XMLDB_TYPE_CHAR, '10', null, null, null, null, 'level5');
        $level7 = new xmldb_field('level7', XMLDB_TYPE_CHAR, '10', null, null, null, null, 'level6');
        $level8 = new xmldb_field('level8', XMLDB_TYPE_CHAR, '10', null, null, null, null, 'level7');
        $highest = new xmldb_field('highest', XMLDB_TYPE_CHAR, '10', null, null, null, null, 'level8');

        // Launch change of type for alphabetics.
        $dbman->change_field_type($alphatable, $highestlevel);
        $dbman->change_field_type($alphatable, $level1);
        $dbman->change_field_type($alphatable, $level2);
        $dbman->change_field_type($alphatable, $level3);
        $dbman->change_field_type($alphatable, $level4);
        $dbman->change_field_type($alphatable, $level5);
        $dbman->change_field_type($alphatable, $level6);
        $dbman->change_field_type($alphatable, $level7);
        $dbman->change_field_type($alphatable, $level8);
        $dbman->change_field_type($alphatable, $highest);

        // Changing type of field on table local_studentdata_fluency.
        $fluencytable = new xmldb_table('local_studentdata_fluency');
        $beginlevel = new xmldb_field('begin_level_fluency', XMLDB_TYPE_CHAR, '4', null, null, null, null, 'id');
        $rates = new xmldb_field('rates', XMLDB_TYPE_CHAR, '10', null, null, null, null, 'accuracy');

        // Launch change of type for fluency.
        $dbman->change_field_type($fluencytable, $beginlevel);
        $dbman->change_field_type($fluencytable, $rates);

        // Changing type of field on table local_studentdata_vocab.
        $vocabtable = new xmldb_table('local_studentdata_vocab');
        $beginlevelv = new xmldb_field('begin_level_vocab', XMLDB_TYPE_CHAR, '4', null, null, null, null, 'id');
        $level1acc = new xmldb_field('level1acc', XMLDB_TYPE_CHAR, '10', null, null, null, null, 'begin_level_vocab');
        $level2acc = new xmldb_field('level2acc', XMLDB_TYPE_CHAR, '10', null, null, null, null, 'level1acc');
        $level3acc = new xmldb_field('level3acc', XMLDB_TYPE_CHAR, '10', null, null, null, null, 'level2acc');
        $level4acc = new xmldb_field('level4acc', XMLDB_TYPE_CHAR, '10', null, null, null, null, 'level3acc');
        $level5acc = new xmldb_field('level5acc', XMLDB_TYPE_CHAR, '10', null, null, null, null, 'level4acc');
        $level6acc = new xmldb_field('level6acc', XMLDB_TYPE_CHAR, '10', null, null, null, null, 'level5acc');
        $level7acc = new xmldb_field('level7acc', XMLDB_TYPE_CHAR, '10', null, null, null, null, 'level6acc');
        $level8acc = new xmldb_field('level8acc', XMLDB_TYPE_CHAR, '10', null, null, null, null, 'level7acc');
        $instruct = new xmldb_field('instructvocab', XMLDB_TYPE_CHAR, '10', null, null, null, null, 'level8acc');

        // Launch change of type for vocabulary.
        $dbman->change_field_type($vocabtable, $beginlevelv);
        $dbman->change_field_type($vocabtable, $level1acc);
        $dbman->change_field_type($vocabtable, $level2acc);
        $dbman->change_field_type($vocabtable, $level3acc);
        $dbman->change_field_type($vocabtable, $level4acc);
        $dbman->change_field_type($vocabtable, $level5acc);
        $dbman->change_field_type($vocabtable, $level6acc);
        $dbman->change_field_type($vocabtable, $level7acc);
        $dbman->change_field_type($vocabtable, $level8acc);
        $dbman->change_field_type($vocabtable, $instruct);

        // Changing type of field on table local_studentdata_compre.
        $compretable = new xmldb_table('local_studentdata_compre');
        $beginlevelc = new xmldb_field('begin_level_compre', XMLDB_TYPE_CHAR, '4', null, null, null, null, 'id');
        $level1acc = new xmldb_field('level1perc', XMLDB_TYPE_CHAR, '10', null, null, null, null, 'begin_level_compre');
        $level2acc = new xmldb_field('level2perc', XMLDB_TYPE_CHAR, '10', null, null, null, null, 'level1perc');
        $level3acc = new xmldb_field('levelperc3', XMLDB_TYPE_CHAR, '10', null, null, null, null, 'level2perc');
        $level4acc = new xmldb_field('level4perc', XMLDB_TYPE_CHAR, '10', null, null, null, null, 'levelperc3');
        $level5acc = new xmldb_field('level5perc', XMLDB_TYPE_CHAR, '10', null, null, null, null, 'level4perc');
        $level6acc = new xmldb_field('level6perc', XMLDB_TYPE_CHAR, '10', null, null, null, null, 'level5perc');
        $level7acc = new xmldb_field('level7perc', XMLDB_TYPE_CHAR, '10', null, null, null, null, 'level6perc');
        $level8acc = new xmldb_field('level8perc', XMLDB_TYPE_CHAR, '10', null, null, null, null, 'level7perc');
        $compre = new xmldb_field('comprehension', XMLDB_TYPE_CHAR, '10', null, null, null, null, 'level8perc');

        // Launch change of type for comprehensino.
        $dbman->change_field_type($compretable, $beginlevelc);
        $dbman->change_field_type($compretable, $level1acc);
        $dbman->change_field_type($compretable, $level2acc);
        $dbman->change_field_type($compretable, $level3acc);
        $dbman->change_field_type($compretable, $level4acc);
        $dbman->change_field_type($compretable, $level5acc);
        $dbman->change_field_type($compretable, $level6acc);
        $dbman->change_field_type($compretable, $level7acc);
        $dbman->change_field_type($compretable, $level8acc);
        $dbman->change_field_type($compretable, $compre);

        // Studentdata savepoint reached.
        upgrade_plugin_savepoint(true, 2022053102, 'local', 'studentdata');
    }
    return true;
}
