var canvas = document.getElementById('demo');
var context = canvas.getContext('2d');
var start = new Date();
var lines = 24,
    cW = context.canvas.width,
    cH = context.canvas.height;
var centerX = canvas.width / 4;
var centerY = canvas.height / 4;
var radius = 10;
 
var draw = function() {
    var rotation = parseInt(((new Date() - start) / 1000) * lines) / lines;
    context.save();
    context.clearRect(0, 0, cW, cH);
    context.translate(cW / 2, cH / 2);
    context.rotate(Math.PI * 2 * rotation);
    var op = 0.1;
    for (var i = 0; i < lines; i++) {
        //console.log(lines);
        context.beginPath();
        context.rotate(Math.PI * 2 / lines);
        context.arc(centerX, centerY, radius, 0, 2 * Math.PI, false);
        //context.moveTo(cW / 10, 0);
        //context.lineTo(cW / 8, 0);
        context.lineWidth = cW / 80;
        context.fillStyle = "rgba(255,255,255," + op + ")";
        context.fill();
        if ( i === (lines-1) ) {
            context.fillStyle = "rgba(255,0,0,1)";
            context.fill();
        }
        op += 0.05;
    }
    context.restore();
};
window.setInterval(draw, 1000 / 30);