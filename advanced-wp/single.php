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
            <article class="post para">
                <h2><?php the_title();?></h2>
                <p class="meta">Posted at 
                    <?php the_time('F j,Y g:i a');?>
                by
                <a href="<?php echo get_author_posts_url(
                    get_the_author_meta('ID'));?> ">
                    <?php the_author();?>
                </a>
                Posted In
                <?php
                $categories=get_the_category();
                $separator=",";
                $output='';

                if($categories){
                    foreach($categories as $category){
                        $output.='<a href='.get_category_link($category->term_id).'>'.$category->cat_name.'</a>'.$separator;
                    }
                }
                echo trim($output,$separator);
                ?>
                </p> 
                <?php if(has_post_thumbnail()):?>
                    <div class="post-thumbnail">
                        <?php the_post_thumbnail();?>
                    </div>
                <?php endif;?>
                <?php the_excerpt();?>  
                <a class="button" href="<?php the_permalink();?>">Read More</a>
            </article>
            <?php endwhile;?>
            <?php else:?>
            <?php echo wpautop('Sorry,no posts were found');?>
            <?php endif;?> 
            <?php comments_template();?>
            <?php $form_args = array(
                //change the title of send button
                'label_submit'=>'send',
                //change the title of the reply section
                'title_reply'=>'Write a Reply or Comment',
                'comment_notes_after'=>'',
            );
            ?>
            <?php comment_form($form_args);?>
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