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
 * A frontpage layout.
 * @package    theme_enlightlite
 * @copyright  2015 onwards LMSACE Dev Team (http://www.lmsace.com)
 * @author    LMSACE Dev Team
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
defined('MOODLE_INTERNAL') || die();

// Get the HTML for the settings bits.

$html = theme_enlightlite_get_html_for_settings($OUTPUT, $PAGE);
if (right_to_left()) {
    $regionbsid = 'region-bs-main-and-post';
} else {
    $regionbsid = 'region-bs-main-and-pre';
}
$courserenderer = $PAGE->get_renderer('core', 'course');
echo $OUTPUT->doctype() ?>
<html <?php echo $OUTPUT->htmlattributes(); ?>>

<head>
    <title><?php echo $OUTPUT->page_title(); ?></title>
    <link rel="shortcut icon" href="<?php echo $OUTPUT->favicon(); ?>" />
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700&display=swap" rel="stylesheet">
    <?php echo $OUTPUT->standard_head_html() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body <?php echo $OUTPUT->body_attributes(); ?>>
    <?php echo $OUTPUT->standard_top_of_body_html() ?>

    <!-- Require header -->
    <?php require_once(dirname(__FILE__) . '/includes/header.php');  ?>
    <!-- E.O Require header -->

    <div class="navdrawer-overlay" id="sidebar_overlay" style="display:none"></div>
    <!--Custom theme header-->
    <div class="page slide">
        <!-- Require SlideShow -->
        <?php require_once(dirname(__FILE__) . '/includes/slideshow.php'); ?>
        <!--Custom theme Carousel Css -->
        <link rel="stylesheet" href="<?php echo theme_enlightlite_theme_url(); ?>/style/slick.css" />
        <script type="text/javascript" src="<?php echo theme_enlightlite_theme_url(); ?>/javascript/slick.js"></script>
        <!--About Us-->
        <script type="text/javascript">
            $(document).ready(function() {

                if ($('body').hasClass('dir-rtl')) {
                    rtl = true;
                } else {
                    rtl = false;
                }

                $(".course-slider").slick({
                    arrows: true,
                    swipe: true,
                    prevArrow: '#available-courses .pagenav .slick-prev',
                    nextArrow: '#available-courses .pagenav .slick-next',
                    rtl: rtl
                });
                var prow = $(".course-slider").attr("data-crow");
                prow = parseInt(prow);
                if (prow < 2) {
                    $("#available-courses .pagenav").hide();
                }
            })
        </script>
        <?php
        $mspot1status = theme_enlightlite_get_setting('marketingSpot1_status');
        $msp1title = theme_enlightlite_get_setting('mspot1title', 'format_html');
        $msp1desc = theme_enlightlite_get_setting('mspot1desc');
        $msp1url = theme_enlightlite_get_setting('mspot1url');
        $msp1urltxt = theme_enlightlite_get_setting('mspot1urltext', 'format_html');
        $mspot1urltarget = theme_enlightlite_get_setting('mspot1urltarget');

        $mspot1titler1 = theme_enlightlite_get_setting('mspot1titler1', 'format_html');
        $mspot1titler2 = theme_enlightlite_get_setting('mspot1titler2', 'format_html');
        $mspot1titler3 = theme_enlightlite_get_setting('mspot1titler3', 'format_html');
        $mspot1titler4 = theme_enlightlite_get_setting('mspot1titler4', 'format_html');

        $msp1descr1 = theme_enlightlite_get_setting('mspot1descr1', 'format_html');
        $msp1descr2 = theme_enlightlite_get_setting('mspot1descr2', 'format_html');
        $msp1descr3 = theme_enlightlite_get_setting('mspot1descr3', 'format_html');
        $msp1descr4 = theme_enlightlite_get_setting('mspot1descr3', 'format_html');

        $rightimage1 = theme_enlightlite_render_slideimg('rightimage1', 'rightimage1');
        $rightimage2 = theme_enlightlite_render_slideimg('rightimage2', 'rightimage2');
        $rightimage3 = theme_enlightlite_render_slideimg('rightimage3', 'rightimage3');
        $rightimage4 = theme_enlightlite_render_slideimg('rightimage4', 'rightimage4');
        $target = ($mspot1urltarget == '1') ? "_blank" : "_self";
        ?>
        <?php
        if ($mspot1status == '1') {
            ?>
            <div class="jumbo-viewall">
                <div class="container about-us">
                    <div class="inner-wrap">
                        <div class="desc-wrap">
                            <h2><?php echo $msp1title; ?></h2>
                            <p><?php echo $msp1desc; ?></p>
                        </div>
                        <a href='<?php echo $msp1url; ?>' target="<?php echo $target; ?>" class="btn-jumbo"><?php echo $msp1urltxt; ?></a>
                    </div>
                    <div class="inner-wrap-right">
                        <?php if (!empty($mspot1titler1)) {
                                echo '<div class="item">';
                                echo '<img src="' . $rightimage1 . '">';
                                echo '<h3>', $mspot1titler1, '</h3>';
                                echo '<p>', $msp1descr1, '</p>';
                                echo '</div>';
                            } ?>
                        <?php if (!empty($mspot1titler2)) {
                                echo '<div class="item">';
                                echo '<img src="' . $rightimage2 . '">';
                                echo '<h3>', $mspot1titler2, '</h3>';
                                echo '<p>', $msp1descr2, '</p>';
                                echo '</div>';
                            } ?>
                        <?php if (!empty($mspot1titler3)) {
                                echo '<div class="item">';
                                echo '<img src="' . $rightimage3 . '">';
                                echo '<h3>', $mspot1titler3, '</h3>';
                                echo '<p>', $msp1descr3, '</p>';
                                echo '</div>';
                            } ?>
                        <?php if (!empty($mspot1titler4)) {
                                echo '<div class="item">';
                                echo '<img src="' . $rightimage4 . '">';
                                echo '<h3>', $mspot1titler4, '</h3>';
                                echo '<p>', $msp1descr4, '</p>';
                                echo '</div>';
                            } ?>
                    </div>
                </div>
            </div>
        <?php
        }
        ?>

        <!-- Marketing Spot 2 -->
        <?php

        // $PAGE->requires->js('/theme/enlightlite/javascript/slick.js');.

        $status = theme_enlightlite_get_setting('marketingSpot2_status');
        if ($status == "1") {
            echo theme_enlightlite_marketingspot1();
        }
        ?>
        <!--E.O.About Us-->

        <!-- Marketing Spot 1 -->
        <?php
        $ms1status = theme_enlightlite_get_setting('marketingSpot2_status');
        if ($ms1status == 1) {
            ?>
            <div class="frontpage-siteinfo hidden">
                <div class="siteinfo-bgoverlay">
                    <div class="container">
                        <?php
                            $msp1title = theme_enlightlite_get_setting('mspot1title', 'format_text');
                            $msp1title = theme_enlightlite_lang($msp1title);
                            $msp1desc = theme_enlightlite_get_setting('mspot1desc', 'format_text');
                            $msp1desc = theme_enlightlite_lang($msp1desc);
                            echo '<h1>' . $msp1title . '</h1>';
                            echo '<p>' . $msp1desc . '</p>';
                            ?>
                    </div>
                </div>
            </div>
        <?php
        }
        ?>
        <?php
        $eventsenabled = theme_enlightlite_get_setting('eventsenabled');
        function monthName($month)
        {
            switch ($month) {
                case '01':
                    return "JAN";
                    break;
                case '02':
                    return "FEB";
                    break;
                case '03':
                    return "MAR";
                    break;
                case '04':
                    return "APR";
                    break;
                case '05':
                    return "MAY";
                    break;
                case '06':
                    return "JUN";
                    break;
                case '07':
                    return "JUL";
                    break;
                case '08':
                    return "AUG";
                    break;
                case '09':
                    return "SEP";
                    break;
                case '10':
                    return "OCT";
                    break;
                case '11':
                    return "NOV";
                    break;
                case '12':
                    return "DEC";
                    break;
                default:
                    return "ERR";
                    break;
            }
        }
        echo theme_enlightlite_info();
        require_once(dirname(__FILE__) . '/includes/events.php');


        ?>


            <!--E.O.Marketing Spot 1 -->
            <div id="page" class="enlightlite-frontpage" style="">
                <header id="page-header" class="clearfix">
                    <div id="course-header">
                        <?php echo $OUTPUT->course_header(); ?>
                    </div>
                </header>
                <div id="page-content">

                    <div id="<?php echo $regionbsid ?>">
                        <?php
                        echo $OUTPUT->course_content_header();
                        echo $OUTPUT->main_content();
                        echo $OUTPUT->course_content_footer();
                        ?>
                    </div>
                    <?php echo $OUTPUT->blocks('side-pre', 'col-md-3'); ?>
                </div>
            </div>
    </div>

    <?php echo $flatnavbar; ?>
    <!--Testimonials-->
    <?php
    $theme = theme_config::load('enlightlite');
    ?>
    <!--E.O.Testimonials-->
    <?php
    $tab1title = theme_enlightlite_get_setting('tab1title');
    $tab1content = theme_enlightlite_get_setting('tab1content', "format_html");
    $tab2title = theme_enlightlite_get_setting('tab2title');
    $tab2content = theme_enlightlite_get_setting('tab2content', "format_html");
    $tab3title = theme_enlightlite_get_setting('tab3title');
    $tab3content = theme_enlightlite_get_setting('tab3content', "format_html");
    $tab4title = theme_enlightlite_get_setting('tab4title');
    $tab4content = theme_enlightlite_get_setting('tab4content', "format_html");

    $tabsmaintitle = theme_enlightlite_get_setting('tabsmaintitle');

    ?>
    <div class="tabs-background">
        <?php if (!empty($tabsmaintitle)) {
            echo '<h2 class="tabs-main-title">', $tabsmaintitle, '</h2>';
        } ?>
        <div class="container tabs-container">
            <div class="tabs-headers">
                <?php if (!empty($tab1title)) {
                    echo '<h3 class="tab-title active-tab">', $tab1title, '</h3>';
                }
                ?>
                <?php if (!empty($tab2title)) {
                    echo '<h3 class="tab-title">', $tab2title, '</h3>';
                } ?>
                <?php if (!empty($tab3title)) {
                    echo '<h3 class="tab-title">', $tab3title, '</h3>';
                }
                ?>
                <?php if (!empty($tab4title)) {
                    echo '<h3 class="tab-title">', $tab4title, '</h3>';
                }
                ?>
            </div>
            <?php if (!empty($tab1title)) {
                echo '<div class="tabs-content active-content">',
                    $tab1content,
                    '</div>';
            }
            ?>
            <?php if (!empty($tab2title)) {
                echo '<div class="tabs-content">',
                    $tab2content,
                    '</div>';
            }
            ?>
            <?php if (!empty($tab3title)) {
                echo '<div class="tabs-content">',
                    $tab3content,
                    '</div>';
            }
            ?>
            <?php if (!empty($tab4title)) {
                echo '<div class="tabs-content">',
                    $tab4content,
                    '</div>';
            }
            ?>
        </div>

    </div>
    <?php
    $blogs = theme_enlightlite_get_recent_blogs();
    //print_object($blogs);
    //$blogimage0 = theme_enlightlite_render_slideimg('blogimage1', 'blogimage1');
    //$blogimage1 = theme_enlightlite_render_slideimg('blogimage2', 'blogimage2');
    // $blogimage1 = theme_enlightlite_render_slideimg('blogimage3', 'blogimage3');
    $blogimages = array(theme_enlightlite_render_slideimg('blogimage1', 'blogimage1'), theme_enlightlite_render_slideimg('blogimage2', 'blogimage2'), theme_enlightlite_render_slideimg('blogimage3', 'blogimage3'));
    /*print_object($blogs[2]->summary);
    print_object($blogs[2]->subject);
    print_object($blogs[2]->firstname);
    print_object($blogs[2]->lastname);
    print_object(date('d/M/Y', $blogs[2]->created));*/
    ?>
    <?php if (!empty($blogs)) {
        echo '<div class="container">';
        echo '<h3 class="blogs-section-title">Read our Latest news and blogs</h3>
        <div class="blogs-container">';

        foreach ($blogs as $blogKey => $blogVal) {
            echo '<div class="blog-item">';
            echo '<img src=', $blogimages[$blogKey], '>';
            echo ' <div class="padding name-date"><p><span class="name">', $blogVal->firstname, '</span><span class="name">', $blogVal->lastname, '</p><p></span><span class="date">', date("d M Y", $blogVal->created), '</span></p></div>';
            echo '<h3 class="blog-title padding">', $blogVal->subject, '</h3>';
            echo '<div class="blog-content padding">', $blogVal->summary, '</div>';
            echo '<a class="view-more padding" href=', $CFG->wwwroot, '/blog/index.php?entryid=', $blogVal->post_id, ' ', 'target="_blank" rel="noopener">view more</a>
        </div>';
        }
        echo '</div>';
        echo '</div>';
    } ?>
    <?php
    require_once(dirname(__FILE__) . '/includes/footer.php');
    ?> <script>
        let tabTitles = document.querySelectorAll(".tab-title");
        let tabContents = document.querySelectorAll(".tabs-content");

        for (let i = 0; i < tabTitles.length; i++) {
            tabTitles[i].addEventListener("click", function(e) {
                for (let j = 0; j < tabTitles.length; j++) {
                    if (e.target != tabTitles[j]) {
                        tabContents[j].classList.remove("active-content");
                        tabTitles[j].classList.remove("active-tab");
                    } else {
                        tabContents[j].classList.add("active-content");
                    }
                }
                e.target.classList.add("active-tab");
            })
        }

        // TODO rework event modal and events event listeners
        /*events content*/
        let event1status = document.querySelector("#event1status").value;
        let event2status = document.querySelector("#event2status").value;
        let event3status = document.querySelector("#event3status").value;
        let event1 = document.querySelector("#event1");
        let eventModal1 = document.querySelector("#event-details1");
        let closeModal1 = document.querySelector("#close-details1");
        let event2 = document.querySelector("#event2");
        let eventModal2 = document.querySelector("#event-details2");
        let closeModal2 = document.querySelector("#close-details2");
        let event3 = document.querySelector("#event3");
        let eventModal3 = document.querySelector("#event-details3");
        let closeModal3 = document.querySelector("#close-details3");
        if (event1status == 1) {
            event1.addEventListener("click", () => {
                console.log("open");
                eventModal1.classList.remove("--closed");
                eventModal1.classList.add("--opened");
                if (event2status == 1) {
                    eventModal2.classList.remove("--opened");
                }
                if (event3status == 1) {
                    eventModal3.classList.remove("--opened");
                }

            });
            closeModal1.addEventListener("click", () => {
                console.log("close");
                eventModal1.classList.remove("--opened");
                eventModal1.classList.add("--closed");
                if (event2status == 1) {
                    eventModal2.classList.remove("--opened");
                    eventModal2.classList.add("--closed");
                }
                if (event3status == 1) {
                    eventModal3.classList.remove("--opened");
                    eventModal3.classList.add("--closed");
                }

            });
        }
        if (event2status == 1) {
            event2.addEventListener("click", () => {
                console.log("open");
                eventModal2.classList.remove("--closed");
                eventModal2.classList.add("--opened");
                if (event1status == 1) {
                    eventModal1.classList.remove("--opened");
                }
                if (event3status == 1) {
                    eventModal3.classList.remove("--opened");
                }

            });
            closeModal2.addEventListener("click", () => {
                console.log("close");
                if (event1status == 1) {
                    eventModal1.classList.remove("--opened");
                    eventModal1.classList.add("--closed");
                }
                eventModal2.classList.remove("--opened");
                eventModal2.classList.add("--closed");
                if (event3status == 1) {
                    eventModal3.classList.remove("--opened");
                    eventModal3.classList.add("--closed");
                }

            });
        }
        if (event3status == 1) {

            event3.addEventListener("click", () => {
                console.log("open");
                eventModal3.classList.remove("--closed");
                eventModal3.classList.add("--opened");
                if (event2status == 1) {
                    eventModal2.classList.remove("--opened");
                }
                if (event1status == 1) {
                    eventModal1.classList.remove("--opened");
                }

            });
            closeModal3.addEventListener("click", () => {
                console.log("close");
                if (event1status == 1) {
                    eventModal1.classList.remove("--opened");
                    eventModal1.classList.add("--closed");
                }
                if (event2status == 1) {
                    eventModal2.classList.remove("--opened");
                    eventModal2.classList.add("--closed");
                }

                eventModal3.classList.remove("--opened");
                eventModal3.classList.add("--closed");
            });
        };

        /* events end */
    </script>
    <script>
        require(['jquery'], function($) {

            var parent = $("#frontpage-available-course-list #available-courses").parents('div#frontpage-available-course-list')
            parent.addClass('frontpage-available-course frontpageblock-theme');
            $("#mycourses").parents('div#frontpage-course-list').addClass('frontpage-mycourse-list');

            $("#sidebar_overlay").hide();
            button = $("#header .navbar-nav button");
            $("#header .navbar-nav button").click(function() {
                setTimeout(function() {
                    nav = $("#nav-drawer").attr('aria-hidden');
                    if (nav == "false") {
                        $("#sidebar_overlay").show();
                    } else {
                        setTimeout(function() {
                            $("#sidebar_overlay").delay(100).hide();
                        }, 150);
                    }
                }, 200);

            });

            $("#sidebar_overlay").click(function() {
                if (button.hasClass('is-active')) {
                    button.removeClass('is-active');
                }
                $("#nav-drawer").addClass('closed');
                button.attr('aria-expanded', 'false');
                setTimeout(function() {
                    $("#sidebar_overlay").hide();
                }, 150);
            });
            $(".enlightlite-frontpage").find('br').hide();
            $(".enlightlite-frontpage").find('span.skip-block-to').each(function() {
                data = $(this).html();
                if (data.length == "") {
                    $(this).hide();
                }
            })
        });
    </script>

    <?php
    if ($type = theme_enlightlite_combolist_type() == true) {
        $js = "$(this).addClass('collapsed').attr('aria-expanded', 'false');";
        $PAGE->requires->js_amd_inline("require(['jquery'], function(){
        $('.course_category_tree').find('.category.loaded').each(function(){ " . $js . " }); });");
    }
