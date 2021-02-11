
window.requestAnimationFrame = window.requestAnimationFrame || window.mozRequestAnimationFrame ||
    window.webkitRequestAnimationFrame || window.msRequestAnimationFrame;

function get(id) {
    return document.getElementById(id);
}

var heat = simpleheat('canvas').data(data).max(18),
    frame;

function draw() {
    console.time('draw');
    heat.draw();
    console.timeEnd('draw');
    frame = null;
}

draw();
