$(function() {
  $(".lieuxDepart").ready(function() {
    var combobox;
    $.ajax({
      url: "ressources/lieux.json",
      success: function(lieux) {
        $.each(lieux, function(key, lieux) {
          combobox +=
            "<option name =" +
            lieux.R_LIEUX +
            ">" +
            lieux.R_LIEUX +
            "</option>";
        });
        $(".lieuxDepart").append(combobox);
      }
    });
  });

  $(".lieuxDepart").change(function(e) {
    var index = $(".lieuxDepart option:selected").val();
    var combobox;
    $.ajax({
      url: "ressources/lieux.json",
      success: function(lieux) {
        $.each(lieux, function(key, lieux) {
          if (lieux.R_LIEUX == index) {
            combobox +=
              "<option name =" +
              lieux.R_LIEUX +
              " hidden >" +
              lieux.R_LIEUX +
              "</option>";
          } else {
            combobox +=
              "<option name =" +
              lieux.R_LIEUX +
              ">" +
              lieux.R_LIEUX +
              "</option>";
          }
        });
        $(".lieuxArriver").append(combobox);
      }
    });
  });
});
