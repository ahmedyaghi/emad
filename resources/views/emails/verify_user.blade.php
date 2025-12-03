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
            <td style="background: url(bg.png); background-position: left center; background-repeat: no-repeat; background-color: #AE6675; height:45px; border-radius: 8px 8px 0 0; padding: 20px 25px; direction: rtl; text-align: center;">
              <img src="{{asset('assets/images/logo-white.svg')}}" alt="">
              <p style="color: #FFF;margin: 5px 0 0;direction: rtl;text-align: center;">منصة عماد</p>
            </td>
          </tr>
          <tr>
            <td style="padding:30px;background-color:#ffffff;border-radius: 8px;color: #262626;line-height: 1.6;box-shadow: 2px 13px 34px rgba(0, 0, 0, 0.01);direction: rtl;text-align: right;">
              <p style="margin:0 0 10px;direction: rtl;text-align: right;">رمز التحقق من منصة عماد</p>
              <p style="margin:0 0 10px;direction: rtl;text-align: right;">{{ 'مرحبا '.' '.$username }}</p>
              <p style="margin:0 0 10px;direction: rtl;text-align: right;">رمز التحقق</p>
              <p style="font-size:24px;font-weight:bold;color:#AE6675;margin:0 0 10px;direction: rtl;text-align: right;">{{$code}}</p>
              <p style="margin:0 0 10px;direction: rtl;text-align: right;">اذا لم تقم بطلب رمز تحقق فقط تجاهل هذه الرسالة</p>
              <p style="margin:0 0 10px;direction: rtl;text-align: right;">مع أطيب الأمنيات</p>
            </td>
          </tr>
        </table>
        <table class="table" width="544" cellpadding="0" cellspacing="0" style="margin-top:8px;" dir="rtl">
          <tr>
            <td style="font-size:15px;color:#AE6675;padding:10px;text-align: center;">
              © جميع حقوق الطبع و النشر محفوظة 2025 - لمنصة عماد
            </td>
          </tr>
        </table>
      </td>
    </tr>
  </table>
</body>
</html>