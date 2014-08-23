var Boxes = Backbone.Collection.extend({
    model: Box,

    byColor: function(color) {
        filtered = this.filter(function(box) {
            return box.get("color") === color;
        });
        return new Boxes(filtered);
    }

});

var red_boxes = boxes.byColor("red");