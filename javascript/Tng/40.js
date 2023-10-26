const DIV1 = document.querySelector('#div1');
DIV1.addEventListener('mouseenter', popOpen);

function popOpen() {	
	alert('두근두근!');
}

const DIV2 = document.querySelector('#div2');
DIV2.addEventListener('click', popOpen1);

function popOpen1() {	
	alert('들켰다!');
	DIV1.removeEventListener('mouseenter', popOpen);
	DIV2.removeEventListener('click', popOpen1);
	DIV2.style.backgroundColor = 'beige';	
    DIV2.addEventListener('click', popOpen2);	
}
 
function popOpen2() {
	alert('다시 숨는다!');
	DIV2.style.backgroundColor = 'white';
    DIV2.removeEventListener('click', popOpen2);	
	DIV1.addEventListener('mouseenter', popOpen);
	DIV2.addEventListener('click', popOpen1);
}
