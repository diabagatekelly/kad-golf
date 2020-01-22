import $ from 'jquery';

class Search {
    //1. describe and create/initiate our object
    constructor() {
        this.addSearchHTML();
        this.searchResults = $("#search-overlay__results");
        this.openButton = $(".dashicons-search");
        this.closeButton = $(".search-overlay__close");
        this.searchOverlay = $(".search-overlay");
        this.navbarCollapse = $("#navbarSupportedContent");
        this.searchField = $("#search-term");
        this.isSpinnerVisible = false;
        this.previousValue;
        this.typingTimer;
        this.events();
    }
    //2. events list
    events() {
        this.openButton.on('click', this.openOverlay.bind(this));
        this.closeButton.on('click', this.closeOverlay.bind(this));
        this.searchField.on('keyup', this.searchLogic.bind(this));
    }

    //3. methods (function, actions ...)
    searchLogic() {
        if(this.searchField.val() != this.previousValue || this.searchField.val() == '') {
            clearTimeout(this.typingTimer);

            if(this.searchField.val() != '') {
                if(!this.isSpinnerVisible) {
                    this.searchResults.html('<div class="spinner-loader"></div>');
                    this.isSpinnerVisible = true;
                }
                this.typingTimer = setTimeout(this.getResults.bind(this) , 750);
            }  else if(this.searchField.val() == '') {
                this.searchResults.html('');
                this.isSpinnerVisible = false;
            }
              
    }
        this.previousValue = this.searchResults.val();
    }

    getResults() {
        $.when(
        $.getJSON(siteData.root_url + '/wp-json/wp/v2/pages?search=' + this.searchField.val()), 
        $.getJSON(siteData.root_url + '/wp-json/wp/v2/categories?search=' + this.searchField.val()))
            .then((pages, cats) => {
            this.searchResults.html(`
            <h2 class="col-12 search-overlay__section-title">Search Results</h2>
            <div class="col-xs-12 col-md-6">
            <h3>Pages</h3>
            ${pages[0].length ? '<ul class="link-list min-list">' : '<p>No search result matches found.</p>' }
            
            ${pages[0].map(item => item.id == 16 ? '' : 
            `<li><a href="${item.link}">
            <p>${item.title.rendered}</p>
            ${!item.image  ? '' : `<img width="200" src="${item.image}"></a>`}
           </li>`).join('')}

            ${pages[0].length ? '</ul>' : ''}
            </div>
            <div class="col-xs-12 col-md-6">
            <h3>Shopping Guides</h3>
            ${cats[0].length ? '<ul class="link-list min-list">' : '<p>No search result matches found.</p>' }
                ${cats[0].map(item => `<li><a href="${item.link}">${item.name}</a></li>`).join('')}  
                ${cats[0].length ? '</ul>' : ''}
            </div>
                `)  
        }, ()=> {
            this.searchResults.html('<p>Unexpected error, please try again.</p>')
        })
        this.isSpinnerVisible = false;
    }

    openOverlay() {
        this.navbarCollapse.removeClass("show");
        this.searchOverlay.addClass("search-overlay--active");
        this.searchField.val('');
        this.searchResults.empty();
        setTimeout(() => this.searchField.focus(), 301);
        $("body").addClass("body-no-scroll");
        return false;
    }

    closeOverlay() {
        this.searchOverlay.removeClass("search-overlay--active");
        $("body").removeClass("body-no-scroll");
    }

    addSearchHTML() {
        $('body').append(`
        <div class="search-overlay">
        <div class="search-overlay__top">
          <div class="container">
            <i class="fa fa-search search-overlay__icon" aria-hidden="true"></i>
            <input type="search" id="search-term" class="search-field form-control-sm mr-sm-2 search-term"
                placeholder="What are you looking for?"/>
            <i class="fa fa-window-close search-overlay__close mt-5" aria-hidden="true"></i>
          </div>
        </div>
        <div class="container">
          <div id="search-overlay__results" class="row d-flex">
          </div>
        </div>
    </div>
        `)
    }
}

export default Search;