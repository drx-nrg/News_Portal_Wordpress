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
                    _nx( 'Satu komentar di "%2$s"', '%1$s komentar di "%2$s"', get_comments_number(), 'comments title', 'newslify' ),
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
            <p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'newslify' ); ?></p>
        <?php endif; ?>

    <?php endif; ?>

    <?php
    comment_form( array(
        'class_form'           => 'comment-form mb-5', // Wrap form with .comment-form class
        'title_reply'          => __( 'Tinggalkan Komentar', 'newslify' ),
        'title_reply_before'   => '<h2 class="comment-reply-title fw-semibold text-dark">',
        'title_reply_after'    => '</h2>',
        'comment_notes_before' => '<p class="text-dark">Alamat email Anda tidak akan dipublikasikan. Ruas yang wajib ditandai <span class="required">*</span>',
        'comment_notes_after' => '</p>',
        'comment_field'        => '<div class="form-group"><label for="comment" class="form-label text-dark">' . _x( 'Comment', 'noun' ) . '</label><textarea id="comment" name="comment" class="form-control bg-white" rows="4" aria-required="true"></textarea></div>',
        'fields'               => array(
            'author' => '<div class="form-group"><label for="author" class="form-label text-dark">' . __( 'Name', 'newslify' ) . '</label> ' . ( $req ? '<span class="required">*</span>' : '' ) . '<input id="author" name="author" type="text" class="form-control bg-white" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30" aria-required="true" /></div>',
            'email'  => '<div class="form-group"><label for="email" class="form-label text-dark">' . __( 'Email', 'newslify' ) . '</label> ' . ( $req ? '<span class="required">*</span>' : '' ) . '<input id="email" name="email" type="email" class="form-control bg-white" value="' . esc_attr( $commenter['comment_author_email'] ) . '" size="30" aria-required="true" /></div>',
            'url'    => '<div class="form-group"><label for="url" class="form-label text-dark">' . __( 'Website', 'newslify' ) . '</label><input id="url" name="url" type="url" class="form-control bg-white" value="' . esc_attr( $commenter['comment_author_url'] ) . '" size="30" /></div>',
            'cookies' => '<p class="comment-form-cookies-consent text-dark"><input id="wp-comment-cookies-consent" name="wp-comment-cookies-consent" type="checkbox" value="yes" class="bg-white"> <label for="wp-comment-cookies-consent">Simpan nama, email, dan situs web saya pada peramban ini untuk komentar saya berikutnya.</label></p>'
        ),
        // 'class_submit' => 'btn bg-orange fw-semibold', // Add .btn and .btn-dark to submit button,
        'submit_button' => '<button class="btn bg-orange fw-semibold" value="Kirim Komentar" name="submit" type="submit" style="font-family: Titillium Web;">Kirim Komentar</button>'
    ) );
    ?>

</div>
