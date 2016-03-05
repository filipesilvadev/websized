<?php

if(function_exists('icl_get_languages'))
{
    echo '<div class="langwrapper"><ul>';
    $languages = icl_get_languages('skip_missing=0&orderby=code');
    if(!empty($languages))
    {

        foreach($languages as $l) {
            echo '<li class="avalang">';
            echo '<a href="' . $l['url'] . '" data-tourl="false">';
            echo '<i class="langflag"  style="background-image: url(' . $l['country_flag_url'] . ');"></i>';
            echo '<div class="text-social">' . $l['native_name'] . '</div>';
            echo '</a>';
            echo '</li>';
            echo '<li class="separator">&nbsp;</li>';
        }
    }
    echo '</ul></div>';
}