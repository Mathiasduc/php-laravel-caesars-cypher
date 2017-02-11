'use strict';
function init(){
	console.log("init");
	listeners();
}

function listeners(){
	console.log("listeners");
	const messageCardNodeList = document.querySelectorAll('.messageCard>button');
	console.log(messageCardNodeList);
	addEventListenerList(messageCardNodeList, 'click', decryptMessage);
}

function addEventListenerList(list, event, fn) {
	for (var i = 0, len = list.length; i < len; i++) {
		list[i].addEventListener(event, fn, false);
	}
}

function decryptMessage(e){
	const messageId = parseInt(e.target.dataset.id, 10);
	//console.log(e.target.parentNode.getElementsByTagName('input')[0].value);
	const offset = e.target.parentNode.getElementsByTagName('input')[0].value;
	$.ajax('/message/decrypt',
	{
		method: 'POST',
		data: {id: messageId, offset: offset} 
	}).done(function(data){
		e.target.parentNode.getElementsByTagName('span')[0].innerHTML = data;
	});
}

$.ajaxSetup({
	headers: {
		'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
	}
});

if(document.readyState != 'loading'){
	init();
} else {
	document.addEventListener('DOMContentLoaded', init);
}