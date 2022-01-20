$(function(){
    setInterval(window.onload = function(){
        document.querySelector('.b-1').addEventListener('click',()=>{
        let data = document.querySelector('.s-1').value;
        document.querySelector('.out-1').innerHTML=data;
        });
    });
});