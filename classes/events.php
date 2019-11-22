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
 * This page contains the footer block related contents and values.
 *
 * @package    theme_enlightlite
 * @copyright  2015 onwards LMSACE Dev Team (http://www.lmsace.com)
 * @author    LMSACE Dev Team
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();


/**
 * Return the set of valuse for the footer blocks template.
 * @return type|array
 */
function events_template()
{
    global $CFG, $PAGE, $OUTPUT;
    $event1 = new Event();
    $event1image = theme_enlightlite_render_slideimg('eventimage1', 'eventimage1');
    if (empty($event1image)) {
        $event1image = $OUTPUT->image_url('/event/default', 'theme');
    }
    $event1->setValues(theme_enlightlite_get_setting('event1title'), theme_enlightlite_get_setting('event1description'), theme_enlightlite_get_setting('event1location'), theme_enlightlite_get_setting('event1status'), theme_enlightlite_get_setting('eventstart1hour'), theme_enlightlite_get_setting('eventstart1minute'), theme_enlightlite_get_setting('event1duration'), theme_enlightlite_get_setting('event1day'), monthName(theme_enlightlite_get_setting('event1month')), theme_enlightlite_get_setting('event1year'), $event1image, 0);

    $event2 = new Event();
    $event2image = theme_enlightlite_render_slideimg('eventimage2', 'eventimage2');
    if (empty($event2image)) {
        $event2image = $OUTPUT->image_url('/event/default', 'theme');
    }
    $event2->setValues(theme_enlightlite_get_setting('event2title'), theme_enlightlite_get_setting('event2description'), theme_enlightlite_get_setting('event2location'), theme_enlightlite_get_setting('event2status'), theme_enlightlite_get_setting('eventstart2hour'), theme_enlightlite_get_setting('eventstart2minute'), theme_enlightlite_get_setting('event2duration'), theme_enlightlite_get_setting('event2day'), monthName(theme_enlightlite_get_setting('event2month')), theme_enlightlite_get_setting('event2year'), $event2image, 1);

    $event3 = new Event();
    $event3image = theme_enlightlite_render_slideimg('eventimage3', 'eventimage3');
    if (empty($event3image)) {
        $event3image = $OUTPUT->image_url('/event/default', 'theme');
    }
    $event3->setValues(theme_enlightlite_get_setting('event3title'), theme_enlightlite_get_setting('event3description'), theme_enlightlite_get_setting('event3location'), theme_enlightlite_get_setting('event3status'), theme_enlightlite_get_setting('eventstart3hour'), theme_enlightlite_get_setting('eventstart3minute'), theme_enlightlite_get_setting('event3duration'), theme_enlightlite_get_setting('event3day'), monthName(theme_enlightlite_get_setting('event3month')), theme_enlightlite_get_setting('event3year'), $event3image, 2);

    $event4 = new Event();
    $event4image = theme_enlightlite_render_slideimg('eventimage4', 'eventimage4');
    if (empty($event4image)) {
        $event4image = $OUTPUT->image_url('/event/default', 'theme');
    }
    $event4->setValues(theme_enlightlite_get_setting('event4title'), theme_enlightlite_get_setting('event4description'), theme_enlightlite_get_setting('event4location'), theme_enlightlite_get_setting('event4status'), theme_enlightlite_get_setting('eventstart4hour'), theme_enlightlite_get_setting('eventstart4minute'), theme_enlightlite_get_setting('event4duration'), theme_enlightlite_get_setting('event4day'), monthName(theme_enlightlite_get_setting('event4month')), theme_enlightlite_get_setting('event4year'), $event4image, 3);

    $event5 = new Event();
    $event5image = theme_enlightlite_render_slideimg('eventimage5', 'eventimage5');
    if (empty($event5image)) {
        $event5image = $OUTPUT->image_url('/event/default', 'theme');
    }
    $event5->setValues(theme_enlightlite_get_setting('event5title'), theme_enlightlite_get_setting('event5description'), theme_enlightlite_get_setting('event5location'), theme_enlightlite_get_setting('event5status'), theme_enlightlite_get_setting('eventstart5hour'), theme_enlightlite_get_setting('eventstart5minute'), theme_enlightlite_get_setting('event5duration'), theme_enlightlite_get_setting('event5day'), monthName(theme_enlightlite_get_setting('event5month')), theme_enlightlite_get_setting('event5year'), $event5image, 4);

    $event6 = new Event();
    $event6image = theme_enlightlite_render_slideimg('eventimage6', 'eventimage6');
    if (empty($event6image)) {
        $event6image = $OUTPUT->image_url('/event/default', 'theme');
    }
    $event6->setValues(theme_enlightlite_get_setting('event6title'), theme_enlightlite_get_setting('event6description'), theme_enlightlite_get_setting('event6location'), theme_enlightlite_get_setting('event6status'), theme_enlightlite_get_setting('eventstart6hour'), theme_enlightlite_get_setting('eventstart6minute'), theme_enlightlite_get_setting('event6duration'), theme_enlightlite_get_setting('event6day'), monthName(theme_enlightlite_get_setting('event6month')), theme_enlightlite_get_setting('event6year'), $event6image, 5);

    $events = array($event1, $event2, $event3, $event4, $event5, $event6);

    usort($events, function ($a, $b) {
        return strcmp($a->starttime(), $b->starttime());
    });
    $eventssorted = [];
    $count = 0;
    foreach ($events as $event) {
        if (!empty($event->title) && $event->notstarted()) {
            array_push($eventssorted, $event);
        }
        $count++;
    }
    $firstevent = $eventssorted[0];
    $allevents = $eventssorted;
    array_shift($eventssorted);
    $restevents = $eventssorted;

    $templatecontext = [
        //'output' => $OUTPUT,
        'firstevent' => $firstevent,
        'restevents' => $restevents,
        'allevents' => $allevents
    ];
    print_object($templatecontext);
    return $templatecontext;
}
$eventstemplate = events_template();
