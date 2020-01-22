import $ from 'jquery';

class Favorites {
    constructor() {
        this.deleteButton = $('.delete');
        this.favePostSup = $('.faveSup');
        this.events();
        this.faveCount();
    }

    events() {
        $(".like-box").on("click", this.clickDispatcher.bind(this));
        this.deleteButton.on("click", this.deleteFave);        
    }

    clickDispatcher(e) {
        var currentLikeBox = $(e.target).closest(".like-box");
        var currentPost = currentLikeBox.parents(".category-buttons").siblings(".faveContent");
        var currentPostChild = currentPost.children(".category-post");
        var postTitle = currentPostChild.children(".post_title");
        var postContent = currentPostChild.children(".category-content");
        var postExcerpt = currentPostChild.children(".post_excerpt");
        if(currentLikeBox.data('exists') == 'yes') {
            console.log('nothing');
        } else {
            this.createFave(currentPost, postTitle, postContent, postExcerpt, currentLikeBox);
        }
    }

    faveCount() {
            $('.spinner-loader').hide();
            $(".faveSup").html(siteData.favorites);
            $(".faveCount").html(siteData.favorites);
            if (siteData.favorites > 45) {
                $(".faveTxt").removeClass('text-success');
                $(".faveTxt").addClass('text-danger');
            } else if(siteData.favorites < 45) {
                $(".faveTxt").addClass('text-success');
                $(".faveTxt").removeClass('text-danger');
            }
       }

       createFave(currentPost, postTitle, postContent, postExcerpt, currentLikeBox) {
        currentPost.siblings('.category-buttons').children('.like-box').children('.faveBox').children('.spinner-loader').show();

        $.ajax({
            beforeSend: (xhr) => {
                xhr.setRequestHeader('X-WP-Nonce', siteData.nonce);
                currentLikeBox.children('.btn-white').html('').addClass('spinner-loader');
            },
            url: siteData.root_url + '/wp-json/golf/v1/manageFave',
            type: 'POST',
            data: {
                'postId': currentPost.data('id'),
                'title': '',
                'content': currentPost.html(),
            },
            success: (response) => {
                console.log(currentPost);
                currentLikeBox.attr('data-exists', 'yes');
                                currentPost.siblings('.category-buttons').children('.like-box').children('.faveBox').children('.spinner-loader').hide();
                console.log(response);
                if (siteData.favorites > 45) {
                    $(".faveTxt").removeClass('text-success');
                    $(".faveTxt").addClass('text-danger');
                } else if(siteData.favorites < 45) {
                    $(".faveTxt").addClass('text-success');
                    $(".faveTxt").removeClass('text-danger');
                }
            },
            error: (response) => {
                currentPost.siblings('.category-buttons').children('.like-box').children('.faveBox').children('.spinner-loader').hide();
                    currentPost.siblings('.category-buttons').children('.like-box').children('.faveBox').append('<span style="color: red; font-weight: bold">You must be logged in to add to favorites</span>')
                console.log(response);
            }
        }).done(() => {
            var likeCount = parseInt($(".faveSup").html(), 10);
            likeCount++;
            $(".faveSup").html(likeCount);
        })
    }

    deleteFave(e) {
        var faveID = $(e.target).parents("li");
                faveID.children('.category-post').children('.faveBox').children('.spinner-loader').show();
        $.ajax({
            beforeSend: (xhr) => {
                xhr.setRequestHeader('X-WP-Nonce', siteData.nonce);
                faveID.children('.category-post').children('.del-btn').children('.btn-danger').html('').addClass('spinner-loader');
            },
            url: siteData.root_url + '/wp-json/wp/v2/favorites/' + faveID.data("id"),
            type: 'DELETE',
            success: (response) => {
                faveID.slideUp();
                                faveID.children('.category-post').children('.faveBox').children('.spinner-loader').hide();
                console.log(response.faveCount);
                if (response.faveCount > 45) {
                    $(".faveTxt").removeClass('text-success');
                    $(".faveTxt").addClass('text-danger');
                } else if(response.faveCount < 45) {
                    $(".faveTxt").addClass('text-success');
                    $(".faveTxt").removeClass('text-danger');
                }
                console.log('Congratulations');
                console.log(response);

             },
            error: (response) => {
                console.log('Error');
                console.log(response);
            }
        }).done(() => {
            var likeCount = parseInt($(".faveSup").html(), 10);
            likeCount--;
            $(".faveSup").html(likeCount);
            $(".faveCount").html(likeCount);
        });
    }
}

export default Favorites;