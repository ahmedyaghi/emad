$(document).ready(function () {
  /*------------------------------------
      Initialize Select2
  --------------------------------------*/
  $('.select2').select2({
    width: '100%'
  });

  /*------------------------------------
      File Input Handling
  --------------------------------------*/
  $('#fileInput').on('change', function (e) {
    const file = e.target.files[0];

    if (file) {
      $('.upload-placeholder').hide();
      $('.file-list').empty();

      if (!file.type.startsWith('image/')) {
        // If the file is not an image, show it in the list
        const fileIcon = '<i class="fa fa-file text-main me-2"></i>';
        const fileElement = `
          <div class="file-item d-flex align-items-center border rounded p-2" style="gap:8px;">
            ${fileIcon}
            <span>${file.name}</span>
          </div>
        `;
        $('.file-list').append(fileElement);
      } else {
        // Alert if user selects an image
        alert('يُرجى رفع ملفات فقط، وليس صور.');
        $('.upload-placeholder').show();
      }
    }

    $(this).val('');
  });

  /*------------------------------------
      Logo Upload Handling
  --------------------------------------*/
  $('.logo-preview').on('click', function () {
    $('#association-logo').click();
  });

  $('#association-logo').on('change', function (e) {
    const file = e.target.files[0];
    if (file) {
      const reader = new FileReader();
      reader.onload = function (event) {
        $('.logo-preview').html(`<img src="${event.target.result}" alt="شعار الجمعية" />`);
        $('.logo-preview').removeClass('error');
        $('.logo-preview').next('.error-message').remove();
      };
      reader.readAsDataURL(file);
    }
  });

  /*------------------------------------
      Initialize Swiper - Brand
  --------------------------------------*/
  var swiperBrand = new Swiper(".swiper-brand", {
    speed: 1500,
    spaceBetween: 20,
    centeredSlides: false,
    loop: false,
    autoplay: {
      delay: 4000,
      disableOnInteraction: false,
    },
    breakpoints: {
      0: { slidesPerView: 1.3, spaceBetween: 20 },
      576: { slidesPerView: 2.3, spaceBetween: 20 },
      991: { slidesPerView: 3.3, spaceBetween: 20 },
      1025: { slidesPerView: 4.5, spaceBetween: 20 },
    },
  });

 
  /*------------------------------------
      Initialize All Training Swipers
  --------------------------------------*/
  document.querySelectorAll('.swiper-training').forEach((swiperEl, index) => {

  const swiperInstance = new Swiper(swiperEl, {
    slidesPerView: 4,
    speed: 1500,
    centeredSlides: false,
    loop: false,
    autoplay: { delay: 4000, disableOnInteraction: false },
    breakpoints: {
      320: { slidesPerView: 1.3 },
      600: { slidesPerView: 2.3 },
      1025: { slidesPerView: 3.4 },
    },
  });

    const prevButton = document.querySelectorAll('.swiper-prev')[index];
    const nextButton = document.querySelectorAll('.swiper-next')[index];

    if (prevButton && nextButton) {
      prevButton.addEventListener('click', () => swiperInstance.slidePrev());
      nextButton.addEventListener('click', () => swiperInstance.slideNext());
    }

  });


  /*------------------------------------
      Initialize Fancybox - Lightbox
  --------------------------------------*/
  Fancybox.bind("[data-fancybox]", { animated: true });

  /*------------------------------------
      Initialize SmartWizard
  --------------------------------------*/
  $("#smartwizard").css("visibility", "hidden"); // Hide wizard before render
  const otpElement = document.getElementById('otpModal');
  const paymentElement = document.getElementById('paymentModal');

  const otpModal = otpElement ? new bootstrap.Modal(otpElement) : null;
  const paymentModal = paymentElement ? new bootstrap.Modal(paymentElement) : null;

  let otpVerified = false; // OTP verification flag

  $('#smartwizard').smartWizard({
    selected: 0,
    theme: 'dots',
    transition: { animation: 'none' },
    lang: { next: 'التالي', previous: 'السابق' },
    toolbar: {
      showNextButton: true,
      showPreviousButton: true,
      position: 'bottom',
      extraHtml: `<button class="btn btn-success" id="btnFinish" disabled>الدفع وإنشاء حساب</button>`
    },
    anchor: {
      enableNavigation: true,
      enableDoneState: true,
      markPreviousStepsAsDone: true,
      unDoneOnBackNavigation: true
    }
  });

  // Show wizard after render
  setTimeout(() => {
    $("#smartwizard").css("visibility", "visible").hide().fadeIn(300);
  }, 100);

  /*------------------------------------
      Wizard Step Handling
  --------------------------------------*/
  $("#smartwizard").on("showStep", function (e, anchorObject, stepIndex, stepDirection, stepPosition) {
    $('html, body').animate({ scrollTop: 0 }, 400);
    $(".sw-btn-prev").toggle(stepPosition !== 'first');
    $(".sw-btn-next").toggle(stepPosition !== 'last');
    $("#btnFinish").toggle(stepPosition === 'last');
    $("#btnFinish").prop('disabled', stepPosition !== 'last');
  });

  /*------------------------------------
      Step Validation Function
  --------------------------------------*/
  function validateStep(idx) {
    let ok = true;
    const $step = $('#smartwizard .tab-pane').eq(idx);
    $step.find('.error-message').remove();

    // Validate required fields
    $step.find('.required').each(function () {
      const $field = $(this);
      const tag = $field.prop('tagName').toLowerCase();
      const value = $field.val();

      if (tag === 'select' && (!value || value === '' || value === '0')) {
        ok = false;
        const $select2 = $field.next('.select2');
        $select2.find('.select2-selection').addClass('error');
        if ($select2.next('.error-message').length === 0)
          $('<div class="error-message">الحقل مطلوب</div>').insertAfter($select2);
      } else if ((tag === 'input' || tag === 'textarea') && $field.val().trim() === '') {
        ok = false;
        $field.addClass('error');
        if ($field.next('.error-message').length === 0)
          $('<div class="error-message">الحقل مطلوب</div>').insertAfter($field);
      } else {
        $field.removeClass('error');
        $field.next('.error-message').remove();
        if (tag === 'select') $field.next('.select2').find('.select2-selection').removeClass('error');
      }
    });

    // Check logo in step 0
    if (idx === 0) {
      const $logo = $('#association-logo');
      if ($logo.length && $logo[0].files.length === 0) {
        ok = false;
        $('.logo-preview').addClass('error');
        if ($('.logo-preview').next('.error-message').length === 0)
          $('<div class="error-message">الرجاء رفع شعار الجمعية</div>').insertAfter('.logo-preview');
      } else {
        $('.logo-preview').removeClass('error');
        $('.logo-preview').next('.error-message').remove();
      }
    }

    // Check package selection in step 3
    if (idx === 3 && $('.package-card.selected').length === 0) {
      ok = false;
      alert('يرجى اختيار باقة قبل الإرسال');
    }

    $('#smartwizard').smartWizard('fixHeight');
    if (!ok) $('html, body').animate({ scrollTop: 0 }, 500);

    return ok;
  }

  /*------------------------------------
      Leave Step Event with OTP
  --------------------------------------*/
  $("#smartwizard").on("leaveStep", function (e, anchorObject, currentStepIndex, nextStepIndex, stepDirection) {
    if (stepDirection === 'forward') {
      const isValid = validateStep(currentStepIndex);
      if (!isValid) return false;

      // if (currentStepIndex === 1 && nextStepIndex === 2 && !otpVerified) {
      //   e.preventDefault();
      //   otpModal.show();
      //   setTimeout(() => $('.otp-input').first().focus(), 400);
      //   return false;
      // }
    }
    return true;
  });

  /*------------------------------------
      OTP Input Handling
  --------------------------------------*/
  $(document).on('keyup', '.otp-input', function (e) {
    const $this = $(this);
    if ($this.val().length === 1 && e.key !== 'Backspace') $this.next('.otp-input').focus();
    else if (e.key === 'Backspace' && !$this.val()) $this.prev('.otp-input').focus();
  });

  $("#verifyOtpBtn").click(function () {
    const otp = $('.otp-input').map(function () { return $(this).val(); }).get().join('');
    if (otp.length < 4) {
      $("#otpError").text("الرجاء إدخال رمز مكون من 4 أرقام");
      return;
    }

    $("#otpError").text("");
    otpVerified = true; // Mark OTP as verified
    otpModal.hide(); 
    $('#smartwizard').smartWizard("next"); 

    setTimeout(() => { otpVerified = false; }, 500);
  });

  /*------------------------------------
      Wizard Cancel Button
  --------------------------------------*/
  $("#btnCancel").click(function () {
    $('#smartwizard').smartWizard("reset");
    $("form").each(function () { this.reset(); });
    $('.package-card').removeClass('selected');
  });

  /*------------------------------------
      Wizard Finish Button
  --------------------------------------*/
  $("#btnFinish").click(function () {
    const lastStep = 3;
    if (!validateStep(lastStep)) return false;

    const selectedCard = $('.package-card.selected');
    const selectedPlan = selectedCard.data('plan');
    const selectedPrice = selectedCard.data('price');

    $("#selectedPlanName").text(selectedPlan || 'غير محددة');
    $("#selectedPlanPrice").text(selectedPrice || '—');

    paymentModal.show();
  });

  /*------------------------------------
      Package Selection
  --------------------------------------*/
  $('.package-card').on('click', function () {
    $('.package-card').removeClass('selected');
    $(this).addClass('selected');
  });

});







$(document).ready(function() {

  $('.add-experience').on('click', function() {
    var name = $('.experience-name').val().trim();
    var company = $('.experience-company').val().trim();

    if (!name || !company) {
      return;
    }

    var experienceItem = `
      <div class="item-experience d-flex align-items-center justify-content-between mb-2">
        <div>
          <h5 class="mb-2 font-semi-bold">${name}</h5>
          <h6>${company}</h6>
        </div>
        <button type="button" class="btn btn-white btn-delete">حذف</button>
      </div>
    `;

    $('.experience-list').append(experienceItem);

    $('.experience-name').val('');
    $('.experience-company').val('');
  });

  $('.experience-list').on('click', '.btn-delete', function() {
    $(this).closest('.item-experience').remove();
  });

});