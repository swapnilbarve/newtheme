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
            <h1 class="page-header">
                <?php
                if(is_category()){
                    single_cat_title();
                }else if(is_author()){
                    the_post();
                    echo 'Archives By Authors:'.get_the_author();
                    rewind_posts();
                }else if(is_tag()){
                    single_tag_title();
                }else if(is_day()){
                    echo 'Archives By Day:'.get_the_date();
                }else if(is_month()){
                    echo 'Archives By Month:'.get_the_date('F Y');
                }else if(is_year()){
                    echo 'Archives By Year:'.get_the_date('Y');
                }else{
                    echo 'Archives';
                }
                ?>
            </h1>
            <?php if(have_posts()):?>
            <?php while(have_posts()): the_post();?>
            <?php get_template_part('content',get_post_format());?>
            <div class="archive-post">
                <h4>
                    <a href="<?php the_permalink();?>">
                    <?php the_title();?>
                    </a>
                </h4>
                <p>Posted On: <?php the_time('F j. Y g:i a');?></p>
            </div>  
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