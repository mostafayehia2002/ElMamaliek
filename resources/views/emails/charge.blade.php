<x-mail::message>
    <div style="background-color: #f4f4f4; padding: 20px; font-family: Arial, sans-serif;">
        <h2 style="color: #333;">طلب شحن</h2>
        <p style="color: #666;"> <strong>{{ $user }}</strong> مرحبا بك عزيزي:</p>
        <p style="color: #666;">لقد تم شحن المنتج <strong>{{ $product }}</strong> بنجاح</p>
        <p style="color: #888;"> شكرا علي استخدامك موقعنا مع تحياتي </p>
        <p style="color: #888;"> {{ config('app.name') }}</p>
    </div>
</x-mail::message>
