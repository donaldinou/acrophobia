<?php get_header(); ?>


<div class="notfound"><?php _e('Introuvable. Désolé!<br />Tentez une nouvelle recherche ?'); ?><br /><br />
<form id="searchform" method="get" action="<?php bloginfo('home'); ?>">
                <input type="text" name="s" id="s" size="25" />
                <input type="submit" value="Search">
</form><br />
Ou passez par l'<a href="<?php bloginfo('url'); ?>">Accueil ?</a><br /><br />

Ou lire les dernières nouvelles ?<br /><br />
<div style="font-size:12px; margin-left:30px; font-weight:normal; text-align:left;">
<?php $lastposts = get_posts('numberposts=10');
foreach($lastposts as $post) :
   setup_postdata($post);
   ?>
   <?php the_title(); ?><a href="<?php the_permalink(); ?>" id="post-<?php the_ID(); ?>"> (lire)</a><br />
<?php endforeach; ?>
</div>
</div>

<?php get_footer(); ?>
