@component('mail::message')
ボタンを押して、パスワード再設定に進んでください。

このurlは送信されてから60分間有効です。

@component('mail::button', ['url' => $reset_url])
パスワード再設定
@endcomponent

---
もしこのメールに心当たりがない場合は破棄してください。

@endcomponent