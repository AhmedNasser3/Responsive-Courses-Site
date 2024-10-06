@extends('Admin.dashboard')
@section('admincontent')
<style>
    /* CSS للرسالة */
    .message-box {
        display: none; /* مخفي في البداية */
        position: fixed;
        bottom: 20px;
        right: 20px;
        padding: 15px 20px;
        background-color: #333; /* خلفية داكنة */
        color: white;
        border-radius: 5px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
        z-index: 1000;
        animation: fadeInOut 4s ease-in-out;
    }

    /* تأثير الظهور والاختفاء */
    @keyframes fadeInOut {
        0% { opacity: 0; bottom: 10px; }
        10% { opacity: 1; bottom: 20px; }
        90% { opacity: 1; bottom: 20px; }
        100% { opacity: 0; bottom: 10px; }
    }

    /* زر التبديل */
    .toggle-btn {
        width: 60px;
        height: 30px;
        background-color: #ccc; /* خلفية رمادية افتراضية */
        border-radius: 15px;
        position: relative;
        cursor: pointer;
        transition: background-color 0.4s ease; /* تأثير سلس */
        border: none;
    }

    /* الدائرة داخل الزر */
    .toggle-circle {
        width: 25px;
        height: 25px;
        background-color: white;
        border-radius: 50%;
        position: absolute;
        top: 2.5px;
        left: 2.5px;
        transition: transform 0.4s ease; /* تأثير سلس عند التحويل */
    }

    /* عند تفعيل الزر */
    .active {
        background-color: #007bff; /* اللون الأزرق عند التفعيل */
    }

    .active .toggle-circle {
        transform: translateX(30px); /* نقل الدائرة إلى اليمين */
    }

    .btn-color {
        padding: 5px 10px;
        background-color: white;
        border: none;
    }

    .btn-color a {
        color: #131313;
        font-weight: 400;
    }
</style>

<div class="clearfix"></div>
<div class="content-wrapper">
    <div class="container-fluid">
        <div class="mt-3 row">
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">تفعيل الكورسات للطلاب</h5>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">User ID</th>
                                        <th scope="col">Show Courses</th>
                                        <th scope="col">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($users as $key => $user)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $user->name }}</td>
                                        <td><button class="btn-color"><a href="{{ '/admin/index/' . $user->id }}">تعديل الكورسات</a></button></td>
                                        <td>
                                            <form action="{{ route('admin.users.delete', ['userId' => $user->id]) }}" method="POST">
                                                @csrf
                                                @method('DELETE') <!-- تحديد أن هذا الطلب هو حذف -->
                                                <input type="submit" value="مسح" style="background: rgb(136, 36, 36); border: none;">
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div><!--End Row-->

        <!--start overlay-->
        <div class="overlay toggle-menu"></div>
        <!--end overlay-->
    </div>
    <!-- End container-fluid-->
</div><!--End content-wrapper-->

<div class="message-box" id="messageBox"></div> <!-- عنصر الرسالة -->

<script>
    // وظيفة لإظهار الرسالة
    function showMessage(message) {
        const messageBox = document.getElementById('messageBox');
        messageBox.textContent = message;
        messageBox.style.display = 'block';

        // إزالة الرسالة بعد 4 ثوانٍ (مطابقة مدة الرسوم المتحركة)
        setTimeout(() => {
            messageBox.style.display = 'none';
        }, 4000);
    }

    // JavaScript لتبديل حالة الزر وضبط القيمة
    const toggleButton = document.getElementById('toggleButton');
    const toggleValue = document.getElementById('toggleValue');

    toggleButton.addEventListener('click', function() {
        toggleButton.classList.toggle('active'); // تبديل الفئة 'active'

        // التحقق مما إذا كان الزر مفعلًا وضبط القيمة وفقًا لذلك
        if (toggleButton.classList.contains('active')) {
            toggleValue.value = 1; // إذا كان مفعلًا، ضبط القيمة على 1
            console.log("1");
        } else {
            toggleValue.value = 0; // إذا لم يكن مفعلًا، ضبط القيمة على 0
            console.log("0");
        }
    });

    @if(session('success'))
        showMessage('{{ session('success') }}');
    @endif
</script>
@endsection
