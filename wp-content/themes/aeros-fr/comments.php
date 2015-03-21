	<?php if ( !empty($post->post_password) && $_COOKIE['wp-postpass_' . COOKIEHASH] != $post->post_password) : ?>

                 <p><?php _e('Entrez votre mot de passe pour lire les commentaires.'); ?></p>

         <?php return; endif; ?>

	<h2 id="comments"><?php comments_number(__('Pas de commentaire'), __('1 commentaire'), __('% commentaires')); ?>
	<?php if ( comments_open() ) : ?>
	         <a href="#postcomment" title="<?php _e("Laisser un commentaire"); ?>">&raquo;</a>
	<?php endif; ?>
	</h2>


<?php if ( $comments ) : ?>

	<ul id="commentlist">

	<?php foreach ($comments as $comment) : ?>
	         <li>

	         <!--Change the gravatar size by replacing '70' with bigger resp. smaller sizes-->
                 <div class="authorcomm">
	         
                 <?php echo get_avatar( $comment, 70 ); ?>

                 <?php comment_author_link() ?>
                 </div>
	         <?php comment_text() ?>

	         <div class="meta"><?php comment_type(__('Commentaire'), __('Trackback'), __('Pingback')); ?> | <?php comment_date() ?> <?php edit_comment_link(__("Modifier"), ' |'); ?></div>
	         </li>

	<?php endforeach; ?>

	</ul>



<?php else : ?>

<?php endif; ?>

	<p style="font-size:12px;"><?php post_comments_feed_link(__('Flux RSS des commentaires pour cet article.')); ?>
	<?php if ( pings_open() ) : ?>
	         <a href="<?php trackback_url() ?>" rel="trackback"><?php _e('URL de TrackBack'); ?></a>
	<?php endif; ?>
	</p>

<?php if ( comments_open() ) : ?>
	<h2 id="postcomment"><?php _e('Laisser un commentaire'); ?></h2>

<?php if ( get_option('comment_registration') && !$user_ID ) : ?>
<p><?php printf(__('Vous devez être <a href="%s">identifié</a> pour écrire un commentaire.'), get_option('siteurl')."/wp-login.php?redirect_to=".urlencode(get_permalink()));?></p>
<?php else : ?>

	         <form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">

	         <?php if ( $user_ID ) : ?>

	         <p><?php printf(__('Identifié en tant que %s.'), '<a href="'.get_option('siteurl').'/wp-admin/profile.php">'.$user_identity.'</a>'); ?> <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?action=logout" title="<?php _e('Se déconnecter') ?>"><?php _e('Se déconnecter &raquo;'); ?></a></p>

	         <?php else : ?>

	         <p><input type="text" name="author" id="author" value="<?php echo $comment_author; ?>" size="22" tabindex="1" />
	         <label for="author"><small><?php _e('Nom'); ?> <?php if ($req) _e('(obligatoire)'); ?></small></label></p>

	         <p><input type="text" name="email" id="email" value="<?php echo $comment_author_email; ?>" size="22" tabindex="2" />
	         <label for="email"><small><?php _e('Courriel (ne sera pas publié)');?> <?php if ($req) _e('(obligatoire)'); ?></small></label></p>

	         <p><input type="text" name="url" id="url" value="<?php echo $comment_author_url; ?>" size="22" tabindex="3" />
	         <label for="url"><small><?php _e('Site'); ?></small></label></p>

	         <?php endif; ?>

	         <!--<p><small><strong>XHTML :</strong> <?php printf(__('Vous pouvez utiliser ces balises : %s'), allowed_tags()); ?></small></p>-->

	         <p><textarea name="comment" id="comment" cols="100%" rows="10" tabindex="4"></textarea></p>

	         <p><input name="submit" type="submit" id="submit" tabindex="5" value="<?php echo attribute_escape(__('Envoyer votre commentaire')); ?>" />
	         <input type="hidden" name="comment_post_ID" value="<?php echo $id; ?>" />
	         </p>
	         <?php do_action('comment_form', $post->ID); ?>

	         </form>

<?php endif; // If registration required and not logged in ?>

<?php else : // Comments are closed ?>
<p><?php _e('Désolé, les commentaires sont fermés pour le moment.'); ?></p>
<?php endif; ?>
