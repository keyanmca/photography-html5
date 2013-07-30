<section class="album">
    <ul>
    <?php
        foreach($photos as $photo)
        {
            $photo_sizes = $photo->sizes();
    ?>
        <li>
             <a href="<?=base_href . 'photo/' . $photo->id();?>.html" title="<?=$photo->title();?>">
                <figure>
                    <img src="<?=$photo_sizes[2]->source; ?>" width="<?=$photo_sizes[2]->width; ?>" height="<?=$photo_sizes[2]->height; ?>" alt="<?=$photo->description(); ?>" />
                    <figcaption>
                        
                    </figcaption>
                </figure>
            </a>
        </li>
    <?php
        }
    ?>
    </ul>
</section>

