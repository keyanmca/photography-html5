<section style="display: none">
    <?php
        phpinfo();
    ?>
</section>

<section class="photos">
    <?php
        foreach($albums as $album)
        {
            $count = 0;
    ?>
    <ul class="photopile">
    <?php
            $photos = $album->photos();
            foreach($photos as $photo)
            {
                $photo_sizes = $photo->sizes();
    ?>
        <li>
            <a href="<?=base_href . 'album/' . album_collection::slug($album->title());?>.html" title="<?=$photo->title();?>">
                <figure>
                    <img src="<?=$photo_sizes[2]->source; ?>" width="<?=$photo_sizes[2]->width; ?>" height="<?=$photo_sizes[2]->height; ?>" alt="<?=$photo->description(); ?>" />
                    <figcaption>
                        <?= $count < 1 ? $album->title():'';?>
                    </figcaption>
                </figure>
            </a>
        </li>
    <?php
                $count++;
                if($count >= 5)
                {
                    break;
                }
            }
    ?>
    </ul>
    <?php
        }
    ?>
</section>