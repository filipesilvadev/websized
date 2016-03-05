<?php
$output = $el_class = $css_animation = '';

extract(shortcode_atts(array(
    'el_class' => '',
    'css_animation' => '',
    'css' => ''
), $atts));

$el_class = $this->getExtraClass($el_class);

$css_class = '';
$css_class .= $this->getCSSAnimation($css_animation);
$output .= "\n\t".'<div class="'.$css_class.' '. $el_class .'">';
$output .= "\n\t\t\t".do_shortcode($content, true);
$output .= "\n\t".'</div> ' . $this->endBlockComment('.wpb_text_column');

echo $output;