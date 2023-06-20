document.addEventListener('DOMContentLoaded', function() {
	let navs = document.querySelectorAll('.nav-pills');
	if (navs) {
		navs.forEach(item => {
			if (!item.classList.contains('nav-pills_mob')) {
				var line = item.lastElementChild;
				let firstActiveTab = item.firstElementChild;
				let firstActiveTabWidth = firstActiveTab.offsetWidth;
				line.style.width = `${firstActiveTabWidth}px`;
				// let tabs = navs.getElementsByClassName('nav-item');
				let tabs = item.children;
				tabs = [...item.children]
				tabs.pop();
				Array.prototype.forEach.call(tabs, function(tab) {
					tab.addEventListener('click', function setActiveClass(evt) {
						// let pervActive = tab.closest('.nav-pills').querySelector('.nav-item.active');
						// let prevWidth = pervActive ? pervActive.offsetWidth : tab.offsetWidth;

						Array.prototype.forEach.call(tabs, function(tab) {
							tab.classList.remove('active');
						});

						evt.currentTarget.classList.add('active');
						let width = evt.currentTarget.offsetWidth;
						let left = evt.currentTarget.offsetLeft;

						line.style.width = `${width}px`;
						line.style.left = `${left}px`;
					});
				});
			}
		});
	}

	// mobile nav-pills
	let navsMobile = document.querySelectorAll('.nav-pills_mobile');
	if (navsMobile) {
		navsMobile.forEach(item => {
			let line = document.querySelector('.active-tab').lastElementChild;
			let firstActiveTab = document.querySelector('.active-tab').firstElementChild;
			let firstActiveTabWidth = firstActiveTab.offsetWidth;
			line.style.width = '50%';

			let tabs = item.children;
			tabs = [...item.children];
			// console.log('tabs', tabs)
			let tabItems = [];
			tabs.forEach(element => tabItems.push(...element.children));
			// tabItems = document.querySelectorAll('.nav-pills_mobile .nav-item');
			// tabLinks = document.querySelectorAll('.nav-pills_mobile .nav-link');
			let tabLinks = [];
			tabItems.forEach(element => tabLinks.push(...element.children));
			
			// console.log('tabItems', tabItems);

			Array.prototype.forEach.call(tabItems, function(tab) {
				tab.addEventListener('click', function setActiveClass(evt) {
					Array.prototype.forEach.call(tabs, function(tabUl) {
						tabUl.classList.remove('active-tab');
					});
										evt.currentTarget.parentElement.classList.add('active-tab');
					Array.prototype.forEach.call(tabLinks, function(item) {
						item.classList.remove('active');
					});

					let line = document.querySelector('.active-tab').lastElementChild;
					let firstActiveTab = document.querySelector('.active-tab').firstElementChild;
					let firstActiveTabWidth = firstActiveTab.offsetWidth;
					line.style.width = `${firstActiveTabWidth}px`;

					// evt.currentTarget.parentElement.classList.add('active');

					let width = evt.currentTarget.offsetWidth;
					let left = evt.currentTarget.offsetLeft;

					line.style.width = `${width}px`;
					line.style.left = `${left}px`;
				});
			});
		});
	}


	// Show more credits 
	let lastCreditsFront = document.querySelector('.last-requests');
	if (lastCreditsFront) {
		let moreButton = document.querySelector('.last-requests .button-bordered');
		moreButton.addEventListener('click', event => {
			event.preventDefault();
			let hiddenBlock = document.querySelector('.last-requests__more');
			hiddenBlock.classList.add('last-requests__more-show');
			moreButton.style.display = 'none';
		});
	}

	// ** FADE OUT FUNCTION **
	function fadeOut(el) {
		el.style.opacity = 1;
		(function fade() {
			if ((el.style.opacity -= .1) < 0) {
				el.style.display = "none";
			} else {
				requestAnimationFrame(fade);
			}
		})();
	};

	// ** FADE IN FUNCTION **
	function fadeIn(el, display) {
		el.style.opacity = 0;
		el.style.display = display || "block";
		(function fade() {
			var val = parseFloat(el.style.opacity);
			if (!((val += .1) > 1)) {
				el.style.opacity = val;
				requestAnimationFrame(fade);
			}
		})();
	};

	// Open FAQ article
	let questionCards = document.querySelectorAll('.question');
	
	let fullQuestion = document.querySelector('#article-full-text');
	let questionBack = document.querySelector('.articles-column__back');
	if (questionCards) {
		
		questionCards.forEach(item => {
			let title = item.getAttribute('data-title');
			// let author = item.getAttribute('data-aut');
			let fullText = item.lastElementChild.innerHTML;

			item.addEventListener('click', function(e){
				let questionsWrap = document.querySelector('.articles-column.active')
				let id = this.getAttribute('data-article');
				document.querySelector('.question-article__content h1').textContent = title;
				// document.querySelector('.articles-author__name-data').textContent = author;
				document.querySelector('.question-article__content_inner').innerHTML = fullText;

				fullQuestion.setAttribute('data-article', id);
				questionsWrap.classList.remove('active', 'show');
				let catNumber = this.getAttribute('data-cat');
				fullQuestion.setAttribute('data-cat', catNumber);
				fadeIn(fullQuestion);
			});
		});
	}

	if (questionBack) {
		questionBack.addEventListener('click', function(e) {
			e.preventDefault();
			let fullQuestion = document.querySelector('#article-full-text');
			let faqNumber = fullQuestion.getAttribute('data-cat');
			let questionsWrap = document.querySelector(`#${faqNumber}`);

			document.querySelector('.question-article__content h1').textContent = '';
			document.querySelector('.question-article__content_inner').innerHTML = '';
			fullQuestion.removeAttribute('data-article');
			fadeOut(fullQuestion);
			questionsWrap.classList.add('active', 'show');
			// fadeIn(questionsWrap);
			fullQuestion.removeAttribute('data-cat');
		});
	}

	// Show/hide password
	let passBtns = document.querySelectorAll('.field__showpass');
	if (passBtns) {
		passBtns.forEach(btn => {
			btn.addEventListener('click', (e) => {
				e.preventDefault();
				e.target.classList.toggle('field__showpass_active');
				let inputType = e.target.classList.contains('field__showpass_active') ? 'text' : 'password';
				e.target.previousElementSibling.setAttribute('type', inputType);
			});
		});
	}

	// Close notification
	let closeNotification = document.querySelectorAll('.notifications__close');
	if (closeNotification) {
		closeNotification.forEach(btn => {
			btn.onclick = function(e) {
				fadeOut(this.parentElement);
			}
		});
	}

	// custom select
	$('body').click(function(e) {
		if ($('ul').is('.select__list_show')) {
			$('.select__list').fadeOut('slow');
			$('.select__list').removeClass('select__list_show');
		}
	});

	$('.select__opener').click(function(e){
		e.preventDefault();
		e.stopPropagation();
		$(this).closest('.select').find('.select__list').toggleClass('select__list_show');
		if ($(this).closest('.select').find('.select__list').hasClass('select__list_show')) {
			$(this).closest('.select').find('.select__list').fadeIn('slow');
		} else {
			$(this).closest('.select').find('.select__list').fadeOut('slow');
		}
	});

	$('.select__option').click(function(e) {
		let planName = $(this).text();
		let selectedValue = $(this).attr('data-value');
		let icon = $(this).attr('data-icon');
		if(icon) {
			let opener = $(this).closest('.select').find('.select__opener').html(`<span class="cab-ps cab-ps_${icon}"></span> ${planName}`);
		} else {
			$(this).closest('.select').find('.select__opener').text(planName);
		}
		$(this).closest('.select').find('.select__value').val(selectedValue);
		$(this).closest('.select__list').fadeOut('slow');
	});

	// dashboard filter
	$('.dashboard__filter .select__option').click(function(e) {
		let planClass = $(this).text().substring(0, 1).toLowerCase();
		// let planId = $(this).attr('data-id');
		let planMin = $(this).attr('data-min');
		let planMax = $(this).attr('data-max');
		let planPercent = $(this).attr('data-percent');
		let planPeriods = $(this).attr('data-periods');
		let totalPercent = planPercent * planPeriods;
		let netPercent = totalPercent - 100;
	
		// $('#requests-filter-form input[name="tariff"]').val(planId);
		$('.dashboard__filter input[name="minAmount"]').val(planMin);
		$('.dashboard__filter input[name="maxAmount"]').val(planMax);
		// $('#requests-filter-form input[name="minAmount"]').val(planMin);
		// $('#requests-filter-form input[name="maxAmount"]').val(planMax);
		$('.select__opener').prepend(`<span class="select__icon plan-icon plan-icon_sm plan-icon_${planClass}"></span>`);
		$('#plan-info-percent').text(planPercent);
		$('#plan-info-periods').text(planPeriods);
		$('#plan-info-limits').text(`$${planMin} - $${planMax}`);
		$('#plan-info-net-profit').text(`${netPercent}%`);
		$('#plan-info-profit').text(`${totalPercent}%`);
	});

	// Emoji reaction on faq page
	$('.article-rate__item-react').click(function(e) {
		e.preventDefault();
		let reaction = $(this).attr('data-reaction');
		let articleId = $('#article-full-text').attr('data-article');
		$(this).closest('.article-rate').fadeOut('slow', function() {
			$(`.feedback-${reaction}`).fadeIn('slow');
		});

		localStorage.setItem(articleId, reaction);
	});

	$('.container-helpcenter .question').click(function(e) {
		let articleId = $('#article-full-text').attr('data-article');
		let savedReaction = localStorage.getItem(articleId);
		if (savedReaction) {
			$('.feedback-select').fadeOut('slow', function(){
				$('.article-rate').css('display', 'none');
				$(`.feedback-${savedReaction}`).fadeIn('slow');
			});
		} else {
			$('.article-rate').css('display', 'none');
			$('.feedback-select').fadeIn('slow');
		}
	});

	// Filter by tag
	$('.tags .tag__item').click(function(e){
		e.preventDefault();
		$('.tags .tag__item').removeClass('tag__item_active');
		$(this).addClass('tag__item_active');
		$('.blog__row .blog__col').css('display', 'inline-block');
		$('.blog__row .blog__col').removeClass('active');
		let clickedTag = $(this).text();
		let postsTagsArr = [];
		let postsTags = $('.blog__tag');
		postsTags.each(function(index){
			let spans = $(postsTags[index]).find('span');
			spans.each(function(ind){
				let text = $(spans[ind]).text();
				if(text != clickedTag && !$(postsTags[index]).closest('.blog__col').hasClass('active')){
					$(postsTags[index]).closest('.blog__col').removeClass('active');
					$(postsTags[index]).closest('.blog__col').css('display', 'none');
				} else {
					$(postsTags[index]).closest('.blog__col').addClass('active');
					$(postsTags[index]).closest('.blog__col').css('display', 'inline-block');
				}
			});
		});
	});

	if($('div').is('.notifications__item')){
		$('.notifications__item').delay(4000).fadeOut('slow');
	}


	const borrowerTab = document.querySelector('.go-steps-borroer');
    if(borrowerTab){
        borrowerTab.addEventListener("click", () => {
            const cards = document.querySelectorAll('.steps__card');
            cards.forEach((card) => {
                card.classList.add('rotate')
            });
            const tabLender = document.querySelector('#pills-lender-tab');
            const tabBorrower = document.querySelector('#pills-borrower-tab');
            tabLender.classList.remove('active');
            tabLender.parentNode.classList.remove('active');
            tabBorrower.classList.add('active');
            tabBorrower.parentNode.classList.add('active');

            let line = document.querySelector('#steps .nav-item__slider');
            let active = document.querySelector('#steps .nav-item.active');
            let width = active.offsetWidth;
			let left = active.offsetLeft;
			line.style.width = `${width}px`;
			line.style.left = `${left}px`;
        });
    }

    // Videos
    $('.video-button, .button-bg_video, .video-link').click(function(e){
    	e.preventDefault();
        let link = $(this).attr('data-video');
        $('.responsive-iframe iframe').attr('src', link);
        // $('.responsive-iframe iframe').attr('autoplay', 1);
        $('.responsive-iframe iframe').fadeIn('slow');
    });

    $('.video-modal').on('hidden.bs.modal', function () {
	  $('.responsive-iframe iframe').removeAttr('src');
	});


});

	

