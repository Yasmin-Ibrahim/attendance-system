let isScanning = false; // متغير لمنع التكرار

// الداله دى هتشتغل فور نجاح الكاميرا فى قراءة الكود
function onScanSuccess(decodeText, decodeResult){
     if (isScanning) return; // لو فيه عملية شغالة، اخرج ومتحاولش تاني

    isScanning = true; // اقفل الباب، فيه عملية بدأت

    // إيقاف المسح مؤقتاً لمنع التكرار
    html5QrcodeScanner.clear();

    // إرسال الكود للسيرفر باستخدام AJAX
    fetch(scanRoute, {
        method: 'POST',
        headers: {
            'Content-Type' : 'application/json',
            'X-CSRF-TOKEN' : csrfToken // ضروري جداً في Laravel للأمان
        },
        body: JSON.stringify({qr_code: decodeText})
    })
    .then(response => response.json())
    .then(data => {
        if(data.success){
            // إذا نجح التسجيل، أظهر رسالة خضراء
            Swal.fire({
                icon: 'success',
                title: "Done",
                text: data.message,
                timer: 2000
            }).than(() => {location.reload();}); // إعادة تشغيل الكاميرا
        }else{
            // إذا كان الطالب مسجل مسبقاً أو الكود خطأ، أظهر رسالة حمراء
            Swal.fire({
                icon: 'error',
                title: "Warning",
                text: data.message,
            }).then(() => {location.reload();});
        }
    })
}

 // إعدادات الكاميرا
let html5QrcodeScanner = new Html5QrcodeScanner(
    "reader", {fps:10, qrbox: 250}
);

html5QrcodeScanner.render(onScanSuccess);

