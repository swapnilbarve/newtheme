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
<?php
/*Template Name:Campany Layout*/
?>
   <?php get_header();?>
   <div class="container content">
        <div class="main block">
            <?php if(have_posts()):?>
            <?php while(have_posts()): the_post();?>
            <article class="page">
                <h2><?php the_title();?></h2>
                <p class="phone">Call Us:1-800-555-5555</p>
                <?php the_content();?>
            </article>
            <?php endwhile;?>
            <?php else:?>
            <?php echo wpautop('Sorry,no posts were found');?>
            <?php endif;?> 
        </div>

        <div class="side">
            <div class="block">
                <h3>Sidebar Head</h3>
                <p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old.Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>
                <a class="button">More</a>
            </div>
        </div>
   </div>
   <?php get_footer();?>
</body>
</html>