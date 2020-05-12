/**
 * Fonction qui va ajouter les lieu de départ via une liste .json
 */
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

  /**
   * Après avoir modifier la liste va retire cette element pour ne pas avoir le même
   * départ et arrivée
   */
  $(".lieuxDepart").change(function(e) {
    var index = $(".lieuxDepart option:selected").val();
    $(".lieuxArriver option").each(function() {
      $(this).remove();
    });
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
