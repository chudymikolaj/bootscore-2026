<?php
$wysiwygContent = get_field( 'block_wysiwyg_content' );
?>

<?php if ( $wysiwygContent ) : ?>

    <div class="block-wysiwyg">
        <?= str_ireplace("<p>&nbsp;</p>","<p class='block-wysiwyg__nbsp'>&nbsp;</p>",$wysiwygContent); ?>
    </div>

<?php endif;