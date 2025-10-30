<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password - Permintaan Reset Password</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f3f4f6;
            padding: 20px;
            line-height: 1.6;
        }

        .email-container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #ffffff;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .header {
            background: linear-gradient(135deg, #dc2626 0%, #ef4444 100%);
            padding: 40px 30px;
            text-align: center;
        }

        .header-icon {
            width: 80px;
            height: 80px;
            background-color: rgba(255, 255, 255, 0.2);
            border-radius: 50%;
            margin: 0 auto 20px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .header h1 {
            color: #ffffff;
            font-size: 28px;
            font-weight: 700;
            margin-bottom: 10px;
        }

        .header p {
            color: #fecaca;
            font-size: 15px;
        }

        .content {
            padding: 40px 30px;
        }

        .greeting {
            font-size: 18px;
            color: #1f2937;
            margin-bottom: 20px;
            font-weight: 600;
        }

        .message {
            color: #4b5563;
            font-size: 15px;
            margin-bottom: 20px;
            line-height: 1.8;
        }

        .info-box {
            background: linear-gradient(135deg, #fef3c7 0%, #fde68a 100%);
            border-left: 4px solid #f59e0b;
            padding: 20px;
            margin: 25px 0;
            border-radius: 8px;
        }

        .info-box-title {
            display: flex;
            align-items: center;
            gap: 8px;
            color: #92400e;
            font-weight: 700;
            font-size: 15px;
            margin-bottom: 10px;
        }

        .info-box-text {
            color: #92400e;
            font-size: 14px;
            line-height: 1.6;
        }

        .button-container {
            text-align: center;
            margin: 35px 0;
        }

        .reset-button {
            display: inline-block;
            background: linear-gradient(135deg, #dc2626 0%, #ef4444 100%);
            color: #ffffff;
            text-decoration: none;
            padding: 16px 40px;
            border-radius: 8px;
            font-weight: 700;
            font-size: 16px;
            text-align: center;
            transition: transform 0.2s, box-shadow 0.2s;
            box-shadow: 0 4px 6px rgba(220, 38, 38, 0.3);
        }

        .reset-button:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 12px rgba(220, 38, 38, 0.4);
        }

        .alternative-link {
            background-color: #f9fafb;
            border: 2px dashed #d1d5db;
            padding: 20px;
            margin: 25px 0;
            border-radius: 8px;
        }

        .alternative-link-title {
            color: #6b7280;
            font-size: 13px;
            margin-bottom: 10px;
            font-weight: 600;
        }

        .alternative-link-url {
            color: #3b82f6;
            font-size: 12px;
            word-break: break-all;
            font-family: 'Courier New', monospace;
        }

        .security-notice {
            background-color: #fee2e2;
            border: 2px solid #fecaca;
            padding: 20px;
            margin: 25px 0;
            border-radius: 8px;
        }

        .security-notice-title {
            display: flex;
            align-items: center;
            gap: 8px;
            color: #991b1b;
            font-weight: 700;
            font-size: 15px;
            margin-bottom: 10px;
        }

        .security-notice-text {
            color: #991b1b;
            font-size: 14px;
            line-height: 1.6;
        }

        .expiry-info {
            text-align: center;
            background-color: #f3f4f6;
            padding: 15px;
            border-radius: 8px;
            margin: 25px 0;
        }

        .expiry-info-icon {
            font-size: 24px;
            margin-bottom: 8px;
        }

        .expiry-info-text {
            color: #4b5563;
            font-size: 14px;
        }

        .expiry-info-time {
            color: #dc2626;
            font-weight: 700;
            font-size: 16px;
        }

        .divider {
            height: 1px;
            background-color: #e5e7eb;
            margin: 30px 0;
        }

        .footer {
            background-color: #f9fafb;
            padding: 30px;
            text-align: center;
            border-top: 1px solid #e5e7eb;
        }

        .footer-text {
            color: #6b7280;
            font-size: 14px;
            margin-bottom: 10px;
        }

        .footer-signature {
            color: #1f2937;
            font-weight: 600;
            font-size: 15px;
            margin-bottom: 20px;
        }

        .footer-links {
            margin-top: 20px;
        }

        .footer-link {
            color: #4b5563;
            text-decoration: none;
            font-size: 13px;
            margin: 0 10px;
        }

        @media only screen and (max-width: 600px) {
            body {
                padding: 10px;
            }

            .header {
                padding: 30px 20px;
            }

            .header h1 {
                font-size: 24px;
            }

            .content {
                padding: 30px 20px;
            }

            .reset-button {
                display: block;
                width: 100%;
                padding: 14px 20px;
            }

            .info-box,
            .security-notice,
            .alternative-link {
                padding: 15px;
            }
        }
    </style>
</head>

<body>
    <div class="email-container">
        <!-- Header -->
        <div class="header">
            <div class="header-icon">
                <svg width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="#ffffff" stroke-width="2.5">
                    <rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect>
                    <path d="M7 11V7a5 5 0 0 1 10 0v4"></path>
                </svg>
            </div>
            <h1>Reset Password 🔐</h1>
            <p>Permintaan Reset Password Anda</p>
        </div>

        <!-- Content -->
        <div class="content">
            <p class="greeting">Halo,</p>

            <p class="message">
                Kami menerima permintaan untuk mereset password akun Anda. Jika Anda yang melakukan permintaan ini, silakan klik tombol di bawah untuk membuat password baru.
            </p>

            <!-- Reset Button -->
            <div class="button-container">
                <a href="{{ route('password.reset', ['token' => $token, 'email' => $email]) }}" class="reset-button">
                    Reset Password Sekarang
                </a>
            </div>

            <!-- Expiry Info -->
            <div class="expiry-info">
                <div class="expiry-info-icon">⏰</div>
                <p class="expiry-info-text">
                    Link ini akan kedaluwarsa dalam<br>
                    <span class="expiry-info-time">60 menit</span>
                </p>
            </div>

            <!-- Alternative Link -->
            <div class="alternative-link">
                <p class="alternative-link-title">Jika tombol tidak berfungsi, salin dan tempel link berikut ke browser Anda:</p>
                <p class="alternative-link-url">{{ route('password.reset', ['token' => $token, 'email' => $email]) }}</p>
            </div>

            <!-- Security Notice -->
            <div class="security-notice">
                <div class="security-notice-title">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M10.29 3.86L1.82 18a2 2 0 0 0 1.71 3h16.94a2 2 0 0 0 1.71-3L13.71 3.86a2 2 0 0 0-3.42 0z"></path>
                        <line x1="12" y1="9" x2="12" y2="13"></line>
                        <line x1="12" y1="17" x2="12.01" y2="17"></line>
                    </svg>
                    Perhatian Keamanan
                </div>
                <p class="security-notice-text">
                    <strong>Tidak melakukan permintaan ini?</strong><br>
                    Jika Anda tidak meminta reset password, abaikan email ini dan password Anda tidak akan berubah. Kami sarankan untuk segera mengubah password Anda jika merasa ada aktivitas mencurigakan pada akun Anda.
                </p>
            </div>

            <!-- Info Box -->
            <div class="info-box">
                <div class="info-box-title">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <circle cx="12" cy="12" r="10"></circle>
                        <line x1="12" y1="16" x2="12" y2="12"></line>
                        <line x1="12" y1="8" x2="12.01" y2="8"></line>
                    </svg>
                    Tips Keamanan Password
                </div>
                <p class="info-box-text">
                    • Gunakan kombinasi huruf besar, huruf kecil, angka, dan simbol<br>
                    • Minimal 8 karakter<br>
                    • Jangan gunakan password yang sama dengan akun lain<br>
                    • Hindari informasi pribadi yang mudah ditebak
                </p>
            </div>

            <div class="divider"></div>

            <p class="message" style="margin-bottom: 10px;">
                Jika Anda mengalami kesulitan atau memiliki pertanyaan, jangan ragu untuk menghubungi tim HR kami.
            </p>
        </div>

        <!-- Footer -->
        <div class="footer">
            <p class="footer-signature">Salam Hangat,<br><strong>HR Department</strong></p>

            <p class="footer-text">
                Email ini dikirim secara otomatis, mohon tidak membalas email ini.
            </p>

            <p class="footer-text" style="margin-top: 20px; font-size: 12px;">
                © {{ date('Y') }} {{ config('app.name') }}. All rights reserved.
            </p>
        </div>
    </div>
</body>

</html>