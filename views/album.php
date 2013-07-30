<section class="album">
    <ul>
    <?php
        foreach($photos as $key => $photo)
        {
            $photo_sizes = $photo->sizes();
    ?>
        <li data-photo-id="<?=$photo->id();?>">
             <a data-index="<?=$key;?>" id="<?=$photo->id();?>" href="<?=base_href . 'photo/' . $photo->id();?>.html" title="<?=$photo->title();?>">
                <figure>
                    <img src="<?=$photo_sizes[3]->source; ?>" width="<?=$photo_sizes[3]->width; ?>" height="<?=$photo_sizes[3]->height; ?>" alt="<?=$photo->description(); ?>" />
                </figure>
            </a>
        </li>
    <?php
        }
    ?>
    </ul>
</section>
<section id="photo">
    <section id="moreinfo">
        <article class="photo-text" id="photo-narrative">
            <h3>
                
            </h3>
            <p>
                
            </p>
        </article>
        <article class="photo-text" id="photo-info">
            <h3>
                Exif Data
            </h3>
            <p>
                
            </p>
        </article>
    </section>
    <a class="fullscreen-link" id="info-link" href="#">
        i
    </a>
    <a class="fullscreen-link" id="close-link" href="#">
        x
    </a>
</section>

