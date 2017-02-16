var slider = new IdealImageSlider.Slider({
	selector: '#slider',
	interval: php_vars.slideshowSpeed,
	height: Number(php_vars.sliderHeight),
	transitionDuration: php_vars.animationSpeed,
	effect: php_vars.sliderEffect,
});
slider.addCaptions();
slider.start();