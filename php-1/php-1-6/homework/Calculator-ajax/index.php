<!--2. Создать калькулятор, который будет определять тип выбранной пользователем операции,
ориентируясь на нажатую кнопку. * Сделайте его на ajax-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

- Calculator on ajax -<br>
<input type="text" id="val1" value="">
<select class="action" id="func" name="operation">
  <option value="sum">+</option>
  <option value="min">-</option>
  <option value="mul">*</option>
  <option value="div">/</option>
</select>
<input type="text" id="val2" value="">
<button class='action'> =</button>
<input type="text" id="val3" value=""><br>

<script>
    $(document).ready(function () {
        $(".action").on('click', function () {
            let operand1 = $("#val1").val();
            let operand2 = $("#val2").val();
            let func = $("#func").val();
            console.log(func);
            $.ajax({
                url: "func.php",
                type: "POST",
                dataType: "json",
                data: {
                    op1: operand1,
                    op2: operand2,
                    func: func
                },
                error: function () {
                    alert("Что-то пошло не так...");
                },
                success: function (answer) {
                    $('#val3').val(answer.result);
                }
            })
        });
    });
</script>