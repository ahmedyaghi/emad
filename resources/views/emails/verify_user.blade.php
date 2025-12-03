<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
  <meta charset="UTF-8">
  <title>رمز التحقق من منصة عماد</title>
  <meta name="viewport" content="width=device-width,initial-scale=1">
</head>
<style>
  @media(max-width:600px){
    .table{
      width: 100% !important;
    }
    .main-table{
      padding: 20px !important;
    }
  }
</style>
<body style="margin:0;padding:0;background-color:#f7f7f7;font-family:'Tahoma',sans-serif;direction: rtl; text-align: right;">
  <table class="main-table" width="100%" cellpadding="0" cellspacing="0" style="background-color:#f7f7f7;padding:20px 0;">
    <tr>
      <td align="center">
        <table class="table" width="544" cellpadding="0" cellspacing="0" style="border-radius:10px;overflow:hidden" dir="rtl">
          <tr>
            <td style="background: url(bg.png); background-position: left center; background-repeat: no-repeat; background-color: #0F2037; height:45px; border-radius: 8px 8px 0 0; padding: 20px 25px; direction: rtl; text-align: right;">
              <img src="{{asset('assets/mail/logo.png')}}" alt="">
              <p style="color: #FFF;margin: 5px 0 0;direction: rtl;text-align: right;">منصة عماد</p>
            </td>
          </tr>
          <tr>
            <td style="padding:30px;background-color:#ffffff;border-radius: 8px;color: #262626;line-height: 1.6;box-shadow: 2px 13px 34px rgba(0, 0, 0, 0.01);direction: rtl;text-align: right;">
              <p style="margin:0 0 10px;direction: rtl;text-align: right;">{{ __('site.verification_code_subject') }}</p>
              <p style="margin:0 0 10px;direction: rtl;text-align: right;">{{ __('site.hello').' '.$username }}</p>
              <p style="margin:0 0 10px;direction: rtl;text-align: right;">{{ __('site.verification_code') }}</p>
              <p style="font-size:24px;font-weight:bold;color:#047985;margin:0 0 10px;direction: rtl;text-align: right;">{{$code}}</p>
              <p style="margin:0 0 10px;direction: rtl;text-align: right;">{!! __('site.code_notice') !!}</p>
              <p style="margin:0 0 10px;direction: rtl;text-align: right;">{!! __('site.best_wishes') !!}</p>
            </td>
          </tr>
        </table>
        <table class="table" width="544" cellpadding="0" cellspacing="0" style="margin-top:8px;" dir="rtl">
          <tr>
            <td style="padding:30px 10px 10px;text-align: center;">
              <a href="#" style="margin:0 9px;background-color: #FFF;width: 40px;height: 40px;text-align: center;line-height: 3;border-radius: 10px;display: inline-block;">
                <img src="{{asset('assets/mail/call.png')}}" alt="call" />
              </a>
              <a href="#" style="margin:0 9px;background-color: #FFF;width: 40px;height: 40px;text-align: center;line-height: 3;border-radius: 10px;display: inline-block;">
                <img src="{{asset('assets/mail/instagram.png')}}" alt="instagram" />
              </a>
              <a href="#" style="margin:0 9px;background-color: #FFF;width: 40px;height: 40px;text-align: center;line-height: 3;border-radius: 10px;display: inline-block;">
                <img src="{{asset('assets/mail/facebook.png')}}" alt="facebook" />
              </a>
              <a href="#" style="margin:0 9px;background-color: #FFF;width: 40px;height: 40px;text-align: center;line-height: 3;border-radius: 10px;display: inline-block;">
                <img src="{{asset('assets/mail/sms.png')}}" alt="sms" />
              </a>
            </td>
          </tr>
          <tr>
            <td style="font-size:15px;color:#A5A5A5;padding:10px;text-align: center;">
              © جميع حقوق الطبع و النشر محفوظة 2025 - لمنصة عماد
            </td>
          </tr>
        </table>
      </td>
    </tr>
  </table>
</body>
</html>