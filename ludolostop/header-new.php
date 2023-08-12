<!DOCTYPE html>
<html <?php language_attributes(); ?> class="scroll">
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
    <link rel="preload" href="<?php echo get_template_directory_uri() ?>/fonts/Broadway.ttf" as="font" type="font/ttf" crossorigin>
    <link rel="preload" href="<?php echo get_template_directory_uri() ?>/fonts/Inverkrug.otf" as="font" type="font/otf" crossorigin>
    <?php wp_head(); ?>
    <title><?php bloginfo('name'); ?> <?php wp_title(); ?></title>
</head>
<style>
    .wrapper {
  position: relative;
	min-height: 100vh;
}
.header-block-wheel {
  display: flex;
  justify-content: space-around;
  align-items: center;
  padding: 25px 50px 100px 50px;
}
.header-block-wheel a {
  z-index: 2;
}
.wheel-head {
  width: 300px;
  height: 42px;
  display: block;
  background-repeat: no-repeat;
  background-size: cover;
}
.wheel-head.open {
  animation: 0.5s linear 0s infinite normal none running rotate;
}

@-webkit-keyframes pop {
  0% {
      -webkit-transform: scale(0);
      transform: scale(0)
  }
  50% {
      -webkit-transform: scale(1.2);
      transform: scale(1.2)
  }
  100% {
      -webkit-transform: scale(1);
      transform: scale(1)
  }
}
@keyframes pop {
  0% {
      -webkit-transform: scale(0);
      transform: scale(0)
  }
  50% {
      -webkit-transform: scale(1.2);
      transform: scale(1.2)
  }
  100% {
      -webkit-transform: scale(1);
      transform: scale(1)
  }
}

.wheel-block {
  position: relative;
  background-size: 35% auto !important;
}
.wheel {
  position: relative;
  margin: auto;
  width: 100%;
  height: 585px;
  max-width: 520px;
  -webkit-transform: scale(0);
  transform: scale(0);
  display: flex;
  justify-content: center;
  z-index: 1;
}
.wheel-spinner {
  z-index: 1;
}
.wheel-animate {
  -webkit-animation: .5s wheel cubic-bezier(.175, .885, .32, 1.275) forwards;
  animation: .5s wheel cubic-bezier(.175, .885, .32, 1.275) forwards;
}
@-webkit-keyframes wheel {
  0% {
      -webkit-transform: scale(0);
      transform: scale(0)
  }
  100% {
      -webkit-transform: scale(1);
      transform: scale(1)
  }
}
@keyframes wheel {
  0% {
      -webkit-transform: scale(0);
      transform: scale(0)
  }
  100% {
      -webkit-transform: scale(1);
      transform: scale(1)
  }
}
.wheel-content-new {
  position: absolute;
  left: 0;
  right: 0;
  top: 0;
  bottom: 0;
  margin: auto;
  display: flex;
  align-items: center;
  justify-content: center;
  width: 100%;
  height: 100%;
  max-width: 520px;
  max-height: 520px;
  text-align: center;
}
.wheel-vin-block {
  position: absolute;
  top: -90px;
  left: 0;
  right: 0;
  z-index: 2;
  margin: auto;
  width: 104px;
  height: 150px;
  background-size: 100% auto !important; 
}
.wheel-vin-button-new {
  position: absolute;
  left: 0;
  right: 0;
  bottom: 115px;
  z-index: 3;
  display: flex;
  align-items: center;
  justify-content: center;
  margin: 0 auto;
}
.wheel-vin-button-check {
  border: none;
  outline: none;
  box-sizing: border-box;
  width: 300px;
  height: 59px;
  font-family: 'Inverkrug', sans-serif;
  text-transform: uppercase;
  font-size: 36px;
  color: #e60020;
  cursor: pointer;
  text-shadow: 2px 0 2px #fff, 
    0 2px 2px #fff, 
    -2px 0 2px #fff, 
    0 -2px 2px #fff;
  z-index: 1;
  transition: .3s;
}
.wheel-vin-button-check:hover {
  transform: scale(1.1);
}
.wheel-lamps {
  position: absolute;
  top: 0;
  left: 0;
  right: 0;
  margin: auto;
  height: 578px;
  background-size: 100% auto !important;
  width: 100%;
  overflow: hidden;
  -webkit-animation: 2s lamps step-end infinite;
  animation: 2s lamps step-end infinite;
}
@-webkit-keyframes lamps {
  0% {
      -webkit-transform: rotate(0);
      transform: rotate(0)
  }
  33.3% {
      -webkit-transform: rotate(6.5deg);
      transform: rotate(6.5deg)
  }
  66.6% {
      -webkit-transform: rotate(13deg);
      transform: rotate(13deg)
  }
  100% {
      -webkit-transform: rotate(0);
      transform: rotate(0)
  }
}
@keyframes lamps {
  0% {
      -webkit-transform: rotate(0);
      transform: rotate(0)
  }
  33.3% {
      -webkit-transform: rotate(6.5deg);
      transform: rotate(6.5deg)
  }
  66.6% {
      -webkit-transform: rotate(13deg);
      transform: rotate(13deg)
  }
  100% {
      -webkit-transform: rotate(0);
      transform: rotate(0)
  }
}

@keyframes rotation {
  0% {transform: rotate(5deg)}
  100% {transform: rotate(calc(5deg * -1))}
}

.blur {
  animation: blur 10s;
}
@-webkit-keyframes blur {
  0% {
      -webkit-filter: blur(1.5px);
      filter: blur(1.5px);
  }
  80% {
      -webkit-filter: blur(1.5px);
      filter: blur(1.5px);
  }
  100% {
      -webkit-filter: blur(0px);
      filter: blur(0px);
  } 
}
@keyframes blur {
  0% {
      -webkit-filter: blur(1.5px);
      filter: blur(1.5px);
  }
  80% {
      -webkit-filter: blur(1.5px);
      filter: blur(1.5px);
  }
  100% {
      -webkit-filter: blur(0px);
      filter: blur(0px);
  } 
}

.wheel-title {
  position: absolute;
  top: 0;
  left: 200px;
}
.wheel-title.open {
  animation: 0.5s linear 0s infinite normal none running rotate;
}
.wheel-title-top {
  background-repeat: no-repeat;
  background-size: cover;
  width: 393px;
  height: 68px;
  margin-left: 80px;
}
.wheel-title-bottom {
  background-repeat: no-repeat;
  background-size: cover;
  width: 356px;
  height: 60px;
}
.money-one {
  background-repeat: no-repeat;
  background-size: cover;
  width: 200px;
  height: 164px;
  position: absolute;
  top: 55px;
  right: -60px;
  z-index: 1;
}
.money-one.open {
  animation: 0.5s linear 0s infinite normal none running rotate;
}
.money-two {
  background-repeat: no-repeat;
  background-size: cover;
  width: 92px;
  height: 150px;
  position: absolute;
  bottom: 150px;
  left: -20px;
  z-index: 1;
}
.money-two.open {
  animation: 0.5s linear 0s infinite normal none running rotate;
}

.celebrate-block {
  background-repeat: no-repeat;
  background-position: center center;
  width: 100%;
  height: 100vh;
  position: absolute;
  top: 0;
  z-index: 1;
  display: none;
}
.celebrate-block.open {
  display: block;
}

.deer-block-new {
  background-repeat: no-repeat;
  background-position: center center;
  width: 241px;
  height: 300px;
  position: fixed;
  bottom: 0;
  right: 250px;
}
.deer-block-new.open {
  animation: 0.5s linear 0s infinite normal none running rotate;
}

@keyframes rotate {
  0% {transform: rotate(10deg)}
  50% {transform: rotate(calc(10deg * -1))}
  100% {transform: rotate(10deg)}
}

@media screen and (max-width: 1600px) {
  .vin-circle-block {
    left: 47%;
  }
  .wheel-title {
    left: 100px;
  }
}
@media screen and (max-width: 1440px) {
  .wheel-title {
    left: 30px;
  }
  .deer-block-new {
    right: 100px;
  }
}
@media screen and (max-width: 1360px) {
  .vin-circle-block {
    left: 46.5%;
  }
}
@media screen and (max-width: 1280px) {
  .wheel-title {
    top: -80px;
    left: 10px;
  }
}
@media screen and (max-width: 1152px) {
  .deer-block-new {
    right: 20px;
  }
}
@media screen and (max-width: 1024px) {
  .header-block-wheel {
      justify-content: center;
  }
  .header-achievements {
      right: 0;
  }
  .vin-circle-block {
    left: 45.5%;
  }
}
@media screen and (max-width: 860px) {
  .vin-circle-block {
    left: 44.5%;
  }
  .deer-block-new {
    display: none;
  }
  .wheel-title {
    display: none;
  }
}
@media screen and (max-width: 767px) {
  .wheel-spinner {
    width: 70%;
  }
  .wheel-lamps {
    top: -2px;
    right: -3px;
    width: 75%;
    height: 100%;
  }
  .wheel-content-new {
    max-width: initial;
    max-height: initial;
  }
  .wheel-vin-block {
    width: 70px;
    height: 85px;
    top: 40px;
  }
  .money-one {
    top: 90px;
    right: 90px;
    width: 100px;
    height: 81px;
  }
  .money-two {
    width: 49px;
    height: 80px;
    left: 60px;
  }
  .header-block-wheel {
    padding: 25px 50px 30px 50px;
  }
  .wheel-vin-button-new {
    bottom: 170px;
  }
}
@media screen and (max-width: 640px) {
  .header-achievements.back {
      bottom: -60%;
  }
  .wheel {
    height: 500px;
    max-width: 450px;
  }
  .money-one {
    right: 50px;
  }
  .money-two {
    left: 30px;
  }
  .wheel-vin-block {
    top: 25px;
  }
  .wheel-vin-button-new {
    bottom: 250px;
  }
}
@media screen and (max-width: 425px) {
  .wheel {
    height: 440px;
    max-width: 360px;
  }
  .money-one {
    width: 80px;
    height: 65px;
  }
  .money-two {
    width: 35px;
    height: 58px;
  }
  .wheel-vin-block {
    width: 40px;
    height: 50px;
    top: 60px;
  }
  .wheel-vin-button-new {
    bottom: 220px;
  }
}
@media screen and (max-width: 380px) {
  .wheel {
    height: 405px;
    max-width: 300px;
  }
  .money-one {
    width: 45px;
    height: 37px;
    right: 65px;
  }
  .money-two {
    width: 15px;
    height: 25px;
    left: 40px;
  }
}
</style>
<body style="background-image: url(<?php echo get_template_directory_uri() ?>/img/background-wheel.jpg)">
  
    
