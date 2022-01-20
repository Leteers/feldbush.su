$(function () {
    setInterval(window.onload = function () {
        document.querySelector('.b-1').addEventListener('click', () => {
            let data = document.querySelector('.s-1').value;
            document.querySelector('.out-1').innerHTML = data;
            $.ajax({
                type: 'POST',              // Задаем метод передачи
                url: 'index.php?value=' + data, // URL для передачи параметра
                success: function () {
                    $(p.out).text("All ok");
                }
            });
        });
    });
});