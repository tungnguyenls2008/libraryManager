let ctx = document.getElementById("myCanvas").getContext("2d");
let circles=[];

function Circle( x, y, dx, dy, radius, color ) {

    this.x 	= x;
    this.y 	= y;
    this.dx = dx;
    this.dy = dy;
    this.color=color;
    this.radius = radius;

    this.draw = function() {
        ctx.beginPath();
        ctx.arc( this.x, this.y,  this.radius, 0, Math.PI * 2, false  );
        ctx.fillStyle = this.color;
        ctx.fill();
    };

    this.update = function() {

        if( this.x + this.radius > 1368 || this.x - this.radius < 0 ) {

            this.dx = -this.dx;
        }

        if( this.y + this.radius > 768 || this.y - this.radius < 0 ) {

            this.dy = -this.dy;
        }

        this.x += this.dx;
        this.y += this.dy;

        this.draw();
    }
}
function getRandomHex(){
    return Math.floor(Math.random()*255);
}

function getRandomColor(){
    let red = getRandomHex();
    let green = getRandomHex();
    let blue = getRandomHex();
    return "rgb(" + red + "," + blue + "," + green +")";
}
function createMultipleCircle(){
    for(let i = 0; i < 30; i++){
        let radius = Math.floor(Math.random() * 80);
        let color = getRandomColor();
        let x = Math.random() * window.innerWidth;
        let y = Math.random() * window.innerHeight;
        let dx = ( Math.random() - 0.5 ) * 2;
        let dy = ( Math.random() - 0.5 ) * 2;
        circles.push( new Circle( x, y, dx, dy, radius, color ) );
    }
}
function animateTheCircles() {
    requestAnimationFrame(animateTheCircles);
    ctx.clearRect(0,0,window.innerWidth,window.innerHeight);
    for (let i = 0; i <30 ; i++) {
        circles[i].update();
    }
}
createMultipleCircle();
animateTheCircles();