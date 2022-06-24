window.onload = function() {
    
    ctx = canvas.getContext("2d"),
    mX = 0,
    mY = 0,
    canvas.width = window.innerWidth;
    canvas.height = window.innerHeight;
 
 canvas.addEventListener("mousemove", function (e) {
    mX = e.pageX;
    mY = e.pageY;
 });

 var Ball = function (radius, followingSpeed, angularSpeed, displacement, n) {
    this.centerX = canvas.width/2;
    this.centerY = canvas.height/2;

    this.radius = radius || 10;
    this.followingSpeed = followingSpeed || 5;
    this.angularSpeed = angularSpeed;
    this.displacement= displacement * n;
    this.n = n;

    this.angle = 1.16;

    this.displacementX;
    this.displacementY;

    var opacity = 1-0.005*n;
    this.color = "rgba(255,255,255,+"+opacity+")";
 }
 
 Ball.prototype.update = function (mX, mY) {

    //find where center of pattern needs to go
    var hypotenuse = Math.sqrt(Math.pow(mX-this.centerX,2)+Math.pow(mY-this.centerY,2));
    var divideBy = hypotenuse/this.followingSpeed;
    this.speedX = (mX-this.centerX)/divideBy;
    this.speedY = (mY-this.centerY)/divideBy;
    //if pattern is already at mouse, it won't move (without this it kinda glitches)
    if(hypotenuse > this.followingSpeed/2){
        this.centerX += this.speedX;
        this.centerY += this.speedY;
    }

    //updates angle
    this.angle += this.angularSpeed;
    var angleDisplacement = this.angle * this.n;

    if(angleDisplacement > 2*Math.PI){
        angleDisplacement -= 2*Math.PI;
    }
      
    this.displacementX = this.displacement*Math.cos(angleDisplacement);
    this.displacementY = -this.displacement*Math.sin(angleDisplacement);

};
 
Ball.prototype.render = function () { 
    ctx.fillStyle = this.color;

    ctx.beginPath();
    ctx.arc(this.centerX+this.displacementX, this.centerY+this.displacementY, this.radius, 0, Math.PI * 2,false);
    ctx.fill();
};
 
function render() {
    ctx.clearRect(0, 0, canvas.width, canvas.height);
 
    ctx.save();
    ctx.restore();
    ctx.fill();
 
    //so everything still in proportion when window resizes
    canvas.width = window.innerWidth;
    canvas.height = window.innerHeight;

    for(let i = 0; i < balls.length; i++){
        balls[i].update(mX, mY);
        balls[i].render();
    }
 
    requestAnimationFrame(render);
     
}
 
var balls = [];
for(let i = 1; i < 500; i++){
    balls.push(new Ball(10, 1, 0.0001, 3, i));
}
 
render();
 
}
