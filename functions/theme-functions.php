<?php
function mos_home_url_replace($data) {
    $replace_fnc = str_replace('home_url()', home_url(), $data);
    $replace_br = str_replace('{{home_url}}', home_url(), $replace_fnc);
    return $replace_br;
}
/*Variables*/
$template_parts = array(
    'Enabled'  => array(
        'content' => 'Content Section',
        'map' => 'Map Section',
    ),
    'Disabled' => array(
        'banner' => 'Home Banner',
        'mservice' => 'Main Services',
        'about' => 'About Section',
        'gservice' => 'General Services',
        'cta' => 'Call to Action',
        'counter' => 'Counter Section',
        'testimonial' => 'Testimonials Section',
        'blog' => 'Blogs Section',
    ),
);
/*Variables*/