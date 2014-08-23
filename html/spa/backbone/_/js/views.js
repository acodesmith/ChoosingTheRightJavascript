/**
 * Search View - Simple Search Form with Filter Type Dropdown
 * @type {void|*}
 */
var SearchView = Backbone.View.extend({
    el: "#search_container",
    initialize: function(){
        this.render();
    },
    render: function(){
        // Compile the template using underscore
        var template = _.template( $("#search_template").html(), {} );
        // Load the compiled HTML into the Backbone "el"
        this.$el.html( template );
    }
});

var search_view = new SearchView({ model: FilterCollection });

