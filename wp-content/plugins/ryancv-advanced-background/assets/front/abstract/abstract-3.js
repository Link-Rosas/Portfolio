function abstr_three() {
  var q5 = new Q5();

  let effect_color = document.querySelector('.abstract-background').dataset.color;

  let w = 1240;
  let h = 720;
  let t = 0;
  let n = 1200;
  let l = 0;
  let particles = [];

  function hexToRgb(hex) {
      var result = /^#?([a-f\d]{2})([a-f\d]{2})([a-f\d]{2})$/i.exec(hex);
      return result ? {
          r: parseInt(result[1], 16),
          g: parseInt(result[2], 16),
          b: parseInt(result[3], 16)
      } : null;
  }

  function display_texture(p, pos, vel) {
    p.point(pos.x, pos.y);
  }

  function upd_texture(p, t, pos, vel, seed) {
    pos.x = abs_mod((pos.x + vel.x), w);
    pos.y = abs_mod((pos.y + vel.y), h);
    
    var r = q5.Vector.fromAngle(p.noise(seed, t) * p.TWO_PI);
    vel.x = r.x;
    vel.y = r.y;

    vel.add(abs_flow(p, pos)).mult(3);
  }

  function abs_flow (p, pos) {
    let r = p.noise(pos.x / 100, pos.y / 100) * p.TWO_PI;
    return q5.Vector.fromAngle(r).mult(2);
  }

  function abs_mod (x, n) {
    return ((x % n) + n ) % n;
  }

  let sketch = (p) => {
    p.setup = function() {
      p.createCanvas(w, h, { alpha: true }).parent("abstract-bg-js");
      p.stroke(hexToRgb(effect_color).r, hexToRgb(effect_color).g, hexToRgb(effect_color).b, 2);

      for (var i = 0; i < n; i++) {
        particles.push({
          pos: p.createVector(p.random(w), p.random(h)),
          vel: p.createVector(0,0),
          seed: i
        });
      }
    };

    p.draw = function() {
      if (l < 1200) {
        particles.forEach( function(prtcl) {
          display_texture(p, prtcl.pos, prtcl.vel);
          upd_texture(p, t, prtcl.pos, prtcl.vel, prtcl.seed);
        });
        t += 0.005;
        l++;
      }
    }; 
  }

  let p = new Q5(sketch);
}
if (window.innerWidth > 1121) {
setTimeout(function(){
  abstr_three();
}, 500);
}