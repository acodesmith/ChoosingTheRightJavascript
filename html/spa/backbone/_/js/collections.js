/**
 * Collections of Models
 * @type {void|*}
 */
app.SessionList = Backbone.Collection.extend({
    model: app.Session,
    search : function(query, filterBy){
        return _(this.models.filter(function(data) {
            return data.get(filterBy.toLowerCase()).indexOf(query) != -1;
        }));
    }
});

app.FilterList = Backbone.Collection.extend({
    model: app.FilterType
});