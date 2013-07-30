var global_photos = Array();

$(document).ready(function(){
    if(typeof photos_json != 'undefined')
    {
        init_large_photos();
    }
    $('ul li a', '.album').click(function()
    {
        var photo_index = $(this).data('index');
        var photo = global_photos[photo_index];
        enlarge_photo(photo);
        return false;
    });
    
    $('#info-link').click(function()
    {
        $('#moreinfo').toggle('fast');
        if($(this).hasClass('white-highlighted')){
            $(this).removeClass('white-highlighted');
        }
        else{
            $(this).addClass('white-highlighted');
        }
        return false;
    });
    
    $('#close-link').click(function()
    {
        hide_photo();
        return false;
    });
});

function init_large_photos(){
    $.each(photos_json.photos, function(index)
    {
        global_photos[index] = this;
        var largest_image_data = this.sizes.pop();
        var fullimg = document.createElement('img');
        fullimg.src = largest_image_data.source;
        fullimg.alt = this.title;
        fullimg.width = largest_image_data.width;
        fullimg.height = largest_image_data.height;
        $(fullimg).css('display', 'none');
        $('figure', '#' + this.id).append(fullimg);
    });
}

function enlarge_photo(photo){
    var photo_node = $('#photo');
    $('h3','#photo-narrative').text(photo.title);
    $('p', '#photo-narrative').text(photo.description);
    photo_src = photo.sizes.pop().source;
    photo_node.css('background-image', 'url("' + photo_src + '")').fadeIn(500);
}

function hide_photo(){
    var photo_node = $('#photo');
    photo_node.css('background-image', 'none').fadeOut(500);
}