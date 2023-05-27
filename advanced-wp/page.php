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
            <article class="page">
                <?php if(page_is_parent()||$post->post_parent>0):?>
                <nav class="nav sub-nav">
                    <ul>
                        <span class="parent-link"><a href="<?php echo
                         get_the_permalink(get_top_parent());?>"><?php
                         echo get_the_title(get_top_parent());?></a>
                        </span>               
                        <?php
                            $args = array(
                            'child_of'=>get_top_parent(),
                            'title_li'=>''
                        );
                        ?>
                        <?php wp_list_pages($args);?>
                    </ul>
                </nav>
                <div class="clr"></div>
                <?php endif;?>
                <h2><?php the_title();?></h2>
                <?php the_content();?>
            </article>
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