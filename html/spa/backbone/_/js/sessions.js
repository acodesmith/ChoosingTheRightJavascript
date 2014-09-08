/**
 * Sessions
 * @type {app.SessionList}
 */
$deferred = $.get('/data/json/sessions.json');
$deferred.done(function(data){

    var sessions = [];

    _.each(data.sessions, function(val, i){
        sessions[i] = new app.Session(val);
    });

    SessionCollection = new app.SessionList(sessions);

    /**
     * Session View
     * @type {void|*}
     */
    SessionView = Backbone.View.extend({
        el: "#session_container",
        initialize: function(){
            this.render();
        },
        render: function(data){
            // Compile the template using underscore
            var template = _.template( $("#session_template").html(), {} );
            // Load the compiled HTML into the Backbone "el"
            this.$el.html( template );
        },
        search: function(query, type){
            var $models = this.collection.search(query, type); //this.collection.reset(  );
            this.render($models);
        }
    });

    session_view = new SessionView({ collection: SessionCollection });
});
