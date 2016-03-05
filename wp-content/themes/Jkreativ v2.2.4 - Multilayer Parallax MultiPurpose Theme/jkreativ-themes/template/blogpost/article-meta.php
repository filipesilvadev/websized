<div class="article-meta-tag">
    <?php
    if(has_category()) {
        $catlink = array();
        foreach(get_the_category() as $category) {
            $catlink[] = '<a href="' . get_category_link($category->term_id) . '" title="' . $category->description . '">' . $category->name . '</a>';
        }
        $catlink = implode(' , ', $catlink);
        ?>
        <div class="article-category-list">
            <?php _e("Category : "); echo $catlink; ?>
        </div>
    <?php
    }
    ?>
    <div class="article-tag-list">
        <?php the_tags(); ?>
    </div>
</div>