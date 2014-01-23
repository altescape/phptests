myModule = () ->
  myProperty : "A property",
  myConfig : {
    test1 : "this is test",
    test2 : "this is test 2"
  }
  myMethod =
    if (1 == 1)
      2 + 2


console.dir(myModule().myProperty)
console.dir(myModule().myConfig)
console.log(myModule.myMethod)