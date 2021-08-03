<?php 
/**
 * The searchform containing the main sidebar.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Ample blog
 */


?>
<form method="get" role=search id="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>" class="form-wrapper">
    <div>
        <input type="text" name="s" id="s" placeholder="search" class="ed-input-text" value="<?php echo esc_attr(get_search_query());?>">
        <input type="submit" name="button" class="pop-search">
    </div>
</form>