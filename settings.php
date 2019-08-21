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
 * superframe settings
 *
 * @package    block_superframe
 * @copyright  Daniel Neis <danielneis@gmail.com>
 * Modified for use in MoodleBites for Developers Level 1 by Richard Jones & Justin Hunt
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
defined('MOODLE_INTERNAL') || die();
// Our default values
$defaulturl='https://quizlet.com/132695231/scatter/embed';
$defaultheight = 400;
$defaultwidth = 600;

if ($ADMIN->fulltree) {
    $settings->add(new admin_setting_configtext('block_superframe/url', get_string('url', 'block_superframe'),
        get_string('url_details', 'block_superframe'), $defaulturl, PARAM_RAW));

    $settings->add(new admin_setting_configtext('block_superframe/height', get_string('height', 'block_superframe'),
        get_string('height_details', 'block_superframe'), $defaultheight, PARAM_RAW));

    $settings->add(new admin_setting_configtext('block_superframe/width', get_string('width', 'block_superframe'),
        get_string('width_details', 'block_superframe'), $defaultwidth, PARAM_RAW));

    $options = array(0 => get_string('course'), 1 => get_string('popup'));
    $settings->add(new admin_setting_configselect('block_superframe/pagelayout', get_string('pagelayout', 'block_superframe'),
        get_string('pagelayout_details', 'block_superframe'), 0, $options));
}
