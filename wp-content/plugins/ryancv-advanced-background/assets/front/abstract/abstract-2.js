function abstr_two() {
  let effect_color = document.querySelector('.abstract-background').dataset.color;

  let width = 1920;
  let height = 1080;
  let offset = 0;

  let flow_cell_size = 10;

  let noise_size = 0.01;
  let noise_radius = 0.01;

  let flow_width = (width + offset * 2) / flow_cell_size;
  let flow_height = (height + offset * 2) / flow_cell_size;

  let noise_grid = [];
  let flow_grid = [];

  let number_of_particles = 200;
  let particles = [];

  let col1, col2;

  let tick = 0;

  function hexToRgb(hex) {
      var result = /^#?([a-f\d]{2})([a-f\d]{2})([a-f\d]{2})$/i.exec(hex);
      return result ? {
          r: parseInt(result[1], 16),
          g: parseInt(result[2], 16),
          b: parseInt(result[3], 16)
      } : null;
  }

  function init_particles(p) {
    for (var i = 0; i < number_of_particles; i++) {
      let r = p.random(p.width + 2 * offset);
      let q = p.random(p.height + 2 * offset);
      particles.push({
        prev: p.createVector(r, q),
        pos: p.createVector(r, q),
        vel: p.createVector(0, 0),
        acc: p.createVector(0, 0),
        col: (p.noise(124 + r / 80, 355 + q / 80) * 280 + 30) % 360,
        col2: p.lerpColor(col1, col2, p.noise(124 + r / 200, 355 + q / 200)),

        col3: p.lerpColor(col1, col2, p.noise(r * noise_size, q * noise_size)),
        seed: i
      });
    }
  }

  function update_particles(p) {
    for (var i = 0; i < number_of_particles; i++) {
      let prt = particles[i];
      let flow = get_flow(p, prt.pos.x, prt.pos.y);

      prt.prev.x = prt.pos.x;
      prt.prev.y = prt.pos.y;

      prt.pos.x = mod(prt.pos.x + prt.vel.x, p.width + 2 * offset);
      prt.pos.y = mod(prt.pos.y + prt.vel.y, p.height + 2 * offset);

      prt.vel
        .add(prt.acc)
        .normalize()
        .mult(1.5);

      prt.acc = p.createVector(0, 0);
      prt.acc.add(flow).mult(10);
    }
  }

  function init_flow(p) {
    for (let i = 0; i < flow_height; i++) {
      let row = [];
      for (let j = 0; j < flow_width; j++) {
        row.push(calculate_flow(p, j * noise_size, i * noise_size, noise_radius));
      }
      flow_grid.push(row);
    }
  }

  function calculate_flow(p, x, y, r) {
    let high_val = 0;
    let low_val = 1;
    let high_pos = p.createVector(0, 0);
    let low_pos = p.createVector(0, 0);

    for (var i = 0; i < 200; i++) {
      let angle = i / 200 * p.TAU;
      let pos = p.createVector(x + p.cos(angle) * r, y + p.sin(angle) * r);
      let val = p.noise(pos.x, pos.y);

      if (val > high_val) {
        high_val = val;
        high_pos.x = pos.x;
        high_pos.y = pos.y;
      }
      if (val < low_val) {
        low_val = val;
        low_pos.x = pos.x;
        low_pos.y = pos.y;
      }
    }

    let flow_angle = p.createVector(x - high_pos.x, y - high_pos.y);
    flow_angle
      .normalize()
      .mult(20)
      .mult(high_val - low_val)
      .rotate(p.HALF_PI);

    return flow_angle;
  }

  function get_flow(p, xpos, ypos) {
    xpos = p.constrain(xpos, 0, p.width + offset * 2);
    ypos = p.constrain(ypos, 0, p.height + offset * 2);
    return flow_grid[p.floor(ypos / flow_cell_size)][p.floor(xpos / flow_cell_size)];
  }

  function display_particles(p) {
    for (let i = 0; i < particles.length; i++) {
      p.stroke(particles[i].col2);
      if (Q5.Vector.dist(particles[i].prev, particles[i].pos) < 10)
        p.line(particles[i].prev.x, particles[i].prev.y, particles[i].pos.x, particles[i].pos.y);
    }
  }

  function mod(x, n) {
    return (x % n + n) % n;
  }

  let sketch = (p) => {
    p.setup = function() {
      let c = p.createCanvas(width, height, { alpha: true }).parent("abstract-bg-js");
      p.smooth();

      col1 = p.color(hexToRgb(effect_color).r, hexToRgb(effect_color).g, hexToRgb(effect_color).b, 13);
      col2 = p.color(hexToRgb(effect_color).r, hexToRgb(effect_color).g, hexToRgb(effect_color).b, 13);

      init_particles(p);
      init_flow(p);

      p.background('rgba(0,0,0,0)');
      p.strokeWeight(1);
    };

    p.draw = function() {
      p.translate(-offset, -offset);
      update_particles(p);
      if (tick > 0.1) display_particles(p);
      tick += 0.002;
    };
  }

  let p = new Q5(sketch);
}
if (window.innerWidth > 1121) {
setTimeout(function(){
  abstr_two();
}, 500);
}