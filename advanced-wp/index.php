<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php bloginfo('stylesheet_url');?>">
    <title><?php bloginfo('name');?></title>
    <?php WP_head();?>
</head>
<body <?php body_class();?>>
   <?php get_header();?>
   <div class="container content">
        <div class="main block">
            <?php if(have_posts()):?>
            <?php while(have_posts()): the_post();?>
            <?php get_template_part('content',get_post_format());?>
            <?php endwhile;?>
            <?php else:?>
            <?php echo wpautop('Sorry,no posts were found');?>
            <?php endif;?> 
        </div>

        <div class="side">
            <div class="side-widget">
                <?php if(is_active_sidebar('sidebar')):?>
                <?php dynamic_sidebar('sidebar');?>
                <?php endif;?>
            </div>
        </div>
   </div>
   <?php get_footer();?>
</body>
</html>