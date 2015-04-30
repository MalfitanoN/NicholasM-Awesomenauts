game.ExperianceManager = Object.extend({
    init: function(x, y, settings) {
        this.alwaysUpdate = true;
        this.gameover = false;
    },
    update: function() {
        if (game.data.win === true && !this.gameover) {
            this.gameOver(true);
            me.audio.playTrack("Black Ops 2 SOUND");
            alert("Objective Parameters Obtained Well Done");
            me.state.change(me.state.MENU);
        }
        else if (game.data.win === false && !this.gameover) {
            this.gameOver(false);
            me.audio.playTrack("Black Ops - Humiliation");
            alert("Humiliation");
            me.state.change(me.state.MENU);
        }
        return true;
    },
    gameOver: function(win) {
        if (win) {
            game.data.exp += 10;
        } else {
            game.data.exp += 1;
        }
        console.log(game.data.exp);
        console.log(game.data.exp2);
        this.gameover = true;
        me.save.exp = game.data.exp;
        me.save.exp2 = 4;


        $.ajax({
            type: "POSTS",
            url: "php/controller/save    -user.php",
            data: {
                exp: game.data.exp,
                exp1: game.data.exp1,
                exp2: game.data.exp2,
                exp3: game.data.exp3,
                exp4: game.data.exp4
            },
            dataType: "text"
        })
                .success(function(response) {
                    if (response === "true") {
                        me.state.change(me.state.change.MENU);
                    } else {
                        alert(response);
                    }
                })
                .fail(function(response) {
                    alert("Fail");
                });
    }
});