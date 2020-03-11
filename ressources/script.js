$(function() {
  $(".lieux").ready(function() {
    var combobox;
    $.ajax({
      url: "./ressources/script.json",
      success: function(lieux) {
        console.log("I'm here");
        $.each(lieux, function(key, lieux) {
          combobox +=
            "<option value =" + lieux.R_ID + ">" + lieux.R_LIEUX + "</option>";
        });
        $(".lieux").append(combobox);
      }
    });
  });
  /*
  $(".departement").change(function(e) {
    var selectedDpt = $(this).val();
    var confirmeddpt;
    var comboboxWorker =
      "Employer <select><option hidden selected value>Select Employer</option>";
    selectedDpt += ".json";
    $.getJSON("./ressources/", function(files) {
      $.each(files, function(key, file) {
        if (file === selectedDpt) {
          confirmeddpt = selectedDpt;
        }
      });
      $.getJSON("./ressources/" + confirmeddpt, function(workers) {
        $.each(workers, function(key, worker) {
          comboboxWorker +=
            "<option value =" +
            worker.empno +
            ">" +
            worker.empnom +
            "</option>";
        });
        comboboxWorker += "</select>";
        $(".employer").html(comboboxWorker);
      });
    });
  });*/
});
