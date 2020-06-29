$(document).mouseup(function(e) 
{
    var container = $(".rd-search");
	$(".rdsearch").click(function() {
		$(".rd-search").toggle();
	});
    // if the target of the click isn't the container nor a descendant of the container
    if (!container.is(e.target) && container.has(e.target).length === 0) 
    {
        container.hide();
    }
});

$(function(){
	var stickyHeaderTop = $('.rd-display').offset().top;
	$(window).scroll(function(){
		if( $(window).scrollTop() > stickyHeaderTop ) {
			$('.rd-display').addClass('fix');
		} else {
				$('.rd-display').removeClass('fix');
		}
	});
  });

//Corona Update
const Npurl = "https://nepalcorona.info/api/v1/data/nepal";
	const Wrurl = "https://data.nepalcorona.info/api/v1/world";
	try {
		catchWorldData();
		catchNepalData();
	} catch (error) {
		console.log(error);
	}
	async function catchNepalData() {
		const response = await fetch(Npurl);
		const data = await response.json();
		let {deaths, recovered, tested_positive} = data;
		let npdeaths = ToNepaliDigit(deaths);
		let nprecovered = ToNepaliDigit(recovered);
		let nptested_positive = ToNepaliDigit(tested_positive);
		var spaninf = document.getElementById("spanInfected");
		var spanrec = document.getElementById("spanRecovered");
		var spandea = document.getElementById("spanDeaths");
		spaninf.innerHTML = nptested_positive;
		spanrec.innerHTML = nprecovered;
		spandea.innerHTML = npdeaths;
	}
	async function catchWorldData() {
		const response = await fetch(Wrurl);
		const data = await response.json();
		let {cases} = data;
		let npWorldCases = ToNepaliDigit(cases);
		var spanWorldDeaths = document.getElementById("spanWorldDeaths");
		spanWorldDeaths.innerHTML = npWorldCases;
	}
	//   For converting english digit to nepali digit
	String.prototype.lastThree = function () {
		return this.substr(this.length - 3);
	};
	String.prototype.removeLastThree = function () {
		return this.slice(0, -3);
	};
	String.prototype.sliceToTwo = function () {
		var sliced = [];
		var number = this;
		var numberLength = number.length;
		for (i = 0; i < numberLength; i++) {
		sliced.push(number.substr(number.length - 2));
		number = number.slice(0, -2);
		numberLength = numberLength - 1;
		}
		return sliced;
	};
	ToNepaliDigit = number => {
		var number = number.toString(); // '1234'
		var sliced = [];
		var numberlen = number.length; //4
		var nepali_digits = ["०", "१", "२", "३", "४", "५", "६", "७", "८", "९"];
		for (i = 0; i < numberlen; i++) {
		sliced.push(nepali_digits[number.substr(number.length - 1)]);
		number = number.slice(0, -1);
		}
		return commaInNepali(sliced.reverse().join("").toString());
	};

	const commaInNepali = number => {
		var str = number.toString();
		var length = str.length;
		if (length > 3) {
		// get last three digits of given number
		var lastThree = str.lastThree();

		// remove last three digit and take remaining digits
		var remStr = str.removeLastThree();

		// make a array
		var remStrips =
			remStr.sliceToTwo().reverse().join(",") + "," + lastThree;
		return remStrips;
		} else {
		return str;
		}
	};
	//   end

//Video Slider
jQuery('.carousel-main').flickity({
  contain: true,
  pageDots: false,
  prevNextButtons: false,
  });
  jQuery('.carousel-main').on( 'settle.flickity', function() {
  newTarg = jQuery(".carousel-cell.flex-video").not('.is-selected');
  jQuery(newTarg).find('iframe').each(function() { 
      var src= $(this).attr('src');
      $(this).attr('src',src);  
  });
  console.log('slide changes');

});

//Back to Top
var btn = $('#back-top');

$(window).scroll(function() {
if ($(window).scrollTop() > 300) {
  btn.addClass('show');
} else {
  btn.removeClass('show');
}
});

btn.on('click', function(e) {
e.preventDefault();
$('html, body').animate({scrollTop:0}, '300');
});

//footer popup
var fpop = document.getElementById('popup');
var span = document.getElementsByClassName("close")[0];
span.onclick = function() {
    fpop.style.display = "none";
}
window.onclick = function(event) {
    if (event.target == modal) {
        fpop.style.display = "none";
    }
}