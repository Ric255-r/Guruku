<!DOCTYPE html>
<html>
<head>
	<title></title>
<style type="text/css">
.circle-wrap {
  margin: 50px auto;
  width: 150px;
  height: 150px;
  background: #e6e2e7;
  border-radius: 50%;
}
.circle-wrap .circle .mask,
.circle-wrap .circle .fill {
  width: 150px;
  height: 150px;
  position: absolute;
  border-radius: 50%;
}
.circle-wrap .circle .mask {
  clip: rect(0px, 150px, 150px, 75px);
}
.circle-wrap .circle .mask .fill {
  clip: rect(0px, 75px, 150px, 0px);
  background-color: #9e00b1;
}
.circle-wrap .circle .mask.full,
.circle-wrap .circle .fill {
  animation: fill ease-in-out 3s;
  transform: rotate(126deg);
}
.circle-wrap .inside-circle {
  width: 130px;
  height: 130px;
  border-radius: 50%;
  background: #fff;
  line-height: 130px;
  text-align: center;
  margin-top: 10px;
  margin-left: 10px;
  position: absolute;
  z-index: 100;
  font-weight: 700;
  font-size: 2em;
}
.fill2{
  width: 150px;
  height: 150px;
  position: absolute;
  border-radius: 50%;
  clip: rect(0px, 75px, 150px, 0px);
  background-color: #9e00b1;
 animation: fill ease-in-out 3s;
  transform: rotate(10deg); 
}
@keyframes fill {
  0% {
    transform: rotate(0deg);
  }
  100% {
/*    transform: rotate(126deg);*/
  }
}		
</style>
</head>
<body>
<div class="circle-wrap">
  <div class="circle">
    
    <div class="mask full">
      <div class="fill"></div>
    </div>
   
    <div class="mask half">
      <div class="fill"></div>
    </div>
    
    <div class="inside-circle">
      70%
    </div>
    
  </div>
  <div class="circle-wrap">
  <div class="circle">
    
    <div class="mask full">
      <div class="fill2"></div>
    </div>
   
    <div class="mask half">
      <div class="fill2"></div>
    </div>
    
    <div class="inside-circle">
      70%
    </div>
    
  </div>
</body>
</html>