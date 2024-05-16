document.querySelectorAll('#details').forEach(item => {
const btn = item.querySelector('#btn');
const span = item.querySelector('#span');
btn.addEventListener('click',function(){
    span.classList.toggle('click_minus');
});
});