var zdjecia = [
    "https://images.pexels.com/photos/1630039/pexels-photo-1630039.jpeg?cs=srgb&dl=pexels-tomasz-filipek-1630039.jpg&fm=jpg",
    "https://images.unsplash.com/photo-1493787039806-2edcbe808750?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MTV8fGZpc2hpbmd8ZW58MHx8MHx8fDA%3D&w=1000&q=80",
    "https://wallpapers.com/images/hd/fishing-in-lake-sunset-jt1jl69t7ac66yad.jpg",
];

var index = 0;

function changeBackground() {
    index = (index + 1) % zdjecia.length;
    var imageUrl = zdjecia[index];
    document.getElementById("naglowek").style.backgroundImage = "url('" + imageUrl + "')";
}

setInterval(changeBackground, 5000);


$(document).ready(function () {
    var skip = 4;

    $('#loadMore').on('click', function () {
        $.ajax({
            url: '/get-more-posts',
            type: 'GET',
            data: { skip: skip },
            success: function (data) {
                
                if (data.length === 0) {
                    $('#loadMore').hide();
                    return;
                }

                data.forEach(function (post) {
                    var formattedDate = new Date(post.created_at).toLocaleDateString('en-GB');

                    var postHtml = '<div class="post-preview">' +
                        '<div class="d-flex justify-content-center">' +
                        '<img class="img-fluid" src="' + post.image_link + '" alt="Opis zdjęcia"></div>' +
                        '<a href="post/' + post.id + '">' +								
                        '<h2 class="post-title">' + post.title + '</h2>' +
                        '<h3 class="post-subtitle">' + post.short_description + '</h3></a>' +
                        '<p class="post-meta">' +
                        'Opublikowano przez <b>' + post.author + '</b> dnia ' + formattedDate + '</p></div>' +
                        '<hr class="my-4">';

                    $('#posty').append(postHtml);
                });

                skip += 4;
            }
        });
    });
});


