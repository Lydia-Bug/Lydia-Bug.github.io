window.onload = function() {
    ctx = canvas.getContext("2d"),
     mX = 0,
     mY = 0,
     started = false,
 
     canvas.width = window.innerWidth;
     canvas.height = window.innerHeight;
 
 
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
 
 function resize(){
    canvas.width = window.innerWidth;
    canvas.height = window.innerHeight;
 
 }

 var Ball = function (radius, speed, distance, n) {
     this.centerX = 400;
     this.centerY = 400;
     this.radius = radius || 10;
     this.speed = speed || 5;
     this.n = n;
     this.distance = distance * n;
     this.angle = 1.16;

     this.distanceX = this.distance;
     this.distanceY = 0;
 
     // makes our x and y the center of the circle.
     this.centerX = (this.centerX-this.radius/2);
     this.centerY = (this.centerY-this.radius/2);

     var opacity = 1-0.01*n;
     this.color = "rgba(255,255,255,+"+opacity+")";
 }
 
 Ball.prototype.update = function (x, y) {
      // get the target x and y
      this.targetX = x;
      this.targetY = y;

      //
      var hypotenuse = Math.sqrt(Math.pow(this.targetX-this.centerX,2)+Math.pow(this.targetY-this.centerY,2));
      var divideBy = hypotenuse/this.speed;
      this.speedX = (this.targetX-this.centerX)/divideBy;
      this.speedY = (this.targetY-this.centerY)/divideBy;


      if(hypotenuse > this.speed/2){
     this.centerX += this.speedX;
     this.centerY += this.speedY;
      }

      this.angle += 0.0001;
      var anglee = this.angle * this.n;

      if(anglee > 2*Math.PI){
        anglee -= 2*Math.PI;
      }
      if(this.angle > 2*Math.PI){
        this.angle -= 2*Math.PI;
      }
      
        this.distanceX = this.distance*Math.cos(anglee);
        this.distanceY = -this.distance*Math.sin(anglee);
      



 };
 
 Ball.prototype.render = function () {
 
 
     ctx.fillStyle = this.color;

     ctx.font = "30px Arial";
     ctx.fillText(this.angle + ", " + this.speedY, 10, 50); 

     ctx.beginPath();
     ctx.arc(this.centerX+this.distanceX, this.centerY+this.distanceY, this.radius, 0, Math.PI * 2,false);
     ctx.fill();
 };
 
 function render() {
     ctx.clearRect(0, 0, canvas.width, canvas.height);
 
      ctx.save();
 
 
      ctx.restore();
      ctx.fill();
 
    resize();
/*
     ball1.update(mX, mY);
     ball1.render();
     ball2.update(mX, mY);
     ball2.render();
     ball3.update(mX, mY);
     ball3.render();
 */
     for(let i = 0; i < balls.length; i++){
        balls[i].update(mX, mY);
        balls[i].render();
     }
 
     if(started){
         requestAnimationFrame(render);
     }
 }
 
 let balls = [];
 for(let i = 1; i < 100; i++){
    balls.push(new Ball(10, 1, 4, i));
 }
 /*
 var ball1 = new Ball(20, "green", 5, 30, 1);
 var ball2 = new Ball(20, "white", 5, 30, 2);
 var ball3 = new Ball(20, "pink", 5, 30, 3);
 */
 
 render();
 
 }