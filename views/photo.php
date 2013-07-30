<?php
    $photo_id = $_REQUEST['photo_id'];
    $photo = photo::photo_from_id($photo_id);
    $photo_sizes = $photo->sizes();
?>
<section id="photo" style="background-image: url('<?=$photo_sizes[5]->source;?>');">
</section>
<section id="photo_info">
</section>