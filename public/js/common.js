function showCreateFolder(){
	let req = new XMLHttpRequest();
	req.onreadystatechange = function() {
		let result = document.getElementById('modal_window');
		if(req.readyState == 4){
			if(req.status == 200){
				result.innerHTML = req.responseText;
				show_modal();
			}
		}
	}
	let request_url = '/folders/create';
	req.open('GET', request_url, true);
	req.setRequestHeader('X-Requested-with', 'XMLHttpRequest');
	req.send();
}

function createFolder(){
	let req = new XMLHttpRequest();
	req.onreadystatechange = function() {
		if(req.readyState == 4){
			if(req.status == 200){
				let result = JSON.parse(req.response);
				location.href = result['url'];
			}
			else if(req.status == 422){
				let result = JSON.parse(req.response);
				document.getElementById('error_title').innerText = result['errors']['title'][0];
			}
		}
	}
	let formdata = new FormData(document.getElementById('createFolder'));
	let request_url = '/folders/create';
	req.open('POST', request_url, true);
	req.setRequestHeader('X-Requested-with', 'XMLHttpRequest');
	req.send(formdata);
}

function showEditFolder(request_url){
	let req = new XMLHttpRequest();
	req.onreadystatechange = function() {
		let result = document.getElementById('modal_window');
		if(req.readyState == 4){
			if(req.status == 200){
				result.innerHTML = req.responseText;
				show_modal();
			}
			else if(req.status == 404 || req.status == 403){
				location.href = location.href;
			}
		}
	}
	req.open('GET', request_url, true);
	req.setRequestHeader('X-Requested-with', 'XMLHttpRequest');
	req.send();
}

function editFolder(){
	let req = new XMLHttpRequest();
	req.onreadystatechange = function() {
		if(req.readyState == 4){
			if(req.status == 200){
				let result = JSON.parse(req.response);
				location.href = result['url'];
			}
			else if(req.status == 404 || req.status == 403){
				location.href = location.href;
			}
			else if(req.status == 422){
				let result = JSON.parse(req.response);
				document.getElementById('error_title').innerText = result['errors']['title'][0];
			}
		}
	}
	let form = document.getElementById('editFolder');
	let formdata = new FormData(form);
	req.open('POST', form.action, true);
	req.setRequestHeader('X-Requested-with', 'XMLHttpRequest');
	req.send(formdata);
}

function showDeleteFolder(request_url){
	let req = new XMLHttpRequest();
	req.onreadystatechange = function() {
		let result = document.getElementById('modal_window');
		if(req.readyState == 4){
			if(req.status == 200){
				result.innerHTML = req.responseText;
				show_modal();
			}
			else if(req.status == 404 || req.status == 403){
				location.href = location.href;
			}
		}
	}
	req.open('GET', request_url, true);
	req.setRequestHeader('X-Requested-with', 'XMLHttpRequest');
	req.send();
}

function showCreateTask(request_url){
	let req = new XMLHttpRequest();
	req.onreadystatechange = function() {
		let result = document.getElementById('modal_window');
		if(req.readyState == 4){
			if(req.status == 200){
				result.innerHTML = req.responseText;
				setFlatpickr();
				show_modal();
			}
			else if(req.status == 404 || req.status == 403){
				location.href = location.href;
			}
		}
	}
	req.open('GET', request_url, true);
	req.setRequestHeader('X-Requested-with', 'XMLHttpRequest');
	req.send();
}

function createTask(){
	let req = new XMLHttpRequest();
	req.onreadystatechange = function() {
		if(req.readyState == 4){
			if(req.status == 200){
				let result = JSON.parse(req.response);
				location.href = result['url'];
			}
			else if(req.status == 404 || req.status == 403){
				location.href = location.href;
			}
			else if(req.status == 422){
				let result = JSON.parse(req.response);
				if(result['errors']['title']){
					document.getElementById('error_title').innerText = result['errors']['title'][0];
				}
				else{
					document.getElementById('error_title').innerText = '';
				}

				if(result['errors']['due_date']){
					document.getElementById('error_due_date').innerText = result['errors']['due_date'][0];
				}
				else{
					document.getElementById('error_due_date').innerText = '';
				}
			}
		}
	}
	let form = document.getElementById('createTask');
	let formdata = new FormData(form);
	req.open('POST', form.action, true);
	req.setRequestHeader('X-Requested-with', 'XMLHttpRequest');
	req.send(formdata);
}

function editTask(){
	let req = new XMLHttpRequest();
	req.onreadystatechange = function() {
		if(req.readyState == 4){
			if(req.status == 200){
				let result = JSON.parse(req.response);
				location.href = result['url'];
			}
			else if(req.status == 404 || req.status == 403){
				location.href = location.href;
			}
			else if(req.status == 422){
				let result = JSON.parse(req.response);
				if(result['errors']['title']){
					document.getElementById('error_title').innerText = result['errors']['title'][0];
				}
				else{
					document.getElementById('error_title').innerText = '';
				}

				if(result['errors']['status']){
					document.getElementById('error_status').innerText = result['errors']['status'][0];
				}
				else{
					document.getElementById('error_status').innerText = '';
				}

				if(result['errors']['due_date']){
					document.getElementById('error_due_date').innerText = result['errors']['due_date'][0];
				}
				else{
					document.getElementById('error_due_date').innerText = '';
				}
			}
		}
	}
	let form = document.getElementById('editTask');
	let formdata = new FormData(form);
	req.open('POST', form.action, true);
	req.setRequestHeader('X-Requested-with', 'XMLHttpRequest');
	req.send(formdata);
}

function showDeleteTask(request_url){
	let req = new XMLHttpRequest();
	req.onreadystatechange = function() {
		let result = document.getElementById('modal_window');
		if(req.readyState == 4){
			if(req.status == 200){
				result.innerHTML = req.responseText;
				show_modal();
			}
			else if(req.status == 404 || req.status == 403){
				location.href = location.href;
			}
		}
	}
	req.open('GET', request_url, true);
	req.setRequestHeader('X-Requested-with', 'XMLHttpRequest');
	req.send();
}

function show_modal(){
	let modal = document.getElementById('modal_outer');
	modal.style.visibility = 'visible';
}

function close_modal(e){
	if(e.target.id == 'modal_outer'){
		destroy_modal();
	}
}

function modal_cancel(){
	destroy_modal();
}

function destroy_modal(){
	let modal = document.getElementById('modal_outer');
	modal.style.visibility = 'hidden';
	document.getElementById('modal_window').innerHTML = null;
	if(flatpickrInstance){
		flatpickrInstance.destroy();
	}
}

function setFlatpickr(){
	flatpickrInstance = flatpickr(document.getElementById('due_date'),{
		locale: 'ja',
		dateFormat: 'Y/m/d',
		minDate: new Date(),
	});
}

let flatpickrInstance;

function main(){
	let modal = document.getElementById('modal_outer');
	if(modal){
		modal.addEventListener('click', close_modal);
	}
}
window.addEventListener('load', main);