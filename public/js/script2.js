
superplaceholder({
	el: document.querySelector('.user'),
	sentences: [ 'Digita tu usuario'],
	options: {

		letterDelay:90,
		sentenceDelay: 500,
		startOnFocus: true,
		loop: true,
		shuffle: false,
		showCursor: true,
		cursor: '|'
	}
});


superplaceholder({
	el: document.querySelector('.password'),
	sentences: [ 'Digita tu Contraseña'],
	options: {

		letterDelay:90,
		sentenceDelay: 500,
		startOnFocus: true,
		loop: true,
		shuffle: false,
		showCursor: true,
		cursor: '|'
	}
});