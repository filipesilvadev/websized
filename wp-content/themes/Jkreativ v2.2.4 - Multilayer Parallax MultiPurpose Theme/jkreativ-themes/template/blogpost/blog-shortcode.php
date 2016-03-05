<?php
$imgfeatured = wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), 'full');

$categorytag = '';
$categoryarray = array();
if(has_category()) {
    foreach(get_the_category() as $category) {
        $categoryarray[] = ucfirst($category->name);
    }
    $categorytag = '<span class="category">' . implode(', ',$categoryarray ) . '</span>' . ' <span>-<span>';
}
?>

<a style="background-image: url('<?php echo $imgfeatured[0]; ?>');" class="notes-list-entry" href="<?php echo get_permalink(); ?>">
    <span class="color-overlay"></span>
    <div class="sectioncontainer blog-list-shortcode-content">
        <p class="note-meta">
            <?php echo $categorytag ?>
            <span class="date-posted"><?php echo get_the_date(); ?></span>
        </p>
        <h2 class="note-title"><?php the_title() ?></h2>
        <cite class="note-author">
            <?php _e("Posted by ", 'jeg_textdomain'); ?>
            <?php echo ucfirst(get_the_author()); ?>
        </cite>
    </div>
</a>