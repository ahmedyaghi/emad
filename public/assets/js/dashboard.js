/* =========================================================
   GLOBAL INITIALIZATIONS & UI CONTROLS
   ========================================================= */

$(document).ready(function () {

  /*------------------------------------
      Switch View (List / Grid)
  --------------------------------------*/
  $(".list-view").on("click", function () {
    $(".view-mode .tab-pane.active")
      .addClass("list-view-mode")
      .removeClass("grid-view-mode");

    $(this).addClass("active");
    $(".grid-view").removeClass("active");
  });

  $(".grid-view").on("click", function () {
    $(".view-mode .tab-pane.active")
      .addClass("grid-view-mode")
      .removeClass("list-view-mode");

    $(this).addClass("active");
    $(".list-view").removeClass("active");
  });


  /*------------------------------------
      Initialize Summernote Editor
  --------------------------------------*/
  if ($('#summernote').length && $.fn.summernote) {
    $('#summernote').summernote({
      height: 300,
      lang: 'ar-AR'
    });
}



  /*------------------------------------
      Drawer Toggle
  --------------------------------------*/
  $(".drawer-toggle").on("click", function () {
    $("body").toggleClass("is-open-drawer");
  });


  /*------------------------------------
      Sidebar Toggle
  --------------------------------------*/
  $(".toggle-sidebar").click(function () {
    $("body").toggleClass("sidebar-open");
  });

  $(".overlay").click(function () {
    $("body").removeClass("sidebar-open is-open-drawer");
  });


  /*------------------------------------
      Select2 Initialization
      - Supports usage inside modals
  --------------------------------------*/
  $('.select2').each(function () {
    $(this).select2({
      width: "100%",
      dropdownParent: $(this).closest('.modal').length
        ? $(this).closest('.modal')
        : null
    });
  });


  /*------------------------------------
      File Input Handling (No Images Allowed)
  --------------------------------------*/
  $('#fileInput').on('change', function (e) {
    const file = e.target.files[0];

    if (file) {
      $(".upload-placeholder").hide();
      $(".file-list").empty();

      // Allow only non-image files
      if (!file.type.startsWith("image/")) {
        const fileElement = `
          <div class="file-item d-flex align-items-center border rounded p-2" style="gap:8px;">
            <i class="fa fa-file text-main me-2"></i>
            <span>${file.name}</span>
          </div>
        `;
        $(".file-list").append(fileElement);
      } else {
        alert("يُرجى رفع ملفات فقط، وليس صور.");
        $(".upload-placeholder").show();
      }
    }

    // Reset input value
    $(this).val("");
  });

});


/* =========================================================
   TEMPUS DOMINUS INITIALIZATIONS (Date / Time Pickers)
   ========================================================= */

document.addEventListener("DOMContentLoaded", function () {

  /*------------------------------------
      DateTime Picker (yyyy-MM-dd)
  --------------------------------------*/
  document.querySelectorAll(".datetimepicker").forEach((picker) => {
    new tempusDominus.TempusDominus(picker, {
      useCurrent: false,
      localization: { locale: "en", format: "yyyy-MM-dd" },
      display: {
        components: { calendar: true, clock: false }
      }
    });
  });

  /*------------------------------------
      Year Picker (yyyy)
  --------------------------------------*/
  document.querySelectorAll(".yearpicker").forEach((picker) => {
    new tempusDominus.TempusDominus(picker, {
      useCurrent: false,
      localization: { locale: "en", format: "yyyy" },
      display: {
        viewMode: "years",
        components: {
          calendar: true,
          year: true,
          decades: true,
          month: false,
          date: false,
          clock: false
        }
      }
    });
  });

  /*------------------------------------
      Time Picker (HH:mm)
  --------------------------------------*/
  document.querySelectorAll(".timepicker").forEach((picker) => {
    new tempusDominus.TempusDominus(picker, {
      useCurrent: false,
      localization: { locale: "en", format: "HH:mm" },
      display: {
        viewMode: "clock",
        components: {
          calendar: false,
          clock: true,
          hours: true,
          minutes: true,
          seconds: false
        }
      }
    });
  });

  /*------------------------------------
      Date Picker (dd/MM/yyyy)
  --------------------------------------*/
  document.querySelectorAll(".datepicker").forEach((picker) => {
    new tempusDominus.TempusDominus(picker, {
      useCurrent: false,
      localization: { locale: "ar", format: "dd/MM/yyyy" },
      display: {
        components: {
          calendar: true,
          date: true,
          month: true,
          year: true,
          decades: true,
          clock: false
        }
      }
    });
  });
});


/* =========================================================
   PLYR VIDEO PLAYER INITIALIZATION
   ========================================================= */

document.addEventListener("DOMContentLoaded", () => {
  new Plyr("#player", {
    controls: [
      "play",
      "progress",
      "current-time",
      "mute",
      "volume",
      "fullscreen"
    ]
  });
});


/* =========================================================
   CANVAS CIRCLE GRAPH (Progress Ring)
   ========================================================= */

document.addEventListener("DOMContentLoaded", function () {
  const el = document.getElementById("graph");

  if (!el) {
    console.warn('Graph element with id="graph" not found.');
    return;
  }

  const size = el.getAttribute("data-size") || el.offsetWidth;
  const percent = el.getAttribute("data-percent") || 25;
  const lineWidth =
    el.getAttribute("data-line") || Math.max(8, size * 0.12);
  const rotate = el.getAttribute("data-rotate") || 0;

  const canvas = document.createElement("canvas");
  const ctx = canvas.getContext("2d");

  canvas.width = canvas.height = size;
  el.appendChild(canvas);

  ctx.translate(size / 2, size / 2);
  ctx.rotate((-1 / 2 + rotate / 180) * Math.PI);

  const radius = (size - lineWidth) / 2;

  /* Draw Base Circle */
  function drawCircle(color, lineWidth, percent) {
    ctx.beginPath();
    ctx.arc(0, 0, radius, 0, Math.PI * 2 * percent);
    ctx.strokeStyle = color;
    ctx.lineCap = "round";
    ctx.lineWidth = lineWidth;
    ctx.stroke();
  }

  // Background ring
  drawCircle("#F8F9F9", lineWidth, 1);

  // Foreground gradient ring
  const gradient = ctx.createLinearGradient(-radius, 0, radius, 0);
  gradient.addColorStop(0, "#EBF0EF");
  gradient.addColorStop(1, "#AE6675");

  drawCircle(gradient, lineWidth, percent / 100);
});
