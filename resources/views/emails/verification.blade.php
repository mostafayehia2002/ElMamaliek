<x-mail::message>


    <div style="background-color: #f4f4f4; padding: 20px; font-family: Arial, sans-serif;">
        <h2 style="color: #333;">كود التفعيل</h2>
        <p style="color: #666;"> <strong>{{ $user }}</strong> مرحبا بك عزيزي:</p>
        <p style="color: #666;">هذا هو كود التفعيل للتسجيل علي الموقع : <strong>{{ $code }}</strong></p>
        <p style="color: #666;">يرجى عدم مشاركة هذا الكود مع أي شخص.</p>
        <p style="color: #888;">مع تحيات </p>

        <p style="color: #888;">{{ config('app.name') }}</p>
    </div>
</x-mail::message>

