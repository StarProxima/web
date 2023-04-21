// Define canvas and context variables
var canvas = document.getElementById("gameCanvas");
var ctx = canvas.getContext("2d");

// Set up game variables
var player = {
    x: canvas.width/2,
    y: canvas.height - 50,
    width: 30,
    height: 30,
    speed: 5
};
var bullets = [];
var enemies = [];
var enemySpeed = 2;
var enemyCount = 15;


// Set up game loop
var gameLoop;

// Set up key listeners
var keys = {
    left: false,
    right: false,
    shoot: false
};

function startGame() {
     player = {
        x: canvas.width/2,
        y: canvas.height - 50,
        width: 30,
        height: 30,
        speed: 5
    };
     bullets = [];
     enemies = [];
     enemySpeed = 2;
     enemyCount = 20;

    // Create enemy objects
    for (var i = 0; i < enemyCount; i++) {
        var enemy = {
            x: 50 + (i % 5) * 100,
            y: 50 + Math.floor(i / 5) * 50,
            width: 30,
            height: 30,
            alive: true
        };
        enemies.push(enemy);
    }

    keys = {
        left: false,
        right: false,
        shoot: false
    }

    if(gameLoop != null) clearInterval(gameLoop);
    gameLoop = setInterval(update, 20);
}





// Update function
function update() {
    // Clear canvas
    ctx.clearRect(0, 0, canvas.width, canvas.height);


    // Draw player
    ctx.fillStyle = "blue";
    ctx.fillRect(player.x - player.width/2, player.y - player.height/2, player.width, player.height);

    // Move player
    if (keys.left) {
        player.x -= player.speed;
    }
    if (keys.right) {
        player.x += player.speed;
    }

    // Draw bullets
    for (var i = 0; i < bullets.length; i++) {
        ctx.fillStyle = "red";
        ctx.fillRect(bullets[i].x - 2, bullets[i].y - 10, 4, 10);
        bullets[i].y -= 10;

        // Remove bullet if off screen
        if (bullets[i].y < 0) {
            bullets.splice(i, 1);
            i--;
        }
    }

    // Draw enemies
    for (var i = 0; i < enemies.length; i++) {
        if (enemies[i].alive) {
            ctx.fillStyle = "green";
            ctx.fillRect(enemies[i].x - enemies[i].width/2, enemies[i].y - enemies[i].height/2, enemies[i].width, enemies[i].height);

            // Move enemies
            enemies[i].x += enemySpeed;

            // Check for bullet collision
            for (var j = 0; j < bullets.length; j++) {
                if (bullets[j].x >= enemies[i].x - enemies[i].width/2 && bullets[j].x <= enemies[i].x + enemies[i].width/2 &&
                    bullets[j].y >= enemies[i].y - enemies[i].height/2 && bullets[j].y <= enemies[i].y + enemies[i].height/2) {
                    enemies[i].alive = false;
                    bullets.splice(j, 1);
                    j--;
                }
            } // Game over if enemy reaches player
            if (enemies[i].y + enemies[i].height/2 >= player.y - player.height/2) {
                clearInterval(gameLoop);
                alert("Game over!");
                break;
            }
        }
    }
    for (var i = 0; i < enemies.length; i++) {
        // Reverse enemy direction if hitting edge
        if (enemies[i].x + enemies[i].width/2 > canvas.width || enemies[i].x - enemies[i].width/2 < 0) {
            enemySpeed = -enemySpeed;
            for (var j = 0; j < enemies.length; j++) {
                enemies[j].y += 15;
            }
            break;
        }
    }


// Check for victory
    var aliveCount = 0;
    for (var i = 0; i < enemies.length; i++) {
        if (enemies[i].alive) {
            aliveCount++;
        }
    }
    if (aliveCount == 0) {
        clearInterval(gameLoop);
        alert("You win!");

    }}


document.addEventListener("keydown", function(event) {
    switch (event.keyCode) {
        case 37:
            keys.left = true;
            break;
        case 39:
            keys.right = true;
            break;
        case 32:
            keys.shoot = true;
            break;
    }
});
document.addEventListener("keyup", function(event) {
    switch (event.keyCode) {
        case 37:
            keys.left = false;
            break;
        case 39:
            keys.right = false;
            break;
        case 32:
            keys.shoot = false;
            break;
    }
});

// Set up shoot function
function shoot() {
    var bullet = {
        x: player.x,
        y: player.y,
    };
    bullets.push(bullet);
}

// Set up shoot key listener
setInterval(function() {
    if (keys.shoot) {
        shoot();
    }
}, 500); // Change bullet fire rate if desired