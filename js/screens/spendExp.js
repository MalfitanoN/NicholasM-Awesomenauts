game.SpendExp = me.ScreenObject.extend({
	/**	
	 *  action to perform on state change
	 */
	onResetEvent: function() {	
		me.game.world.addChild(new me.Sprite(0, 0, me.loader.getImage("exp-screen")), -10); // TODO
                
                me.input.bindKey(me.input.KEY.F1, "F1");
                me.input.bindKey(me.input.KEY.F2, "F2");
                me.input.bindKey(me.input.KEY.F3, "F3");
                me.input.bindKey(me.input.KEY.F4, "F4");
                me.input.bindKey(me.input.KEY.F5, "F5");
                
                me.game.world.addChild(new(me.Renderable.extend({
                    init: function(){
                        this._super(me.Renderable, "init", [10, 10, 300, 50]);
                        this.font = new me.Font("Arial", 26, "white");
                    },
                    
                    
                    
                    draw: function(renderer){
                        this.font.draw(renderer.getContext(), "UPGRADES", this.pos.x, this.pos.y);
                        this.font.draw(renderer.getContext(), "CURRENT EXP: " + game.data.exp.toString(), this.pos.x + 100, this.pos.y + 50);
                        this.font.draw(renderer.getContext(), "F1: INCCREASE GOLD PRODUCTION " + "| COST: " + ((game.data.exp1 + 1) * 10), this.pos.x + 100, this.pos.y + 100);
                        this.font.draw(renderer.getContext(), "CURRENT LEVEL: " + game.data.exp1.toString(), this.pos.x + 150, this.pos.y + 150);
                        this.font.draw(renderer.getContext(), "F2: ADD STARTING GOLD ", this.pos.x + 100, this.pos.y + 200);
                        this.font.draw(renderer.getContext(), "F3: INCREASE ATTACK DAMAGE", this.pos.x + 100, this.pos.y + 250);
                        this.font.draw(renderer.getContext(), "F4: INCREASE HEALTH", this.pos.x + 100, this.pos.y + 300);
                        
                    }
                })));
                
                this.handler = me.event.subscribe(me.event.KEYDOWN, function(action, keycode, edge){
                    if(action === "F1"){
                        
                    }else if(actiion === "F2"){
                        
                    }else if(actiion === "F3"){
                        
                    }else if(actiion === "F4"){
                        
                    }else if(actiion === "F5"){
                        
                    }
                    
                });

	},
	
	
	/**	
	 *  action to perform when leaving this screen (state change)
	 */
	onDestroyEvent: function() {
                me.input.unbindKey(me.input.KEY.F1, "F1");
                me.input.unbindKey(me.input.KEY.F2, "F2");
                me.input.unbindKey(me.input.KEY.F3, "F3");
                me.input.unbindKey(me.input.KEY.F4, "F4");
                me.input.unbindKey(me.input.KEY.F5, "F5");
                me.event.unsubscriber(this.handler);
	}
});
