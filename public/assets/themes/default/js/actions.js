$(document).ready(function () {
  var BellIsActive = false;

  $(window).keydown(function (event) {
    if (event.keyCode == 13) {
      event.preventDefault();
      return false;
    }
  });

  $(".alert-bell").click(function () {
    event.preventDefault();
    if (BellIsActive == false) {
      $(".alert-list").addClass("alert-active");
      BellIsActive = true;
    } else {
      $(".alert-list").removeClass("alert-active");
      BellIsActive = false;
    }
    return false;
  });

  $("li.previous>a, li.next>a").click(function () {
    event.preventDefault();
    $("input[name='page']").val($(this).data("page"));
    $("button[name='btn_search']").click();
    return false;
  });

  $("select[name='length']").change(function () {
    event.preventDefault();
    $("input[name='page']").val("");
    $("button[name='btn_search']").click();
  });

  $("a.btn_print").click(function () {
    event.preventDefault();
    printing_zone(this);
    return false;
  });

  $("a.btn_search").click(function () {
    event.preventDefault();
    search_zone(this);
    return false;
  });

  var x = false;

  function search_zone() {
    if (x) {
      $(".panel-header").show();
    } else {
      $(".panel-header").hide();
    }
    x = !x;
  }

  $(this).on("click", "input", function () {
    this.select();
  });

  function printing_zone(btn) {
    var Content = document.getElementById($(btn).data("printzone"));
    var Langue = document.getElementById($(btn).data("printlang"));

    if (Content != null) {
      var Path = "/ghomes/public/assets/";
      var WP = window.open(
        "",
        "",
        "left=0,top=0,width=1000,height=900,toolbar=0,scrollbars=0,status=0"
      );
      WP.document.write("<html><head>");
      WP.document.write(
        '<link rel="stylesheet" href="' +
          Path +
          'packages/bootstrap-arabic/css/normalize.css">'
      );
      WP.document.write(
        '<link rel="stylesheet" href="' +
          Path +
          'packages/bootstrap-arabic/css/bootstrap-arabic.min.css">'
      );
      WP.document.write(
        '<link rel="stylesheet" href="' +
          Path +
          'themes/default/css/print.css">'
      );
      //WP.document.write('<link rel="stylesheet" href="' + Path + 'themes/default/css/colors.css">');
      //WP.document.write('<link rel="stylesheet" href="' + Path + 'themes/default/css/styles.css">');
      //WP.document.write('<link rel="stylesheet" href="' + Path + 'themes/default/css/ar.css">');
      var style = "";
      if (Langue == "AR") {
        style = 'style="direction:rtl;"';
      }
      WP.document.write(
        "</head><body " + style + ' onload="/*print();close();*/">'
      );
      WP.document.write(Content.innerHTML);
      WP.document.write("</body></html>");
      WP.document.close();
      WP.focus();
    }
  }

  $("input[name='picture'], input[name='logo']").change(function () {
    var input = this;
    if (input.files && input.files[0]) {
      var reader = new FileReader();
      reader.onloadend = function () {
        $("#img-picture").attr("src", reader.result);
      };
      reader.readAsDataURL(input.files[0]);
    } else {
      $("#img-picture").attr("src", $("#img-picture").data("default"));
    }
  });

  $(".upload").click(function () {
    $(this).find("input[name='picture'], input[name='logo']")[0].click();
  });

  /*$('input[required]').on('invalid', function() {
        event.preventDefault();
        this.setCustomValidity($(this).data("oninvalid"));
    });*/

  $(".alert-add")
    .delay(2000)
    .slideUp(function () {
      $(this).alert("close");
      window.location.href = window.location.href;
    });

  $(".alert-edit")
    .delay(2000)
    .slideUp(function () {
      $(this).alert("close");
      window.location.href = window.location.href;
    });

  $(".form-group .form-control[required='required']").each(function () {
    $(this).parent().find("label").addClass("label-required");
  });

  $(".input-group .form-control[required='required']").each(function () {
    $(this).parent().parent().find("label").addClass("label-required");
    //console.log($(this).parent().parent());
  });

  $("table .autoselect").change(function () {
    var x = $(this).parent().find(".autoselect").index(this);

    var state = $(this).prop("checked");
    $(this)
      .parent()
      .find(".autoselect")
      .each(function () {
        $(this).prop("checked", false);
      });

    $(this).prop("checked", state);

    var $checkboxs = $(this)
      .parent()
      .parent()
      .parent()
      .parent()
      .find("tbody td")
      .find("input[type='radio']:eq(" + x + ")");

    $checkboxs.each(function () {
      $(this).prop("checked", state);
      $(this).css("color", "red");
    });
  });

  $("select.trigger").change(function () {
    var trigger = $(this).data("trigger");
    var off = $(this).data("trigger-off");
    var name = $(this).attr("name");
    var value = this.value;

    if (value != "") {
      console.log("START TRIGGER");
      console.log("...");
      if ($("select[name='" + name + "']").data("clear") == "clear") {
        $("select[name='" + name + "']").val("");
        console.log($("select[name='" + name + "']"));
      }

      $("select[name='" + trigger + "']").val("");

      $("select[name='" + trigger + "']>option").each(function (key, item) {
        var id = $(this).data(name);
        $(this).hide();
        if (this.value == "" || id == value) {
          $(this).show();
        }
      });
    } else {
      $("select[name='" + trigger + "']>option").each(function (key, item) {
        $(this).show();
      });
      $("select[name='" + name + "']>option").each(function (key, item) {
        $(this).show();
      });
    }
    console.log("...");
    console.log("END TRIGGER.");
  });

  $("select.trigger").change();

  function SettingsLangs() {
    $("select[name='defaultlang']").val("");
    $("select[name='defaultlang']>option[value!='AR']").each(function () {
      $(this).hide();
    });
    var langs = $("input.websitelangs:checked");
    langs.each(function () {
      var value = $(this).val();
      $("select[name='defaultlang']>option[value='" + value + "']").show();
    });
  }

  $("input.websitelangs").change(function () {
    SettingsLangs();
  });

  function MultiSelectLoads() {
    var selects = $(".multiselect");

    selects.each(function () {
      var id = $(this).attr("id");

      var name = $(this).data("multiple-name");
      var nselected = $(this).data("multiple-nselected");
      var allselected = $(this).data("multiple-allselected");
      var selectall = $(this).data("multiple-selectall");

      $("#" + id).multiselect({
        nonSelectedText: name,
        nSelectedText: nselected,
        allSelectedText: allselected,
        selectAllText: selectall,
        includeSelectAllOption: true,
        enableFiltering: true,
        disableIfEmpty: true,
        maxHeight: 300,
        templates: {
          filter:
            '<li class="multiselect-item filter"><div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-search"></i></span><input class="form-control multiselect-search" type="text"></div></li>',
          filterClearBtn: "",
        },
      });
    });
  }

  $(window).on("load", function () {
    MultiSelectLoads();
  });
});

/*const body = document.querySelector("body"),
      sidebar = document.querySelector("sidebar"),
      toggle = document.querySelector("toggle");


      toggle.addEventListener("click",() =>{
        sidebar.classList.toggle("close");
      });*/
