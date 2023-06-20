document.addEventListener('DOMContentLoaded',function(){function isJson(str){try{JSON.parse(str)}catch(e){return!1}
return!0}
function removeTags(txt){var rex=/(<([^>]+)>)/ig;return txt.replace(rex,"")}
$('form.validator [type="submit"]').on('click',function(){$('form.validator button[type="submit"]').attr('disabled','disabled');var form_data=$(this).closest('form.validator').serialize();$this=$(this).closest('form.validator');form_data=form_data+'&ajaxLoad=1';timeNow=+new Date();timeInterval=1000;if($this.hasClass("compounding-form")){$('.compounding-form button[type="submit"]').attr('disabled','disabled')}
if(typeof timeNeed=='undefined')
timeNeed=timeNow;if(timeNow>=timeNeed){timeNeed=timeNow+timeInterval;$.ajax({url:$this.attr("action"),type:'POST',data:form_data,dataType:'JSON',success:function(data){$('form.validator button[type="submit"]').removeAttr('disabled');if(data.success){if($('div').is('.notification__box_success')&&data.modal?.length<3){$('.notification__box_success .notifications__text').text(data.message);$('.notifications__item_success').fadeIn('slow');$('.notifications__item_success').delay(3000).fadeOut('slow')}}
if(data.error){$('.notifications__item_error .notifications__text').text(data.error);$('.notifications__item_error').fadeIn('slow');$('.notifications__item_error').delay(3000).fadeOut('slow');if(typeof hcaptcha!='undefined'){hcaptcha.reset()}
if(window.captchaObj){window.captchaObj.reset()}}
if(data.action=='redirect'){window.location.href=data.url}
if(data.action=='password_remind'){if(!data.error){$('#enter-email-block').css('display','none');$('#sent-code-block').fadeIn('slow')}}
if(data.ga){if(typeof hcaptcha!='undefined'){hcaptcha.reset()}
if(window.captchaObj){window.captchaObj.reset()}}
if(data.pin){$('#login_pin .pin-number').each(function(index){$(this).val('');$(this).removeClass('active-field')});$('#login_pin #first-pin').val('');$('.auth_page #login_pin').fadeIn('slow');if(typeof hcaptcha!='undefined'){hcaptcha.reset()}
if(window.captchaObj){window.captchaObj.reset()}}
if(data.action=='deposit'){if(data.success){$(".add-form-card").css('display','none');if(data.modal?.length>3){$("#select-ps-step").fadeOut(function(){$(".payment-info_crypto").append(data.modal);$("#depo-crypto-block").fadeIn('slow');$("#depo-crypto-block").addClass('crypto-active')})}else{$("#payment-balanse-step .available-balance").fadeOut(function(){$("#balance-success").fadeIn('slow')})}}}
if(data.action=='withdrawal'){if(data.success){$('#withdrawalModal form').fadeOut('slow',function(){$('#withdrawalModal .loading').fadeIn('slow');$('#withdrawalModal .loading').delay('300').fadeOut('slow',function(){$('#withdrawalModal .payment-result_success').fadeIn('slow')});if(data.batch){let href=$('.payment-result__txid .active').attr('href');href=`${href}${data.batch}`
$('.payment-result__txid .active').attr('href',href)}})}
if(data.manual){$('#withdrawalModal form').fadeOut('slow',function(){$('#withdrawalModal .loading').fadeIn('slow');$('#withdrawalModal .loading').delay('300').fadeOut('slow',function(){$('#withdrawalModal .payment-result_warning').fadeIn('slow')})})}}
if(data.action=='deposit-sell'){if(data.success=="1"){$('.product-sell-form').fadeOut(function(){$('.success-sell').fadeIn()});let depId=data.id;$(`.item-success-${depId}`).addClass('active')}}
if(data.action=='saveCompound'){if(data.success==1){let activeDepoId=$('.compounding input[name="depositId"]').val();let setCompound=$('.compounding-form input[name="compound"]').val();$('#all-depos .dropdown .deposit-number .dropdown-item[data-id="'+activeDepoId+'"]').attr('data-compound',setCompound);$('.compounding-form button[type="submit"]').removeAttr('disabled')}}
if(data.action=='tickets'){$(`.chat__rows_${data.id}`).append(data.message);$(".chat__textarea").val("")}
if(data.action=='add-ticket'){$('.support__form button[type="submit"]').fadeOut(function(){$('.support__form button.back-btn').fadeIn('slow')});if(data.success){const monthNames=["Jan","Feby","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Novr","Dec"];let newTicket=$(".empty-card").clone();let subject=$('.support__form input[name="subject"]').val();let message=$('.support__form input[name="text"]').val();let date=new Date();date=monthNames[date.getMonth()]+'-'+date.getDate()+'-'+date.getFullYear()+' '+date.getHours()+":"+date.getMinutes();$(newTicket).find('.ticket-card__header .ticket-card__id').text(`#${data.id}`);$(newTicket).find('.ticket-card__header span.new-date').text(date);$(newTicket).find('.chat span.new-date-body').text(date);$(newTicket).find('.new-subject').text(subject);$(newTicket).find('.chat .message_user .message__body').text(message);$(newTicket).find('input[name="id"]').val(data.id);$(newTicket).find('.chat__rows').addClass(`chat__rows_${data.id}`);$(newTicket).addClass('new-ticket');$('.support__col_list').prepend(newTicket);$('.new-ticket .ticket-card__header .ticket-card__open').on('click',function(){$(this).closest('.collapsed').find('.collapsed-body').toggleClass('collapsed-body_show');$(this).toggleClass('btn-show_open')});$('.support__fields').fadeOut(function(){$('.support__success').fadeIn('slow');$('.new-ticket').fadeIn('slow')});$('.support__fields input[name="subject"]').val('');$('.support__fields input[name="text"]').val('')}}
if(data.action=='dashboard'){if(data.error){$(".alert-message-wrap .error--ajax .alert-message__text").html(data.error);$(".alert-message-wrap .error--ajax").show()}
if(data.success){$(".alert-message-wrap .success--ajax .alert-message__text").html(data.success);$(".alert-message-wrap .success--ajax").show()}}}})}
return!1});window.onpopstate=function(){urlDefault=$('.ajax a.active');$('title').html(removeTags(urlDefault.html()));if(history.pushState){history.pushState(null,null,urlDefault.attr('href'))}}
$(".ajax a").click(function(){if(!$(this).hasClass('noajax')){event.preventDefault()}
urlA=$(this);urlDefault=$(this).attr('href');symb='?';if(urlDefault.indexOf('?')!=-1){symb='&'}
url=urlDefault;parent=urlA.parent();timeNow=+new Date();timeInterval=300;if(typeof timeNeed=='undefined')
timeNeed=timeNow;if(timeNow>=timeNeed){timeNeed=timeNow+timeInterval;if(!$('#ajaxLoad').hasClass('locked')&&!$(this).hasClass('noajax')&&document.location.pathname!=urlDefault){$('#ajaxLoad').addClass('locked');$.ajax({url:url+symb+'ajaxPage=1',type:'GET',success:function(data){if(isJson(data)){answer=JSON.parse(data);if(answer.action=='redirect')
window.location.replace(answer.url)}else{$('#ajaxLoad').html(data);if(parent.hasClass('ajax')){$('title').html(removeTags(urlA.html()));$('.ajax a').removeClass('active');urlA.addClass('active')}
if(history.pushState){history.pushState(null,null,urlDefault)}
$('#ajaxLoad').removeClass('locked')}}})}}})})