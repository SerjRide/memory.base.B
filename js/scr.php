<script>
    var nextQ = document.getElementById("hidden_i").value;
    document.getElementById("nextQ").value = (Number(nextQ)+1);
    $("#nextQ").click(function(){
        document.getElementById("hidden_i").value = (Number(document.getElementById("nextQ").value)-2);
    });
</script>
<script>
    $(document).ready(function(){
       $('#user_answer').focus();
    });
    $('#user_answer').keydown(function(e){
       if(e.keyCode === 13) {
        $("input[name='next']").click();
        e.preventDefault(); //отменяет пернос строки
       }
    });
</script>
<script>
    $("#skipButton").click(function(){
        let q = (Number(document.getElementById("nextQ").value)-2);
        let max = Number(document.getElementById("hidden_c").value);
        if(q > max){
            alert('Вопрос не найден');
            return;
        }
        else {
            document.getElementById("hidden_i").value = q+1;
            var right_answer = document.getElementById("hidden_answer").value;
            document.getElementById("user_answer").value = right_answer;
            $("input[name='next']").click();
        }
    });
</script>
<script>
    $("#backButton").click(function(){
        let q = (Number(document.getElementById("nextQ").value)-2);
        var max = Number(document.getElementById("hidden_c").value);
        if(q > max){
          alert('Вопрос не найден');
          return;
        }
        else if (q < 0){
          document.getElementById("hidden_i").value = max-2;
          var right_answer = document.getElementById("hidden_answer").value;
          document.getElementById("user_answer").value = right_answer;
          $("input[name='next']").click();
        }
        else {
          document.getElementById("hidden_i").value = q-1;
          var right_answer = document.getElementById("hidden_answer").value;
          document.getElementById("user_answer").value = right_answer;
          $("input[name='next']").click();
        }
    });
</script>
<script>
    $('#nextQ').keydown(function(e){
       if(e.keyCode === 13) {
         let q = Number(document.getElementById("nextQ").value);
         let max = Number(document.getElementById("hidden_c").value);
         if(q > max || q < 1){
             alert('Вопрос не найден');
             return;
         }
         else {
             document.getElementById("hidden_i").value = q-2;
             var right_answer = document.getElementById("hidden_answer").value;
             document.getElementById("user_answer").value = right_answer;
             $("input[name='next']").click();
         }
       }
    });
</script>
<script>
  $("#button-ref-form").click(function(){
    document.getElementById("hidden_i").value = -1;
    var right_answer = document.getElementById("hidden_answer").value;
    document.getElementById("user_answer").value = right_answer;
    $("input[name='next']").click();
  });
</script>
<script type="text/javascript">
  $("#nextQ").click(function(){
    $(this).select();
  });
</script>
<script type="text/javascript">
  $("#button-delQuestion-form").click(function(){
    function confirmDelete(){
      if (confirm("Вы действительно хотите удалить этот вопрос?")) return true;
      else false;
    }
    if (confirmDelete() == true){
      alert('Для этого скорее всего нужно выучить AJAX');
    }
  });
</script>
<script type="text/javascript">
  $.fn.hasAttr = function(name) {
     return this.attr(name) !== undefined;
  };
  $("textarea#question").dblclick(function(){
    if ($(this).hasAttr("readonly")) {
      $("textarea#question").removeAttr("readonly")
    }
    else $("textarea#question").attr("readonly","true")
  });
  $("body").click(function(e) {
    if ($(e.target).hasClass('questionCl')) {
        return false;
    }
    $("textarea.questionCl").attr("readonly","true")
});
</script>
<script>
  $(document).ready(function(){
    $("input[name='start']").click();
  });
</script>
<script type="text/javascript">
  $('#myModal').on('shown.bs.modal', function () {
    $('#myInput').focus()
  })
</script>
<script type="text/javascript">
    $('[data-toggle="tooltip"]').tooltip();
</script>
<script type="text/javascript">
  $("input[name='add']").click(function(){
    var newNumber = (Number($("input[name='c']").val())+1);
    var category = $("input[name='category']").val();
    var newTempQuestion = {}
    newTempQuestion.id = Math.floor(Math.random() * 1000)
    newTempQuestion.qNumber = newNumber;
    newTempQuestion.category = category;
    newTempQuestion.data = new Date();
    localStorage.setItem(newTempQuestion.id, JSON.stringify(newTempQuestion))
  });
</script>
<script type="text/javascript">
  var arrQ = [];
  for (var i = 0; i < localStorage.length+1; i++) {
    key = localStorage.key(i);
    value = JSON.parse(localStorage.getItem(key));
    var category = $("input[name='category']").val();
    localStorage.getItem(key);
    if (value.category == category){
      arrQ.push(value.qNumber);
      arrQ.sort(function (a, b) {
        return a - b;
      });
      var minQ = arrQ[0]-1;
      $("input[name='lastAdded']").val(minQ);
    }
  }
</script>
<script type="text/javascript">
  for (var i = 0; i < localStorage.length+1; i++) {
    key = localStorage.key(i);
    value = JSON.parse(localStorage.getItem(key));
    localStorage.getItem(key);
    if (value.category === 'HTML'){
        $("#i1").removeClass().addClass("fas fa-exclamation text-danger");
    }
    if (value.category === 'CSS'){
        $("#i2").removeClass().addClass("fas fa-exclamation text-danger");
    }
    if (value.category === 'PHP'){
        $("#i3").removeClass().addClass("fas fa-exclamation text-danger");
    }
    if (value.category === 'MySQL'){
        $("#i4").removeClass().addClass("fas fa-exclamation text-danger");
    }
    if (value.category === 'JavaScript'){
        $("#i5").removeClass().addClass("fas fa-exclamation text-danger");
    }
    if (value.category === 'NodeJS'){
        $("#i6").removeClass().addClass("fas fa-exclamation text-danger");
    }
    if (value.category === 'bash'){
        $("#i7").removeClass().addClass("fas fa-exclamation text-danger");
    }
    if (value.category === 'bootstrap'){
        $("#i8").removeClass().addClass("fas fa-exclamation text-danger");
    }
    if (value.category === 'BI'){
        $("#i9").removeClass().addClass("fas fa-exclamation text-danger");
    }
    if (value.category === 'other'){
        $("#i10").removeClass().addClass("fas fa-exclamation text-danger");
    }
    if (value.category === 'react'){
        $("#i11").removeClass().addClass("fas fa-exclamation text-danger");
    }
    if (Date.parse(value.data) < (new Date() - 1000*60*60*24*4)) {
        localStorage.removeItem(key);
    }
  }
</script>
