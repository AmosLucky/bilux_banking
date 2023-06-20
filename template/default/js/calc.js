document.addEventListener('DOMContentLoaded', function() {
	$('.calc input.field__input').change(function(){
		let amount = $(this).val();
		let percent;

		function calculate(percent){
			console.log(amount)
			let daily = ((amount * percent)/100).toFixed(2);
			let inMonth = (daily * 30).toFixed(2);
			let forPeriod = (daily * 60 - amount).toFixed(2);
			let forProfit = (amount / daily).toFixed(0);

			$('#calc_daily').text(`${daily} USD`);
			$('#calc_monthly').text(`${inMonth} USD`);
			$('#calc_period').text(`${forPeriod} USD`);
			$('#calc_profit').text(forProfit);
		}

		if(amount >= 25 && amount < 3000) {
			percent = 3;
			$('.calc__plan #plan-icon').removeAttr('class');
			$('.calc__plan #plan-icon').attr('class', 'plan-icon plan-icon_c calc__plan-icon');
			$('.calc__plan #plan-name').text('Classic');
			calculate(percent);
		} else if(amount >= 3000 && amount < 15000) {
			percent = 3.5;
			$('.calc__plan #plan-icon').removeAttr('class');
			$('.calc__plan #plan-icon').attr('class', 'plan-icon plan-icon_a calc__plan-icon');
			$('.calc__plan #plan-name').text('Advanced');
			calculate(percent);
		} else if(amount >= 15000 && amount < 25000) {
			percent = 4;
			$('.calc__plan #plan-icon').removeAttr('class');
			$('.calc__plan #plan-icon').attr('class', 'plan-icon plan-icon_p calc__plan-icon');
			$('.calc__plan #plan-name').text('Powerful');
			calculate(percent);
		} else {
			$('#calc_daily').text(`- USD`);
			$('#calc_monthly').text(`- USD`);
			$('#calc_period').text(`- USD`);
			$('#calc_profit').text(`- USD`);
		}
	});
});