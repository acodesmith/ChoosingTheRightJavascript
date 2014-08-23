/**
 * Category of Session
 * @type {void|*}
 */
app.Categories = Backbone.Model.extend({
    defaults: {
        title: ''
    }
});
/**
 * Session Information with Author and Category object
 * @type {void|*}
 */
app.Session = Backbone.Model.extend({
    defaults: {
        category:{},
        title: '',
        description: '',
        author: {}
    }
});
/**
 * Filter Object for Search Function
 * @type {void|*}
 */
app.FilterType = Backbone.Model.extend({
    name: '',
    property: ''
});