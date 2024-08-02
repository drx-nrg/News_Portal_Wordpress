<?php
if ( post_password_required() ) {
    return;
}
?>

<div id="comments" class="comments-area">

    <?php if ( have_comments() ) : ?>
        <h2 class="comments-title fs-5 fw-semibold mb-3">
            <?php
                printf(
                    _nx( 'One comment on "%2$s"', '%1$s comments on "%2$s"', get_comments_number(), 'comments title', 'textdomain' ),
                    number_format_i18n( get_comments_number() ),
                    '<span>' . get_the_title() . '</span>'
                );
            ?>
        </h2>

        <ul class="comment-list list-unstyled">
            <?php
            wp_list_comments( array(
                'style'      => 'ul',
                'short_ping' => true,
                'avatar_size'=> 80,
                'callback'   => 'my_custom_comments'
            ) );
            ?>
        </ul>

        <?php the_comments_navigation(); ?>

        <?php if ( ! comments_open() ) : ?>
            <p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'textdomain' ); ?></p>
        <?php endif; ?>

    <?php endif; ?>

    <?php
    comment_form( array(
        'class_form'           => 'comment-form', // Wrap form with .comment-form class
        'title_reply'          => __( 'Leave a Comment', 'textdomain' ),
        'title_reply_before'   => '<h2 class="comment-reply-title">',
        'title_reply_after'    => '</h2>',
        'comment_field'        => '<div class="form-group"><label for="comment" class="form-label">' . _x( 'Comment', 'noun' ) . '</label><textarea id="comment" name="comment" class="form-control" rows="4" aria-required="true"></textarea></div>',
        'fields'               => array(
            'author' => '<div class="form-group"><label for="author" class="form-label">' . __( 'Name', 'textdomain' ) . '</label> ' . ( $req ? '<span class="required">*</span>' : '' ) . '<input id="author" name="author" type="text" class="form-control" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30" aria-required="true" /></div>',
            'email'  => '<div class="form-group"><label for="email" class="form-label">' . __( 'Email', 'textdomain' ) . '</label> ' . ( $req ? '<span class="required">*</span>' : '' ) . '<input id="email" name="email" type="email" class="form-control" value="' . esc_attr( $commenter['comment_author_email'] ) . '" size="30" aria-required="true" /></div>',
            'url'    => '<div class="form-group"><label for="url" class="form-label">' . __( 'Website', 'textdomain' ) . '</label><input id="url" name="url" type="url" class="form-control" value="' . esc_attr( $commenter['comment_author_url'] ) . '" size="30" /></div>',
        ),
        'class_submit' => 'btn btn-success', // Add .btn and .btn-dark to submit button
    ) );
    ?>

</div>
