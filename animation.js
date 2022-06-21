window.onload = function() {
    ctx = canvas.getContext("2d"),
     mX = 0,
     mY = 0,
     started = false,
 
 
 
 canvas.addEventListener("mousemove", function (e) {
     mX = e.pageX;
     mY = e.pageY;
 });
 
 canvas.addEventListener("mouseenter", function (e) {
     if(!started){
         started = true;
         render();
     }
 });
 
 canvas.addEventListener("mouseleave", function (e) {
     started = false;
 });
 
 
 var Ball = function (radius) {
     this.x = 0;
     this.y = 0;
     this.radius = radius || 10;
 
     // makes our x and y the center of the circle.
     this.x = (this.x-this.radius/2);
     this.y = (this.y-this.radius/2);    
 
 }
 
 Ball.prototype.update = function (x, y) {
    canvas.width = window.innerWidth;
    canvas.height = window.innerHeight;
     // get the target x and y
     this.targetX = x;
     this.targetY = y;
 
     this.x = x;
     this.y = y;
 
 };
 
 Ball.prototype.render = function () {
 

     ctx.fillStyle = "green";

     ctx.font = "30px Arial";
     ctx.fillText(this.targetX + ", " + this.targetY, 10, 50); 
 
     ctx.beginPath();
     ctx.arc(this.x, this.y, this.radius, 0, Math.PI * 2,false);
     ctx.fill();
 
 };
 
 function render() {
     ctx.clearRect(0, 0, canvas.width, canvas.height);
 
    ctx.save();
    
     ball1.update(mX, mY);
     ball1.render();
     ball2.update(mX, mY);
     ball2.render();
 
 
     if(started){
         requestAnimationFrame(render);
     }
 }
 
 
 var ball1 = new Ball(50);
 var ball2 = new Ball(30);
 
 
 render();
 
 }