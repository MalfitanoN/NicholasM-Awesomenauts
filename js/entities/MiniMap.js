game.Minimap = me.Entity.extend({
    init: function(x, y, settings){
        this._super(me.Entity, "init", [x, y, {
                image: "minimap",
                width: 185,
                height: 85,
                spritewidth: "185",
                spriteheight: "85",
                getShape: function() {
                return(new me.Rect(0, 0, 185, 85)).toPolygon();
            }
        }]);
    this.floating = true;
    }
});

