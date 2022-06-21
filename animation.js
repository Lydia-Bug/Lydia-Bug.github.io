window.onload = function() {
    ctx = canvas.getContext("2d"),
     width = 1000,
     height = 800,
     mX = 0,
     mY = 0,
     started = false,
 
     canvas.width = width;
     canvas.height = height;
 
 
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
 
 
 var Ball = function (x, y, radius, color) {
     this.x = x || 0;
     this.y = y || 0;
     this.radius = radius || 10;
 
     // makes our x and y the center of the circle.
     this.x = (this.x-this.radius/2);
     this.y = (this.y-this.radius/2);
 
     // how far out do we want the point
    this.pointLength = Math.sqrt(this.x^2+ this.y^2);

     this.px = 100;
     this.py = 0;

     this.color = color || "white";
 }
 
 Ball.prototype.update = function (x, y) {
     // get the target x and y
     this.targetX = x;
     this.targetY = y;
 
     var x = this.x - this.targetX,
         y = this.y - this.targetY,
         radians = Math.atan2(y,x);
 
     this.px = this.x - this.pointLength * Math.cos(radians);
     this.py = this.y - this.pointLength * Math.sin(radians);
 
 };
 
 Ball.prototype.render = function () {
 
 
     ctx.fillStyle = this.color;
 
     ctx.beginPath();
     //ctx.arc(this.targetX, this.targetY, this.radius, 0, Math.PI * 2,false);
     ctx.rect(this.targetX, this.targetY, this.radius, this.radius);
     ctx.fill();
 
 };
 
 function render() {
     ctx.clearRect(0, 0, width, height);
 
      ctx.save();
 
 
      ctx.restore();
      ctx.fill();
 
 
     ball1.update(mX, mY);
     ball1.render();
     ball2.update(mX, mY);
     ball2.render();
 
 
     if(started){
         requestAnimationFrame(render);
     }
 }
 
 
 var ball1 = new Ball(width/2 - 59, 350, 50, "green");
 var ball2 = new Ball(width/2, 350, 30, "white");
 
 
 render();
 
 }