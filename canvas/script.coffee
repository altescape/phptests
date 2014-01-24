stage = new createjs.Stage "canvas"

outer_circle_diam = 70
inner_circle_diam = 40

circle1 = new createjs.Shape
circle1
  .graphics
  .setStrokeStyle(2)
  .beginStroke("orange")
circle1.x = 250
circle1.y = 100

circle1a = new createjs.Shape
circle1a
  .graphics
  .beginFill("rgba(255,255,255,0.5)")
  .drawCircle(0, 0, inner_circle_diam)
circle1a.x = circle1.x
circle1a.y = circle1.y


circle2 = new createjs.Shape
circle2
  .graphics
  .setStrokeStyle(2)
  .beginStroke("orange")
circle2.x = 310
circle2.y = 200

circle2a = new createjs.Shape
circle2a
.graphics
.beginFill("rgba(255,255,255,0.5)")
.drawCircle(0, 0, inner_circle_diam)
circle2a.x = circle2.x
circle2a.y = circle2.y


circle3 = new createjs.Shape
circle3
  .graphics
  .setStrokeStyle(2)
  .beginStroke("orange")
circle3.x = 190
circle3.y = 200

circle3a = new createjs.Shape
circle3a
.graphics
.beginFill("rgba(255,255,255,0.5)")
.drawCircle(0, 0, inner_circle_diam)
circle3a.x = circle3.x
circle3a.y = circle3.y

stage.addChild(circle1)
stage.addChild(circle2)
stage.addChild(circle3)

iter = 0
finished_anim = false
stroke = (event) ->
  if iter < 6.1
    iter = iter + 0.1
    circle1.graphics.arc(0,0,outer_circle_diam,iter-0.1,iter)
    circle2.graphics.arc(0,0,outer_circle_diam,iter-0.1,iter)
    circle3.graphics.arc(0,0,outer_circle_diam,iter-0.1,iter)
    stage.update()
  else
    finished_anim = true
    circle1.graphics.closePath()
    circle2.graphics.closePath()
    circle3.graphics.closePath()
    stage.addChild(circle1a)
    stage.addChild(circle2a)
    stage.addChild(circle3a)
    stage.update()
    event.remove()


  console?.log(iter)


createjs.Ticker.on("tick", stroke)
createjs.Ticker.setFPS(150)



