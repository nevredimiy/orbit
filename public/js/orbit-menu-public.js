(function( $ ) {
	'use strict';


	/**
	 * All of the code for your public-facing JavaScript source
	 * should reside in this file.
	 *
	 * Note: It has been assumed you will write jQuery code here, so the
	 * $ function reference has been prepared for usage within the scope
	 * of this function.
	 *
	 * This enables you to define handlers, for when the DOM is ready:
	 *
	 * $(function() {
	 *
	 * });
	 *
	 * When the window is loaded:
	 *
	 * $( window ).load(function() {
	 *
	 * });
	 *
	 * ...and/or other possibilities.
	 *
	 * Ideally, it is not considered best practise to attach more than a
	 * single DOM-ready or window-load handler for a particular page.
	 * Although scripts in the WordPress core, Plugins and Themes may be
	 * practising this, we should strive to set a better example in our own work.
	 */

})(jQuery);



document.addEventListener("DOMContentLoaded", function () {
  //Orbit
  const bgColorClass = [
    'aquamarine',
    'bisque',
    'burlywood',
    'cornflowerblue',
    'darkkhaki',
    'darksalmon',
    'lightcoral',
    'aquamarine',
    'bisque',
    'burlywood',
    'cornflowerblue',
    'darkkhaki',
    'darksalmon',
    'lightcoral',
    'aquamarine',
    'bisque',
    'burlywood',
    'cornflowerblue',
    'darkkhaki',
    'darksalmon',
    'lightcoral'
  ];



  const orbitLists = document.querySelectorAll('[data-orbit]');
  console.log(orbitLists);

  if (orbitLists.length > 0) {
    orbitLists.forEach(orbitList => {

      let itemsOrbit = orbitList.querySelectorAll(':scope > *'); //select all li insert ul

      for (let i = 0; i < itemsOrbit.length; i++) {
        let deg = 360 / itemsOrbit.length * i;
        let sec = deg / 200;
        itemsOrbit[i].style.transitionDelay = `${sec}s`;
        itemsOrbit[i].style.transform = `rotate(${deg}deg)`;
        itemsOrbit[i].querySelector(':scope > a').style.transform = `rotate(${-deg}deg)`;
        itemsOrbit[i].querySelector(':scope > a').style.backgroundColor = bgColorClass[i];
      }
    });
  }


  //Плавное появление текста при скролле - когда блок находиться в зоне видимости, то кнему применяеться определенный класс
  function onEntry(entry) {
    entry.forEach(change => {
      if (change.isIntersecting) {
        change.target.classList.add('element-show');
      }
    });
  }

  let options = {
    threshold: [0.5]
  };
  let observer = new IntersectionObserver(onEntry, options);
  let elements = document.querySelectorAll('.element-animation');

  for (let elm of elements) {
    observer.observe(elm);
  }


})
