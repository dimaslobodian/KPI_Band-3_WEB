


$('#digiclock').jdigiclock({
  imagesPath : 'images/', 
  lang: 'en',
  am_pm : false, 
  weatherLocationCode : '751170', 
  weatherUpdate : 60, 
  svrOffset: 0   
});

$.datepicker.regional['ru'] = {
  closeText: 'Закрыть',
  prevText: 'Предыдущий',
  nextText: 'Следующий',
  currentText: 'Сегодня',
  monthNames: ['Январь','Февраль','Март','Апрель','Май','Июнь','Июль','Август','Сентябрь','Октябрь','Ноябрь','Декабрь'],
  monthNamesShort: ['Янв','Фев','Мар','Апр','Май','Июн','Июл','Авг','Сен','Окт','Ноя','Дек'],
  dayNames: ['воскресенье','понедельник','вторник','среда','четверг','пятница','суббота'],
  dayNamesShort: ['вск','пнд','втр','срд','чтв','птн','сбт'],
  dayNamesMin: ['Вс','Пн','Вт','Ср','Чт','Пт','Сб'],
  weekHeader: 'Не',
  dateFormat: 'dd.mm.yy',
  firstDay: 1,
  isRTL: false,
  showMonthAfterYear: false,
  yearSuffix: ''
};
$.datepicker.setDefaults($.datepicker.regional['ru']);

$(function(){
  $("#datepicker").datepicker({
    onSelect: function(date){
      $('#datepicker_value').val(date)
    }
  });
});

$(document).ready(()=>{
  setInterval(()=>{
    var time=new Date();
    $hour=t(time.getHours());
    $minute=t(time.getMinutes());
    $second=t(time.getSeconds());
    $("#hour").html($hour);
    $("#minute").html($minute);
    $("#second").html($second);
  },1000);
  function t(t1){
    if(t1<10){
      return "0"+t1;
    }
    return t1;
  }
});

var $container = document.getElementById("IUAfinance56");
		$container.style.width = "400";
		$container.querySelector(".IUAfinance_block").style.backgroundColor = "rgb(238, 238, 238)";
		$container.querySelector(".IUAfinance_block").style.borderColor = "rgb(17, 102, 204)";
		$container.querySelector(".IUAfinance_block").style.color = "rgb(0, 0, 0)";
		$container.querySelector(".IUAfinance_content").style.backgroundColor = "rgb(255, 255, 255)";
		$container.querySelector(".IUAfinance_title").style.color = "rgb(17, 102, 204)";
		$container.querySelector("#IUAfinanceLink").style.color = "rgb(17, 102, 204)";
		if (typeof(iFinance) == "undefined") {
		if (typeof(iFinanceData) == "undefined") {
		document.write('<scr' + 'ipt src="//i.i.ua/js/i/finance_informer.js?1" type="text/javascript" charset = "windows-1251"></scr' + 'ipt>');
		iFinanceData = [];
		}
		iFinanceData.push({b:10, c:[840,978,643], enc:2, lang:1, p:56, ver2: true});
		} else {
		window['oiFinance56'] = new iFinance(2);
		window['oiFinance56'].gogo({b:10, c:[840,978,643], enc:2, lang:1, p:56});
		};